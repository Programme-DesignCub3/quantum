<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected function getProducts()
    {
        return [
            [
                'image' => asset('images/product-1.jpg'),
                'category' => 'Kompor Gas',
                'name' => 'QGC - 101 AB Putih',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-2.jpg'),
                'category' => 'Kompor Gas',
                'name' => 'QGC - 101 AB Hitam',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Elektrik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '256.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-3.jpg'),
                'category' => 'Kompor Gas',
                'name' => 'QGC - 101 A',
                'specs' => [
                    'furnace_type' => '1 Tungku',
                    'power_type' => 'Mekanik',
                    'fuel_type' => 'LPG',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];
    }

    public function index()
    {
        return view('pages.product.product', [
            'products' => $this->getProducts()
        ]);
    }

    public function category($category)
    {
        return view('pages.product.product', [
            'category' => $category,
            'products' => $this->getProducts()
        ]);
    }

    public function detail($category, $slug)
    {
        return view('pages.product.product-detail', [
            'category' => $category,
            'slug' => $slug
        ]);
    }
}
