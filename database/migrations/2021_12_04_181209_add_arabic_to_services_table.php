<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArabicToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            
            $table->string('sec1_ar')->nullable();
            $table->string('sec2_ar')->nullable();
            $table->string('sec3_ar')->nullable();
            $table->string('sec4_ar')->nullable();
            $table->string('sec5_ar')->nullable();
            $table->string('sec6_ar')->nullable();
            $table->string('sec7_ar')->nullable();
            $table->string('sec8_ar')->nullable();
            $table->string('sec9_ar')->nullable();
            $table->string('sec10_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
}
