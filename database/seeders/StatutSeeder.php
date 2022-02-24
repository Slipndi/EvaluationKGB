<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status =collect([
            ['title' => 'en préparation'],
            ['title' => 'en cours'],
            ['title' => 'terminé'],
            ['title' => 'echec'],
        ]);
        $status->each(fn(array $statut)=> Statut::create($statut));
    }
}
