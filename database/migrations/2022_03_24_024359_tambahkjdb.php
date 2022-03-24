<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tambahkjdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuntutans', function (Blueprint $table) {
            $table->boolean('lulus_satupertiga')->nullable();
            $table->text('lulus_satupertiga_sebab')->nullable();
            $table->boolean('lulus_sebulan')->nullable();
            $table->text('lulus_sebulan_sebab')->nullable(); 
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
