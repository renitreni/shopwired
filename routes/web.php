<?php

use App\Jobs\CheckStockAlertJob;
use App\Livewire\ProductsLivewire;
use App\Models\WebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductsLivewire::class);
Route::get('/verify-shopwire-webhook', function(Request $request){
    $webhook = new WebHook();
    $webhook->result = json_encode($request->input());
    $webhook->save();
});

Route::get('/dispatch', function(Request $request){
    CheckStockAlertJob::dispatch();
});