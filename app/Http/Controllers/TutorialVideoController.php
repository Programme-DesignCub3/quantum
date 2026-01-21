<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class TutorialVideoController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.tutorial-video', [
            'meta_title' => $pageSettings->video_meta_title,
            'meta_description' => $pageSettings->video_meta_description,
            'meta_keywords' => $pageSettings->video_meta_keywords,
            'meta_image' => $pageSettings->video_meta_image ? asset('storage/' . $pageSettings->video_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
        ]);
    }
}
