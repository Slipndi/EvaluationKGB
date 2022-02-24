<?php

namespace Database\Factories;

use App\Models\{Country, Role};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "country_id" => Country::inRandomOrder()->first()->id,
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "birthdate" => $this->faker->dateTimeThisCentury(),
            "code_name" => $this->faker->userName(),
            "role_id" => Role::inRandomOrder()->first()->id
        ];
    }
}
