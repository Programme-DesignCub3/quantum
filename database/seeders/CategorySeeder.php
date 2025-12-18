<?php

namespace Database\Seeders;

use App\Models\Product\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Kompor',
                'slug' => 'kompor',
            ],
            [
                'name' => 'Regulator & Selang Gas',
                'slug' => 'regulator-selang-gas',
            ],
            [
                'name' => 'Sparepart',
                'slug' => 'sparepart',
            ]
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
