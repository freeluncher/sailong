<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;


class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::create([
            'name' => 'Exciting Tour',
            'description' => 'An exciting tour around the city.',
            'price' => 100.00,
            'duration' => 3, // duration in days
            'image' => 'tour.jpg',
        ]);
    }
}
