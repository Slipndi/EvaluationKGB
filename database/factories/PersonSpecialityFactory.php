<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonSpeciality>
 */
class PersonSpecialityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'person_id' => Person::where('role_id', 1)->inRandomOrder()->first(),
            'speciality_id' => Speciality::inRandomOrder()->first()
        ];
    }
}
