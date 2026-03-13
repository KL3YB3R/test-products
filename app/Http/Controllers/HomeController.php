<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('id', 'desc')->get();
        return view('index', compact('orders'));
    }

    public function showProducts(Order $order)
    {
        $order->load(['user', 'products', 'products.product']); 
        return view('order.show', compact('order'));
    }
}
