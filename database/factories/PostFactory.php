<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        
        $userId = random_int(0, count($users) + 1);
        
        return [
            'user_id' => $userId,
            'title' => $this->faker->text(30),
            'slug' => $this->faker->unique()->slug,
            'body' => $this->faker->text(200)
        ];
    }
}
