<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
//        User::factory(20)->create();
//        Profile::factory(20)->create();
        
        Post::factory(5)->create();
        
        // User::factory(10)->create();
    }
}
