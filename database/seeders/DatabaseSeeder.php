<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\NewsEvent\CategorySeeder as NewsEventCategorySeeder;
use Database\Seeders\Product\CategorySeeder as ProductCategorySeeder;
use Database\Seeders\Product\FeatureSeeder;
use Database\Seeders\Product\SuperioritySeeder;
use Database\Seeders\Product\TypeSeeder;
use Database\Seeders\Product\VariantSeeder;
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
        User::create([
            'name' => 'Admin Quantum',
            'email' => 'admin@quantumindonesia.id',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            // Product Seeders
            ProductCategorySeeder::class,
            VariantSeeder::class,
            TypeSeeder::class,
            SuperioritySeeder::class,
            FeatureSeeder::class,

            // News & Event Seeder
            NewsEventCategorySeeder::class,
        ]);
    }
}
