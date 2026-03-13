<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('order.create', compact('users', 'products'));
    }

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        
        try {
            $order = Order::createOrder($request->user_id);

            $orderProduct = OrderProduct::createOrderProduct($order->id, $request->productos);

            DB::commit();
            return redirect()->to('/')->with('success', 'Pedido creado exitosamente');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => 'No se pudo procesar el pedido']);
        }
    }
}
