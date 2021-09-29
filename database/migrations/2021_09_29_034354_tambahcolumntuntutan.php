<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tambahcolumntuntutan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuntutans', function (Blueprint $table) {
            $table->datetime('sebenar_mula_kerja_tuntutan')->nullable();
            $table->datetime('sebenar_akhir_kerja_tuntutan')->nullable();

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
