<?php

namespace App\Models\ServiceCenter;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AreaService extends Model
{
    use HasSlug;

    protected $fillable = [
        'area',
        'slug'
    ];

    public function serviceCenters()
    {
        return $this->hasMany(ServiceCenter::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('area')
            ->saveSlugsTo('slug');
    }
}
