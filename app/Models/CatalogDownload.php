<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogDownload extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'downloaded_catalogs'
    ];

    protected $casts = [
        'downloaded_catalogs' => 'array',
    ];
}
