<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = collect([
            ['speciality_name' => 'drive'],
            ['speciality_name' => 'helicopter pilot'],
            ['speciality_name' => 'guns'],
            ['speciality_name' => 'picture shooter'],
            ['speciality_name' => 'Polyglot'],
        ]);
        $specialities->each(
            fn(array $speciality) => Speciality::create($speciality)
        );
    }
}
