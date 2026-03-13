@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
@endpush

@if ($errors->any())
    <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <h2 class="form-title">Nuevo Pedido</h2>
    
    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Usuario </label>
            <select name="user_id" id="user_id" class="form-input" required>
                <option value="">-- Seleccionar Usuario --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="form-group">
            <label class="form-label">Seleccione los Productos</label>
            <div class="products-grid">
                @foreach($products as $product)
                    <label class="product-chip">
                        <input type="checkbox" name="productos[]" value="{{ $product->id }}">
                        <div class="chip-content">
                            <span class="product-name">{{ $product->name }}</span>
                            <span class="product-price">{{ number_format($product->price, 2) }}</span>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('productos')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Registrar Pedido</button>
    </form>
</div>