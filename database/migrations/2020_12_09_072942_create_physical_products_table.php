<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('physical_products', function (Blueprint $table) {
            $table->unsignedInteger('productID');
            $table->string('barcode')->unique();
            $table->text('description');
            $table->integer('quantity');
            $table->double('length');
            $table->double('width');
            $table->double('heigth');
            $table->double('weigh');
            $table->date('inputDay');

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
        Schema::dropIfExists('physical_products');
        Schema::enableForeignKeyConstraints();
    }
}
