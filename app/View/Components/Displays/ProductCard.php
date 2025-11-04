<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    // Props

    // DATA = data from controller
    // SIZE = 'lg' | 'md' | 'sm' (default: 'md')
    // DIRECTION = 'row' | 'col' (default: 'col')

    public array $dataDrawer = [];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $payload,
        public ?string $size = 'md',
        public ?string $direction = 'col',
    ) {
        $this->dataDrawer = [
            'image' => $this->payload['image'],
            'category' => $this->payload['category'],
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
