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
        $datePosted = $this->faker->dateTimeBetween('-1 years', 'now', null);
        return [
            'title' => $this->faker->realText(30),
            'text_content' => $this->faker->realText( 140),
        ];
    }
}
