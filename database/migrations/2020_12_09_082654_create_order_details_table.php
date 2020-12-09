<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedInteger('orderID');
            $table->unsignedInteger('productID');
            $table->integer('quantity');
            $table->integer('price');

            $table->foreign('productID')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orderID')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['orderID','productID']);
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
        Schema::dropIfExists('order_details');
        Schema::enableForeignKeyConstraints();
    }
}
