<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    // Props

    // TITLE = *any string*
    // LAST = true, false (default: false)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public ?bool $last = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.accordion');
    }
}
