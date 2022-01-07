<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
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
            $table->string('sec11')->nullable();
            $table->string('sec12')->nullable();
            $table->string('sec13')->nullable();
            $table->string('sec14')->nullable();
            $table->string('sec15')->nullable();
            $table->string('sec16')->nullable();
            $table->string('sec17')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
