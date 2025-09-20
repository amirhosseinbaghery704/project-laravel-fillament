<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'status' => $this->faker->boolean(80), // بیشتر پست‌ها فعالن
            'content' => $this->faker->paragraphs(5, true),
            'user_id' => User::inRandomOrder()->first()->id, // هر پست با یوزر ساخته میشه
        ];
    }
}

