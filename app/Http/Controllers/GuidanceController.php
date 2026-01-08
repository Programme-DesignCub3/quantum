<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function index()
    {
        $guidances = [
            [
                'image' => asset('images/product-1.jpg'),
                'category' => 'Kompor Gas',
                'name' => 'QGC - 101 AB Putih',
                // 'slug' => 'qgc-101-ab-putih',
            ],
        ];

        $guidanceArticles = [
            [
                'image' => asset('images/guidance-2.jpg'),
                'category' => 'Kompor',
                'title' => 'Perhatikan Urutan yang Benar Saat Memasang Gas',
                'slug' => 'perhatikan-urutan-yang-benar-saat-memasang-gas'
            ],
            [
                'image' => asset('images/guidance-3.jpg'),
                'category' => 'Selang Gas',
                'title' => 'Tips Memasang Regulator Gas yang Simple Buat Pemula',
                'slug' => 'tips-memasang-regulator-gas-yang-simple-buat-pemula'
            ],
            [
                'image' => asset('images/guidance-4.jpg'),
                'category' => 'Kompor',
                'title' => 'Hati-Hati! Ini 5 Hal yang Bisa Bikin Kebocoran Gas',
                'slug' => 'hati-hati-ini-5-hal-yang-bisa-bikin-kebocoran-gas'
            ],
        ];

        return view('pages.support.guidance', [
            'guidances' => $guidances,
            'guidanceArticles' => $guidanceArticles,
        ]);
    }

    public function detail()
    {
        $steps = [
            [
                'image' => asset('images/guidance-step-1.jpg'),
                'title' => '1. Bersihkan Ring Kompor',
                'description' => 'Lepaskan ring kompor gas terlebih dahulu. Rendam ring dalam air panas dengan sabun cuci piring selama 2-4 jam agar kotoran dan kerak mudah terangkat. Setelah itu, gosok dengan sikat gigi bekas, bilas hingga bersih, dan keringkan.'
            ],
            [
                'image' => asset('images/guidance-step-2.jpg'),
                'title' => '2. Rawat Tungku Aman',
                'description' => 'Untuk membersihkan tungku kompor, hindari menggunakan air dan sabun langsung karena bisa membuat tungku lembab dan mengganggu nyala api. Gunakan pembersih khusus tungku atau campuran lemon, baking soda, atau cuka apel. Oleskan pembersih, diamkan beberapa menit, kemudian gosok perlahan dengan spons atau sikat gigi.'
            ],
            [
                'image' => asset('images/guidance-step-3.jpg'),
                'title' => '3. Lap Permukaan Kompor',
                'description' => 'Untuk permukaan kompor yang terkena noda minyak dan makanan tumpah, gunakan cairan pembersih atau bahan alami seperti larutan cuka, baking soda, lemon, atau jeruk nipis. Semprotkan atau oleskan, diamkan sebentar, lalu lap dengan kain bersih.'
            ],
            [
                'image' => asset('images/guidance-step-4.jpg'),
                'title' => '4. Pastikan Tungku Kering',
                'description' => 'Setelah semua bagian dibersihkan, pastikan tungku benar-benar kering sebelum dipasang kembali agar nyala api optimal.'
            ],
            [
                'image' => asset('images/guidance-step-5.jpg'),
                'title' => '5. Cek Selang Gas',
                'description' => 'Jangan lupa periksa kondisi selang dan regulator tabung gas secara berkala untuk keselamatan.'
            ],
        ];

        $otherGuidance = [
            [
                'image' => asset('images/guidance-2.jpg'),
                'title' => 'Perhatikan Urutan yang Benar Saat Memasang Gas',
                'slug' => 'perhatikan-urutan-yang-benar-saat-memasang-gas'
            ],
            [
                'image' => asset('images/guidance-3.jpg'),
                'title' => 'Tips Memasang Regulator Gas yang Simple Buat Pemula',
                'slug' => 'tips-memasang-regulator-gas-yang-simple-buat-pemula'
            ],
            [
                'image' => asset('images/guidance-4.jpg'),
                'title' => 'Hati-Hati! Ini 5 Hal yang Bisa Bikin Kebocoran Gas',
                'slug' => 'hati-hati-ini-5-hal-yang-bisa-bikin-kebocoran-gas'
            ],
        ];

        return view('pages.support.guidance-detail', [
            'steps' => $steps,
            'otherGuidance' => $otherGuidance,
        ]);
    }
}
