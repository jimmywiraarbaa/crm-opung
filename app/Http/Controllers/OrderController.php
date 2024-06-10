<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'discount' => 'required|integer|min:0'
        ]);

        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts->isEmpty()) {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'discount' => $request->discount,
            ]);

            $cart->delete();
        }

        return Redirect::route('show_order', $order);
    }


    public function index_order()
    {
        $title = "Order";

        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }

        return view('index_order', compact('title', 'orders'));
    }

    public function show_order(Order $order)
    {
        $title = "Order";
        $user = Auth::user();
        $is_admin = $user->is_admin;

        // Ambil semua transaksi yang terkait dengan order ini
        $transaksi = Transaction::where('order_id', $order->id)->first();

        // Jika tidak ada transaksi, set diskon ke 0
        $diskon = $transaksi ? $transaksi->discount : 0;

        if ($is_admin || $order->user_id == $user->id) {
            return view('show_order', compact('title', 'order', 'diskon'));
        }

        return Redirect::route('index_order');
    }


    public function submit_payment_receipt(Order $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back();
    }

    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);

        return Redirect::back();
    }

    public function destroy_order(Order $order)
    {
        $order->delete();
        Alert::success('Hore!', 'Menu Berhasil dihapus');
        return Redirect::route('order_dashboard');
    }
}
