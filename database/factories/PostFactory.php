<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->text(200),
            'category' => $this->faker->text(50),
            'author' => $this->faker->name,
            'signees' => $this->faker->numberBetween(1, 10),
        ];
    }
}
