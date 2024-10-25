<?php
namespace App\ShopwiredAPI;

class WebHooks
{
    use ApiUtils;

    public function getWebHooks()
    {
        return $this->basicAuthGet('/webhooks');
    }

    public function postVerify($id)
    {
        return $this->basicAuthPost("/webhooks/$id/verify");
    }
}
