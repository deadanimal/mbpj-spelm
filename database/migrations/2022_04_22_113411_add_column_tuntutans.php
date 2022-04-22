<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTuntutans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuntutans', function (Blueprint $table) {
            $table->boolean('lulus_kj')->nullable();
            $table->boolean('lulus_db')->nullable();
            $table->string('tolak_satu_per_tiga_sebab')->nullable();
            $table->string('tolak_sebulan_sebab')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuntutans', function (Blueprint $table) {
            $table->dropColumn('lulus_kj');
            $table->dropColumn('lulus_db');
            $table->dropColumn('tolak_satu_per_tiga_sebab');
            $table->dropColumn('tolak_sebulan_sebab');
        });
    }
}
