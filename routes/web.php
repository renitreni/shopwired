<?php

use App\Livewire\ProductsLivewire;
use App\Models\WebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductsLivewire::class);
Route::get('/verify-shopwire-webhook', function(Request $request){
    WebHook::query()->fill(['result' => $request->input()]);
});