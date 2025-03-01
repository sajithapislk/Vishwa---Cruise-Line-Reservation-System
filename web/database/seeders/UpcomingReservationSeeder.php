<?php

namespace Database\Seeders;

use App\Models\UpcomingReservations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpcomingReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UpcomingReservations::insert([
            [
                's_id' => 1,
                'sr_id' => 1,
                'dp_id' => 1,
                'ap_id' => 2,
                'p_id' => 1,
                'name' => 'Azamara Quest Journey',
                'description' => 'Enjoy the Full Package on the luxurious Azamara Quest. This package includes Dining, Entertainment & Nightlife, Onboard Activities, Kids & Teens facilities, and Shopping.',
                'img' => 'azamara_quest_journey.jpg',
                'tax' => 200.00,
                'price' => 2000.00,
                'depart_at' => now()->addDays(10),
                'arrive_at' => now()->addDays(15),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 2,
                'sr_id' => 2,
                'dp_id' => 2,
                'ap_id' => 3,
                'p_id' => 2,
                'name' => 'Carnival Breeze Adventure',
                'description' => 'Experience the Luxury Package on the exciting Carnival Breeze. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Outdoor Activities, Kids & Teens facilities, Wellness, and Shopping.',
                'img' => 'carnival_breeze_adventure.jpg',
                'tax' => 250.00,
                'price' => 2500.00,
                'depart_at' => now()->addDays(20),
                'arrive_at' => now()->addDays(25),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 3,
                'sr_id' => 3,
                'dp_id' => 3,
                'ap_id' => 4,
                'p_id' => 3,
                'name' => 'Celebrity Edge Escape',
                'description' => 'Embark on the Adventure Package on the innovative Celebrity Edge. This package includes Dining, Entertainment & Nightlife, Casino, Outdoor Activities, and Shopping.',
                'img' => 'celebrity_edge_escape.jpg',
                'tax' => 220.00,
                'price' => 2400.00,
                'depart_at' => now()->addDays(30),
                'arrive_at' => now()->addDays(35),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 4,
                'sr_id' => 4,
                'dp_id' => 4,
                'ap_id' => 5,
                'p_id' => 4,
                'name' => 'Celestyal Olympia Family Fun',
                'description' => 'Enjoy the Family Package on the authentic Celestyal Olympia. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Outdoor Activities, Kids & Teens facilities, and Shopping.',
                'img' => 'celestyal_olympia_family_fun.jpg',
                'tax' => 180.00,
                'price' => 2100.00,
                'depart_at' => now()->addDays(5),
                'arrive_at' => now()->addDays(10),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 5,
                'sr_id' => 5,
                'dp_id' => 5,
                'ap_id' => 6,
                'p_id' => 5,
                'name' => 'Costa Smeralda Budget Voyage',
                'description' => 'Sail with the Budget Package on the charming Costa Smeralda. This package includes Bars & Lounges, Outdoor Activities, Kids & Teens facilities, and Wellness.',
                'img' => 'costa_smeralda_budget_voyage.jpg',
                'tax' => 150.00,
                'price' => 1800.00,
                'depart_at' => now()->addDays(40),
                'arrive_at' => now()->addDays(45),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 6,
                'sr_id' => 6,
                'dp_id' => 6,
                'ap_id' => 7,
                'p_id' => 6,
                'name' => 'Crystal Serenity Exclusive Cruise',
                'description' => 'Indulge in the Exclusive Package on the elegant Crystal Serenity. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Wellness, and Shopping.',
                'img' => 'crystal_serenity_exclusive_cruise.jpg',
                'tax' => 300.00,
                'price' => 3200.00,
                'depart_at' => now()->addDays(50),
                'arrive_at' => now()->addDays(55),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 7,
                'sr_id' => 7,
                'dp_id' => 7,
                'ap_id' => 8,
                'p_id' => 7,
                'name' => 'Queen Mary 2 Economy Sailing',
                'description' => 'Travel with the Economy Package on the iconic Queen Mary 2. This package includes Bars & Lounges, Outdoor Activities.',
                'img' => 'queen_mary_2_economy_sailing.jpg',
                'tax' => 170.00,
                'price' => 2000.00,
                'depart_at' => now()->addDays(60),
                'arrive_at' => now()->addDays(65),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 8,
                'sr_id' => 8,
                'dp_id' => 8,
                'ap_id' => 9,
                'p_id' => 8,
                'name' => 'Disney Fantasy Premium Experience',
                'description' => 'Enjoy the Premium Package on the magical Disney Fantasy. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Kids & Teens facilities, Wellness, and Shopping.',
                'img' => 'disney_fantasy_premium_experience.jpg',
                'tax' => 280.00,
                'price' => 3000.00,
                'depart_at' => now()->addDays(70),
                'arrive_at' => now()->addDays(75),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 9,
                'sr_id' => 9,
                'dp_id' => 9,
                'ap_id' => 10,
                'p_id' => 9,
                'name' => 'Nieuw Statendam Standard Journey',
                'description' => 'Experience the Standard Package on the modern Nieuw Statendam. This package includes Bars & Lounges, Casino, Outdoor Activities, and Wellness.',
                'img' => 'nieuw_statendam_standard_journey.jpg',
                'tax' => 190.00,
                'price' => 2100.00,
                'depart_at' => now()->addDays(80),
                'arrive_at' => now()->addDays(85),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 10,
                'sr_id' => 10,
                'dp_id' => 10,
                'ap_id' => 11,
                'p_id' => 10,
                'name' => 'MS Roald Amundsen Luxury Expedition',
                'description' => 'Embark on the Luxury Package on the adventurous MS Roald Amundsen. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Outdoor Activities, Kids & Teens facilities, Wellness, and Shopping.',
                'img' => 'ms_roald_amundsen_luxury_expedition.jpg',
                'tax' => 350.00,
                'price' => 3800.00,
                'depart_at' => now()->addDays(90),
                'arrive_at' => now()->addDays(95),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 11,
                'sr_id' => 11,
                'dp_id' => 11,
                'ap_id' => 12,
                'p_id' => 11,
                'name' => 'MSC Meraviglia Full Package 2',
                'description' => 'Enjoy the Full Package 2 on the innovative MSC Meraviglia. This package includes Bars & Lounges, Casino, Outdoor Activities, and Wellness.',
                'img' => 'msc_meraviglia_full_package_2.jpg',
                'tax' => 210.00,
                'price' => 2300.00,
                'depart_at' => now()->addDays(100),
                'arrive_at' => now()->addDays(105),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 12,
                'sr_id' => 12,
                'dp_id' => 12,
                'ap_id' => 13,
                'p_id' => 12,
                'name' => 'Norwegian Bliss Adventure',
                'description' => 'Set sail with the Adventure Package on the stunning Norwegian Bliss. This package includes Dining, Entertainment & Nightlife, Casino, Outdoor Activities, and Shopping.',
                'img' => 'norwegian_bliss_adventure.jpg',
                'tax' => 220.00,
                'price' => 2500.00,
                'depart_at' => now()->addDays(110),
                'arrive_at' => now()->addDays(115),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 13,
                'sr_id' => 13,
                'dp_id' => 13,
                'ap_id' => 14,
                'p_id' => 13,
                'name' => 'Oceania Marina Family Voyage',
                'description' => 'Enjoy the Family Package on the elegant Oceania Marina. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Outdoor Activities, Kids & Teens facilities, and Shopping.',
                'img' => 'oceania_marina_family_voyage.jpg',
                'tax' => 240.00,
                'price' => 2700.00,
                'depart_at' => now()->addDays(120),
                'arrive_at' => now()->addDays(125),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 14,
                'sr_id' => 14,
                'dp_id' => 14,
                'ap_id' => 15,
                'p_id' => 14,
                'name' => 'Regal Princess Budget Trip',
                'description' => 'Sail with the Budget Package on the grand Regal Princess. This package includes Bars & Lounges, Outdoor Activities, Kids & Teens facilities, and Wellness.',
                'img' => 'regal_princess_budget_trip.jpg',
                'tax' => 180.00,
                'price' => 2000.00,
                'depart_at' => now()->addDays(130),
                'arrive_at' => now()->addDays(135),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 15,
                'sr_id' => 15,
                'dp_id' => 1,
                'ap_id' => 2,
                'p_id' => 15,
                'name' => 'Seven Seas Explorer Exclusive',
                'description' => 'Indulge in the Exclusive Package on the luxurious Seven Seas Explorer. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Wellness, and Shopping.',
                'img' => 'seven_seas_explorer_exclusive.jpg',
                'tax' => 300.00,
                'price' => 3300.00,
                'depart_at' => now()->addDays(140),
                'arrive_at' => now()->addDays(145),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 16,
                'sr_id' => 16,
                'dp_id' => 3,
                'ap_id' => 4,
                'p_id' => 16,
                'name' => 'Symphony of the Seas Economy',
                'description' => 'Travel with the Economy Package on the majestic Symphony of the Seas. This package includes Bars & Lounges, Outdoor Activities.',
                'img' => 'symphony_of_the_seas_economy.jpg',
                'tax' => 250.00,
                'price' => 2800.00,
                'depart_at' => now()->addDays(150),
                'arrive_at' => now()->addDays(155),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 17,
                'sr_id' => 17,
                'dp_id' => 5,
                'ap_id' => 6,
                'p_id' => 17,
                'name' => 'Seabourn Ovation Premium Journey',
                'description' => 'Experience the Premium Package on the ultra-luxury Seabourn Ovation. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Kids & Teens facilities, Wellness, and Shopping.',
                'img' => 'seabourn_ovation_premium_journey.jpg',
                'tax' => 320.00,
                'price' => 3400.00,
                'depart_at' => now()->addDays(160),
                'arrive_at' => now()->addDays(165),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 18,
                'sr_id' => 18,
                'dp_id' => 7,
                'ap_id' => 8,
                'p_id' => 18,
                'name' => 'Silver Muse Standard Trip',
                'description' => 'Enjoy the Standard Package on the elegant Silver Muse. This package includes Bars & Lounges, Casino, Outdoor Activities, and Wellness.',
                'img' => 'silver_muse_standard_trip.jpg',
                'tax' => 240.00,
                'price' => 2600.00,
                'depart_at' => now()->addDays(170),
                'arrive_at' => now()->addDays(175),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 19,
                'sr_id' => 19,
                'dp_id' => 9,
                'ap_id' => 10,
                'p_id' => 19,
                'name' => 'Viking Star Luxury Voyage',
                'description' => 'Sail with the Luxury Package on the modern Viking Star. This package includes Dining, Bars & Lounges, Entertainment & Nightlife, Casino, Onboard Activities, Outdoor Activities, Kids & Teens facilities, Wellness, and Shopping.',
                'img' => 'viking_star_luxury_voyage.jpg',
                'tax' => 300.00,
                'price' => 3200.00,
                'depart_at' => now()->addDays(180),
                'arrive_at' => now()->addDays(185),
                'booked_rooms' => json_encode([])
            ],
            [
                's_id' => 20,
                'sr_id' => 20,
                'dp_id' => 11,
                'ap_id' => 12,
                'p_id' => 20,
                'name' => 'Scarlet Lady Full Package 3',
                'description' => 'Enjoy the Full Package 3 on the trendy Scarlet Lady. This package includes Bars & Lounges, Casino, Outdoor Activities, and Wellness.',
                'img' => 'scarlet_lady_full_package_3.jpg',
                'tax' => 210.00,
                'price' => 2400.00,
                'depart_at' => now()->addDays(190),
                'arrive_at' => now()->addDays(195),
                'booked_rooms' => json_encode([])
            ]
        ]);
    }
}
