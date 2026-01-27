<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SwipeCard extends Component
{
    // Props

    // IMAGE = 'string' (image path)
    // ALT = 'string' (image alt text)
    // VIDEO = 'string|null' (video path or null)

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image,
        public ?string $alt = null,
        public ?array $video
    ) {
        if(isset($video)) {
            if($video[0]['type'] === 'local') {
                $src = asset('/storage/' . $video[0]['data']['value']);
            } else {
                $src = $video[0]['data']['value'];
            }

            $this->video = [
                'type' => $video[0]['type'],
                'src' => $src
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.swipe-card');
    }
}
