<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SelesaiSemak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SelesaiSemak', function (Blueprint $table) {
            $table->id();
            $table->string('PA_NO_PEKERJA')->nullable();
            $table->string('PA_KOD_ELAUN')->nullable();
            $table->string('PA_JUMLAH_ELAUN')->nullable();
            $table->string('PA_BULAN_TUNTUTAN')->nullable();
            $table->string('PA_TAHUN_TUNTUTAN')->nullable();
            $table->string('PA_PROSES_IND')->nullable();
            $table->string('PA_TARIKH_PROSES')->nullable();
            $table->string('PA_VOT_ELAUN')->nullable();
            $table->string('PA_TARIKH_KEYIN')->nullable();
            $table->string('PA_JUMLAH_MASA')->nullable();
            $table->string('PA_UBAH_OLEH')->nullable();
            $table->string('PA_TARIKH_UBAH')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SelesaiSemak');
    }
}
