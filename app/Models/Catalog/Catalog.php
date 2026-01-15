<?php

namespace App\Models\Catalog;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
