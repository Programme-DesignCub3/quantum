<?php

namespace App\Livewire\Displays;

use App\Models\NewsEvent\NewsEvent;
use App\Models\NewsEvent\NewsEventCategory;
use Livewire\Attributes\Url;
use Livewire\Component;

class NewsList extends Component
{
    #[Url(as: 'kategori')]
    public ?string $category = '';

    public $categories;
    public $amount = 4;

    public function mount(NewsEventCategory $newsEventCategory)
    {
        $this->categories = $newsEventCategory->getAllCategory();
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    public function newsEventFilter($category)
    {
        $this->amount = 4;
        $this->category = $category;
    }

    public function render(NewsEvent $newsEvent)
    {
        $news = $newsEvent->getAllNews($this->amount, 4, $this->category);

        return view('livewire.displays.news-list', [
            'news' => $news,
        ]);
    }
}
