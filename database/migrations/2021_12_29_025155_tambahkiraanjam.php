<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tambahkiraanjam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {

            $table->float('jumlah_biasa_siang', 6,2)->nullable();
            $table->float('jumlah_biasa_malam', 6,2)->nullable();

            $table->float('jumlah_rehat_siang', 6,2)->nullable();
            $table->float('jumlah_rehat_malam', 6,2)->nullable();

            $table->float('jumlah_am_siang', 6,2)->nullable();
            $table->float('jumlah_am_malam', 6,2)->nullable();


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
