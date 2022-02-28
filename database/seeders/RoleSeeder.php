<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =collect([
            ['title' => 'agent'],
            ['title' => 'target'],
            ['title' => 'contact']
        ]);
        $roles->each(fn(array $role)=> Role::create($role));
    }
}
