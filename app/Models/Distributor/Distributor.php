<?php

namespace App\Models\Distributor;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Distributor extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'operational',
        'provide',
        'phone',
        'whatsapp',
        'maps',
        'is_published',
    ];

    protected $casts = [
        'operational' => 'array',
        'provide' => 'array',
    ];

    public function area()
    {
        return $this->belongsTo(AreaDistributor::class, 'area_distributor_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all distributors with optional area filter.
     * @param int $number
     * @param ?string $area
     */
    public function getAllDistributor(int $number, ?string $area = null)
    {
        return self::where('is_published', true)
            ->when($area, function ($query) use ($area) {
                $query->whereHas('area', function ($q) use ($area) {
                    $q->where('slug', $area);
                });
            })
            ->latest()
            ->take($number)
            ->get();
    }

    /**
     * Count all distributors by area.
     * @param ?string $area
     */
    public function getCountAllDistributor(?string $area = null)
    {
        return self::where('is_published', true)
            ->when($area, function ($query) use ($area) {
                $query->whereHas('area', function ($q) use ($area) {
                    $q->where('slug', $area);
                });
            })
            ->count();
    }
}
