<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Recipe\Recipe;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Recipe $recipe, PageSettings $pageSettings)
    {
        $latest_recipes = $recipe->getRecipeByNumber(4);

        return view('pages.updates.recipe', [
            'meta_title' => $pageSettings->recipe_meta_title,
            'meta_description' => $pageSettings->recipe_meta_description,
            'meta_keywords' => $pageSettings->recipe_meta_keywords,
            'meta_image' => $pageSettings->recipe_meta_image ? asset('storage/' . $pageSettings->recipe_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
            'latest_recipes' => $latest_recipes,
        ]);
    }

    public function detail(Recipe $recipe, Product $product, $slug)
    {
        $detail = $recipe->getDetailRecipe($slug);
        if(!$detail) return abort(404);

        $recommendation_products = $product->getRecommendationProduct(4);

        $other_recipes = $recipe->getRecommendationRecipe(4, $detail->id);

        $meta_keywords = $detail->tags ? implode(', ', $detail->tags->pluck('name')->toArray()) : null;

        return view('pages.updates.recipe-detail', [
            'meta_title' => $detail->title,
            'meta_description' => $detail->description,
            'meta_keywords' => $meta_keywords,
            'meta_image' => $detail->media->first()->getUrl(),
            'detail' => $detail,
            'recommendation_products' => $recommendation_products,
            'other_recipes' => $other_recipes,
        ]);
    }
}
