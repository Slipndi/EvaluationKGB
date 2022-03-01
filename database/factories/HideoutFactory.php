<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hideout>
 */
class HideoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_name'=> $this->faker->jobTitle(),
            'address' => $this->faker->address(),
            'country_id' => Country::inRandomOrder()->first()->id,
            'type' => Arr::random(['Appartement', 'Maison', 'Garage'])
        ];
    }
}
