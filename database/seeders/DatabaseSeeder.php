<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ReactionTableSeeder::class);

        User::factory(10)
            ->has(Post::factory()->count(3))->create();

        Reaction::factory(20)->create();
        Comment::factory(20)->create();
    }
}
