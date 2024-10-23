<?php

namespace App\Services;

use App\Models\Product;

class ProductServices
{
    public function syncApiProducts($apiProducts)
    {
        foreach ($apiProducts->json() as $product) {
            $product['product_api_id'] = $product['id'];
            Product::updateOrCreate(['product_api_id' => $product['id']], $product);
        }
    }
}
