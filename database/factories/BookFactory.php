<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomNumber = rand(1, 100);
        $cover = "https://picsum.photos/id/{$randomNumber}/200/300";
        return [
            'author_id' => Author::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(50),
            'cover' => $cover,
            'qty' => rand(10, 20),
        ];
    }
}