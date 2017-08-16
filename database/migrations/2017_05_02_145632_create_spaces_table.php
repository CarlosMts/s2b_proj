<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('company_id')->unsigned()->index();
            $table->string('name');
            $table->integer('type_id')->unsigned()->index();
            $table->string('address')->default('');
            $table->double('lat',20,10);
            $table->double('lng',20,10);
            $table->string('zipcode')->default('');
            $table->string('city')->default('');
            $table->string('country')->default('');
            $table->string('description')->default('');
            $table->integer('admin_reviewed')->default(0);
            $table->integer('deleted')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('space_types')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}
