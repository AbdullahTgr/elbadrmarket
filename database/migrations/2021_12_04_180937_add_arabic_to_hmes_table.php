<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArabicToHmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hmes', function (Blueprint $table) {
           
            $table->string('sec1_ar')->nullable();
            $table->string('sec2_ar')->nullable();
            $table->string('sec3_ar')->nullable();
            $table->string('sec4_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hmes', function (Blueprint $table) {
            //
        });
    }
}
