<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductCard extends Component
{
    // Props
    // PAYLOAD = data from controller
    // SIZE = 'lg' | 'md' | 'sm' (default: 'md')
    // DIRECTION = 'row' | 'col' (default: 'col')
    // DISABLE_VIEW = true | false (default: false) // disable view button
    // DISABLE_SPECS = true | false (default: false) // disable specs

    public $data_drawer;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $payload,
        public ?string $size = 'md',
        public ?string $direction = 'col',
        public ?bool $disableView = false,
        public ?bool $disableSpecs = false,
    ) {
        $this->data_drawer = [
            'image' => asset($this->payload['image']),
            'category' => $this->payload['variant'] ?? $this->payload['category'],
            'name' => $this->payload['name'],
            'price' => $this->payload['price'],
            'marketplace' => $this->payload['marketplace'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.product-card');
    }
}
