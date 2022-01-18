<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     *  @return void
     */
    public function up()
    {
        Schema::table('product_clicks', function (Blueprint $table) {
            
            $table->string('ip_')->nullable();
            $table->string('ip')->nullable();
            $table->string('countryName')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('regionCode')->nullable();
            $table->string('regionName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('zipCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_click', function (Blueprint $table) {
            //
        });
    }
}
