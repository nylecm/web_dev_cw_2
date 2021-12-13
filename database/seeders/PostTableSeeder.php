<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use DateTime;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = "Hello World";
        $p->text_content = "This is the first ever post!";
        $p->user_id = 1;
        $p->save();
    }
}
