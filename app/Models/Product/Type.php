<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_type', 'type_id', 'product_id');
    }

    /**
     * Get all types
     */
    public function getAllType()
    {
        return self::orderBy('name', 'asc')
            ->get();
    }
}
