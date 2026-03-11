<?php

namespace App\Http\Controllers;

use App\Models\Guidance;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        if($pageSettings->guidance_is_active === 'false') {
            return abort(404);
        }

        return view('pages.support.guidance', [
            'meta_title' => $pageSettings->guidance_meta_title,
            'meta_description' => $pageSettings->guidance_meta_description,
            'meta_keywords' => $pageSettings->guidance_meta_keywords,
            'meta_image' => $pageSettings->guidance_meta_image ? asset('storage/' . $pageSettings->guidance_meta_image) : asset('images/og-image.jpg'),
        ]);
    }

    public function detail(PageSettings $pageSettings, Guidance $guidance, $slug)
    {
        if($pageSettings->guidance_is_active === 'false') {
            return abort(404);
        }

        $detail = $guidance->getDetailGuidance($slug);
        if(!$detail) return abort(404);

        $detail->primary_image_caption = $detail->getFirstMedia('guidances')?->getCustomProperty('caption');
        $detail->primary_image_alt_text = $detail->getFirstMedia('guidances')?->getCustomProperty('alt_text');

        $other_guidance = $guidance->getRecommendationGuidance(4, $detail->id);

        $meta_keywords = $detail->tags ? implode(', ', $detail->tags->pluck('name')->toArray()) : null;
        $meta_keywords = $meta_keywords === '' ? null : $meta_keywords;

        return view('pages.support.guidance-detail', [
            'meta_title' => $detail->meta_title ?? $detail->title,
            'meta_description' => $detail->meta_description ?? $detail->excerpt,
            'meta_keywords' => $meta_keywords,
            'meta_image' => $detail->getMedia('guidances')->first()->getUrl(),
            'detail' => $detail,
            'other_guidance' => $other_guidance,
        ]);
    }
}
