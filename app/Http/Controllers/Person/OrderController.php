<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->where('status', 1)->get();
        $user = Auth::user();
        return view('auth.orders.index', compact('orders', 'user'));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order))
        {
            return back();
        }
        $user = Auth::user();
        return view('auth.orders.show', compact('order', 'user'));
    }
}
