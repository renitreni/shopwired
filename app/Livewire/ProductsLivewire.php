<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\ProductServices;
use App\ShopwiredAPI\ProductEndpoint;
use Livewire\Component;

class ProductsLivewire extends Component
{
    public $products;

    public function mount(){
        $this->products = Product::all()->toArray();
    }

    public function render()
    {
        return view('livewire.products-livewire');
    }

    public function syncProducts()
    {
        $productEndpoint = new ProductEndpoint();
        
        $result = $productEndpoint->getProducts();

        app(ProductServices::class)->syncApiProducts($result);

        $this->products = Product::all()->toArray();
    }
}
