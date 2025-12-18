<?php

namespace App\Models\NewsEvent;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class NewsEvent extends Model
{
    use HasSlug, HasTags;

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
}
