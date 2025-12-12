<?php

namespace App\View\Components\Navigation;

use App\Models\Product\ProductCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    // Props

    // TRANSPARENT = true | false (default: true)
    // STICKY = true | false (default: true)

    public $product_categories;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $transparent = true,
        public ?bool $sticky = true,
        ProductCategory $productCategory
    ) {
        $this->product_categories = $productCategory->getAllCategory();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.navbar');
    }
}
