<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MotorcycleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'category' => 'NMAX Turbo 155',
                'brand' => 'Yamaha',
                'transmission' => 'automatic',
                'type' => 'Big_Matic',  // Replaced 'touring' with 'Big_Matic'
                'cc' => 155,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'The NMAX Turbo 155 is a dynamic scooter featuring turbocharged technology that ensures smooth, fast, and responsive performance. Its cutting-edge design combines sporty aesthetics with advanced features, perfect for city commuting and long-distance rides.',
                'image_path' => 'turbo.jpg', // Make sure the file is in storage/app/public/motorcycles/
                'last_service_date' => Carbon::now()->subMonths(1),
                'price' => 250000,
                'license_plate' => 'DK 1234 ABC',
            ],
            [
                'category' => 'PCX 160',
                'brand' => 'Honda',
                'transmission' => 'automatic',
                'type' => 'Big_Matic',  // Replaced 'touring' with 'Big_Matic'
                'cc' => 160,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'The PCX 160 offers a luxurious and comfortable riding experience. Its premium design and powerful 160cc engine deliver exceptional performance for daily commutes and weekend getaways. With modern features and a stylish look, it’s perfect for those who seek comfort and reliability.',
                'image_path' => 'pcx.jpg',
                'last_service_date' => Carbon::now()->subMonths(2),
                'price' => 250000,
                'license_plate' => 'DK 5678 DEF',
            ],
            [
                'category' => 'Sportster S',
                'brand' => 'Harley Davidson',
                'transmission' => 'manual',
                'type' => 'Manual',  // Replaced 'touring' with 'Manual'
                'cc' => 1250,
                'fuel_configuration' => 'RON 95',
                'status' => 'available',
                'description' => 'The Sportster S is a powerful and iconic cruiser motorcycle from Harley Davidson. With a 1250cc engine and a distinctive design, it delivers an unmatched riding experience, combining classic Harley elements with cutting-edge performance and modern technology. Ideal for those who love the road.',
                'image_path' => 'sporters.jpg',
                'last_service_date' => Carbon::now()->subMonths(3),
                'price' => 1500000,
                'license_plate' => 'B 1903 HD',
            ],
            [
                'category' => 'Vespa Primavera',
                'brand' => 'Vespa',
                'transmission' => 'automatic',
                'type' => 'Small_Matic',  // Replaced 'touring' with 'Small_Matic'
                'cc' => 150,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'The Vespa Primavera combines iconic Italian style with modern performance. This scooter is perfect for urban commuters seeking a balance of performance, efficiency, and design. The 150cc engine provides adequate power for both city riding and leisurely weekend cruises, all while maintaining the timeless charm of Vespa’s design.',
                'image_path' => 'vespa.jpeg',
                'last_service_date' => Carbon::now()->subWeeks(2),
                'price' => 300000,
                'license_plate' => 'DK 9999 VSP',
            ],
            [
                'category' => 'Panigale V4',
                'brand' => 'Ducati',
                'transmission' => 'manual',
                'type' => 'Manual',  // Replaced 'touring' with 'Manual'
                'cc' => 1100,
                'fuel_configuration' => 'RON 98',
                'status' => 'available',
                'description' => 'The Ducati Panigale V4 is the epitome of superbike performance, offering outstanding handling, power, and cutting-edge technology. With a 1100cc engine, the V4 delivers mind-blowing acceleration and handling on both the track and the street, making it a true icon for performance motorcycle enthusiasts.',
                'image_path' => 'itali.jpg',
                'last_service_date' => Carbon::now()->subMonths(1),
                'price' => 2500000,
                'license_plate' => 'DK 1111 DCT',
            ],
            [
                'category' => 'Road Glide CVO ST',
                'brand' => 'Harley Davidson',
                'transmission' => 'manual',
                'type' => 'Manual',  // Replaced 'touring' with 'Manual'
                'cc' => 1923,
                'fuel_configuration' => 'RON 95',
                'status' => 'available',
                'description' => 'The Road Glide CVO ST is a premium touring motorcycle designed for comfort and performance. With a powerful 1923cc engine, it provides unmatched power for long-distance touring. The CVO ST features Harley Davidson’s Custom Vehicle Operations package, offering exclusive styling and advanced features for the ultimate riding experience.',
                'image_path' => 'roadglide.jpg',
                'last_service_date' => Carbon::now()->subMonths(2),
                'price' => 3000000,
                'license_plate' => 'DK 7777 RGS',
            ],
            [
                'category' => 'Sportster 2025',
                'brand' => 'Harley Davidson',
                'transmission' => 'manual',
                'type' => 'Manual',  // Replaced 'touring' with 'Manual'
                'cc' => 1200,
                'fuel_configuration' => 'RON 95',
                'status' => 'available',
                'description' => 'The Harley Davidson Sportster 2025 is a refined version of the legendary Sportster series, blending modern technology with the brand’s iconic design. With its 1200cc engine and agile handling, it offers both city and highway riders the power and thrill they desire.',
                'image_path' => 'sportster2025.jpg',
                'last_service_date' => Carbon::now()->subMonths(4),
                'price' => 1800000,
                'license_plate' => 'B 2025 HD',
            ],
            [
                'category' => 'XMAX 250',
                'brand' => 'Yamaha',
                'transmission' => 'automatic',
                'type' => 'Big_Matic',  // Replaced 'touring' with 'Big_Matic'
                'cc' => 250,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'The Yamaha XMAX 250 is a stylish and powerful scooter that offers both comfort and performance. It features a 250cc engine that delivers smooth acceleration and excellent handling, making it perfect for both city commuting and longer road trips.',
                'image_path' => 'xmax250.jpg',
                'last_service_date' => Carbon::now()->subMonths(1),
                'price' => 350000,
                'license_plate' => 'DK 2500 XMX',
            ],
            [
                'category' => 'ZX-25R',
                'brand' => 'Kawasaki',
                'transmission' => 'manual',
                'type' => 'Manual',  // Replaced 'touring' with 'Manual'
                'cc' => 250,
                'fuel_configuration' => 'RON 95',
                'status' => 'available',
                'description' => 'The Kawasaki ZX-25R is a compact yet powerful sports bike with a 250cc engine that offers thrilling acceleration and performance. Designed for riders seeking a balance of speed and agility, it’s perfect for those looking to push their limits on the track and on the road.',
                'image_path' => 'zx25rr.jpg',
                'last_service_date' => Carbon::now()->subWeeks(3),
                'price' => 270000,
                'license_plate' => 'DK 4321 KAW',
            ],
        ];

        foreach ($data as $item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            DB::table('motorcycles')->updateOrInsert(
                ['license_plate' => $item['license_plate']], // Check if license_plate already exists
                $item
            );
        }
    }
}
