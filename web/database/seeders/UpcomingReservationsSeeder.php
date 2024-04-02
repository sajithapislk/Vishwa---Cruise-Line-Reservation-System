<?php

namespace Database\Seeders;

use App\Models\UpcomingReservations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpcomingReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                's_id' => '1',
                'sr_id' => '1',
                'dp_id' => '1',
                'ap_id' => '1',
                'p_id' => '1',
                'name' => 'Test',
                'description' => 'Test Description',
                'img' => 'reservation',
                'tax' => '10',
                'price' => '100',
                'depart_at' => '2024-04-02 22:16:11',
                'arrive_at' => '2024-04-03 22:16:11',
            ]
        ];

        UpcomingReservations::insert($data);
    }
}
