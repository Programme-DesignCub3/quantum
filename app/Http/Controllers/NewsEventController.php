<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index()
    {
        $news = [
            [
                'image' => asset('images/news-1.jpg'),
                'title' => '5 Cara Hemat Energi Kompor Quantum',
                'slug' => '5-cara-hemat-energi-kompor-quantum',
                'excerpt' => 'Trik hemat energi saat masak dengan kompor Quantum.',
                'category' => 'Tips',
            ],
            [
                'image' => asset('images/news-2.jpg'),
                'title' => 'Tata Kompor untuk Dapur Modern',
                'slug' => 'tata-kompor-untuk-dapur-modern',
                'excerpt' => 'Bikin dapur modern? Intip ide tata letak kompornya!',
                'category' => 'Inspirasi',
            ],
            [
                'image' => asset('images/news-3.jpg'),
                'title' => 'Keunggulan Kompor Quantum QGC - 101 AB',
                'slug' => 'keunggulan-kompor-quantum-qgc-101-ab',
                'excerpt' => 'Bikin momen masak lebih efisien dengan kompor gas 1 tungku ini.',
                'category' => 'Review',
            ],
            [
                'image' => asset('images/news-4.jpg'),
                'title' => 'Quantum Raih Top Brand 2025',
                'slug' => 'quantum-raih-top-brand-2025',
                'excerpt' => 'Quantum kembali jadi Top Brand berkat inovasi produk.',
                'category' => 'Berita',
            ],
            [
                'image' => asset('images/news-5.jpg'),
                'title' => 'Cara Memasang Regulator Gas yang Aman dan Anti Ribet',
                'slug' => 'cara-memasang-regulator-gas-yang-aman-dan-anti-ribet',
                'excerpt' => 'Cek cara mudah pasang regulator gas dengan aman di rumah.',
                'category' => 'Tips',
            ],
            [
                'image' => asset('images/news-6.jpg'),
                'title' => 'Ide Kreatif Menata Dapur dengan Kompor Gas 1 Tungku',
                'slug' => 'ide-kreatif-menata-dapur-dengan-kompor-gas-1-tungku',
                'excerpt' => 'Manfaatkan ruang terbatas jadi dapur yang nyaman.',
                'category' => 'Inspirasi',
            ],
            [
                'image' => asset('images/news-7.jpg'),
                'title' => 'Apa Risiko Pilih Harga Regulator Gas Murah Tanpa Label SNI?',
                'slug' => 'apa-risiko-pilih-harga-regulator-gas-murah-tanpa-label-sni',
                'excerpt' => 'Regulator gas murah tanpa SNI, tetap aman atau berbahaya?',
                'category' => 'Tips',
            ],
            [
                'image' => asset('images/news-8.jpg'),
                'title' => 'Mitos atau Fakta, Masak Pakai Api Kecil di Kompor Gas Lebih Hemat?',
                'slug' => 'mitos-atau-fakta-masak-pakai-api-kecil-di-kompor-gas-lebih-hemat',
                'excerpt' => 'Benarkah masak pakai api kecil bikin hemat gas? Cek faktanya di sini!',
                'category' => 'Tips',
            ],
        ];

        return view('pages.updates.news-event', [
            'news' => collect($news),
        ]);
    }

    public function detail()
    {
        $recommendationProducts = [
            [
                'image' => asset('images/product-1.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Putih',
                'slug' => 'qgc-101-ab-putih',
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
                'label' => 'Best Seller',
                'image' => asset('images/product-2.jpg'),
                'category' => 'Kompor Gas',
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 AB Hitam',
                'slug' => 'qgc-101-ab-hitam',
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
                'category_slug' => 'kompor',
                'name' => 'QGC - 101 A',
                'slug' => 'qgc-101-a',
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

        $otherNews = [
            [
                'image' => asset('images/news-2.jpg'),
                'title' => 'Tata Kompor untuk Dapur Modern',
                'slug' => 'tata-kompor-untuk-dapur-modern',
                'excerpt' => 'Bikin dapur modern? Intip ide tata letak kompornya!',
                'category' => 'Inspirasi',
            ],
            [
                'image' => asset('images/news-3.jpg'),
                'title' => 'Keunggulan Kompor Quantum QGC - 101 AB',
                'slug' => 'keunggulan-kompor-quantum-qgc-101-ab',
                'excerpt' => 'Bikin momen masak lebih efisien dengan kompor gas 1 tungku ini.',
                'category' => 'Review',
            ],
            [
                'image' => asset('images/news-4.jpg'),
                'title' => 'Quantum Raih Top Brand 2025',
                'slug' => 'quantum-raih-top-brand-2025',
                'excerpt' => 'Quantum kembali jadi Top Brand berkat inovasi produk.',
                'category' => 'Berita',
            ],
        ];

        return view('pages.updates.news-event-detail', [
            'recommendationProducts' => $recommendationProducts,
            'otherNews' => $otherNews,
        ]);
    }
}
