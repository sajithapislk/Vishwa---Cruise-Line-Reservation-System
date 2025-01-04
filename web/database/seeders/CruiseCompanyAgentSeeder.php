<?php

namespace Database\Seeders;

use App\Models\CruiseCompanyAgent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CruiseCompanyAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CruiseCompanyAgent::insert([
            ['cc_id'=>'1', 'name' => 'Azamara Agent', 'email' => 'azamara_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'2', 'name' => 'Carnival Agent', 'email' => 'carnival_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'3', 'name' => 'Celebrity Agent', 'email' => 'celebrity_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'4', 'name' => 'Celestyal Agent', 'email' => 'celestyal_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'5', 'name' => 'Costa Agent', 'email' => 'costa_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'6', 'name' => 'Crystal Agent', 'email' => 'crystal_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'7', 'name' => 'Cunard Agent', 'email' => 'cunard_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'8', 'name' => 'Disney Agent', 'email' => 'disney_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'9', 'name' => 'Holland Agent', 'email' => 'holland_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'10', 'name' => 'Hurtigruten Agent', 'email' => 'hurtigruten_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'11', 'name' => 'MSC Agent', 'email' => 'msc_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'12', 'name' => 'Norwegian Agent', 'email' => 'norwegian_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'13', 'name' => 'Oceania Agent', 'email' => 'oceania_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'14', 'name' => 'Princess Agent', 'email' => 'princess_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'15', 'name' => 'Regent Agent', 'email' => 'regent_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'16', 'name' => 'Royal Agent', 'email' => 'royal_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'17', 'name' => 'Seabourn Agent', 'email' => 'seabourn_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'18', 'name' => 'Silversea Agent', 'email' => 'silversea_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'19', 'name' => 'Viking Agent', 'email' => 'viking_agent@test.com', 'password' => Hash::make('12345678')],
            ['cc_id'=>'20', 'name' => 'Virgin Agent', 'email' => 'virgin_agent@test.com', 'password' => Hash::make('12345678')]
        ]);
    }
}
