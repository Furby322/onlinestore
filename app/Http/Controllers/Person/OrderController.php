<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(10);
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
