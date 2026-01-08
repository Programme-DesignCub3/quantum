<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent\NewsEvent;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(PageSettings $pageSettings, NewsEvent $newsEvent)
    {
        $video = [
            'type' => 'local',
            'src' => asset('videos/quantum-voxpop.mp4'),
        ];

        $articles = $newsEvent->getNewsByNumber(4);

        $testimonials = count($pageSettings->home_testimonials) > 0 ? $pageSettings->home_testimonials : $this->testimonialPlaceholder();

        return view('pages.home', [
            'meta_title' => $pageSettings->home_meta_title,
            'meta_description' => $pageSettings->home_meta_description,
            'meta_keywords' => $pageSettings->home_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->home_meta_image),
            'banners' => $pageSettings->home_banner,
            'testimonials' => $testimonials,
            'articles' => $articles,
            'video' => $video,
        ]);
    }

    protected function testimonialPlaceholder()
    {
        return [
            [
                'name' => 'Hanna',
                'age' => 35,
                'origin' => 'Jakarta',
                'testimonial' => 'Kompor gas Quantum ini life saver banget! Nggak cuma hemat gas, desainnya juga simple dan modern. Bikin dapur jadi elegan. Recommended pokoknya!',
            ],
            [
                'name' => 'Danang',
                'age' => 55,
                'origin' => 'Jakarta',
                'testimonial' => 'Saya puas jadi distributor Quantum selama hampir 6 tahun. Produknya berkualitas tinggi, penjualannya stabil, dan jadi pilihan utama banyak orang.',
            ],
        ];
    }
}
