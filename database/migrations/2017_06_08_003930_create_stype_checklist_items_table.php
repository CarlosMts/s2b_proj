<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStypeChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stype_checklist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned()->index();
            $table->integer('checklist_item_id')->unsigned()->index();
            $table->integer('check');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('space_types')->onDelete('cascade');
            $table->foreign('checklist_item_id')->references('id')->on('checklist_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stype_checklist_items');
    }
}
