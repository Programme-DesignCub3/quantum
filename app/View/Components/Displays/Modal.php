<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    // Props

    // STORE = Alpine store name to control drawer state

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $store,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.modal');
    }
}
