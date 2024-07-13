<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuisine;

class CuisinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuisine::create([
            'name' => 'Delicious Cuisine',
            'description' => 'A delicious local cuisine.',
            'location' => 'Cuisine City',
            'image' => 'cuisine.jpg',
        ]);
    }
}
