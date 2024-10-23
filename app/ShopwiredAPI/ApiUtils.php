<?php

namespace App\ShopwiredAPI;

use Illuminate\Support\Facades\Http;

trait ApiUtils
{
    public function basicAuthGet($link)
    {
        return Http::withBasicAuth(
            username: env('CLIENT_ID'),
            password: env('CLIENT_SECRET')
        )->withOptions([
            'verify' => false,
        ])->get(env('CLIENT_LINK') . $link);
    }
}
