<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.faq', [
            'meta_title' => $pageSettings->faq_meta_title,
            'meta_description' => $pageSettings->faq_meta_description,
            'meta_keywords' => $pageSettings->faq_meta_keywords,
            'meta_image' => $pageSettings->faq_meta_image ? asset('storage/' . $pageSettings->faq_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
