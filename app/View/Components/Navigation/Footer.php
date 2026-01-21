<?php

namespace App\View\Components\Navigation;

use App\Models\Product\ProductCategory;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Propaganistas\LaravelPhone\PhoneNumber;

class Footer extends Component
{
    public $general_settings;
    public $page_settings;
    public $product_categories;

    /**
     * Create a new component instance.
     */
    public function __construct(
        GeneralSettings $generalSettings,
        PageSettings $pageSettings,
        ProductCategory $productCategory
    ) {
        $this->general_settings = $generalSettings;
        $this->page_settings = $pageSettings;
        $this->product_categories = $productCategory->getAllCategory();

        $call_center = new PhoneNumber($pageSettings->contact_cc_number, 'ID');
        $whatsapp = new PhoneNumber($pageSettings->contact_wa_number, 'ID');

        $this->page_settings->contact_cc_number_formatted = $call_center->formatE164();
        $this->page_settings->contact_wa_number_formatted = $whatsapp->formatE164();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.footer');
    }
}
