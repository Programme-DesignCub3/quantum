<?php

namespace App\Models\Product;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'specs',
        'marketplace',
        'superiority',
        'main_feature',
        'specs_detail',
        'gallery',
        'is_published',
        'is_best_seller',
    ];

    protected $casts = [
        'specs' => 'array',
        'marketplace' => 'array',
        'superiority' => 'array',
        'main_feature' => 'array',
        'specs_detail' => 'array',
        'gallery' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'product_type', 'product_id', 'type_id');
    }

    public function superiorities()
    {
        return $this->belongsToMany(Superiority::class, 'product_superiority', 'product_id', 'superiority_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_feature', 'product_id', 'feature_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get each product group by category depending on the number specified and automatically query by all categories.
     * (For Homepage)
     * @param int $number
     * @param bool $is_best_seller
     */
    public function getProductForHome($number = 3, $is_best_seller = false)
    {
        $categories = ProductCategory::pluck('id')->toArray();

        return self::query()
            ->fromSub(function ($q) use ($categories) {
                $q->from('products')
                ->select('*')
                ->selectRaw('
                    ROW_NUMBER() OVER (
                        PARTITION BY product_category_id
                        ORDER BY created_at DESC
                    ) as rn
                ')
                ->whereIn('product_category_id', $categories);
            }, 'p')
            ->where('rn', '<=', $number)
            ->where('is_published', true)
            ->when($is_best_seller, function ($q) {
                $q->where('is_best_seller', true);
            })
            ->with('category', 'media', 'variant', 'types')
            ->latest()
            ->get()
            ->map(function ($product) {
                // Images
                $product->images = $product->getMedia('products')->map(function ($media) {
                    return $media->getUrl();
                })->toArray();

                // Price
                $product->price = str_replace(',', '.', $product->price);

                // Specs
                // $product->specs = collect($product->specs)->map(function ($spec) {

                // });

                // Specs Detail
                $product->specs_detail = collect($product->specs_detail)->map(function ($spec) use ($product) {
                    if ($spec['type'] === 'dimension_image') {
                        $spec['data']['value'] = $product->getFirstMediaUrl('dimension_product');
                    }
                    return $spec;
                });
                return $product;
            });
    }
}
