<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('img_name');
            $table->string('img_thumb');
            $table->string('img_type');
            $table->string('img_size');
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
        Schema::dropIfExists('space_images');
    }
}

