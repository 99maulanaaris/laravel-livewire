<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/liga/{ligaId}', 'product-liga')->name('products.liga');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');
