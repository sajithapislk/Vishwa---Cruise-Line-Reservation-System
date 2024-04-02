<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CruiseShipRoom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CustomerSupporterSeeder::class,
            CruiseShipTypeSeeder::class,
            CruiseCompanySeeder::class,
            CruiseCompanyAgentSeeder::class,
            CruiseShipSeeder::class,
            CruiseShipRoomSeeder::class,
            PackageSeeder::class,
            PortSeeder::class,
            UpcomingReservationsSeeder::class,
        ]);
    }
}
