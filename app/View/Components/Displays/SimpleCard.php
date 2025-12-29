<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleCard extends Component
{
    // Props

    // SIMETRIC = true | false (default: false)
    // BACKGROUND = 'transparent' | 'white' (default: 'transparent')
    // BACKGROUND_ICON = true | false (default: true)
    // BORDER = true | false (default: true)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $simetric = false,
        public ?string $background = 'transparent',
        public ?bool $backgroundIcon = true,
        public ?bool $border = true,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.simple-card');
    }
}
