<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index_dashboard()
    {
        $title = "Dashboard";
        return view('admin.dash', compact('title'));
    }
    public function product_dashboard()
    {
        $title = "Product";
        return view('admin.dash_product', compact('title'));
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
