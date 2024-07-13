<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => 'Beautiful Beach',
            'description' => 'A beautiful beach with clear water.',
            'location' => 'Beach City',
            'image' => 'beach.jpg',
            'ticket_price' => 20.00,
        ]);
    }
}
