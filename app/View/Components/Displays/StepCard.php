<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StepCard extends Component
{
    // Props
    // NUMBER = number step
    // PAYLOAD = data from controller

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $number,
        public array $payload,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.step-card');
    }
}
