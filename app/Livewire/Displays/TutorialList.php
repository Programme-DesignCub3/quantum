<?php

namespace App\Livewire\Displays;

use App\Models\Product\ProductCategory;
use App\Models\Tutorial;
use Livewire\Attributes\Url;
use Livewire\Component;

class TutorialList extends Component
{
    #[Url(as: 'kategori')]
    public ?string $category = '';

    public $categories;
    public $amount = 4;

    public function mount(ProductCategory $productCategory)
    {
        $this->categories = $productCategory->getAllCategory();
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    public function recipeFilter($category)
    {
        $this->category = $category;
    }

    public function render(Tutorial $tutorial)
    {
        $total_count = $tutorial->getCountAllTutorial($this->category);
        $tutorials = $tutorial->getAllTutorial($this->amount, $this->category);

        return view('livewire.displays.tutorial-list', [
            'tutorials' => $tutorials,
            'total_count' => $total_count,
        ]);
    }
}
