<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use DateTime;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment();
        $c->text_content = "This is the first comment!";
        $c->date_posted = new DateTime('2021-11-23T22:22:22.12345Z');
        $c->date_edited = new DateTime('2021-11-23T22:22:22.12345Z');
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();
    }
}
