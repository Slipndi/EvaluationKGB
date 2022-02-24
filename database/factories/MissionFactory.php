<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Speciality;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->company . ' : ' . $this->faker->sentence,
            'description'=>$this->faker->paragraph,
            'code_name'=>$this->faker->macAddress,
            'country_id' => Country::inRandomOrder()->first()->id,
            'type' => Arr::random(
                ['Surveillance', 'Espionnage', 'Assassinat', 'Infiltration']
            ),
            'statut_id' => Statut::inRandomOrder()->first()->id,
            'speciality_id' => Speciality::inRandomOrder()->first()->id,
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
