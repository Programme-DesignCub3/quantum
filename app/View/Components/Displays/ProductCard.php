<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

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
        public $payload,
        public ?string $size = 'md',
        public ?string $direction = 'col',
        public ?bool $disableView = false,
        public ?bool $disableSpecs = false,
    ) {

        $marketplaces = [];
        foreach ($this->payload->marketplace as $marketplace) {
            $marketplaces[$marketplace['type']] = $marketplace['data']['value'];
        }

        $this->data_drawer  = [
            'image' => $this->payload->media->first()->getUrl(),
            'category' => $this->payload->variant->name ?? $this->payload->category->name,
            'name' => $this->payload->name,
            'marketplace' => $marketplaces,
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
