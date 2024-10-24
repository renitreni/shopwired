<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\ProductServices;
use App\ShopwiredAPI\ProductEndpoint;
use App\ShopwiredAPI\StockEndpoint;
use Livewire\Component;

class ProductsLivewire extends Component
{
    public $products;

    public $hiddenId;

    public $hiddenStockId;

    public $productStock;

    public $stockLevel;

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

        $this->products = Product::query()->orderBy('id')->get()->toArray();
    }
    
    public function editStock($id, $level)
    {
        $this->hiddenStockId = $id;
        $this->stockLevel = $level;
    }

    public function updateStock()
    {
        Product::where('id', $this->hiddenStockId)->update(['stock' => $this->stockLevel]);
        
        $product = Product::find($this->hiddenStockId);

        if($product->sku ?? null) {
            app(StockEndpoint::class)->postStock([
                'sku' => $product->sku,
                'quantity' => $product->stock,
            ]);
        }

        $this->hiddenStockId = null;
        $this->stockLevel = null;

        $this->products = Product::query()->orderBy('id')->get()->toArray();
    }

    public function cancelStockAlertEdit()
    {
        $this->hiddenStockId = null;
        $this->stockLevel = null;
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

        $this->products = Product::query()->orderBy('id')->get()->toArray();
    }

    public function cancelEdit()
    {
        $this->hiddenId = null;
        $this->productStock = null;
    }
}
