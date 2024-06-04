<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index_dashboard(Product $product)
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
        return view('admin.dash_discount', compact('title'));
    }
    public function report_dashboard()
    {
        $title = "Laporan";
        return view('admin.dash_report', compact('title'));
    }
}
