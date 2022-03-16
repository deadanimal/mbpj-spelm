<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahUserFields1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE `users` CHANGE `role` `role` ENUM('kakitangan','penyelia','ketua_bahagian','ketua_jabatan','datuk_bandar','kerani_semakan','kerani_pemeriksa','pelulus_pindaan','pentadbir_sistem') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kakitangan';");
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
