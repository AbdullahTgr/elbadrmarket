<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_clicks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('product_id')->nullable();
            $table->string('browser')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

        });
    } 

    /**
     * Reverse the migrations.
     *
     *      @return void
     */


    public function down()
    {
        Schema::dropIfExists('product_clicks');
    }
}
