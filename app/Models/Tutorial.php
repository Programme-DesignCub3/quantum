<?php

namespace App\Models;

use App\Models\Product\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tutorial extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'video',
        'is_published',
    ];

    protected $casts = [
        'video' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all tutorial video with optional category filter.
     * @param int $number
     * @param ?string $category
     */
    public function getAllTutorial(int $number, ?string $category = null)
    {
        return self::where('is_published', true)
            ->latest()
            ->take($number)
            ->with('category', 'media')
            ->when($category, function ($query, $category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->get();
    }

    /**
     * Count all tutorial video by category.
     * @param ?string $category
     */
    public function getCountAllTutorial(?string $category = null)
    {
        return self::where('is_published', true)
            ->when($category, function ($query, $category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->count();
    }
}
