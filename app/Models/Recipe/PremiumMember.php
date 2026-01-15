<?php

namespace App\Models\Recipe;

use Illuminate\Database\Eloquent\Model;

class PremiumMember extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
    ];
}
