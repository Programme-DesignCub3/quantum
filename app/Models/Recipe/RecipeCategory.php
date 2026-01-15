<?php

namespace App\Models\Recipe;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class RecipeCategory extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'recipe_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all recipe category
     */
    public function getAllCategory()
    {
        return self::all();
    }
}
