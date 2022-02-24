<?php

namespace Database\Seeders;

use App\Models\Hideout;
use Illuminate\Database\Seeder;

class HideoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hideout::factory()->count(500)->create();
    }
}
