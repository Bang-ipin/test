<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@cyberolympus.com',
            'password'  => bcrypt('cyberadmin')
        ]);
        
    }
}
