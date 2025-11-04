<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product.product');
    }

    public function category($category)
    {
        return view('pages.product.product');
    }

    public function detail($category, $slug)
    {
        return view('pages.product.product-detail', [
            'category' => $category,
            'slug' => $slug
        ]);
    }
}
