<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CommentFactory extends Factory
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
            'text_content' => $this->faker->realText( 140),
            'user_id' => $this->faker->numberBetween(1,DB::table('users')->count()),
            'post_id' => $this->faker->numberBetween(1,DB::table('posts')->count()),
            'date_posted' => $datePosted,
            'date_edited' => $this->faker->dateTimeBetween($datePosted, 'now', null),
        ];
    }
}
