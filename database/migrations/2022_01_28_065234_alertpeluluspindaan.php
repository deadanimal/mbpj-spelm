<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alertpeluluspindaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuntutans', function (Blueprint $table) {
            $table->string('mohon_kemaskini_periksa')->nullable();
            $table->text('mohon_kemaskini1_sebab')->nullable();
            $table->string('mohon_kemaskini_semak')->nullable();
            $table->text('mohon_kemaskini2_sebab')->nullable();
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
