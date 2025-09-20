<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ساخت 10 کاربر
        User::factory(5)->create();

        // ساخت 50 کامنت
        Comment::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(5)->create();
        $posts = Post::factory(10)->create();

        $posts->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(1,3)->pluck('id')->toArray()
            );
        });

    }
}
