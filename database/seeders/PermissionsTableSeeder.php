<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage destinations']);
        Permission::create(['name' => 'manage cuisines']);
        Permission::create(['name' => 'manage accommodations']);
        Permission::create(['name' => 'manage tours']);
        Permission::create(['name' => 'manage bookings']);
    }
}
