<?php

namespace Database\Seeders\Distributor;

use App\Models\Distributor\AreaDistributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'area' => 'Jabodetabek',
                'slug' => 'jabodetabek'
            ],
            [
                'area' => 'Jawa Barat',
                'slug' => 'jawa-barat'
            ],
            [
                'area' => 'Jawa Tengah',
                'slug' => 'jawa-tengah'
            ],
            [
                'area' => 'Jawa Timur',
                'slug' => 'jawa-timur'
            ],
            [
                'area' => 'Sumatera',
                'slug' => 'sumatera'
            ],
            [
                'area' => 'Kalimantan',
                'slug' => 'kalimantan'
            ],
            [
                'area' => 'Bali',
                'slug' => 'bali'
            ],
            [
                'area' => 'Papua',
                'slug' => 'papua'
            ],
        ];

        foreach ($areas as $area) {
            AreaDistributor::create($area);
        }
    }
}
