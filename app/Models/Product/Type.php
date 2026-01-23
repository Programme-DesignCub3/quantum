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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_type', 'type_id', 'product_id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all types
     * @param ?string $category
     */
    public function getAllType(?string $category = null)
    {
        return self::when($category, function ($query) use ($category) {
                $query->whereHas('productCategory', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->orderBy('name', 'asc')
            ->get();
    }
}
