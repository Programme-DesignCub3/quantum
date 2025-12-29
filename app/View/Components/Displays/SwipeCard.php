<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SwipeCard extends Component
{
    // Props

    // IMAGE = 'string' (image path)
    // VIDEO = 'string|null' (video path or null)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image,
        public ?string $video
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.swipe-card');
    }
}
