<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function create_comment(Order $order)
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;

        if ($is_admin || $order->user_id == $user->id) {
            return view('index_comment', compact('order'));
        }

        return Redirect::route('index_order');
    }

    public function store_comment(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'content' => 'required',
        ]);

        Comment::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return Redirect::route('index_order');
    }
}
