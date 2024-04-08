<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'ur_id'=>'1',
            'user_id'=>'1',
            'payment_id'=>'1',
            'status'=>'SUCCESS'
        ]);
    }
}
