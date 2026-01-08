<?php

namespace Database\Seeders\Product;

use App\Models\Product\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variants = [
            [
                'product_category_id' => 1,
                'name' => 'Kompor Gas',
                'slug' => 'kompor-gas'
            ],
            [
                'product_category_id' => 1,
                'name' => 'Kompor Cor',
                'slug' => 'kompor-cor'
            ],
            [
                'product_category_id' => 1,
                'name' => 'Kompor Tanam',
                'slug' => 'kompor-tanam'
            ],
            [
                'product_category_id' => 1,
                'name' => 'Kompor Nova',
                'slug' => 'kompor-nova'
            ],
            [
                'product_category_id' => 2,
                'name' => 'Regulator',
                'slug' => 'regulator'
            ],
            [
                'product_category_id' => 3,
                'name' => 'Sparepart',
                'slug' => 'sparepart'
            ],
            [
                'product_category_id' => 2,
                'name' => 'Selang Gas',
                'slug' => 'selang-gas'
            ],
            [
                'product_category_id' => 2,
                'name' => 'Regulator & Selang Gas',
                'slug' => 'regulator-selang-gas'
            ],
        ];

        foreach ($variants as $variant) {
            Variant::create($variant);
        }
    }
}
