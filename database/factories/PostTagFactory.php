<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    
    protected $model = PostTag::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $posts = Post::all();
        $randomPostId = random_int(0, count($posts) - 1);
        $singlePost = $posts->get($randomPostId);
        $singlePostId = $singlePost->id;

        $tags = Tag::all();
        $randomTagId = random_int(0, count($tags) - 1);
        $singleTag = $tags->get($randomTagId);
        $singleTagId = $singleTag->id;
                
        return [
            'post_id' => $singlePostId,
            'tag_id' => $singleTagId
        ];
    }
}
