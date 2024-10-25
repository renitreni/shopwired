<?php

namespace App\Jobs;

use App\Mail\StockAlertEmail;
use App\Models\Audit;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class CheckStockAlertJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // stock alert level is at or above the current stock level
        $product = \App\Models\Product::query()->whereColumn('stock', '<=', 'stock_alert')->get()->toArray();
        \Illuminate\Support\Facades\Mail::to(env('APP_EMAIL'))->send(new \App\Mail\StockAlertEmail($product));

        Audit::create([
            'message' => 'StockAlertEmail result: ' . json_encode($product),
            'source' => 'CheckStockAlertJob',
            'method' => 'handle',
        ]);
    }
}
