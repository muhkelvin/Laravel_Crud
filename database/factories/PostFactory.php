<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = $this->faker->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph(5),
            'detail' => $this->faker->sentence(5),
            'category_id' => rand(1,5)
        ];
    }
}
