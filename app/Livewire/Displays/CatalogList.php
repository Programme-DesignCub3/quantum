<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Livewire\Attributes\Url;
use Livewire\Component;

class CatalogList extends Component
{
    #[Url(as: 'kategori')]
    public ?string $category = '';

    public $categories;
    public $amount = 4;

    public function mount(ProductCategory $productCategory)
    {
        $this->categories = $productCategory->getAllCategory();
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    public function catalogFilter($category)
    {
        $this->amount = 4;
        $this->category = $category;
    }

    public function render(Product $product)
    {
        $total_count = $product->getCountAllProductCatalog($this->category);
        $catalogs = $product->getAllProductCatalog($this->amount, $this->category);

        return view('livewire.displays.catalog-list', [
            'catalogs' => $catalogs,
            'total_count' => $total_count,
        ]);
    }
}
