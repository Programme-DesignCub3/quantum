<?php

namespace Database\Seeders;

use App\Models\Product\ProductCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin Quantum',
            'email' => 'admin@quantumindonesia.id',
            'password' => bcrypt('password'),
        ]);

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
