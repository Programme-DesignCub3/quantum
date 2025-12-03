<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $products = [
            [
                'category' => 'Kompor',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Putih',
                'slug' => 'qgc-101-ab-putih',
                'price' => '256.000',
                'image' => asset('images/product-1.jpg')
            ],
            [
                'category' => 'Kompor',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Hitam',
                'slug' => 'qgc-101-ab-hitam',
                'price' => '256.000',
                'image' => asset('images/product-2.jpg')
            ],
            [
                'category' => 'Kompor',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 A',
                'slug' => 'qgc-101-a',
                'price' => '180.000',
                'image' => asset('images/product-3.jpg')
            ],
        ];

        $articles = [
            [
                'title' => '5 Cara Hemat Energi dengan Kompor Quantum',
                'slug' => '5-cara-hemat-energi-dengan-kompor-quantum',
            ],
            [
                'title' => 'Keunggulan Kompor Quantum QGC 101 AB',
                'slug' => 'keunggulan-kompor-quantum-qgc-101-ab',
            ],
            [
                'title' => 'Resep Nasi Goreng Spesial dengan Quantum',
                'slug' => 'resep-nasi-goreng-spesial-dengan-quantum',
            ],
        ];

        $guidances = [
            [
                'title' => 'Cara memasang selang gas ke kompor Quantum',
                'slug' => 'cara-memasang-selang-gas-ke-kompor-quantum',
            ]
        ];

        return view('pages.search', [
            'products' => $products,
            'articles' => $articles,
            'guidances' => $guidances,
        ]);
    }
}
