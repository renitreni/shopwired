<?php

namespace App\ShopwiredAPI;

use Illuminate\Support\Facades\Http;

trait ApiUtils
{
    public function basicAuthGet($link, $query = [])
    {
        return Http::withBasicAuth(
            username: env('CLIENT_ID'),
            password: env('CLIENT_SECRET')
        )->withOptions([
            'verify' => false,
        ])->get(env('CLIENT_LINK') . $link, $query);
    }

    public function basicAuthPost($link, $params)
    {
        return Http::withBasicAuth(
            username: env('CLIENT_ID'),
            password: env('CLIENT_SECRET')
        )->withOptions([
            'verify' => false,
        ])->post(env('CLIENT_LINK') . $link, $params);
    }
}
