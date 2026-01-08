<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        $awards = [
            [
                'image' => 'images/award-1.jpg',
                'name' => 'Rintek Industri',
            ],
            [
                'image' => 'images/award-2.jpg',
                'name' => 'ICSA 2017',
            ],
            [
                'image' => 'images/award-3.jpg',
                'name' => 'Digital Popular Award Brand 2017',
            ],
            [
                'image' => 'images/award-4.jpg',
                'name' => "Superbrands Indonesia's Choice 2017",
            ],
            [
                'image' => 'images/award-5.jpg',
                'name' => 'Top Brand Award 2017',
                'description' => 'Kategori Regulator Gas',
            ],
            [
                'image' => 'images/award-6.jpg',
                'name' => 'Top Brand Award 2016',
                'description' => 'Kategori Home Appliance Kompor dan Regulator Gas',
            ],
            [
                'image' => 'images/award-7.jpg',
                'name' => 'Top Brand Award 2015',
                'description' => 'Kategori Kompor dan Regulator Gas',
            ],
            [
                'image' => 'images/award-8.jpg',
                'name' => 'ICSA 2015',
                'description' => 'Kategori Regulator Gas',
            ],
        ];

        return view('pages.about.about', [
            'meta_title' => $pageSettings->about_meta_title,
            'meta_description' => $pageSettings->about_meta_description,
            'meta_keywords' => $pageSettings->about_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->about_meta_image),
            'awards' => $awards,
        ]);
    }
}
