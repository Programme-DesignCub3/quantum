<?php

namespace App\Models\NewsEvent;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class NewsEventCategory extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function newsEvents()
    {
        return $this->hasMany(NewsEvent::class, 'news_event_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all news event category
     */
    public function getAllCategory()
    {
        return self::all();
    }
}
