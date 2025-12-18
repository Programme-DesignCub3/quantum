<?php

namespace Database\Seeders;

use App\Models\Product\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => 'Brass Burner',
                'description' => 'Material kuningan pada burner menjamin performa memasak yang konsisten dan daya tahan optimal'
            ],
            [
                'name' => 'Deep Drawing Technology'
            ],
            [
                'name' => 'Pipa Gas Berdesain Khusus'
            ],
            [
                'name' => 'Kenop Kontrol yang Awet'
            ]
        ];

        foreach ($features as $feature) {
            Feature::create([
                'name' => $feature['name'],
                'description' => $feature['description'] ?? null,
            ]);
        }
    }
}
