<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    static $prev_ID = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        self::$prev_ID++;
        return [
            'user_name' => $this->faker->unique()->userName(),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->dateTimeBetween('-100 years',
                                                     '-13 years', null),
            'email_verified_at' => now(),
            'password' => $this->faker->password(), // password
            'profile_id' => self::$prev_ID,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
