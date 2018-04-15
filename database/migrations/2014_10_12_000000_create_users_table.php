<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->boolean('is_admin')->default(0);
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('avatar')->default('/images/avatars/avatar_placeholder.png');
            $table->string('password')->nullable();
            $table->integer('contact');
            $table->date('birthday');
            $table->string('city');
            $table->string('country');
            $table->integer('NIF');
            $table->string('company_name');
            $table->string('business_area');
            $table->string('position');
            $table->integer('haveSpaces')->default(0);
            $table->integer('haveReservations')->default(0);
            $table->integer('haveFavourites')->default(0);
            $table->integer('deleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
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
