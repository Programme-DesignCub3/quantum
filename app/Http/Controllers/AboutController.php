<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $awards = [
            [
                'image' => asset('images/award-1.jpg'),
                'name' => 'Rintek Industri',
            ],
            [
                'image' => asset('images/award-2.jpg'),
                'name' => 'ICSA 2017',
            ],
            [
                'image' => asset('images/award-3.jpg'),
                'name' => 'Digital Popular Award Brand 2017',
            ],
            [
                'image' => asset('images/award-4.jpg'),
                'name' => "Superbrands Indonesia's Choice 2017",
            ],
            [
                'image' => asset('images/award-5.jpg'),
                'name' => 'Top Brand Award 2017',
                'description' => 'Kategori Regulator Gas',
            ],
            [
                'image' => asset('images/award-6.jpg'),
                'name' => 'Top Brand Award 2016',
                'description' => 'Kategori Home Appliance Kompor dan Regulator Gas',
            ],
            [
                'image' => asset('images/award-7.jpg'),
                'name' => 'Top Brand Award 2015',
                'description' => 'Kategori Kompor dan Regulator Gas',
            ],
            [
                'image' => asset('images/award-8.jpg'),
                'name' => 'ICSA 2015',
                'description' => 'Kategori Regulator Gas',
            ],
        ];

        return view('pages.about.about', [
            'awards' => $awards,
        ]);
    }
}
