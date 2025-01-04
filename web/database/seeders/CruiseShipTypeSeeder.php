<?php

namespace Database\Seeders;

use App\Models\CruiseShipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseShipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Ocean Cruise'],
            ['name' => 'River Cruise']
        ];

        CruiseShipType::insert($data);
    }
}
