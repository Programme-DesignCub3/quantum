<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleCard extends Component
{
    // Props

    // SIMETRIC = true | false (default: false)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $simetric = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.simple-card');
    }
}
