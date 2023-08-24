<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBezaJam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->Integer('BEZA_JAM')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->Integer('BEZA_JAM')->nullable();
        });
    }
}
