<?php

namespace App\Http\Controllers;

use App\Settings\PageSettings;
use Illuminate\Http\Request;

class TutorialVideoController extends Controller
{
    public function index(PageSettings $pageSettings)
    {
        $tutorials = [
            [
                'image' => 'images/tutorial-video-1.jpg',
                'category' => 'Kompor',
                'title' => 'Tutorial Pemasangan Kompor Gas untuk Pemula',
                'video' => [
                    'src' => 'Sfl2nAJkphg',
                    'type' => 'youtube',
                ]
            ],
            [
                'image' => 'images/tutorial-video-2.jpg',
                'category' => 'Kompor',
                'title' => 'Tips Merawat Kompor Gas agar Awet dan Hemat',
                'video' => [
                    'src' => 'Sfl2nAJkphg',
                    'type' => 'youtube',
                ]
            ],
            [
                'image' => 'images/tutorial-video-3.jpg',
                'category' => 'Kompor',
                'title' => 'Tutorial Mengecek Keamanan Selang Regulator di Rumah',
                'video' => [
                    'src' => 'Sfl2nAJkphg',
                    'type' => 'youtube',
                ]
            ],
            [
                'image' => 'images/tutorial-video-4.jpg',
                'category' => 'Regulator & Selang Gas',
                'title' => 'Cara Memasang Selang Gas dengan Benar',
                'video' => [
                    'src' => 'Sfl2nAJkphg',
                    'type' => 'youtube',
                ]
            ],
        ];

        return view('pages.support.tutorial-video', [
            'meta_title' => $pageSettings->video_meta_title,
            'meta_description' => $pageSettings->video_meta_description,
            'meta_keywords' => $pageSettings->video_meta_keywords,
            'meta_image' => asset('storage/' . $pageSettings->video_meta_image),
            'tutorials' => $tutorials,
        ]);
    }
}
