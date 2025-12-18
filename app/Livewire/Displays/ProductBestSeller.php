<?php

namespace App\Livewire\Displays;

use Livewire\Component;

class ProductBestSeller extends Component
{
    public $products;

    public function mount($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.displays.product-best-seller');
    }
}
