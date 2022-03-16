<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tambahpermohonanatt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('permohonans', function (Blueprint $table) {

            $table->float('jam_tuntutan', 6,2)->nullable();
            $table->float('total_tuntutan', 6,2)->nullable();
            $table->integer('status2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
