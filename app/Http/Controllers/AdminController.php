<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index_dashboard()
    {
        $total_product = Product::count();
        $total_order = Order::whereDate('created_at', Carbon::today())->count();
        $title = "Dashboard";
        return view('admin.dash', compact('title', 'total_product', 'total_order'));
    }
    public function product_dashboard(Request $request, Product $product)
    {
        $title = "Menu";
        $products = Product::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && !empty($request->category)) {
            $products->where('category', $request->category);
        }

        $products = $products->get();
        return view('admin.dash_product', compact('title', 'products'));
    }

    public function dash_search_product(Request $request)
    {
        $title = "Menu";
        $message = null;
        $searchTerm = $request->input('dash_search');

        if ($searchTerm) {
            $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
            if ($products->isEmpty()) {
                $message = "Belum ada Product dengan kata kunci '$searchTerm'";
            }
        } else {
            $products = Product::all();
        }

        return view('admin.dash_product', compact('title', 'products', 'message', 'searchTerm'));
    }


    public function discount_dashboard()
    {
        $title = "Diskon";
        $discounts = Discount::first();

        // Jika tidak ada diskon, buat instance kosong atau atur nilai default
        if (!$discounts) {
            $discounts = new \stdClass();
            $discounts->discount = 0; // atau nilai default yang sesuai
            $discounts->discount_limit = 0; // atau nilai default yang sesuai
        }

        return view('admin.dash_discount', compact('title', 'discounts'));
    }

    public function update_discount(Request $request, Discount $discount)
    {
        $request->validate([
            'discount' => 'required|integer|min:0',
            'discount_limit' => 'required|integer|min:0',
        ]);

        $discount_settings = $discount::first();
        $discount_settings->update([
            'discount' => $request->discount,
            'discount_limit' => $request->discount_limit,
        ]);

        Alert::success('Hore!', 'Diskon Berhasil diUpdate');
        return Redirect::back();
    }

    public function order_dashboard()
    {
        $title = "Order";
        $today = Carbon::today();
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin) {
            $orders = Order::whereDate('created_at', Carbon::today())->get();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }

        return view('admin.dash_order', compact('title', 'orders'));
    }

    public function order_show_dashboard(Order $order, Discount $discount)
    {
        $title = "Order";
        $discounts = $discount->first();
        $diskon = $discounts->discount;
        $batas_diskon = $discounts->discount;
        $user = Auth::user();
        $is_admin = $user->is_admin;

        if ($is_admin || $order->user_id == $user->id) {
            return view('admin.dash_order_show', compact('title', 'order', 'diskon', 'batas_diskon'));
        }

        return Redirect::route('order_dashboard');
    }

    public function report_dashboard()
    {
        $title = "Laporan";
        return view('admin.dash_report', compact('title'));
    }
}
