<?php

namespace App\Livewire\Displays;

use App\Models\Product\Category;
use App\Models\Product\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $layout = 'row';
    public string $size = 'sm';
    public string $direction = 'col';

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

    public function changeLayout($layout)
    {
        $this->layout = $layout;

        switch ($layout) {
            case 'square':
                $this->size = 'lg';
                $this->direction = 'col';
                break;
            case 'row':
                $this->size = 'sm';
                $this->direction = 'col';
                break;
            case 'col':
                $this->size = 'md';
                $this->direction = 'row';
                break;
        }
    }

    public function render()
    {
        return view('livewire.displays.product-list', [
            'products' => $this->all_product,
        ]);
    }


}
