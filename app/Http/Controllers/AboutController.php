<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        $pageSettings->about_description_explain_formatted = nl2br(e($pageSettings->about_description_explain));
        $pageSettings->about_history_formatted = collect($pageSettings->about_history);

        return view('pages.about.about', [
            'meta_title' => $pageSettings->about_meta_title,
            'meta_description' => $pageSettings->about_meta_description,
            'meta_keywords' => $pageSettings->about_meta_keywords,
            'meta_image' => $pageSettings->about_meta_image ? asset('storage/' . $pageSettings->about_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
