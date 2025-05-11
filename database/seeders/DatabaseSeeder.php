<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;

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
        
        // Post::factory(5)->create();
        
//        Tag::factory(4)->create();
        
        PostTag::factory(10)->create();
        
        // User::factory(10)->create();
    }
}
