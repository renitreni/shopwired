<?php
namespace App\ShopwiredAPI;

class ProductEndpoint
{
    use ApiUtils;

    public function getProducts()
    {
        return $this->basicAuthGet('/products', ['embed' => 'variations']);
    }
}
