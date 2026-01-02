<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Corporate motorcycle rental',
                'description' => 'Open multipy a green form lesser their from in made herb multiply',
                'icon' => 'icon-star',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Motorcycle rental with driver',
                'description' => 'Open multipy a green form lesser their from in made herb multiply',
                'icon' => 'icon-taxi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Airport transfer',
                'description' => 'Open multipy a green form lesser their from in made herb multiply',
                'icon' => 'icon-star',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fleet leasing',
                'description' => 'Open multipy a green form lesser their from in made herb multiply',
                'icon' => 'icon-cheack',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}
