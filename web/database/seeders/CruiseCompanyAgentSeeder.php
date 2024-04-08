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
        CruiseCompanyAgent::create([
            'cc_id'=>'1',
            'name' => 'Admin',
            'email' => 'cruise_company@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
