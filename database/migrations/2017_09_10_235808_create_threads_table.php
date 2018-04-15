<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_begin');
            $table->date('date_end');
            $table->integer('hour_type_id')->unsigned()->index();
            $table->boolean('weekend');// 0 - Não, 1 - Sim
            $table->integer('user_id')->unsigned()->index();
            $table->integer('space_id')->unsigned()->index();
            $table->boolean('confirmed');
            $table->boolean('canceled');
            $table->integer('discount_id');
            $table->decimal('total_price',10,4);
            $table->decimal('total_with_discount',10,4);
            $table->decimal('discount_value',10,4);
            $table->boolean('paid');
            $table->timestamps();

            $table->foreign('hour_type_id')->references('id')->on('hour_types')->onDelete('cascade');
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
        Schema::dropIfExists('threads');
    }
}
