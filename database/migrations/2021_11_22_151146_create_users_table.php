<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->dateTime('date_of_birth')->nullable(); // todo make not nullable
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('profile_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('profiles')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
