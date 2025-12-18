<?php

namespace Database\Seeders;

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
                'title' => 'Teknologi Terkini',
                'description' => 'Memastikan proses memasak lebih efisien dan hasil masakan optimal.'
            ],
            [
                'title' => 'Desain Elegan & Fungsional',
                'description' => 'Pas untuk dapur modern, hemat ruang, dan mudah ditempatkan di mana saja.'
            ],
            [
                'title' => 'Cepat & Efisien',
                'description' => 'Nikmati kemudahan dalam menyajikan hidangan lezat dengan waktu yang lebih singkat.'
            ],
            [
                'title' => 'Kualitas Terjamin',
                'description' => 'Dibuat dengan standar tinggi untuk durabilitas dan keamanan penggunaan sehari-hari.'
            ]
        ];

        foreach ($superiorities as $superiority) {
            Superiority::create([
                'title' => $superiority['title'],
                'description' => $superiority['description'],
            ]);
        }
    }
}
