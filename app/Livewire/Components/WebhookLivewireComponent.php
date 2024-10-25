<?php

namespace App\Livewire\Components;

use App\ShopwiredAPI\WebHooks;
use Livewire\Attributes\On;
use Livewire\Component;

class WebhookLivewireComponent extends Component
{
    public $isOpen;

    public $webhooks;

    public function render()
    {
        return view('livewire.components.webhook-livewire-component');
    }

    #[On('get-web-hooks')]
    public function getWebHooks()
    {
        $this->isOpen = 1;
        $this->listWebHooks();
    }

    public function closeWebHooks()
    {
        $this->isOpen = 0;
    }

    public function listWebHooks()
    {
        $this->webhooks = app(WebHooks::class)->getWebHooks()->json();
    }

    public function verifyWebHook($id)
    {
        $result = app(WebHooks::class)->postVerify($id);

        $this->listWebHooks();
    }
}
