<?php

namespace Database\Seeders;

use App\Models\CruiseCompanyWallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseCompanyWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CruiseCompanyWallet::create([
            'ref' => '1',
            'name' => 'BOOK',
            'credit' => '1000'
        ]);
    }
}
