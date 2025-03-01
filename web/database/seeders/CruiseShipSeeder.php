<?php

namespace Database\Seeders;

use App\Models\CruiseShip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CruiseShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CruiseShip::insert([
            [
                'cc_id' => '1',
                'type_id' => '1',
                'name' => 'Azamara Quest',
                'description' => 'A luxurious cruise ship offering a boutique experience with exceptional service.',
                'img' => 'azamara_quest.jpg',
                'style' => 'Modern',
                'size' => 'Medium',
                'launch_at' => '2007',
                'last_refit_at' => '2016',
                'gt' => '30277',
                'length' => '180.0',
                'width' => '25.0',
                'speed' => '18',
                'decks' => '11',
                'nop' => '694',
                'no_crew' => '408',
                'no_cabins' => '355',
                'wa' => '2',
            ],
            [
                'cc_id' => '2',
                'type_id' => '2',
                'name' => 'Carnival Breeze',
                'description' => 'A fun-filled cruise ship with exciting activities and vibrant entertainment.',
                'img' => 'carnival_breeze.jpg',
                'style' => 'Resort',
                'size' => 'Large',
                'launch_at' => '2012',
                'last_refit_at' => '2017',
                'gt' => '130000',
                'length' => '306.0',
                'width' => '37.0',
                'speed' => '22',
                'decks' => '15',
                'nop' => '3690',
                'no_crew' => '1386',
                'no_cabins' => '1845',
                'wa' => '1',
            ],
            [
                'cc_id' => '3',
                'type_id' => '1',
                'name' => 'Celebrity Edge',
                'description' => 'An innovative cruise ship with cutting-edge design and luxurious amenities.',
                'img' => 'celebrity_edge.jpg',
                'style' => 'Contemporary',
                'size' => 'Large',
                'launch_at' => '2018',
                'last_refit_at' => '2021',
                'gt' => '129500',
                'length' => '306.0',
                'width' => '39.0',
                'speed' => '22',
                'decks' => '16',
                'nop' => '2918',
                'no_crew' => '1320',
                'no_cabins' => '1467',
                'wa' => '3',
            ],
            [
                'cc_id' => '4',
                'type_id' => '1',
                'name' => 'Celestyal Olympia',
                'description' => 'An authentic cruise ship offering a true Greek hospitality experience.',
                'img' => 'celestyal_olympia.jpg',
                'style' => 'Traditional',
                'size' => 'Medium',
                'launch_at' => '1982',
                'last_refit_at' => '2016',
                'gt' => '37584',
                'length' => '214.0',
                'width' => '28.4',
                'speed' => '19',
                'decks' => '9',
                'nop' => '1664',
                'no_crew' => '540',
                'no_cabins' => '724',
                'wa' => '3',
            ],
            [
                'cc_id' => '5',
                'type_id' => '2',
                'name' => 'Costa Smeralda',
                'description' => 'An eco-friendly cruise ship with Italian style and sustainability.',
                'img' => 'costa_smeralda.jpg',
                'style' => 'Eco-friendly',
                'size' => 'Large',
                'launch_at' => '2019',
                'last_refit_at' => '2021',
                'gt' => '185010',
                'length' => '337.0',
                'width' => '42.0',
                'speed' => '22',
                'decks' => '20',
                'nop' => '6554',
                'no_crew' => '1682',
                'no_cabins' => '2612',
                'wa' => '1',
            ],
            [
                'cc_id' => '6',
                'type_id' => '1',
                'name' => 'Crystal Serenity',
                'description' => 'A world-class cruise ship known for luxury and personalized service.',
                'img' => 'crystal_serenity.jpg',
                'style' => 'Luxury',
                'size' => 'Medium',
                'launch_at' => '2003',
                'last_refit_at' => '2018',
                'gt' => '68870',
                'length' => '250.0',
                'width' => '32.0',
                'speed' => '22',
                'decks' => '13',
                'nop' => '980',
                'no_crew' => '655',
                'no_cabins' => '490',
                'wa' => '2',
            ],
            [
                'cc_id' => '7',
                'type_id' => '2',
                'name' => 'Queen Mary 2',
                'description' => 'An iconic ocean liner offering transatlantic crossings with timeless elegance.',
                'img' => 'queen_mary_2.jpg',
                'style' => 'Ocean Liner',
                'size' => 'Large',
                'launch_at' => '2004',
                'last_refit_at' => '2016',
                'gt' => '149215',
                'length' => '345.0',
                'width' => '41.0',
                'speed' => '29',
                'decks' => '13',
                'nop' => '2691',
                'no_crew' => '1253',
                'no_cabins' => '1360',
                'wa' => '1',
            ],
            [
                'cc_id' => '8',
                'type_id' => '1',
                'name' => 'Disney Fantasy',
                'description' => 'A magical cruise ship designed with Disney-themed entertainment and experiences.',
                'img' => 'disney_fantasy.jpg',
                'style' => 'Disney Magic',
                'size' => 'Large',
                'launch_at' => '2012',
                'last_refit_at' => '2017',
                'gt' => '129750',
                'length' => '340.0',
                'width' => '38.0',
                'speed' => '22',
                'decks' => '14',
                'nop' => '4000',
                'no_crew' => '1458',
                'no_cabins' => '1250',
                'wa' => '2',
            ],
            [
                'cc_id' => '9',
                'type_id' => '2',
                'name' => 'Nieuw Statendam',
                'description' => 'A modern cruise ship offering a blend of classic elegance and contemporary amenities.',
                'img' => 'nieuw_statendam.jpg',
                'style' => 'Elegant',
                'size' => 'Large',
                'launch_at' => '2018',
                'last_refit_at' => '2022',
                'gt' => '99500',
                'length' => '299.0',
                'width' => '38.0',
                'speed' => '22',
                'decks' => '12',
                'nop' => '2666',
                'no_crew' => '1036',
                'no_cabins' => '1339',
                'wa' => '1',
            ],
            [
                'cc_id' => '10',
                'type_id' => '1',
                'name' => 'MS Roald Amundsen',
                'description' => 'An expedition cruise ship designed for polar regions and sustainable travel.',
                'img' => 'ms_roald_amundsen.jpg',
                'style' => 'Expedition',
                'size' => 'Small',
                'launch_at' => '2019',
                'last_refit_at' => '2023',
                'gt' => '20889',
                'length' => '140.0',
                'width' => '23.0',
                'speed' => '15',
                'decks' => '11',
                'nop' => '530',
                'no_crew' => '151',
                'no_cabins' => '265',
                'wa' => '3',
            ],
            [
                'cc_id' => '11',
                'type_id' => '1',
                'name' => 'MSC Meraviglia',
                'description' => 'A cutting-edge cruise ship offering innovative features and elegant design.',
                'img' => 'msc_meraviglia.jpg',
                'style' => 'Contemporary',
                'size' => 'Large',
                'launch_at' => '2017',
                'last_refit_at' => '2020',
                'gt' => '171598',
                'length' => '315.0',
                'width' => '43.0',
                'speed' => '22',
                'decks' => '19',
                'nop' => '4488',
                'no_crew' => '1536',
                'no_cabins' => '2244',
                'wa' => '1',
            ],
            [
                'cc_id' => '12',
                'type_id' => '2',
                'name' => 'Norwegian Bliss',
                'description' => 'A state-of-the-art cruise ship featuring innovative amenities and entertainment.',
                'img' => 'norwegian_bliss.jpg',
                'style' => 'Freestyle',
                'size' => 'Large',
                'launch_at' => '2018',
                'last_refit_at' => '2021',
                'gt' => '168028',
                'length' => '333.0',
                'width' => '41.0',
                'speed' => '23',
                'decks' => '20',
                'nop' => '4004',
                'no_crew' => '1700',
                'no_cabins' => '2002',
                'wa' => '2',
            ],
            [
                'cc_id' => '13',
                'type_id' => '1',
                'name' => 'Oceania Marina',
                'description' => 'A luxurious cruise ship offering world-class dining and spacious accommodations.',
                'img' => 'oceania_marina.jpg',
                'style' => 'Elegant',
                'size' => 'Medium',
                'launch_at' => '2011',
                'last_refit_at' => '2016',
                'gt' => '66084',
                'length' => '239.0',
                'width' => '32.0',
                'speed' => '20',
                'decks' => '15',
                'nop' => '1250',
                'no_crew' => '800',
                'no_cabins' => '625',
                'wa' => '3',
            ],
            [
                'cc_id' => '14',
                'type_id' => '2',
                'name' => 'Regal Princess',
                'description' => 'A grand cruise ship offering a blend of luxury and modern amenities.',
                'img' => 'regal_princess.jpg',
                'style' => 'Grand',
                'size' => 'Large',
                'launch_at' => '2014',
                'last_refit_at' => '2019',
                'gt' => '142229',
                'length' => '330.0',
                'width' => '38.0',
                'speed' => '23',
                'decks' => '19',
                'nop' => '3560',
                'no_crew' => '1346',
                'no_cabins' => '1780',
                'wa' => '1',
            ],
            [
                'cc_id' => '15',
                'type_id' => '1',
                'name' => 'Seven Seas Explorer',
                'description' => 'An ultra-luxury cruise ship known for its elegance and personalized service.',
                'img' => 'seven_seas_explorer.jpg',
                'style' => 'Luxury',
                'size' => 'Medium',
                'launch_at' => '2016',
                'last_refit_at' => '2020',
                'gt' => '55254',
                'length' => '223.0',
                'width' => '31.0',
                'speed' => '20',
                'decks' => '10',
                'nop' => '750',
                'no_crew' => '552',
                'no_cabins' => '375',
                'wa' => '2',
            ],
            [
                'cc_id' => '16',
                'type_id' => '2',
                'name' => 'Symphony of the Seas',
                'description' => 'The largest cruise ship in the world, offering a wide range of activities and amenities.',
                'img' => 'symphony_of_the_seas.jpg',
                'style' => 'Mega',
                'size' => 'Extra Large',
                'launch_at' => '2018',
                'last_refit_at' => '2022',
                'gt' => '228081',
                'length' => '362.0',
                'width' => '47.0',
                'speed' => '22',
                'decks' => '18',
                'nop' => '6680',
                'no_crew' => '2200',
                'no_cabins' => '2760',
                'wa' => '1',
            ],
            [
                'cc_id' => '17',
                'type_id' => '1',
                'name' => 'Seabourn Ovation',
                'description' => 'An ultra-luxury cruise ship offering exceptional service and elegant accommodations.',
                'img' => 'seabourn_ovation.jpg',
                'style' => 'Luxury',
                'size' => 'Small',
                'launch_at' => '2018',
                'last_refit_at' => '2021',
                'gt' => '40350',
                'length' => '210.0',
                'width' => '28.0',
                'speed' => '19',
                'decks' => '12',
                'nop' => '600',
                'no_crew' => '450',
                'no_cabins' => '300',
                'wa' => '2',
            ],
            [
                'cc_id' => '18',
                'type_id' => '2',
                'name' => 'Silver Muse',
                'description' => 'An ultra-luxury cruise ship designed for a truly exclusive experience.',
                'img' => 'silver_muse.jpg',
                'style' => 'Elegant',
                'size' => 'Medium',
                'launch_at' => '2017',
                'last_refit_at' => '2021',
                'gt' => '40700',
                'length' => '213.0',
                'width' => '27.0',
                'speed' => '19',
                'decks' => '11',
                'nop' => '596',
                'no_crew' => '411',
                'no_cabins' => '298',
                'wa' => '3',
            ],
            [
                'cc_id' => '19',
                'type_id' => '1',
                'name' => 'Viking Star',
                'description' => 'A modern and elegant cruise ship offering an immersive travel experience.',
                'img' => 'viking_star.jpg',
                'style' => 'Modern',
                'size' => 'Medium',
                'launch_at' => '2015',
                'last_refit_at' => '2019',
                'gt' => '47800',
                'length' => '227.0',
                'width' => '28.8',
                'speed' => '20',
                'decks' => '14',
                'nop' => '930',
                'no_crew' => '465',
                'no_cabins' => '465',
                'wa' => '2',
            ],
            [
                'cc_id' => '20',
                'type_id' => '2',
                'name' => 'Scarlet Lady',
                'description' => 'A vibrant and modern cruise ship designed for adults, offering unique experiences.',
                'img' => 'scarlet_lady.jpg',
                'style' => 'Trendy',
                'size' => 'Large',
                'launch_at' => '2020',
                'last_refit_at' => '2023',
                'gt' => '110000',
                'length' => '278.0',
                'width' => '38.0',
                'speed' => '22',
                'decks' => '17',
                'nop' => '2770',
                'no_crew' => '1150',
                'no_cabins' => '1400',
                'wa' => '2',
            ]
        ]);
    }
}
