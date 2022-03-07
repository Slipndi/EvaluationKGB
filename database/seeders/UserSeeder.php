<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'admin';
        $user->last_name = 'admin';
        $user->password = Hash::make('admin');
        $user->email = 'admin@admin.fr';
        $user->save();
    }
}
