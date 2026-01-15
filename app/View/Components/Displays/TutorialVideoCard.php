<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TutorialVideoCard extends Component
{
    // Props

    // PAYLOAD = data from controller

    public $video;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $payload,
    ) {
        if($payload->video[0]['type'] === 'local') {
            $src = asset('/storage/' . $payload->video[0]['data']['value']);
        } else {
            $src = $payload->video[0]['data']['value'];
        }

        $video_src = [
            'type' => $payload->video[0]['type'],
            'src' => $src
        ];

        $this->video = $video_src;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.tutorial-video-card');
    }
}
