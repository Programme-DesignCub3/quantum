<?php

namespace App\Livewire\Displays;

use App\Models\Guidance;
use App\Models\Product\Product;
use App\Settings\PageSettings;
use Livewire\Attributes\Url;
use Livewire\Component;

class GuidanceList extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public $amount = 3;

    public function loadMore()
    {
        $this->amount += 3;
    }

    public function render(Guidance $guidance, Product $product, PageSettings $pageSettings)
    {
        $total_count = $guidance->getCountAllGuidance() - 1;
        $latest = $guidance->getAllGuidance(1);
        $guidances = $guidance->getAllGuidance($this->amount, 1);
        $guidances_file = $product->searchProductGuidance(6, $this->search);

        return view('livewire.displays.guidance-list', [
            'latest' => $latest,
            'guidances' => $guidances,
            'guidances_file' => $guidances_file,
            'total_count' => $total_count,
            'page_settings' => $pageSettings,
        ]);
    }
}
