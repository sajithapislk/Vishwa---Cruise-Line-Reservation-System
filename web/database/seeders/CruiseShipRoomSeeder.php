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
                'room_count' => '10',
                'list' => json_encode([
                    '101', '102', '103', '104', '105', '106', '107', '108', '109', '110'
                ])
            ],
            [
                's_id' => '1',
                'room_view' => 'b view',
                'img' => 'view2.jpg',
                'room_count' => '10',
                'list' => json_encode([
                    '201', '202', '203', '204', '205', '206', '207', '208', '209', '210'
                ])
            ],
            [
                's_id' => '1',
                'room_view' => 'c view',
                'img' => 'view3.jpg',
                'room_count' => '10',
                'list' => json_encode([
                    '301', '302', '303', '304', '305', '306', '307', '308', '309', '310'
                ])
            ],
            [
                's_id' => '1',
                'room_view' => 'a view',
                'img' => 'view4.jpg',
                'room_count' => '10',
                'list' => json_encode([
                    '401', '402', '403', '404', '405', '406', '407', '408', '409', '410'
                ])
            ],
            [
                's_id' => '20',
                'room_view' => 'd view',
                'img' => 'view5.jpg',
                'room_count' => '15',
                'list' => json_encode([
                    '501', '502', '503', '504', '505', '506', '507', '508', '509', '510', '511', '512', '513', '514', '515'
                ])
            ]
        ];

        CruiseShipRoom::insert($data);

    }
}
