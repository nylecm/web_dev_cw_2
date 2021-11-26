<?php

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Seeder;

class ReactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = new Reaction();
        $r->type = 'like';
        $r->user_id = 1;
        $r->post_id = 1;
    }
}
