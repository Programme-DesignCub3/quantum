<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = [
            [
                'premium' => true,
                'image' => asset('images/recipe-1.jpg'),
                'title' => 'Coto Makassar',
                'slug' => 'coto-makassar',
                'excerpt' => 'Sup daging khas Makassar yang kaya rempah',
                'category' => 'Nusantara',
            ],
            [
                'premium' => true,
                'image' => asset('images/recipe-2.jpg'),
                'title' => 'Chicken Fried Steak',
                'slug' => 'chicken-fried-steak',
                'excerpt' => 'Daging sapi goreng tepung dengan saus creamy',
                'category' => 'Western',
            ],
            [
                'premium' => true,
                'image' => asset('images/recipe-3.jpg'),
                'title' => 'Okonomiyaki',
                'slug' => 'okonomiyaki',
                'excerpt' => 'Pancake asin Jepang dengan topping melimpah',
                'category' => 'Japanese',
            ],
            [
                'premium' => true,
                'image' => asset('images/recipe-4.jpg'),
                'title' => 'Mapo Tofu',
                'slug' => 'mapo-tofu',
                'excerpt' => 'Tahu lembut dengan saus pedas khas Sichuan',
                'category' => 'Chinese',
            ],
            [
                'premium' => true,
                'image' => asset('images/recipe-5.jpg'),
                'title' => 'Soto Betawi',
                'slug' => 'soto-betawi',
                'excerpt' => 'Kuah santan gurih khas Jakarta',
                'category' => 'Nusantara',
            ],
            [
                'image' => asset('images/recipe-6.jpg'),
                'title' => 'Spaghetti Aglio e Olio',
                'slug' => 'spaghetti-aglio-e-olio',
                'excerpt' => 'Olahan pasta simpel dengan bawang putih dan minyak zaitun',
                'category' => 'Western',
            ],
            [
                'image' => asset('images/recipe-7.jpg'),
                'title' => 'Kimchi Jjigae',
                'slug' => 'kimchi-jjigae',
                'excerpt' => 'Sup pedas hangat dengan kimchi fermentasi',
                'category' => 'Korean',
            ],
            [
                'image' => asset('images/recipe-8.jpg'),
                'title' => 'Falafel',
                'slug' => 'falafel',
                'excerpt' => 'Bola kacang khas Arab yang renyah dan lezat',
                'category' => 'Timur Tengah',
            ],
            [
                'image' => asset('images/recipe-9.jpg'),
                'title' => 'Ayam Kung Pao',
                'slug' => 'ayam-kung-pao',
                'excerpt' => 'Tumis ayam pedas manis khas Sichuan',
                'category' => 'Chinese',
            ],
            [
                'image' => asset('images/recipe-10.jpg'),
                'title' => 'Ebi Furai',
                'slug' => 'ebi-furai',
                'excerpt' => 'Udang goreng tepung renyah khas Jepang',
                'category' => 'Japanese',
            ],
        ];

        return view('pages.updates.recipe', [
            'recipes' => collect($recipes),
        ]);
    }

    public function detail()
    {
        $steps = [
            [
                'image' => asset('images/step-recipe-1.jpg'),
                'description' => 'Rebus spaghetti dalam air mendidih yang sudah diberi garam. Masak hingga al dente (sekitar 8–10 menit), lalu tiriskan. Sisakan sedikit air rebusan pasta (±50 ml).',
            ],
            [
                'image' => asset('images/step-recipe-2.jpg'),
                'description' => 'Panaskan minyak zaitun dalam wajan, tumis bawang putih hingga keemasan dan harum (jangan sampai gosong).',
            ],
            [
                'image' => asset('images/step-recipe-3.jpg'),
                'description' => 'Masukkan irisan cabai, aduk sebentar hingga layu. Masukkan spaghetti yang sudah direbus, aduk rata dengan minyak bawang putih. Tambahkan sedikit air rebusan pasta bila terasa kering.',
            ],
            [
                'image' => asset('images/step-recipe-4.jpg'),
                'description' => 'Bumbui dengan garam dan merica sesuai selera.',
            ],
            [
                'image' => asset('images/step-recipe-5.jpg'),
                'description' => 'Angkat, taburi dengan parsley cincang dan keju parmesan bila suka. Sajikan hangat.',
            ],
        ];

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

        $otherRecipe = [
            [
                'image' => asset('images/recipe-5.jpg'),
                'title' => 'Soto Betawi',
                'slug' => 'soto-betawi',
                'excerpt' => 'Kuah santan gurih khas Jakarta',
                'category' => 'Nusantara',
            ],
            [
                'image' => asset('images/recipe-7.jpg'),
                'title' => 'Kimchi Jjigae',
                'slug' => 'kimchi-jjigae',
                'excerpt' => 'Sup pedas hangat dengan kimchi fermentasi',
                'category' => 'Korean',
            ],
            [
                'image' => asset('images/recipe-8.jpg'),
                'title' => 'Falafel',
                'slug' => 'falafel',
                'excerpt' => 'Bola kacang khas Arab yang renyah dan lezat',
                'category' => 'Timur Tengah',
            ],
        ];

        return view('pages.updates.recipe-detail', [
            'steps' => $steps,
            'recommendationProducts' => $recommendationProducts,
            'otherRecipe' => $otherRecipe,
        ]);
    }
}
