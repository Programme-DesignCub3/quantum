<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Superiority extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_superiority', 'superiority_id', 'product_id');
    }
}
