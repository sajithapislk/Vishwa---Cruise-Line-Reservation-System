<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Full Package',
                's_id' => '1',
                'is_d'=>'1',
                'is_bl'=>'0',
                'is_en'=>'1',
                'is_c'=>'0',
                'is_ona'=>'1',
                'is_outa'=>'0',
                'is_kt'=>'1',
                'is_w'=>'0',
                'is_s'=>'1',
            ],
            [
                'name' => 'Full Package 2',
                's_id' => '1',
                'is_d'=>'0',
                'is_bl'=>'1',
                'is_en'=>'0',
                'is_c'=>'1',
                'is_ona'=>'0',
                'is_outa'=>'1',
                'is_kt'=>'0',
                'is_w'=>'1',
                'is_s'=>'0',
            ]
        ];

        Package::insert($data);
    }
}
