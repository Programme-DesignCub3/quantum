<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $categories;
    public $current_category;

    public function paginationView()
    {
        return 'components.displays.pagination';
    }

    public function mount(ProductCategory $productCategory, $current_category = null)
    {
        $this->categories = $productCategory->getAllCategory();
        $this->current_category = $current_category;
    }

    public function render()
    {
        $count_products = Product::where('is_published', true)
            ->when($this->current_category, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->current_category);
                });
            })
            ->count();

        $products = Product::with('category', 'media', 'variant', 'types')
            ->where('is_published', true)
            ->when($this->current_category, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->current_category);
                });
            })
            ->latest()
            ->paginate(6);

        $products->transform(function ($product) {
            $product->specs = collect($product->specs)->map(function ($spec) use ($product) {
                if (isset($spec['data']['types'])) {
                    $get_type = $product->types->firstWhere('id', $spec['data']['types']) ?? null;
                    $spec['data']['types'] = $get_type;
                }
                return $spec;
            });
            return $product;
        });

        return view('livewire.displays.product-list', [
            'count_products' => $count_products,
            'products' => $products,
        ]);
    }
}
