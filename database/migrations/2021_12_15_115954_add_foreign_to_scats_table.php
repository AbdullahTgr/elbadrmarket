<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToScatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scats', function (Blueprint $table) {
            // $table->dropPrimary('id');
            // $table->dropForeign('sec9_ar');
                $table->foreign('sec9_ar')->references('id')->on('mcats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scats', function (Blueprint $table) {
            //
        });
    }
}
