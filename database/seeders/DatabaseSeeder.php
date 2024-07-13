<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            DestinationsTableSeeder::class,
            CuisinesTableSeeder::class,
            AccommodationsTableSeeder::class,
            ToursTableSeeder::class,
            BookingsTableSeeder::class,
        ]);
    }
}
