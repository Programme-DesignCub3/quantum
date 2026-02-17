<?php

namespace App\View\Components\Navigation;

use App\Settings\PageSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Propaganistas\LaravelPhone\PhoneNumber;

class Floating extends Component
{
    public $data_drawer;

    /**
     * Create a new component instance.
     */
    public function __construct(PageSettings $pageSettings)
    {
        $call_center = new PhoneNumber($pageSettings->contact_cc_number, 'ID');
        $whatsapp = new PhoneNumber($pageSettings->contact_wa_number, 'ID');

        $pageSettings->contact_cc_number_formatted = $call_center->formatE164();
        $pageSettings->contact_wa_number_formatted = $whatsapp->formatE164();

        $this->data_drawer = [
            'email' => $pageSettings->contact_email,
            'whatsapp' => $pageSettings->contact_wa_number_formatted,
            'call_center' => $pageSettings->contact_cc_number_formatted,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.floating');
    }
}
