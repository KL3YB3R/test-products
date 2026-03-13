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
    <h2 class="form-title">Nuevo Producto</h2>
    
    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name_product">Nombre del Producto</label>
            <input type="text" name="name_product" id="name_product" class="form-input" placeholder="Ej. Monitor" required>
        </div>

        <div class="form-group">
            <label for="price_product">Precio del Producto</label>
            <input 
                type="number" 
                name="price_product" 
                id="price_product" 
                class="form-input" 
                placeholder="0.00" 
                step="0.01" 
                min="0"
                pattern="^\d+(\.\d{1,2})?$"
                required
            >
        </div>

        <button type="submit" class="btn-submit">Registrar Producto</button>
    </form>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/form.js') }}"></script>
    
    <script>
        const priceInput = document.getElementById('price_product');

        priceInput.addEventListener('keydown', function(e) {
            if (['e', 'E', '+', '-'].includes(e.key)) {
                e.preventDefault();
            }
        });
    </script>
@endpush