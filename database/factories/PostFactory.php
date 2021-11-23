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
        $datePosted = $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
        return [
            'title' => $this->faker->realText($maxNbChars = 30, $indexSize = 2),
            'text_content' => $this->faker->realText($maxNbChars = 30, $indexSize = 2),
            'date_posted' => $datePosted,
            'date_edited' => $this->faker->dateTimeBetween($startDate = $datePosted, $endDate = 'now', $timezone = null),
        ];
    }
}
