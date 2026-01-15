<?php

namespace App\Livewire\Displays;

use App\Models\Recipe\Recipe;
use App\Models\Recipe\RecipeCategory;
use Livewire\Attributes\Url;
use Livewire\Component;

class RecipeList extends Component
{
    #[Url(as: 'kategori')]
    public ?string $category = '';

    public $categories;
    public $amount = 4;

    public function mount(RecipeCategory $recipeCategory)
    {
        $this->categories = $recipeCategory->getAllCategory();
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    public function recipeFilter($category)
    {
        $this->amount = 4;
        $this->category = $category;
    }

    public function render(Recipe $recipe)
    {
        $skip = $this->category == null ? 4 : 0;
        $total_count = $recipe->getCountAllRecipe($this->category) - $skip;
        $recipes = $recipe->getAllRecipe($this->amount, $skip, $this->category);

        return view('livewire.displays.recipe-list', [
            'recipes' => $recipes,
            'total_count' => $total_count,
        ]);
    }
}
