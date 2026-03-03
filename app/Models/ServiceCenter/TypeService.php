<?php

namespace App\Models\ServiceCenter;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class TypeService extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    public function serviceCenters()
    {
        return $this->hasMany(ServiceCenter::class, 'type_service_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all type services
     */
    public function getAllTypeService()
    {
        return self::where('is_active', true)
            ->latest()
            ->get();
    }
}
