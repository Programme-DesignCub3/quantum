<?php

namespace App\Models\Product;

use App\Models\Guidance;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductCategory extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_category_id');
    }

    public function types()
    {
        return $this->hasMany(Type::class, 'product_category_id', 'id');
    }

    public function guidances()
    {
        return $this->hasMany(Guidance::class, 'product_category_id');
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class, 'product_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getAllCategory()
    {
        return self::with('media')->get()->map(function ($category) {
            $category->icon_white = $category->getFirstMediaUrl('icon_white') ?: asset('images/default-icons/default-image-white.svg');
            $category->icon_green = $category->getFirstMediaUrl('icon_green') ?: asset('images/default-icons/default-image-green.svg');
            return $category;
        });
    }
}
