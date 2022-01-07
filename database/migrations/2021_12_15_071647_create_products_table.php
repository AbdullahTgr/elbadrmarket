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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sec1')->nullable();
            $table->string('sec2')->nullable();
            $table->string('sec3')->nullable();
            $table->string('sec4')->nullable();
            $table->string('sec5')->nullable();
            $table->string('sec6')->nullable();
            $table->string('sec7')->nullable();
            $table->string('sec8')->nullable();
            $table->string('sec9')->nullable();

            
            $table->string('sec1_ar')->nullable();
            $table->string('sec2_ar')->nullable();
            $table->string('sec3_ar')->nullable();
            $table->string('sec4_ar')->nullable();
            $table->string('sec5_ar')->nullable();
            $table->string('sec6_ar')->nullable();
            $table->string('sec7_ar')->nullable();
            $table->string('sec8_ar')->nullable();
            $table->string('sec9_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
