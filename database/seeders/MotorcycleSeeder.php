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
                'type' => 'big_matic',
                'cc' => 155,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'Motor matic bertenaga dengan teknologi Turbo.',
                'image_path' => 'turbo.jpg', // Pastikan file ada di storage/app/public/motorcycles/
                'last_service_date' => Carbon::now()->subMonths(1),
                'price' => 250000,
                'license_plate' => 'DK 1234 ABC',
            ],
            [
                'category' => 'PCX 160',
                'brand' => 'Honda',
                'transmission' => 'automatic',
                'type' => 'big_matic',
                'cc' => 160,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'Kenyamanan berkendara premium.',
                'image_path' => 'pcx.jpg',
                'last_service_date' => Carbon::now()->subMonths(2),
                'price' => 250000,
                'license_plate' => 'DK 5678 DEF',
            ],
            [
                'category' => 'Sportster S',
                'brand' => 'Harley Davidson',
                'transmission' => 'manual',
                'type' => 'manual',
                'cc' => 1250,
                'fuel_configuration' => 'RON 95',
                'status' => 'available',
                'description' => 'Moge legendaris dengan performa tinggi.',
                'image_path' => 'sporters.jpg',
                'last_service_date' => Carbon::now()->subMonths(3),
                'price' => 1500000,
                'license_plate' => 'B 1903 HD',
            ],
            [
                'category' => 'Vespa Primavera',
                'brand' => 'Vespa',
                'transmission' => 'automatic',
                'type' => 'small_matic',
                'cc' => 150,
                'fuel_configuration' => 'RON 92',
                'status' => 'available',
                'description' => 'Gaya klasik khas Italia.',
                'image_path' => 'vespa.jpeg',
                'last_service_date' => Carbon::now()->subWeeks(2),
                'price' => 300000,
                'license_plate' => 'DK 9999 VSP',
            ],
            [
                'category' => 'Panigale V4',
                'brand' => 'Ducati',
                'transmission' => 'manual',
                'type' => 'manual',
                'cc' => 1100,
                'fuel_configuration' => 'RON 98',
                'status' => 'available',
                'description' => 'Superbike kelas dunia.',
                'image_path' => 'itali.jpg',
                'last_service_date' => Carbon::now()->subMonths(1),
                'price' => 2500000,
                'license_plate' => 'DK 1111 DCT',
            ],
        ];

        foreach ($data as $item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            DB::table('motorcycles')->insert($item);
        }
    }
}