<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CatalogCard extends Component
{
    // Props

    // PAYLOAD = data from controller

    public $data_drawer;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $payload,
    ) {
        $this->data_drawer = [
            'catalog_id' => $this->payload->id,
            'image' => ($payload->getMedia('thumbnail_catalog')->first() !== null) ? $payload->getMedia('thumbnail_catalog')->first()->getUrl() : null
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.catalog-card');
    }
}
