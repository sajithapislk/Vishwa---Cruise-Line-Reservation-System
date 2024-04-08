<?php

namespace Database\Seeders;

use App\Models\CompanyWallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyWallet::create([
            'ref'=>'1',
            'name'=>'BOOK',
            'debit'=>'1000'
        ]);
    }
}
