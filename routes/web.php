<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::route('index_product');
});

Auth::routes();

Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
Route::get('/product/search', [ProductController::class, 'search_product'])->name('search_product');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index_dashboard'])->name('index_dashboard');

    Route::get('/dashboard/product', [AdminController::class, 'product_dashboard'])->name('product_dashboard');
    Route::post('/dashboard/product', [ProductController::class, 'store_product'])->name('store_product');
    Route::get('/dashboard/product/search', [AdminController::class, 'dash_search_product'])->name('dash_search_product');

    Route::get('/dashboard/discount', [AdminController::class, 'discount_dashboard'])->name('discount_dashboard');

    Route::get('/dashboard/report', [AdminController::class, 'report_dashboard'])->name('report_dashboard');


    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');

    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');

    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
    Route::post('/product/{product}/reply', [CommentController::class, 'store_reply'])->name('store_reply');




    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');

    Route::get('/order/{order}/ulasan', [CommentController::class, 'create_comment'])->name('create_comment');
    Route::post('/order/{order}/ulasan', [CommentController::class, 'store_comment'])->name('store_comment');

    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});
