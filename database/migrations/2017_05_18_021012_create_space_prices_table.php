<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('type');
            $table->integer('hour')->nullable();
            $table->integer('hour4')->nullable();
            $table->integer('hour8')->nullable();
            $table->integer('month')->nullable();
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
        Schema::dropIfExists('space_prices');
    }
}
