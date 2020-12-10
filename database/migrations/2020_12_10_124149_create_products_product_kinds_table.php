<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsProductKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('products_product_kinds', function (Blueprint $table) {
            $table->unsignedInteger('productID');
            $table->unsignedInteger('productKindID');

            $table->foreign('productID')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productKindID')->references('id')->on('product_kinds')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['productID','productKindID']);
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
        Schema::dropIfExists('products_product_kinds');
        Schema::enableForeignKeyConstraints();
    }
}
