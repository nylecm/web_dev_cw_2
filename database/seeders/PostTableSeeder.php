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
        $p->date_posted = new DateTime('2021-11-23T22:22:22.12345Z');
        $p->date_edited = new DateTime('2021-11-23T22:22:22.12345Z');
        $p->user_id = 1;
        $p->save();
    }
}
