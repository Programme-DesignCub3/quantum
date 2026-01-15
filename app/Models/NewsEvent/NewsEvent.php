<?php

namespace App\Models\NewsEvent;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class NewsEvent extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'read_time',
        'is_published',
    ];

    public function category()
    {
        return $this->belongsTo(NewsEventCategory::class, 'news_event_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get news depending on the number specified.
    * (For News and Event Page)
     * @param int $number
     */
    public function getNewsByNumber(int $number)
    {
        return self::where('is_published', true)
            ->latest()
            ->take($number)
            ->get();
    }

    /**
     * Get all news with optional category filter.
     * @param int $number
     * @param ?int $skip
     * @param ?string $category
     */
    public function getAllNews(int $number, ?int $skip = null, ?string $category = null)
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
     * Count all news and event by category
     * @param ?string $category
     */
    public function getCountAllNews(?string $category = null)
    {
        return self::where('is_published', true)
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })->count();
    }

    /**
     * Get detail news and event by slug
     * @param string $slug
     */
    public function getDetailNews(string $slug)
    {
        return self::where('is_published', true)
            ->where('slug', $slug)
            ->with('category', 'media')
            ->first();
    }

    /**
     * Get random news and event for recommendation
     * @param ?int $number
     * @param ?int $exclude_id
     */
    public function getRecommendationNews(?int $number = 3, ?int $exclude_id = null)
    {
        return self::where('is_published', true)
            ->inRandomOrder()
            ->when($exclude_id, function ($q) use ($exclude_id) {
                $q->where('id', '!=', $exclude_id);
            })
            ->take($number)
            ->get();
    }

    /**
     * Search news and event by title
     * @param ?int $number
     * @param ?string $query
     */
    public function searchNews(?int $number = 3, ?string $query = null)
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
