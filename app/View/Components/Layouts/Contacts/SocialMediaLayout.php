<?php

namespace App\View\Components\Layouts\Contacts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialMediaLayout extends Component
{
    public $page_settings;

    /**
     * Create a new component instance.
     */
    public function __construct($settings)
    {
        $this->page_settings = $settings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.contacts.social-media-layout');
    }
}
