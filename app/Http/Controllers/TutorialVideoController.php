<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialVideoController extends Controller
{
    public function index()
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
            'tutorials' => $tutorials,
        ]);
    }
}
