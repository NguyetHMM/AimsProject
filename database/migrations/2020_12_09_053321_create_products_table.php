<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('productCategoryID');
            $table->unsignedInteger('productTypeID');
            $table->string('title');
            $table->integer('value');
            $table->integer('price');
            $table->string('language');
            $table->unsignedInteger('promotionID')->nullable();

            $table->foreign('productCategoryID')->references('id')->on('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productTypeID')->references('id')->on('product_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('promotionID')->references('id')->on('promotions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
