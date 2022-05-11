<?php

namespace App\Console\Commands;

use App\Models\Permohonan;
use App\Models\PermohonanTuntutan;
use App\Models\Tuntutan;
use App\Models\UserPermohonan;
use Illuminate\Console\Command;

class Scheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hantartuntutan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk submit semua tuntutan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permohonan = Permohonan::where('lulus_selepas', '=', '1')
            ->where('status_tuntutan', '=', null)
            ->orderByDesc("created_at")
            ->get();

        $asingPermohonan = [];
        foreach ($permohonan as $p) {
            $pt = UserPermohonan::where('permohonan_id', $p->id)->first()->user_id;
            $asingPermohonan[$pt][] = $p;
        }

        foreach ($asingPermohonan as $k => $p) {
            $jumlah_jam_tuntutan = 0;
            $jumlah_total_tuntutan = 0;
            $jumlah_status2 = 0;

            foreach ($p as $pd) {
                $jumlah_jam_tuntutan = $jumlah_jam_tuntutan + $pd->jam_tuntutan;
                $jumlah_total_tuntutan = $jumlah_total_tuntutan + $pd->total_tuntutan;
                $jumlah_status2 = $jumlah_status2 + $pd->status2;
            }

            $tuntutan = Tuntutan::create([
                'jumlah_jam_tuntutan' => $jumlah_jam_tuntutan,
                'jumlah_tuntutan' => $jumlah_total_tuntutan,
                'status' => $jumlah_status2,
                'pegawai_sokong_id' => $p[0]->pegawai_sokong_id,
                'pegawai_lulus_id' => $p[0]->pegawai_lulus_id,
                'user_id' => $k,
            ]);

            foreach ($p as $pd) {

                $permohonan_telah_dituntut = Permohonan::find($pd->id);
                $permohonan_telah_dituntut->status_tuntutan = 1;
                $permohonan_telah_dituntut->save();

                $permohonan_tuntutans = new PermohonanTuntutan;
                $permohonan_tuntutans->tuntutan_id = $tuntutan->id;
                $permohonan_tuntutans->permohonan_id = $pd->id;
                $permohonan_tuntutans->save();
            }

        }

        // return Command::SUCCESS;
    }
}
