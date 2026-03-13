@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endpush



<section>
    
    
    <div>
        <a href="{{ route('product.create') }}">Crear Producto</a>
        <a href="{{ route('order.create') }}">Crear Pedido</a>
    </div>
    <h1>Pedidos</h1>
    <div class="custom-table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Ver Productos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('d / m / Y') }}</td>
                        <td>
                            <a href="{{ route('home.showProducts', ['order' => $order->id]) }}">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</section>