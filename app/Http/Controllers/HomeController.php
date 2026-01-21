<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent\NewsEvent;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(PageSettings $pageSettings, NewsEvent $newsEvent)
    {
        $pageSettings->home_why_choose_us_formatted = collect($pageSettings->home_why_choose_us);

        $articles = $newsEvent->getNewsByNumber(4);

        $video = [
            'type' => 'local',
            'src' => asset('videos/quantum-voxpop.mp4'),
        ];

        return view('pages.home', [
            'meta_title' => $pageSettings->home_meta_title,
            'meta_description' => $pageSettings->home_meta_description,
            'meta_keywords' => $pageSettings->home_meta_keywords,
            'meta_image' => $pageSettings->home_meta_image ? asset('storage/' . $pageSettings->home_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
            'articles' => $articles,
            'video' => $video,
        ]);
    }
}
