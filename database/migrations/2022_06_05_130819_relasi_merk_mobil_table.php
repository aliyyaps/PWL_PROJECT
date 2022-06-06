<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiMerkMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->unsignedBigInteger('merk_id')->nullable();
            $table->foreign('merk_id')->references('id')->on('merk');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobil', function (Blueprint $table) {
           $table->dropForeign('[merk_id]');
        });
    }
}
