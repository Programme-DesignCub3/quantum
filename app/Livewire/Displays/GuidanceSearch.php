<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class GuidanceSearch extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public function render(Product $product)
    {
        $guidances = $product->searchProductGuidance(6, $this->search);

        return view('livewire.displays.guidance-search', [
            'guidances' => $guidances,
        ]);
    }
}
