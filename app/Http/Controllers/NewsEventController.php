<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent\NewsEvent;
use App\Models\Product\Product;
use App\Settings\PageSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index(NewsEvent $newsEvent, PageSettings $pageSettings)
    {
        if($pageSettings->news_is_active === 'false') {
            return abort(404);
        }

        $latest_news = $newsEvent->getNewsByNumber(4);

        return view('pages.updates.news-event', [
            'meta_title' => $pageSettings->news_meta_title,
            'meta_description' => $pageSettings->news_meta_description,
            'meta_keywords' => $pageSettings->news_meta_keywords,
            'meta_image' => $pageSettings->news_meta_image ? asset('storage/' . $pageSettings->news_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
            'latest_news' => $latest_news,
        ]);
    }

    public function detail(PageSettings $pageSettings, NewsEvent $newsEvent, Product $product, $slug)
    {
        if($pageSettings->news_is_active === 'false') {
            return abort(404);
        }

        $detail = $newsEvent->getDetailNews($slug);
        if(!$detail) return abort(404);

        $detail->primary_image_caption = $detail->getFirstMedia('news-events')?->getCustomProperty('caption');
        $detail->primary_image_alt_text = $detail->getFirstMedia('news-events')?->getCustomProperty('alt_text');

        $published_at = $detail->published_at ? Carbon::parse($detail->published_at)->translatedFormat('d F Y') : $detail->created_at->translatedFormat('d F Y');

        $recommendation_products = $product->getRecommendationProduct(3);

        $other_news = $newsEvent->getRecommendationNews(4, $detail->id);

        $meta_keywords = $detail->tags ? implode(', ', $detail->tags->pluck('name')->toArray()) : null;
        $meta_keywords = $meta_keywords === '' ? null : $meta_keywords;

        return view('pages.updates.news-event-detail', [
            'meta_title' => $detail->meta_title ?? $detail->title,
            'meta_description' => $detail->meta_description ?? $detail->excerpt,
            'meta_keywords' => $meta_keywords,
            'meta_image' => $detail->getMedia('news-events')->first()->getUrl(),
            'detail' => $detail,
            'recommendation_products' => $recommendation_products,
            'other_news' => $other_news,
            'published_at' => $published_at,
        ]);
    }
}
