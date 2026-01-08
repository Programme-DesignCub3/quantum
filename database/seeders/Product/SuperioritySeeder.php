<?php

namespace Database\Seeders\Product;

use App\Models\Product\Superiority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superiorities = [
            [
                'title' => 'Body Monocoque & Modern',
                'description' => 'Menggunakan struktur body monocoque yang menyatu tanpa banyak sambungan, memberikan tampilan lebih modern sekaligus meningkatkan kekuatan dan kestabilan produk.'
            ],
            [
                'title' => 'Maximum Efficiency',
                'description' => 'Dirancang untuk menghasilkan performa maksimal dengan konsumsi energi yang lebih efisien, sehingga lebih hemat tanpa mengurangi kualitas penggunaan.'
            ],
            [
                'title' => 'Value for Money',
                'description' => 'Memberikan kualitas, fitur, dan daya tahan terbaik yang sebanding bahkan melebihi harga yang ditawarkan, menjadikannya pilihan paling bernilai di kelasnya.'
            ],
            [
                'title' => 'High Durability Burner',
                'description' => 'Burner berkualitas tinggi yang dirancang tahan terhadap panas ekstrem dan penggunaan jangka panjang, memastikan performa tetap optimal dalam waktu lama.'
            ],
            [
                'title' => 'Kokoh & Tahan Lama',
                'description' => 'Dibuat dari material pilihan dengan konstruksi kuat, produk ini dirancang untuk penggunaan intensif dan umur pakai yang lebih panjang.'
            ],
            [
                'title' => 'Design Timeless Luxury',
                'description' => 'Desain elegan dengan sentuhan mewah yang tidak lekang oleh waktu, tetap terlihat premium meskipun digunakan bertahun-tahun.'
            ],
            [
                'title' => 'Easy Clean',
                'description' => 'Permukaan dan desain produk dibuat agar mudah dibersihkan, menghemat waktu perawatan dan menjaga tampilan tetap bersih dan higienis.'
            ],
            [
                'title' => 'Design Cantik & Modern',
                'description' => 'Mengusung desain yang estetis dan modern, mampu meningkatkan tampilan ruang sekaligus memberikan kenyamanan dalam penggunaan.'
            ],
            [
                'title' => 'Vibrant Modern Color',
                'description' => 'Pilihan warna modern yang cerah dan stylish, memberikan kesan segar serta menyesuaikan dengan berbagai konsep interior.'
            ],
            [
                'title' => 'Flameless & Safe Ignition',
                'description' => 'Sistem penyalaan tanpa api terbuka yang lebih aman, mengurangi risiko kecelakaan dan memberikan kenyamanan saat digunakan.'
            ],
            [
                'title' => 'Steel Ball Safety Devices System',
                'description' => 'Dilengkapi sistem pengaman bola baja yang secara otomatis menghentikan aliran gas saat terjadi gangguan, meningkatkan tingkat keamanan pengguna.'
            ],
            [
                'title' => 'Manometer Pressure Gauge',
                'description' => 'Manometer terintegrasi untuk memantau tekanan gas secara akurat, membantu menjaga performa tetap stabil dan aman.'
            ],
            [
                'title' => 'Brass Switch Assy',
                'description' => 'Menggunakan komponen switch berbahan kuningan berkualitas tinggi yang lebih awet, presisi, dan tahan terhadap korosi.'
            ],
            [
                'title' => 'Double Lock Security System',
                'description' => 'Sistem penguncian ganda yang memberikan perlindungan ekstra, memastikan penggunaan produk lebih aman dan terpercaya.'
            ],
        ];

        foreach ($superiorities as $superiority) {
            Superiority::create([
                'title' => $superiority['title'],
                'description' => $superiority['description'],
            ]);
        }
    }
}
