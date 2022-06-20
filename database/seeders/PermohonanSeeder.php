<?php

namespace Database\Seeders;

use App\Models\Permohonan;
use App\Models\UserPermohonan;
use Illuminate\Database\Seeder;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserPermohonan::all()->each(function ($p) {
            $permohonan = Permohonan::find($p->permohonan_id);
            if ($permohonan != null) {
                $permohonan->update([
                    'user_id' => $p->user_id,
                ]);
            }
        });

    }
}
