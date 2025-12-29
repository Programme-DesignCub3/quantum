<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use Livewire\Component;

class ProductBestSeller extends Component
{
    public $bestSellerOnly = false;

    public function productsFilter($status)
    {
        $this->bestSellerOnly = $status;
        $this->dispatch('products-home-reinit');
    }

    public function render(Product $product)
    {
        return view('livewire.displays.product-best-seller', [
            'products' => $product->getProductForHome(3, $this->bestSellerOnly)
        ]);
    }
}
