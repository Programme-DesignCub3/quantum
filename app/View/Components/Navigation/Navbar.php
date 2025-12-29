<?php

namespace App\View\Components\Navigation;

use App\Models\Product\ProductCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navbar extends Component
{
    // Props

    // TRANSPARENT = true | false (default: true)
    // STICKY = true | false (default: true)

    public $product_categories;
    public ?string $route_group;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $transparent = true,
        public ?bool $sticky = true,
        ProductCategory $productCategory
    ) {
        $this->product_categories = $productCategory->getAllCategory();

        $get_routes = request()->route()?->getName() ? explode('.', request()->route()?->getName())[0] : null;
        if (in_array($get_routes, ['about', 'product', 'distributor', 'updates', 'support'])) {
            $this->route_group = $get_routes;
        } else {
            $this->route_group = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.navbar');
    }
}
