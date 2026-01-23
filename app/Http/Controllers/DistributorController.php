<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.distributor.distributor', [
            'meta_title' => $pageSettings->distributor_meta_title,
            'meta_description' => $pageSettings->distributor_meta_description,
            'meta_keywords' => $pageSettings->distributor_meta_keywords,
            'meta_image' => $pageSettings->distributor_meta_image ? asset('storage/' . $pageSettings->distributor_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
