<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'family' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->boolean(90), // 90% فعال
            'password' => bcrypt('password'), // همه یوزرها پسورد مشترک دارن
            'remember_token' => Str::random(10),
        ];
    }



    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
