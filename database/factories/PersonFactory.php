<?php

namespace Database\Factories;

use App\Models\{Country, Role};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

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
        $response = Http::get('https://randomuser.me/api/')->collect('results');
        return [
            "country_id" => Country::inRandomOrder()->first()->id,
            "first_name" => $response[0]['name']['first'],
            "last_name" => $response[0]['name']['last'],
            "birthdate" => $this->faker->date(),
            "code_name" => $response[0]['login']['username'],
            "picture" => $response[0]['picture']['medium'],
            "role_id" => Role::inRandomOrder()->first()->id
        ];
    }
}
