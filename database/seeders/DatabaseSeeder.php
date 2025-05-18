<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        
//        Post::factory(5)->create();
//        
//        Tag::factory(4)->create();
//        
//        PostTag::factory(10)->create();
        
        Album::factory(5)->create();
        
        // User::factory(10)->create();
    }
}
