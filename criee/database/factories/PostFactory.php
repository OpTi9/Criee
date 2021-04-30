<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->realText(rand(10,40));
        $short_title = $this->faker->realText(rand(10, 11));
        $created_at = $this->faker->dateTimeBetween('-30 days','-1 days');

        return [
            'title' => $title,
            'short-title' => $short_title,
            'author-id' => rand(1,4),
            'description' => $this->faker->realText(rand(100,400)),
            'created_at' => $created_at,
            'updated_at' => $created_at
        ];
    }
}
