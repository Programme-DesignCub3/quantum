<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Admin Quantum',
            'email' => 'admin@quantumindonesia.id',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            VariantSeeder::class,
            TypeSeeder::class,
            SuperioritySeeder::class,
            FeatureSeeder::class,
        ]);
    }
}
