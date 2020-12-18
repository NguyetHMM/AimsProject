<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('dvds', function (Blueprint $table) {
            $table->unsignedInteger('productID');
            $table->string('director');
            $table->string('dvdKind');
            $table->string('videoKind');
            $table->string('studio');
            $table->string('subtitles');
            $table->integer('runtime');
            $table->date('releaseDate');

            $table->foreign('productID')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->primary('productID');
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
        Schema::dropIfExists('dvds');
        Schema::enableForeignKeyConstraints();
    }
}
