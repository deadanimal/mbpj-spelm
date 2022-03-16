<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AduanTambah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            Schema::create('aduans', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->enum('jenis_aduan',['Permohonan','Pengesahan','Tuntutan','Sistem','lain_lain']);
                $table->char('aduan',255) -> nullable();
                $table->char('jawab_aduan',255) -> nullable();

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
