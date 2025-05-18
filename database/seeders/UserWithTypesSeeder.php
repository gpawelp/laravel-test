<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class UserWithTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@tester.pl',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'), // password
            'user_type' => 'admin'
        ]);
    }
}
