<?php

namespace App\Livewire\Displays;

use App\Models\Guidance;
use App\Models\NewsEvent\NewsEvent;
use App\Models\Product\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class PageSearchList extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public function mount()
    {
        $this->search = request()->query('q', '');
    }

    public function render(
        Product $product,
        NewsEvent $newsEvent,
        Guidance $guidance
    ) {
        $products = $product->searchProduct(3, $this->search);
        $news = $newsEvent->searchNews(3, $this->search);
        $guidances = $guidance->searchGuidance(3, $this->search);

        $result = array_filter([
            'products' => $products,
            'news' => $news,
            'guidances' => $guidances,
        ], function ($item) {
            return count($item) > 0;
        });

        return view('livewire.displays.page-search-list', [
            'result' => $result,
        ]);
    }
}
