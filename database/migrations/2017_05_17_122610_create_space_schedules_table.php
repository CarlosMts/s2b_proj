<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('week_day')->unsigned()->index();
            $table->string('open_hour')->nullable();
            $table->string('close_hour')->nullable();
            $table->integer('all_day')->nullable();
            $table->integer('closed')->nullable();
            $table->timestamps();

            $table->foreign('space_id')->references('id')->on('spaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('space_schedules');
    }
}
