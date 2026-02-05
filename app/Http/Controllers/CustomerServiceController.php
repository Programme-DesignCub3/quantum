<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Tutorial;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index(PageSettings $pageSettings, Product $product, Tutorial $tutorial)
    {
        abort(404);

        $guidances = $product->getProductGuidanceByNumber(3);

        $tutorials = $tutorial->getTutorialByNumber(3);

        return view('pages.support.customer-service', [
            'meta_title' => $pageSettings->cs_meta_title,
            'meta_description' => $pageSettings->cs_meta_description,
            'meta_keywords' => $pageSettings->cs_meta_keywords,
            'meta_image' => $pageSettings->cs_meta_image ? asset('storage/' . $pageSettings->cs_meta_image) : asset('images/og-image.jpg'),
            'page_settings' => $pageSettings,
            'guidances' => $guidances,
            'tutorials' => $tutorials,
        ]);
    }
}
