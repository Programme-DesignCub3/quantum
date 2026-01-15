<?php

namespace App\Models\Recipe;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Recipe extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'materials',
        'steps',
        'cook_time',
        'portion',
        'is_published',
        'is_premium',
    ];

    protected $casts = [
        'materials' => 'array',
        'steps' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(RecipeCategory::class, 'recipe_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get news depending on the number specified.
     * (For Recipe Page)
     * @param int $number
     */
    public function getRecipeByNumber(int $number)
    {
        return self::where('is_published', true)
            ->latest()
            ->take($number)
            ->get();
    }

    /**
     * Get all recipes with optional category filter.
     * @param int $number
     * @param ?int $skip
     * @param ?string $category
     */
    public function getAllRecipe(int $number, ?int $skip = null, ?string $category = null)
    {
        return self::where('is_published', true)
            ->latest()
            ->take($number)
            ->when($skip, function ($query) use ($skip) {
                $query->skip($skip);
            })
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->get();
    }

    /**
     * Count all recipe by category
     * @param ?string $category
     */
    public function getCountAllRecipe(?string $category = null)
    {
        return self::where('is_published', true)
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->count();
    }

    /**
     * Get detail recipe by slug
     * @param string $slug
     */
    public function getDetailRecipe(string $slug)
    {
        return self::where('is_published', true)
            ->where('slug', $slug)
            ->with('category', 'media')
            ->first();
    }

    /**
     * Get random recipe for recommendation
     * @param int $number
     * @param ?int $exclude_id
     */
    public function getRecommendationRecipe(int $number = 3, ?int $exclude_id = null)
    {
        return self::where('is_published', true)
            ->inRandomOrder()
            ->when($exclude_id, function ($query) use ($exclude_id) {
                $query->where('id', '!=', $exclude_id);
            })
            ->take($number)
            ->get();
    }
}
