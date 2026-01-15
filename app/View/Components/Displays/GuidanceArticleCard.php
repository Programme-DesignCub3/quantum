<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuidanceArticleCard extends Component
{
    // Props

    // PAYLOAD = data from controller

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $payload,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.guidance-article-card');
    }
}
