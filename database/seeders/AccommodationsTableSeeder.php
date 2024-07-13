<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accommodation::create([
            'name' => 'Comfortable Homestay',
            'description' => 'A comfortable place to stay.',
            'location' => 'Homestay City',
            'image' => 'homestay.jpg',
            'price_per_night' => 50.00,
        ]);
    }
}
