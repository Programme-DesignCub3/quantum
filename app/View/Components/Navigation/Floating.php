<?php

namespace App\View\Components\Navigation;

use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Propaganistas\LaravelPhone\PhoneNumber;

class Floating extends Component
{
    public $page_settings;

    /**
     * Create a new component instance.
     */
    public function __construct(PageSettings $pageSettings)
    {
        $this->page_settings = $pageSettings;

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
        return view('components.navigation.floating');
    }
}
