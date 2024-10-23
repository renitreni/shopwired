<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\ProductServices;
use App\ShopwiredAPI\ProductEndpoint;
use Livewire\Component;

class ProductsLivewire extends Component
{
    public $products;

    public $hiddenId;

    public $productStock;

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

    public function editStockLevel($id, $stockLevel)
    {
        $this->hiddenId = $id;
        $this->productStock = $stockLevel;
    }
    
    public function updateStockLevel()
    {
        Product::where('id', $this->hiddenId)->update(['stock_alert' => $this->productStock]);

        $this->hiddenId = null;
        $this->productStock = null;

        $this->products = Product::all()->toArray();
    }

    public function cancelEdit()
    {
        $this->hiddenId = null;
        $this->productStock = null;
    }
}
