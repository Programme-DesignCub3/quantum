<?php

namespace App\Models;

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
        'type',
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

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all service centers with optional query filter.
     * @param int $number
     * @param ?string $query
     */
    public function getAllServiceCenter(int $number, ?string $query = null)
    {
        return self::where('is_published', true)
            ->where('type', 'service_center')
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
     * @param ?string $query
     */
    public function getCountAllServiceCenter(?string $query = null)
    {
        return self::where('is_published', true)
            ->where('type', 'service_center')
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('address', 'like', '%' . $query . '%')
                        ->orWhere('area', 'like', '%' . $query . '%');
                });
            })
            ->count();
    }

    /**
     * Get all service partners with optional query filter.
     * @param int $number
     * @param ?string $query
     */
    public function getAllServicePartner(int $number, ?string $query = null)
    {
        return self::where('is_published', true)
            ->where('type', 'partner')
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
     * Count all service partners.
     * @param ?string $query
     */
    public function getCountAllServicePartner(?string $query = null)
    {
        return self::where('is_published', true)
            ->where('type', 'partner')
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
