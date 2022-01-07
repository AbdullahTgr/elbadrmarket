<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prds', function (Blueprint $table) {
            $table->id();
            $table->string('sec1')->nullable();
            $table->string('sec2')->nullable();
            $table->string('sec3')->nullable();
            $table->string('sec4')->nullable();
            $table->string('sec5')->nullable();
            $table->string('sec6')->nullable();
            $table->string('sec7')->nullable();
            $table->string('sec8')->nullable();
            $table->string('sec9')->nullable();
            $table->string('sec10')->nullable();
            $table->string('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prds');
    }
}
