<?php

use App\Livewire\ProductsLivewire;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductsLivewire::class);
Route::get('/verify-shopwire-webhook', function($request){
    dd($request);
});