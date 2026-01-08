<?php

namespace Database\Seeders\Product;

use App\Models\Product\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => '1 Tungku',
                'slug' => '1-tungku',
            ],
            [
                'name' => '2 Tungku',
                'slug' => '2-tungku',
            ],
            [
                'name' => '3 Tungku',
                'slug' => '3-tungku',
            ],
            [
                'name' => 'Elektrik',
                'slug' => 'elektrik',
            ],
            [
                'name' => 'LPG',
                'slug' => 'lpg',
            ],
            [
                'name' => 'Mekanik',
                'slug' => 'mekanik',
            ],
            [
                'name' => 'Kunci Tunggal',
                'slug' => 'kunci-tunggal',
            ],
            [
                'name' => 'Tekanan Rendah',
                'slug' => 'tekanan-rendah',
            ],
            [
                'name' => '1,8 Meter',
                'slug' => '1-8-meter',
            ]
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
