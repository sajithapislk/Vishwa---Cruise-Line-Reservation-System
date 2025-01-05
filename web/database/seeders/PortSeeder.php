<?php

namespace Database\Seeders;

use App\Models\Port;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Port::insert([
            [
                'name' => 'Miami',
                'description' => 'The Port of Miami, located in Florida, USA, is known as the "Cruise Capital of the World." It serves as a major gateway for international trade and tourism, hosting a vast array of cruise lines and cargo ships. The port features modern facilities, extensive maritime services, and vibrant waterfront attractions.',
                'img' => 'port_of_miami.jpg'
            ],
            [
                'name' => 'Barcelona',
                'description' => 'Situated in Catalonia, Spain, the Port of Barcelona is one of the busiest ports in Europe. It plays a crucial role in Mediterranean trade and tourism, welcoming millions of passengers and tons of cargo annually. The port is renowned for its state-of-the-art infrastructure, cultural landmarks, and proximity to the city\'s famous attractions.',
                'img' => 'port_of_barcelona.jpg'
            ],
            [
                'name' => 'Singapore',
                'description' => 'The Port of Singapore is a global hub for maritime trade and logistics, strategically located at the crossroads of major shipping routes. It is one of the world\'s busiest and most efficient ports, handling a significant volume of container traffic. The port offers advanced facilities, seamless connectivity, and a vibrant maritime community.',
                'img' => 'port_of_singapore.jpg'
            ],
            [
                'name' => 'Sydney',
                'description' => 'The Port of Sydney, located in New South Wales, Australia, is a premier cruise destination and vital trade gateway. It offers stunning views of the iconic Sydney Opera House and Harbour Bridge. The port features modern cruise terminals, world-class amenities, and easy access to the city\'s attractions.',
                'img' => 'port_of_sydney.jpg'
            ],
            [
                'name' => 'Rotterdam',
                'description' => 'The Port of Rotterdam, situated in the Netherlands, is the largest port in Europe. It serves as a major hub for international trade, handling a vast volume of cargo and shipping traffic. The port boasts extensive infrastructure, cutting-edge technology, and a dynamic logistics ecosystem.',
                'img' => 'port_of_rotterdam.jpg'
            ],
            [
                'name' => 'Tokyo',
                'description' => 'The Port of Tokyo, located in Japan, is one of the busiest ports in the Asia-Pacific region. It plays a crucial role in facilitating trade and transportation, with a focus on containerized cargo. The port offers modern facilities, efficient operations, and seamless connectivity to the city\'s industrial and commercial centers.',
                'img' => 'port_of_tokyo.jpg'
            ],
            [
                'name' => 'Vancouver',
                'description' => 'The Port of Vancouver, located in British Columbia, Canada, is a vital gateway for trade and tourism on the Pacific coast. It handles a diverse range of cargo, including containers, bulk goods, and automobiles. The port is known for its sustainable practices, innovative solutions, and picturesque surroundings.',
                'img' => 'port_of_vancouver.jpg'
            ],
            [
                'name' => 'Dubai',
                'description' => 'The Port of Dubai, situated in the United Arab Emirates, is a leading maritime center in the Middle East. It offers world-class facilities, extensive logistics services, and strategic connectivity to global markets. The port is known for its rapid growth, innovative technologies, and luxurious cruise experiences.',
                'img' => 'port_of_dubai.jpg'
            ],
            [
                'name' => 'Hong Kong',
                'description' => 'The Port of Hong Kong is a major maritime hub in Asia, known for its deep-water berths and advanced infrastructure. It handles a significant volume of container traffic, playing a crucial role in global trade. The port offers efficient operations, seamless connectivity, and vibrant waterfront attractions.',
                'img' => 'port_of_hong_kong.jpg'
            ],
            [
                'name' => 'New York and New Jersey',
                'description' => 'The Port of New York and New Jersey is one of the largest and busiest ports on the US East Coast. It serves as a vital gateway for international trade, handling a diverse range of cargo and passenger traffic. The port offers modern facilities, extensive logistics services, and easy access to major commercial centers.',
                'img' => 'port_of_ny_nj.jpg'
            ],
            [
                'name' => 'Southampton',
                'description' => 'The Port of Southampton, located in the United Kingdom, is a premier cruise and cargo port. It is known for its efficient operations, modern facilities, and strategic location. The port serves as a major gateway for trade and tourism, offering seamless connectivity and a vibrant maritime community.',
                'img' => 'port_of_southampton.jpg'
            ],
            [
                'name' => 'Genoa',
                'description' => 'The Port of Genoa, situated in Italy, is one of the most important ports in the Mediterranean region. It plays a crucial role in maritime trade and transportation, handling a diverse range of cargo and passenger traffic. The port offers state-of-the-art facilities, extensive logistics services, and a rich cultural heritage.',
                'img' => 'port_of_genoa.jpg'
            ],
            [
                'name' => 'Los Angeles',
                'description' => 'The Port of Los Angeles, located in California, USA, is the largest container port in the Western Hemisphere. It serves as a major gateway for international trade, handling a significant volume of cargo. The port is known for its advanced infrastructure, efficient operations, and commitment to sustainability.',
                'img' => 'port_of_los_angeles.jpg'
            ],
            [
                'name' => 'Hamburg',
                'description' => 'The Port of Hamburg, situated in Germany, is a major European port and logistics hub. It handles a wide range of cargo, including containers, bulk goods, and automobiles. The port offers modern facilities, efficient operations, and strong connections to global trade networks.',
                'img' => 'port_of_hamburg.jpg'
            ],
            [
                'name' => 'Rio de Janeiro',
                'description' => 'The Port of Rio de Janeiro, located in Brazil, is a key port in South America. It serves as a major hub for maritime trade and tourism, handling a diverse range of cargo and passenger traffic. The port offers modern facilities, efficient logistics services, and stunning views of the city\'s famous landmarks.',
                'img' => 'port_of_rio_de_janeiro.jpg'
            ]
        ]);
    }
}
