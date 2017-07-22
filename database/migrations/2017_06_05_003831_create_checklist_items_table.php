<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('haveValue');
            $table->integer('isFilter');
            $table->string('label')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('deleted')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('checklist_items');
    }
}
