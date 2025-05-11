<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;
    
    protected $names = [
        'Laravel',
        'VueJs',
        'PHP',
        'Java',
    ];
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement($this->names)
        ];
    }
}
