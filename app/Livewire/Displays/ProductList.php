<?php

namespace App\Livewire\Displays;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\Type;
use App\Models\Product\Variant;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    #[Url(as: 'jenis', except: [])]
    public $variant = [];

    #[Url(as: 'tipe', except: [])]
    public $type = [];

    #[Url(except: '')]
    public $sort = '';

    public $categories;
    public $variants;
    public $types;
    public $current_category;
    public $form_variant = [];
    public $form_type = [];

    public function paginationView()
    {
        return 'components.displays.pagination';
    }

    public function mount(
        ProductCategory $productCategory,
        Variant $variant,
        Type $type,
        $current_category = null)
    {
        $this->categories = $productCategory->getAllCategory();
        $this->variants = $variant->getAllVariant($current_category);
        $this->types = $type->getAllType($current_category);
        $this->current_category = $current_category;

        $this->form_variant = $this->variant;
        $this->form_type = $this->type;
    }

    public function applyFilter()
    {
        $this->variant = $this->form_variant;
        $this->type = $this->form_type;
    }

    public function resetFilter()
    {
        $this->variant = [];
        $this->type = [];
        $this->form_variant = [];
        $this->form_type = [];
    }

    public function refreshFilter() {
        $this->form_variant = $this->variant;
        $this->form_type = $this->type;
    }

    public function render()
    {
        $count_products = Product::where('is_published', true)
            ->when($this->current_category, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->current_category);
                });
            })
            ->when($this->variant, function ($query) {
                $query->whereHas('variant', function ($q) {
                    $q->whereIn('slug', $this->variant);
                });
            })
            ->when($this->type, function ($query) {
                $query->whereHas('types', function ($q) {
                    $q->whereIn('slug', $this->type);
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
            ->when($this->variant, function ($query) {
                $query->whereHas('variant', function ($q) {
                    $q->whereIn('slug', $this->variant);
                });
            })
            ->when($this->type, function ($query) {
                $query->whereHas('types', function ($q) {
                    $q->whereIn('slug', $this->type);
                });
            })
            ->latest()
            ->paginate(6);

        $products->transform(function ($product) {
            // Specs
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
