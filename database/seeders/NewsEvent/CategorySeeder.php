<?php

namespace Database\Seeders\NewsEvent;

use App\Models\NewsEvent\NewsEventCategory;
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
                'name' => 'Event',
                'slug' => 'event',
            ],
            [
                'name' => 'Berita',
                'slug' => 'berita',
            ],
            [
                'name' => 'Tips',
                'slug' => 'tips',
            ],
            [
                'name' => 'Inspirasi',
                'slug' => 'inspirasi',
            ],
            [
                'name' => 'Review',
                'slug' => 'review',
            ],
        ];

        foreach ($categories as $category) {
            NewsEventCategory::create($category);
        }
    }
}
