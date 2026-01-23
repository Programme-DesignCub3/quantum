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
                'product_category_id' => 1,
            ],
            [
                'name' => '2 Tungku',
                'slug' => '2-tungku',
                'product_category_id' => 1,
            ],
            [
                'name' => '3 Tungku',
                'slug' => '3-tungku',
                'product_category_id' => 1,
            ],
            [
                'name' => 'Elektrik',
                'slug' => 'elektrik',
                'product_category_id' => 1,
            ],
            [
                'name' => 'LPG',
                'slug' => 'lpg',
                'product_category_id' => 1,
            ],
            [
                'name' => 'Mekanik',
                'slug' => 'mekanik',
                'product_category_id' => 1,
            ],
            [
                'name' => 'Kunci Tunggal',
                'slug' => 'kunci-tunggal',
                'product_category_id' => 2,
            ],
            [
                'name' => 'Tekanan Rendah',
                'slug' => 'tekanan-rendah',
                'product_category_id' => 2,
            ],
            [
                'name' => '1,8 Meter',
                'slug' => '1-8-meter',
                'product_category_id' => 2,
            ]
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
