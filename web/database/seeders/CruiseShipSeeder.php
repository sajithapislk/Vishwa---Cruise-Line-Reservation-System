<?php

namespace Database\Seeders;

use App\Models\CruiseShip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CruiseShip::create([
            'cc_id' => '1',
            'type_id' => '1',
            'name' => 'test name',
            'description' => 'test description',
            'img' => 'ship.jpg',
            'style'=> 'test',
            'size' => 'test',
            'type' => 'type',
            'launch_at' => '2004',
            'last_refit_at' => '2004',
            'gt' => '1',
            'length' => '100.0',
            'width' => '200.0',
            'speed' => '1',
            'decks' => '1',
            'nop' => '1',
            'no_crew' => '1',
            'no_cabins' => '1',
            'wa' => '1',
        ]);
    }
}
