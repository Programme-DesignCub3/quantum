<?php

namespace App\Models\Product;

use App\Models\Catalog\Catalog;
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

    public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'product_id');
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
     * @param ?int $number
     * @param ?bool $is_best_seller
     */
    public function getProductForHome(?int $number = 3, ?bool $is_best_seller = false)
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
                // Specs
                $product->specs = collect($product->specs)->map(function ($spec) use ($product) {
                    if (isset($spec['data']['types'])) {
                        $get_type = $product->types->firstWhere('id', $spec['data']['types']) ?? null;
                        $spec['data']['types'] = $get_type;
                    }
                    return $spec;
                });
                return $product;
            });
    }

    /**
     * Get detail product by slug
     * @param string $slug
     */
    public function getDetailProduct(string $slug)
    {
        $detail = self::where('is_published', true)
            ->where('slug', $slug)
            ->with('category', 'variant', 'types', 'superiorities', 'features', 'media')
            ->get()
            ->map(function ($product) {
                // Images
                $product->images = $product->getMedia('products')->map(function ($media) {
                    return $media->getUrl();
                })->toArray();
                // Specs
                $product->specs = collect($product->specs)->map(function ($spec) use ($product) {
                    if (isset($spec['data']['types'])) {
                        $get_type = $product->types->firstWhere('id', $spec['data']['types']) ?? null;
                        $spec['data']['types'] = $get_type;
                    }
                    return $spec;
                });
                // Specs Detail
                $product->specs_detail = collect($product->specs_detail)->map(function ($spec) use ($product) {
                    if ($spec['type'] === 'dimension_image') {
                        $spec['data']['value'] = $product->getFirstMediaUrl('dimension_product');
                    }
                    return $spec;
                });
                return $product;
            });

        return $detail->first();
    }

    /**
     * Get random products for recommendation
     * @param ?int $number
     * @param ?string $category
     * @param ?int $exclude_id
     */
    public function getRecommendationProduct(?int $number = 3, ?string $category = null, ?int $exclude_id = null)
    {
        return self::where('is_published', true)
            ->inRandomOrder()
            ->with('category', 'media', 'variant', 'types')
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->when($exclude_id, function ($q) use ($exclude_id) {
                $q->where('id', '!=', $exclude_id);
            })
            ->take($number)
            ->get()
            ->map(function ($product) {
                // Images
                $product->images = $product->getMedia('products')->map(function ($media) {
                    return $media->getUrl();
                })->toArray();
                // Specs
                $product->specs = collect($product->specs)->map(function ($spec) use ($product) {
                    if (isset($spec['data']['types'])) {
                        $get_type = $product->types->firstWhere('id', $spec['data']['types']) ?? null;
                        $spec['data']['types'] = $get_type;
                    }
                    return $spec;
                });
                return $product;
            });
    }

    /**
     * Search products by name or category variant
     * @param ?int $number
     * @param ?string $query
     */
    public function searchProduct(?int $number = 3, ?string $query = null)
    {
        return self::where('is_published', true)
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhereHas('category', function ($q2) use ($query) {
                      $q2->where('name', 'like', '%' . $query . '%');
                  })
                  ->orWhereHas('variant', function ($q3) use ($query) {
                      $q3->where('name', 'like', '%' . $query . '%');
                  });
            })
            ->with('category', 'media', 'variant')
            ->latest()
            ->take($number)
            ->get();
    }

    /**
     * Search products guidance by name or category variant
     * @param ?int $number
     * @param ?string $query
     */
    public function searchProductGuidance(?int $number = 6, ?string $query = null)
    {
        return self::where('is_published', true)
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhereHas('category', function ($q2) use ($query) {
                      $q2->where('name', 'like', '%' . $query . '%');
                  })
                  ->orWhereHas('variant', function ($q3) use ($query) {
                      $q3->where('name', 'like', '%' . $query . '%');
                  });
            })
            ->with('category', 'media', 'variant')
            ->latest()
            ->take($number)
            ->get();
    }
}
