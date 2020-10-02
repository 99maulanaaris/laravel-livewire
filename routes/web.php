<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products','product-index')->name('products');
