<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTuntutanDibuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('CREATE TABLE permohonan_tuntutan_dibuangs LIKE permohonan_tuntutans; ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_tuntutan_dibuangs');
    }
}
