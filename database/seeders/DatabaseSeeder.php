<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            HideoutSeeder::class,
            RoleSeeder::class,
            SpecialitySeeder::class,
            StatutSeeder::class,
            MissionSeeder::class,
            PersonSeeder::class,
        ]);
    }
}
