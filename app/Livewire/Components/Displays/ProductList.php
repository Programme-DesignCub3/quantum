<?php

namespace App\Livewire\Components\Displays;

use App\Models\Product\Category;
use App\Models\Product\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $categories;
    public $all_product;
    public $categorized_product;

    public function paginationView()
    {
        return 'components.displays.pagination';
    }

    public function mount(ProductCategory $productCategory)
    {
        $this->categories = $productCategory->getAllCategory();
        $this->all_product = collect(config('product.products'));
    }

    public function render()
    {
        return view('livewire.components.displays.product-list', [
            'products' => $this->all_product,
        ]);
    }


}
