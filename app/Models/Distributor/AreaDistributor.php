<?php

namespace App\Models\Distributor;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AreaDistributor extends Model
{
    use HasSlug;

    protected $fillable = [
        'area',
        'slug'
    ];

    public function distributors()
    {
        return $this->hasMany(Distributor::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('area')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all area distributors
     */
    public function getAllArea()
    {
        return self::orderBy('area', 'asc')
            ->get();
    }
}
