<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    // Props

    // TITLE = *any string*
    // TYPE = 'primary', 'secondary', 'tertiary' (default: 'primary')
    // LAST = true, false (default: false)
    // OPEN = true, false (default: false)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public ?string $type = 'primary',
        public ?bool $last = false,
        public ?bool $open = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.accordion');
    }
}
