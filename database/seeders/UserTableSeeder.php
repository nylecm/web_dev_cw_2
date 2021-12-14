<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DateTime;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;
        $u->user_name = "nylecm";
        $u->full_name = "Michal Nylec";
        $u->email = "michalnylec@gmail.com";
        $u->date_of_birth = new DateTime('2001-07-11T22:22:22.12345Z');
        $u->password = "123";
        $u->profile_id = 1;
        $u->save();
    }
}
