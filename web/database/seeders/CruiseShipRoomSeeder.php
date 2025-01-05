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
        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                's_id' => $i,
                'room_view' => 'Suite',
                'img' => "suite.jpg",
                'room_count' => '10',
                'list' => json_encode([
                    '101',
                    '102',
                    '103',
                    '104',
                    '105',
                    '106',
                    '107',
                    '108',
                    '109',
                    '110'
                ])
            ];
            $data[] = [
                's_id' => $i,
                'room_view' => 'Balcony',
                'img' => "balcony.jpg",
                'room_count' => '10',
                'list' => json_encode([
                    '201',
                    '202',
                    '203',
                    '204',
                    '205',
                    '206',
                    '207',
                    '208',
                    '209',
                    '210'
                ])
            ];
            $data[] = [
                's_id' => $i,
                'room_view' => 'Oceanview',
                'img' => "oceanview.jpg",
                'room_count' => '10',
                'list' => json_encode([
                    '301',
                    '302',
                    '303',
                    '304',
                    '305',
                    '306',
                    '307',
                    '308',
                    '309',
                    '310'
                ])
            ];
            $data[] = [
                's_id' => $i,
                'room_view' => 'Interior',
                'img' => "interior.jpg",
                'room_count' => '10',
                'list' => json_encode([
                    '401',
                    '402',
                    '403',
                    '404',
                    '405',
                    '406',
                    '407',
                    '408',
                    '409',
                    '410'
                ])
            ];
        }

        CruiseShipRoom::insert($data);
    }
}
