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

    public function areaService()
    {
        return $this->belongsTo(AreaService::class, 'area_service_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all service centers with optional query filter.
     * @param ?string $query
     * @param ?string $type
     */
    public function getAllServiceCenter(?string $query, ?string $type)
    {
        return self::where('is_published', true)
            ->whereHas('typeService', function ($q) use ($type) {
                $q->where('slug', $type);
            })
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('address', 'like', '%' . $query . '%')
                        ->orWhereHas('areaService', function ($areaQuery) use ($query) {
                            $areaQuery->where('area', 'like', '%' . $query . '%');
                        });
                });
            })
            ->latest()
            ->get();
    }
}
