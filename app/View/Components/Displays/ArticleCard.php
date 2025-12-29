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
    // FOR = 'article' | 'guidance' | 'recipe' (default: 'article')
    // PREMIUM = true | false (default: false)

    public $routeName;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $payload,
        public ?bool $border = false,
        public ?string $for = 'article',
        public ?bool $premium = false,
    ) {
        switch ($this->for) {
            case 'article':
                $this->routeName = 'updates.news.detail';
                break;
            case 'guidance':
                $this->routeName = 'support.guidance.detail';
                break;
            case 'recipe':
                $this->routeName = 'updates.recipe.detail';
                break;
            default:
                $this->routeName = 'updates.news.detail';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.displays.article-card');
    }
}
