<?php

namespace Database\Seeders;

use App\Models\CruiseCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CruiseCompany::create([
            'name' => 'ABC Cruise Company',
            'description' => '<p>test description</p>',
            'img' => 'company.jpg',
            'tp' => '+94771234567',
        ]);
    }
}
