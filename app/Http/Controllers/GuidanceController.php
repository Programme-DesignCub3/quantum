<?php

namespace App\Http\Controllers;

use App\Models\Guidance;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        return view('pages.support.guidance', [
            'meta_title' => $pageSettings->guidance_meta_title,
            'meta_description' => $pageSettings->guidance_meta_description,
            'meta_keywords' => $pageSettings->guidance_meta_keywords,
            'meta_image' => $pageSettings->guidance_meta_image ? asset('storage/' . $pageSettings->guidance_meta_image) : asset('images/og-image.jpg'),
        ]);
    }

    public function detail(Guidance $guidance, $slug)
    {
        $detail = $guidance->getDetailGuidance($slug);
        if(!$detail) return abort(404);

        $other_guidance = $guidance->getRecommendationGuidance(3, $detail->id);

        return view('pages.support.guidance-detail', [
            'meta_title' => $detail->title,
            'meta_description' => $detail->excerpt,
            'meta_image' => $detail->media->first()->getUrl(),
            'detail' => $detail,
            'other_guidance' => $other_guidance,
        ]);
    }
}
