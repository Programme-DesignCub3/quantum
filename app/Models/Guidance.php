<?php

namespace App\Models;

use App\Models\Product\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Guidance extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_published',
    ];

    protected $casts = [
        'content' => 'array',
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
     * Get all guidance articles
     * @param ?int $number
     * @param ?int $skip
     */
    public function getAllGuidance(?int $number = 4, ?int $skip = null)
    {
        return self::where('is_published', true)
            ->when($skip, function ($query, $skip) {
                return $query->skip($skip);
            })
            ->when($number, function ($query, $number) {
                return $query->take($number);
            })
            ->latest()
            ->get();
    }

    /**
     * Count all guidance articles
     */
    public function getCountAllGuidance()
    {
        return self::where('is_published', true)
            ->count();
    }

    /**
     * Get detail guidance by slug
     * @param string $slug
     */
    public function getDetailGuidance(string $slug)
    {
        return self::where('is_published', true)
            ->where('slug', $slug)
            ->with('category', 'media')
            ->first();
    }

    /**
     * Get random guidance for recommendation
     * @param int $number
     * @param ?int $exclude_id
     */
    public function getRecommendationGuidance(int $number = 3, ?int $exclude_id = null)
    {
        return self::where('is_published', true)
            ->inRandomOrder()
            ->when($exclude_id, function ($query) use ($exclude_id) {
                $query->where('id', '!=', $exclude_id);
            })
            ->take($number)
            ->get();
    }

    /**
     * Search guidance by title
     * @param ?int $number
     * @param ?string $query
     */
    public function searchGuidance(?int $number = 3, ?string $query = null)
    {
        return self::where('is_published', true)
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            })
            ->latest()
            ->take($number)
            ->get();
    }
}
