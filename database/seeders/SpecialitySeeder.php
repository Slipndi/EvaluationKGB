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
            ['title' => 'drive'],
            ['title' => 'helicopter pilot'],
            ['title' => 'guns'],
            ['title' => 'picture shooter'],
            ['title' => 'Polyglot'],
        ]);
        $specialities->each(
            fn(array $speciality) => Speciality::create($speciality)
        );
    }
}
