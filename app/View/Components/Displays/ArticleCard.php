<?php

namespace App\View\Components\Displays;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    // Props
    // PAYLOAD = data from controller
    // BORDER = true | false (default: false)
    // FOR = 'article' | 'guidance' (default: 'article')

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $payload,
        public ?bool $border = false,
        public ?string $for = 'article',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.article-card');
    }
}
