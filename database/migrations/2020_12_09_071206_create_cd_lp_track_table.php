<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdLpTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('cd_lp_track', function (Blueprint $table) {
            $table->unsignedInteger('productID');
            $table->unsignedInteger('trackID');

            $table->foreign('productID')->references('productID')->on('cds_lps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('trackID')->references('id')->on('tracks')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['productID','trackID']);
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
        Schema::dropIfExists('cd_lp_track');
        Schema::enableForeignKeyConstraints();
    }
}
