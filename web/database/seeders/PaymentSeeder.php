<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'method' => 'PAYPAL',
            'status' => 'SUCCESS',
            'amount' => '1000',
            'token' => '123456ABCDEF',
            'response' => '{"STATUS":"SUCCESS"}',
        ]);
    }
}
