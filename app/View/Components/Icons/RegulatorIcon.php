<?php

namespace App\View\Components\Icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RegulatorIcon extends Component
{
    // Props

    // CLASS = TailwindCSS classes to apply to the SVG element
    // ID = optional ID attribute for the SVG element

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $class,
        public ?string $id
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.regulator-icon');
    }
}
