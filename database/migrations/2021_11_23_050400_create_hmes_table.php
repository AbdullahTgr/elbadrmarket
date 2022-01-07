<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hmes', function (Blueprint $table) {
            $table->id();
            $table->string('sec1')->nullable();
            $table->string('sec2')->nullable();
            $table->string('sec3')->nullable();
            $table->string('sec4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */ 
    public function down()
    {
        Schema::dropIfExists('hmes');
    }
}
