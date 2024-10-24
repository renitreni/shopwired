<?php
namespace App\ShopwiredAPI;

class StockEndpoint
{
    use ApiUtils;

    public function postStock($params)
    {
        return $this->basicAuthPost('/stock', $params);
    }
}
