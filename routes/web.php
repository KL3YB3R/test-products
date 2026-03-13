<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/home/{order}', 'showProducts')->name('home.showProducts');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/order/create', 'create')->name('order.create');
    Route::post('/order/store', 'store')->name('order.store');
});
