<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use App\Settings\PageSettings;
use Livewire\Attributes\Url;
use Livewire\Component;

class GuidanceSearch extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public function render(Product $product, PageSettings $pageSettings)
    {
        $guidances = $product->searchProductGuidance(6, $this->search);

        return view('livewire.displays.guidance-search', [
            'guidances' => $guidances,
            'page_settings' => $pageSettings,
        ]);
    }
}
