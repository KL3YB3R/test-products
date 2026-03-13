@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endpush


<section>
    <a href="{{ route('index') }}">Regresar</a>
    
    <h1>Productos para {{ $order->user->name }}</h1>
    <div class="custom-table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ number_format($product->product->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</section>