<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.distributor.catalog', [
            'meta_title' => $pageSettings->catalog_meta_title,
            'meta_description' => $pageSettings->catalog_meta_description,
            'meta_keywords' => $pageSettings->catalog_meta_keywords,
            'meta_image' => $pageSettings->catalog_meta_image ? asset('storage/' . $pageSettings->catalog_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
