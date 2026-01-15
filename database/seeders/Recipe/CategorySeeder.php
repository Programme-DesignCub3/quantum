<?php

namespace Database\Seeders\Recipe;

use App\Models\Recipe\RecipeCategory;
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
                'name' => 'Nusantara',
                'slug' => 'nusantara',
            ],
            [
                'name' => 'Korean',
                'slug' => 'korean',
            ],
            [
                'name' => 'Timur Tengah',
                'slug' => 'timur-tengah',
            ],
            [
                'name' => 'Western',
                'slug' => 'western',
            ],
            [
                'name' => 'Chinese',
                'slug' => 'chinese',
            ],
            [
                'name' => 'Thailand',
                'slug' => 'thailand',
            ],
            [
                'name' => 'India',
                'slug' => 'india',
            ],
        ];

        foreach ($categories as $category) {
            RecipeCategory::create($category);
        }
    }
}
