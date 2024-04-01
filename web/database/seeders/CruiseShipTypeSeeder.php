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
            ['name' => 'A Type'],
            ['name' => 'B Type'],
            ['name' => 'C Type'],
            ['name' => 'D Type']
        ];

        CruiseShipType::insert($data);
    }
}
