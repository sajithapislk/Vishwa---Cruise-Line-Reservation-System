<?php

namespace Database\Seeders;

use App\Models\Port;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'port 1',
                'description' => 'test description',
                'img' => 'port1.jpg',
            ],
            [
                'name' => 'port 2',
                'description' => 'test description',
                'img' => 'port1.jpg',
            ],
            [
                'name' => 'port 3',
                'description' => 'test description',
                'img' => 'port1.jpg',
            ],
            [
                'name' => 'port 4',
                'description' => 'test description',
                'img' => 'port4.jpg',
            ],
        ];

        Port::insert($data);
    }
}
