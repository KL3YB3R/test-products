<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        
        try {
            Product::createProduct($request);
            DB::commit();
            return redirect()->to('/')->with('success', 'Producto creado exitosamente');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => 'No se pudo procesar el producto']);
        }
    }
}
