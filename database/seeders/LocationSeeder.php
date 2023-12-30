<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Dhaka',
            'code' => 'DHK',

        ]);
        Location::create([
            'name' => 'Comilla',
            'code' => 'CML',

        ]);
        Location::create([
            'name' => 'Chittagong',
            'code' => 'CTG',

        ]);
        Location::create([
            'name' => "Cox's Bazar",
            'code' => 'CXB',

        ]);
    }
}
