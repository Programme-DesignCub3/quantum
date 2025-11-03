<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Drawer extends Component
{
    // Props

    // STORE = Alpine store name to control drawer state
    // COLOR = 'white' | 'green' (default: 'white')

    public string $colorClass = '';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $store,
        public ?string $color = null,
    ) {
        switch($this->color) {
            case 'green':
                $this->colorClass = 'bg-[#F3F8F9]';
                break;
            default:
                $this->colorClass = 'bg-white';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.drawer');
    }
}
