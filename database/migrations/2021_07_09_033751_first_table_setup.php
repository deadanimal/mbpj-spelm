<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FirstTableSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            // ini sistem
            $table->integer('status')->nullable();
            $table->float('kadar_jam',3,2)->nullable();
            $table->enum('jenis_hari', ['biasa', 'rehat', 'kelepasan_am'])->default('biasa');
            
            // permohonan sebelum
            $table->datetime('mohon_mula_kerja');
            $table->datetime('mohon_akhir_kerja');
            $table->char('lokasi', 255);
            $table->text('tujuan');
            $table->enum('jenis_permohonan',['individu', 'berkumpulan']);
            $table->foreignId('pegawai_sokong_id');
            $table->foreignId('pegawai_lulus_id');

            // kelelusan sebelum
            $table->datetime('tarikh_sokong')->nullable();
            $table->boolean('sokong_sebelum')->nullable();
            $table->text('sokong_sebelum_sebab')->nullable();
            $table->datetime('tarikh_lulus')->nullable();
            $table->boolean('lulus_sebelum')->nullable();
            $table->text('lulus_sebelum_sebab')->nullable();

            // permohonan selepas
            $table->datetime('sebenar_mula_kerja')->nullable();
            $table->datetime('sebenar_akhir_kerja')->nullable();

            // kelelusan selepas
            $table->boolean('sokong_selepas')->nullable();
            $table->text('sokong_selepas_sebab')->nullable();
            $table->boolean('lulus_selepas')->nullable();
            $table->text('lulus_selepas_sebab')->nullable();

        });

        Schema::table('tuntutans', function (Blueprint $table) {
            //sistem laa..
            $table->float('jumlah_jam_tuntutan', 6,2);
            $table->float('jumlah_tuntutan', 6,2);
            $table->integer('status');
            $table->foreignId('user_id')->nullable();

             // tuntutan isi oleh user....
             $table->boolean('sokong_tuntutan')->nullable();
             $table->text('sokong_tuntutan_sebab')->nullable();
             $table->boolean('lulus_tuntutan')->nullable();
             $table->text('lulus_tuntutan_sebab')->nullable();

             // sistem isi lepas calculate...
             $table->foreignId('pengesah_id')->nullable();;
             $table->boolean('sah_tuntutan')->nullable();
             $table->text('sah_sebab')->nullable();

            // user(fiannce) isi...
             $table->boolean('semak_tuntutan')->nullable();
             $table->text('semak_sebab')->nullable();
             $table->boolean('periksa_tuntutan')->nullable();
             $table->text('periksa_sebab')->nullable();

            // sistem isi based by req
            $table->foreignId('kerani_semakan_id')->nullable();
            $table->foreignId('kerani_pemeriksa_id')->nullable();

            // kalau semak/periksa tuntutan false...
            $table->boolean('lulus_semak_satu')->nullable();
            $table->text('lulus_semak_satu_sebab')->nullable();
            $table->boolean('lulus_semak_dua')->nullable();
            $table->text('lulus_semak_dua_sebab')->nullable(); 
            $table->foreignId('pululus_pindaan_satu_id')->nullable();
            $table->foreignId('pululus_pindaan_dua_id')->nullable();

        });

        Schema::table('ekedatangans', function (Blueprint $table) {
            $table->char('staffno', 100)->nullable();
            $table->char('tarikh', 100)->nullable();
            $table->char('statusdesc', 100)->nullable();
            $table->char('clockintime', 100)->nullable();
            $table->char('clockouttime', 100)->nullable();
            $table->char('totalworkinghour', 100)->nullable();
            $table->char('otstarttime1', 100)->nullable();
            $table->char('otendtime1', 100)->nullable();
            $table->char('otdurationt1', 100)->nullable();
            $table->char('otstarttime2', 100)->nullable();
            $table->char('otendtime2', 100)->nullable();
            $table->char('otdurationt2', 100)->nullable();
            $table->char('otstarttime3', 100)->nullable();
            $table->char('otendtime3', 100)->nullable();
            $table->char('totalduration', 100)->nullable();
            $table->char('waktuanjal', 100)->nullable();
            $table->char('alasan', 100)->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('user_code')->nullable();
            $table->integer('department_code')->nullable();
            $table->string('nric')->nullable();
            $table->string('phone')->nullable();
    
        });

        Schema::create('user_permohonans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('permohonan_id')->nullable();
        });

        Schema::create('permohonan_tuntutans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tuntutan_id')->nullable();
            $table->foreignId('permohonan_id')->nullable();
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
