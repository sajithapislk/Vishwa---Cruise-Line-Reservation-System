<?php

namespace Database\Seeders;

use App\Models\CruiseShipRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseShipRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                's_id' => '1',
                'room_view' => 'a view',
                'img' => 'view1.png',
                'room_count' => '10'
            ],
            [
                's_id' => '1',
                'room_view' => 'b view',
                'img' => 'view2.jpg',
                'room_count' => '10'
            ],
            [
                's_id' => '1',
                'room_view' => 'c view',
                'img' => 'view3.jpg',
                'room_count' => '10'
            ],
            [
                's_id' => '1',
                'room_view' => 'a view',
                'img' => 'view4.jpg',
                'room_count' => '10'
            ]
        ];

        CruiseShipRoom::insert($data);
    }
}
