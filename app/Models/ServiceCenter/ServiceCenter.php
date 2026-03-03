<?php

namespace App\Models\ServiceCenter;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ServiceCenter extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'area',
        'address',
        'operational',
        'provide_service',
        'provide_sell',
        'phone',
        'whatsapp',
        'maps',
        'is_published',
    ];

    protected $casts = [
        'operational' => 'array',
        'provide_service' => 'array',
        'provide_sell' => 'array',
    ];

    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'type_service_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all service centers with optional query filter.
     * @param int $number
     * @param string $query
     * @param string $type
     */
    public function getAllServiceCenter(int $number, string $query, string $type)
    {
        return self::where('is_published', true)
            ->when($type, function ($query) use ($type) {
                $query->whereHas('typeService', function ($q) use ($type) {
                    $q->where('slug', $type);
                });
            })
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('address', 'like', '%' . $query . '%')
                        ->orWhere('area', 'like', '%' . $query . '%');
                });
            })
            ->latest()
            ->take($number)
            ->get();
    }

    /**
     * Count all service centers.
     * @param string $query
     * @param string $type
     */
    public function getCountAllServiceCenter(string $query, string $type)
    {
        return self::where('is_published', true)
            ->when($type, function ($query) use ($type) {
                $query->whereHas('typeService', function ($q) use ($type) {
                    $q->where('slug', $type);
                });
            })
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('address', 'like', '%' . $query . '%')
                        ->orWhere('area', 'like', '%' . $query . '%');
                });
            })
            ->count();
    }
}
