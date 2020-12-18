<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedInteger('productID');
            $table->unsignedInteger('coverID');
            $table->string('author');
            $table->string('publisher');
            $table->date('publicationDate');
            $table->integer('pages');
            $table->string('category');
            
            $table->foreign('productID')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('coverID')->references('id')->on('covers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('books');
        Schema::enableForeignKeyConstraints();
    }
}
