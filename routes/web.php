<?php

use App\Jobs\CheckStockAlertJob;
use App\Livewire\LogsLivewire;
use App\Livewire\ProductsLivewire;
use App\Models\WebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductsLivewire::class)->name('home');
Route::get('/logs', LogsLivewire::class)->name('logs');

Route::get('/verify-shopwire-webhook', function(Request $request){
    $webhook = new WebHook();
    $webhook->result = json_encode($request->input());
    $webhook->save();
});

Route::get('/dispatch', function(Request $request){
    CheckStockAlertJob::dispatch();
});