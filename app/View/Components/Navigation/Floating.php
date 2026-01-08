<?php

namespace App\View\Components\Navigation;

use App\Settings\GeneralSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Floating extends Component
{
    public array $settings;

    /**
     * Create a new component instance.
     */
    public function __construct(GeneralSettings $generalSettings)
    {
        $this->settings = [
            'phone_number' => $generalSettings->phone_number,
            'email_address' => $generalSettings->email_address,
            'whatsapp_number' => $generalSettings->whatsapp_number,
            'customer_care' => $generalSettings->customer_care,
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
