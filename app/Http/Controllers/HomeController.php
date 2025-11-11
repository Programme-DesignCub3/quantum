<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
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
            [
                'image' => asset('images/product-4.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRL-03',
                'slug' => 'qrl-03',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '60.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-5.jpg'),
                'category' => 'Regulator',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-09',
                'slug' => 'qrh-09',
                'specs' => [
                    'power_type' => 'Kunci Tunggal',
                    'fuel_type' => 'Tekanan Rendah',
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
                'image' => asset('images/product-6.jpg'),
                'category' => 'Regulator dan Selang Gas',
                'category_slug' => 'regulator-dan-selang-gas',
                'name' => 'QRH-032',
                'slug' => 'qrh-032',
                'specs' => [
                    'length_type' => '1,8 Meter',
                    'fuel_type' => 'Tekanan Rendah',
                ],
                'price' => '180.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-7.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Burner Kuningan',
                'slug' => 'burner-kuningan',
                'price' => '100.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
            [
                'image' => asset('images/product-8.jpg'),
                'category' => 'Sparepart',
                'category_slug' => 'suku-cadang',
                'name' => 'Tatakan Kompor',
                'slug' => 'tatakan-kompor',
                'specs' => [
                    'furnace_type' => '5 Kaki',
                ],
                'price' => '50.000',
                'marketplace' => [
                    'lazada' => 'https://www.lazada.co.id/',
                    'blibli' => 'https://www.blibli.com/',
                    'shopee' => 'https://shopee.co.id/',
                    'tokopedia' => 'https://www.tokopedia.com/',
                ]
            ],
        ];

        $articles = [
            [
                'image' => asset('images/article-1.jpg'),
                'title' => '5 Cara Hemat Energi dengan Kompor Quantum',
                'excerpt' => 'Pelajari cara mengoptimalkan penggunaan kompor untuk',
                'category' => 'Tips',
            ],
            [
                'image' => asset('images/article-2.jpg'),
                'title' => 'Desain Dapur Modern dengan Kompor Quantum',
                'excerpt' => 'Dapatkan ide desain dapur minimalis dan modern dengan',
                'category' => 'Inspirasi',
            ],
            [
                'image' => asset('images/article-3.jpg'),
                'title' => 'Keunggulan Kompor Quantum QGC 201 DEP',
                'excerpt' => 'Mengenal lebih dekat kompor gas 2 tungku Quantum yang efisien',
                'category' => 'Review',
            ],
            [
                'image' => asset('images/article-4.jpg'),
                'title' => 'Resep Nasi Goreng Spesial dengan Quantum',
                'excerpt' => 'Coba resep nasi goreng spesial yang mudah dan cepat, dimasak',
                'category' => 'Resep',
            ],
        ];

        $testimonials = [
            [
                'name' => 'Hanna (35)',
                'role' => 'Pengguna Quantum',
                'feedback' => 'Kompor gas Quantum ini life saver banget! Nggak cuma hemat gas, desainnya juga simple dan modern. Bikin dapur jadi elegan. Recommended pokoknya!',
            ],
            [
                'name' => 'Danang (55)',
                'role' => 'Distributor Quantum',
                'feedback' => 'Saya puas jadi distributor Quantum selama hampir 6 tahun. Produknya berkualitas tinggi, penjualannya stabil, dan jadi pilihan utama banyak orang.',
            ],
        ];

        return view('pages.home', [
            'products' => $products,
            'articles' => $articles,
            'testimonials' => $testimonials,
        ]);
    }
}
