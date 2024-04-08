<?php

namespace Database\Seeders;

use App\Models\CustomerSupporter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerSupporter::create([
            'name' => 'Admin',
            'email' => 'customer_supporter@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
