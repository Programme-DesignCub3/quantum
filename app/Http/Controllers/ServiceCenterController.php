<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.service-center', [
            'meta_title' => $pageSettings->sc_meta_title,
            'meta_description' => $pageSettings->sc_meta_description,
            'meta_keywords' => $pageSettings->sc_meta_keywords,
            'meta_image' => $pageSettings->sc_meta_image ? asset('storage/' . $pageSettings->sc_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
