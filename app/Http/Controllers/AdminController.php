<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index_dashboard(Discount $discount)
    {
        $discounts = $discount->first();
        $diskon = $discounts->discount;
        $batas_diskon = $discounts->discount_limit;
        $total_product = Product::count();
        $total_order = Order::whereDate('created_at', Carbon::today())->count();
        $total_pay = Order::whereDate('created_at', DB::raw('CURDATE()'))->sum('pay_price');
        $title = "Dashboard";
        return view('admin.dash', compact('title', 'total_product', 'total_order', 'total_pay', 'diskon', 'batas_diskon'));
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
        // $user = Auth::user();
        // $is_admin = $user->is_admin;
        // if ($is_admin) {
        //     $orders = Order::all();
        // } else {
        //     $orders = Order::where('user_id', $user->id)->get();
        // }

        $orders = Order::all();

        return view('admin.dash_order', compact('title', 'orders'));
    }

    public function order_show_dashboard(Order $order, Request $request)
    {
        $title = "Order";
        $user = Auth::user();
        $is_admin = $user->is_admin;

        // Ambil semua transaksi yang terkait dengan order ini
        $transaksi = Transaction::where('order_id', $order->id)->first();

        // Jika tidak ada transaksi, set diskon ke 0
        $diskon = $transaksi ? $transaksi->discount : 0;

        // Cek apakah permintaan adalah untuk export PDF
        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.order', ['transaksi' => $transaksi]);
            return $pdf->download('Struk Order.pdf');
        }

        // Pastikan hanya admin atau pemilik order yang bisa melihat order ini
        if ($is_admin || $order->user_id == $user->id) {
            return view('admin.dash_order_show', compact('title', 'order', 'diskon'));
        }

        return Redirect::route('order_dashboard');
    }

    public function pdf_order_show_dashboard(Order $order, Request $request)
    {
        $title = "Order";
        $user = Auth::user();
        $is_admin = $user->is_admin;

        // Ambil semua transaksi yang terkait dengan order ini
        $transaksi = Transaction::where('order_id', $order->id)->first();

        // Jika tidak ada transaksi, set diskon ke 0
        $diskon = $transaksi ? $transaksi->discount : 0;

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.order', [
                'transaksi' => $transaksi,
                'order' => $order,
                'diskon' => $diskon
            ]);
            return $pdf->stream('Struk Order.pdf');
        }

        // Pastikan hanya admin atau pemilik order yang bisa melihat order ini
        if ($is_admin || $order->user_id == $user->id) {
            return view('pdf.order', compact('title', 'order', 'diskon'));
        }

        return Redirect::route('order_dashboard');
    }



    public function report_dashboard(Transaction $transaction, Request $request)
    {
        $title = "Laporan";

        // Menggunakan query untuk mendapatkan transaksi unik berdasarkan order_id
        $subQuery = DB::table('transactions')
            ->select(DB::raw('MIN(id) as id'))
            ->groupBy('order_id');

        // Mengambil transaksi lengkap berdasarkan id yang didapat dari subquery
        $reports = Transaction::whereIn('id', $subQuery)
            ->with(['order.user', 'order.transactions.product']) // Eager loading dengan produk terkait
            ->get();

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.report', ['reports' => $reports]);
            return $pdf->download('Laporan.pdf');
        }

        return view('admin.dash_report', compact('title', 'reports'));
    }

    public function pdf_report_dashboard(Request $request)
    {
        $subQuery = DB::table('transactions')
            ->select(DB::raw('MIN(id) as id'))
            ->groupBy('order_id');

        $reports = Transaction::whereIn('id', $subQuery)
            ->with(['order.user', 'order.transactions.product'])
            ->get();

        $data = [
            'title' => 'Laporan',
            'reports' => $reports,
        ];

        $pdf = PDF::loadView('pdf.report', $data);
        return $pdf->download('Laporan Penjualan Opung Waffle Chinatown Cofee.pdf');
    }
}
