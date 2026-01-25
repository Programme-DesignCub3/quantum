<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterGuarantee extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'product_serial_number',
        'product_category',
        'product_model',
        'purchase_date',
        'purchase_place',
        'message',
    ];
}
