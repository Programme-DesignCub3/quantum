<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductCategory $productCategory, $category = null)
    {
        $categories = $productCategory->getAllCategory();
        if($category) {
            $check_category = $categories->firstWhere('slug', $category);
            if(!$check_category) return abort(404);
        }

        switch ($category) {
            case 'kompor':
                $product_banner = asset('images/product-mobile-2.jpg');
                break;
            case 'regulator-selang-gas':
                $product_banner = asset('images/product-mobile-3.jpg');
                break;
            case 'sparepart':
                $product_banner = asset('images/product-mobile-4.jpg');
                break;
            default:
                $product_banner = asset('images/product-mobile-1.jpg');
        }

        return view('pages.product.product', [
            'current_category' => $category,
            'product_banner' => $product_banner,
        ]);
    }

    public function detail(Product $product, $category = null, $slug)
    {
        $detail = $product->getDetailProduct($slug);
        if(!$detail) return abort(404);

        $compare_product = $product->getRecommendationProduct(1, $detail->category->slug, $detail->id);
        $compare_product = $compare_product->first();

        $recommendation_products = $product->getRecommendationProduct(4, null, $detail->id);

        $guidance = [
            'image' => $detail->media->first()->getUrl(),
            'category' => $detail->variant->name ?? $detail->category->name,
            'name' => $detail->name,
            'slug' => $detail->slug,
        ];

        $marketplaces = [];
        foreach ($detail->marketplace as $marketplace) {
            $marketplaces[$marketplace['type']] = $marketplace['data']['value'];
        }

        $data_drawer = [
            'image' => $detail->media->first()->getUrl(),
            'category' => $detail->variant->name ?? $detail->category->name,
            'name' => $detail->name,
            'marketplace' => $marketplaces,
        ];

        return view('pages.product.product-detail', [
            'detail' => $detail,
            'data_drawer' => $data_drawer,
            'compare_product' => $compare_product,
            'guidance' => $guidance,
            'recommendation_products' => $recommendation_products,
        ]);
    }

    public function downloadGuidance(Product $product, $slug)
    {
        $detail = $product->getDetailProduct($slug);

        if ($detail && $detail->getFirstMedia('guidance_product')) {
            $file_name = 'Panduan - ' . $detail->variant->name . ' Quantum ' . $detail->name . '.' . $detail->getFirstMedia('guidance_product')->extension;
            return response()->download($detail->getFirstMedia('guidance_product')->getPath(), $file_name);
        }

        return abort(404);
    }
}
