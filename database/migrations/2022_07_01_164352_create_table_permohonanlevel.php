<?php

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePermohonanLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PermohonanLevel1', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Permohonan::class)->constrained()->onDelete('Cascade');
            $table->string('pegawai_sokong_id');
            $table->string('pegawai_lulus_id');
            $table->foreignIdFor(User::class)->constrained()->onDelete('Cascade');
            $table->timestamps();
        });

        Schema::create('PermohonanLevel2', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Permohonan::class)->constrained()->onDelete('Cascade');
            $table->string('pegawai_sokong_id');
            $table->string('pegawai_lulus_id');
            $table->foreignIdFor(User::class)->constrained()->onDelete('Cascade');
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
        Schema::dropIfExists('PermohonanLevel1');
        Schema::dropIfExists('PermohonanLevel2');
    }
}
