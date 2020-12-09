<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('userID');
            $table->unsignedInteger('cityID');
            $table->unsignedInteger('districtID');
            $table->string('description');

            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cityID')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('districtID')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('address');
        Schema::enableForeignKeyConstraints();
    }
}
