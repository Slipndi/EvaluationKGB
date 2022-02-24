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
            ['title' => 'Conduite'],
            ['title' => 'Pilotage d\'hélicoptère'],
            ['title' => 'Armes à feux'],
            ['title' => 'Photographie'],
            ['title' => 'Polyglotte'],
        ]);
        $specialities->each(
            fn(array $speciality) : void => Speciality::create($speciality)
        );
    }
}
