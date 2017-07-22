<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_checklist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space_id');
            $table->integer('stype_checklist_item_id');
            $table->integer('value')->nullable();
            $table->integer('status');
            $table->integer('user_id');
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
        Schema::dropIfExists('space_checklist_items');
    }
}
