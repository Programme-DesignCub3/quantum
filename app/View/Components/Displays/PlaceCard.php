<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlaceCard extends Component
{
    // Props

    // PAYLOAD = data from controller
    // FOR = 'distributor' | 'service_center' (default: 'distributor')

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $payload,
        public ?string $for = 'distributor',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.place-card');
    }
}
