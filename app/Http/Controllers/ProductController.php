<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function create_product()
    {
        $title = "Tambah Produk";
        return view('create_product', compact('title'));
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        Alert::success('Hore!', 'Menu Berhasil ditambahkan');
        return Redirect::route('product_dashboard');
    }

    public function index_product(Request $request)
    {
        $title = "Menu";
        $products = Product::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && !empty($request->category)) {
            $products->where('category', $request->category);
        }

        $products = $products->get();

        return view('index_product', compact('title', 'products'));
    }

    public function show_product(Product $product)
    {
        $title = $product->name;
        return view('show_product', compact('product', 'title'));
    }

    public function edit_product(Product $product)
    {
        $title = "Edit " . $product->name;
        return view('edit_product', compact('title', 'product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        // Jika ada file gambar yang dikirim
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $product->update([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'image' => $path
            ]);
        } else {
            // Jika tidak ada file gambar yang dikirim
            $product->update([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                // Pertahankan gambar yang sudah ada dalam database
            ]);
        }

        Alert::success('Hore!', 'Menu Berhasil diUpdate');
        return Redirect::route('product_dashboard', $product);
    }


    public function delete_product(Product $product)
    {
        $product->delete();
        Alert::success('Hore!', 'Menu Berhasil dihapus');
        return Redirect::route('product_dashboard');
    }

    public function search_product(Request $request)
    {
        $title = "Menu";
        $message = null;

        if ($request->has('search')) {
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->get();
            if ($products->isEmpty()) {
                $message = "Belum ada Product";
            }
        } else {
            $products = Product::all();
        }

        return view('index_product', compact('title', 'products', 'message'));
    }
}
