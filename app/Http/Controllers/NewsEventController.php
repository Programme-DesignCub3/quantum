<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent\NewsEvent;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index(NewsEvent $newsEvent)
    {
        $latest_news = $newsEvent->getNewsByNumber(4);

        return view('pages.updates.news-event', [
            'latest_news' => $latest_news,
        ]);
    }

    public function detail(NewsEvent $newsEvent, Product $product, $slug)
    {
        $detail = $newsEvent->getDetailNews($slug);
        if(!$detail) return abort(404);

        $recommendation_products = $product->getRecommendationProduct(3);

        $other_news = $newsEvent->getRecommendationNews(3, $detail->id);

        $meta_keywords = $detail->tags ? implode(', ', $detail->tags->pluck('name')->toArray()) : null;

        return view('pages.updates.news-event-detail', [
            'meta_title' => $detail->title,
            'meta_description' => $detail->excerpt,
            'meta_keywords' => $meta_keywords,
            'meta_image' => $detail->media->first()->getUrl(),
            'detail' => $detail,
            'recommendation_products' => $recommendation_products,
            'other_news' => $other_news,
        ]);
    }
}
