<?php

namespace App\Models\Distributor;

use Illuminate\Database\Eloquent\Model;

class RegisterDistributor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'distributed_area',
        'address',
        'message'
    ];
}
