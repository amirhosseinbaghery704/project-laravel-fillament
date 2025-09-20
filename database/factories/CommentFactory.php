<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'comment' => $this->faker->sentence(15),
            'status' => $this->faker->boolean(70), // بیشتر کامنت‌ها تأیید شده
            'post_id' => Post::factory(), // هر کامنت به یه پست وصله
        ];
    }
}

