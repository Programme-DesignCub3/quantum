<?php

namespace App\View\Components\Navigation;

use App\Models\Product\ProductCategory;
use App\Settings\GeneralSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $product_categories;
    public $settings;

    /**
     * Create a new component instance.
     */
    public function __construct(ProductCategory $productCategory, GeneralSettings $generalSettings)
    {
        $this->product_categories = $productCategory->getAllCategory();
        $this->settings = $generalSettings->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.footer');
    }
}
