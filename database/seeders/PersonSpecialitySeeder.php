<?php

namespace Database\Seeders;

use App\Models\PersonSpeciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonSpeciality::factory()->count(500)->create();
    }
}
