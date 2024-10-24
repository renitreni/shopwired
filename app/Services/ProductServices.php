<?php

namespace App\Services;

use App\Models\Product;

class ProductServices
{
    public function syncApiProducts($apiProducts)
    {
        foreach ($apiProducts->json() as $product) {
            $product['product_api_id'] = $product['id'];
            if ($product['variations']) {
                foreach ($product['variations'] as $key => $variations) {
                    if($variations['sku']) {
                        $variations['title'] = $product['title'];
                        $variations['slug'] = $product['slug'] . $key .' variation';
                        Product::updateOrCreate(['product_api_id' => $variations['id']], $variations);
                    }
                }
            }
            if ($product['sku']) {
                Product::updateOrCreate(['product_api_id' => $product['id']], $product);
            }
        }
    }
}
