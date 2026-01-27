<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InsideCard extends Component
{
    // Props

    // IMAGE = 'string' (image path)
    // ALT = 'string' (image alt text)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image,
        public ?string $alt = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.inside-card');
    }
}
