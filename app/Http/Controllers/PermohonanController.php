<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Ekedatangan;
use App\Models\Jabatan;
use App\Models\Permohonan;
use App\Models\PermohonanTuntutan;
use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PermohonanController extends Controller
{
    public function index(Request $request, Permohonan $permohonan)
    {
        // Kakitangan
        $user_id = $request->user()->id;
        $customerid = $request->user()->user_code;

        $permohonans = User::find($user_id)
            ->permohonans()
            ->orderByDesc("created_at")
            ->get();

        //kakitangan get pengesahan by lulus only

        $pengesahans = User::find($user_id)
            ->permohonans()
            ->where('lulus_sebelum', '=', '1')
            ->orderByDesc("created_at")
            ->get();

        // dd($pengesahans);

        $userspengesahan = User::whereIn('role', array('penyelia', 'ketua_bahagian', 'ketua_jabatan'))->get();

        foreach ($pengesahans as $ps) {
            $pegawai_sokong = User::where("id", $ps->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
            $pegawai_lulus = User::where("id", $ps->pegawai_lulus_id)->first()->name;
            $ps->pegawai_lulus = $pegawai_lulus;

            if ($ps->mohon_mula_kerja != null) {
                $ps->sebenar_mula_kerja = $ps->mohon_mula_kerja;

                $ps->sebenar_mula_kerja_formatted = str_replace(' ', 'T', $ps->mohon_mula_kerja);
            }

            if ($ps->mohon_akhir_kerja != null) {
                $ps->sebenar_akhir_kerja = $ps->mohon_akhir_kerja;

                $ps->sebenar_akhir_kerja_formatted = str_replace(' ', 'T', $ps->mohon_akhir_kerja);
            }
            try {
                $ps->save();
            } catch (\Exception$e) {

            }
        }
        // dd($permohonan);

        //get pegawai pengesah
        // $user_permohonans = UserPermohonan::all();
        // Create pegawai name
        // $pegawai_sokong = User::where('id',$permohonan->pegawai_sokong_id)->first();
        // $permohonan -> pegawai_sokong_name = $pegawai_sokong -> name;
        // $pegawai_lulus = User::where('id',$permohonan->pegawai_lulus_id)->first();
        // $permohonan -> pegawai_lulus_name = $pegawai_lulus -> name;

        // TODO
        // foreach stiap pengesahan
        // utik stiap pengesahan, cari ekedatangan yg sama tarikh
        // tampal data ke dalam pengesahan

        // kedatangan dekat kakitangan _________________________________
        foreach ($pengesahans as $pg) {

            // dd(substr($pg->mohon_mula_kerja,0,10));
            $userekedatangan = Ekedatangan::where('staffno', $customerid)
                ->whereDate('tarikh', "=", substr($pg->mohon_mula_kerja, 0, 10))
                ->first();

            if ($userekedatangan != null) {

                $temptimein = $userekedatangan->clockintime;
                $temptimeout = $userekedatangan->clockouttime;

                //Format clocktime

                $year = substr($temptimein, 0, 4);
                $month = substr($temptimein, 4, 2);
                $day = substr($temptimein, 6, 2);
                $jam = substr($temptimein, 8, 2);
                $minit = substr($temptimein, 10, 2);
                $saat = substr($temptimein, 12, 2);

                $arr = array($year, $month, $day);
                $datetimeoracleyear = implode("-", $arr);

                $are = array($jam, $minit, $saat);
                $datetimeoraclejam = implode(":", $are);

                $ari = array($datetimeoracleyear, $datetimeoraclejam);
                $datetimeoraclein = implode(" ", $ari);

                // format clockouttime

                $year = substr($temptimeout, 0, 4);
                $month = substr($temptimeout, 4, 2);
                $day = substr($temptimeout, 6, 2);
                $jam = substr($temptimeout, 8, 2);
                $minit = substr($temptimeout, 10, 2);
                $saat = substr($temptimeout, 12, 2);

                $arr = array($year, $month, $day);
                $datetimeoracleyear = implode("-", $arr);

                $are = array($jam, $minit, $saat);
                $datetimeoraclejam = implode(":", $are);

                $ari = array($datetimeoracleyear, $datetimeoraclejam);
                $datetimeoracleout = implode(" ", $ari);

                try {
                    $pg->tarikh = $userekedatangan->tarikh;
                    $pg->clockintime = $datetimeoraclein;
                    $pg->clockouttime = $datetimeoracleout;
                    $pg->statusdesc = $userekedatangan->statusdesc;
                    $pg->totalworkinghour = $userekedatangan->totalworkinghour;
                    $pg->totalotduration = $userekedatangan->totalotduration;
                    $pg->waktuanjal = $userekedatangan->waktuanjal;
                } catch (Exception $e) {
                    $pg->tarikh = 'Tiada Rekod';
                    $pg->clockintime = 'Tiada Rekod';
                    $pg->clockouttime = 'Tiada Rekod';
                    $pg->statusdesc = 'Tiada Rekod';
                    $pg->totalworkinghour = 'Tiada Rekod';
                    $pg->totalotduration = 'Tiada Rekod';
                    $pg->waktuanjal = 'Tiada Rekod';
                }
            } else {

                $pg->tarikh = 'Tiada Rekod';
                $pg->clockintime = 'Tiada Rekod';
                $pg->clockouttime = 'Tiada Rekod';
                $pg->statusdesc = 'Tiada Rekod';
                $pg->totalworkinghour = 'Tiada Rekod';
                $pg->totalotduration = 'Tiada Rekod';
                $pg->waktuanjal = 'Tiada Rekod';

            }
        }

        // Sokongan permohonan _____________________

        $permohonan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)
            ->orderByDesc("created_at")
            ->get();

        // dd($permohonan_disokongs);

        foreach ($permohonan_disokongs as $ps) {
            $uid = UserPermohonan::where("permohonan_id", $ps->id)->first()->user_id;
            $pemohon = User::where("id", $uid)->first()->name;
            $ps->nama_pemohon = $pemohon;
        }

        $permohonan_dilulus = Permohonan::where('pegawai_lulus_id', $user_id)
            ->orderByDesc("created_at")
            ->get();

        foreach ($permohonan_dilulus as $pl) {
            $uuid = UserPermohonan::where("permohonan_id", $pl->id)->first()->user_id;
            $pemohon = User::where("id", $uuid)->first()->name;
            $pl->nama_pemohon = $pemohon;
        }

        // Sokongan pengesahan____________________________

        $pengesahan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)
        // to get only list of true permohonan
            ->where('lulus_sebelum', '=', '1')
            ->orderByDesc("created_at")
            ->get();

        foreach ($pengesahan_disokongs as $pes) {
            $uuuid = UserPermohonan::where("permohonan_id", $pes->id)->first()->user_id;
            $pemohon = User::where("id", $uuuid)->first()->name;
            $pes->nama_pemohon = $pemohon;
        }

        foreach ($pengesahan_disokongs as $pgss) {
            // get user ekedtangan by usercode

            ///// $pgss->user_code = User::where('id', $pgss->penguatkuasa_id)->first()->user_code;

            //get user ekedatangan
            $userekedatangan = Ekedatangan::where('staffno', $customerid)
                ->whereDate('tarikh', "=", substr($pgss->mohon_mula_kerja, 0, 10))->first();

            if ($userekedatangan != null) {

                $temptimein = $userekedatangan->clockintime;
                $temptimeout = $userekedatangan->clockouttime;

                //Format clocktime

                $year = substr($temptimein, 0, 4);
                $month = substr($temptimein, 4, 2);
                $day = substr($temptimein, 6, 2);
                $jam = substr($temptimein, 8, 2);
                $minit = substr($temptimein, 10, 2);
                $saat = substr($temptimein, 12, 2);

                $arr = array($year, $month, $day);
                $datetimeoracleyear = implode("-", $arr);

                $are = array($jam, $minit, $saat);
                $datetimeoraclejam = implode(":", $are);

                $ari = array($datetimeoracleyear, $datetimeoraclejam);
                $datetimeoraclein = implode(" ", $ari);

                // format clockouttime

                $year = substr($temptimeout, 0, 4);
                $month = substr($temptimeout, 4, 2);
                $day = substr($temptimeout, 6, 2);
                $jam = substr($temptimeout, 8, 2);
                $minit = substr($temptimeout, 10, 2);
                $saat = substr($temptimeout, 12, 2);

                $arr = array($year, $month, $day);
                $datetimeoracleyear = implode("-", $arr);

                $are = array($jam, $minit, $saat);
                $datetimeoraclejam = implode(":", $are);

                $ari = array($datetimeoracleyear, $datetimeoraclejam);
                $datetimeoracleout = implode(" ", $ari);

                try {
                    $pgss->tarikh = $userekedatangan->tarikh;
                    $pgss->clockintime = $datetimeoraclein;
                    $pgss->clockouttime = $datetimeoracleout;
                    $pgss->statusdesc = $userekedatangan->statusdesc;
                    $pgss->totalworkinghour = $userekedatangan->totalworkinghour;
                    $pgss->totalotduration = $userekedatangan->totalotduration;
                    $pgss->waktuanjal = $userekedatangan->waktuanjal;
                } catch (Exception $e) {
                    $pgss->tarikh = 'Tiada Rekod';
                    $pgss->clockintime = 'Tiada Rekod';
                    $pgss->clockouttime = 'Tiada Rekod';
                    $pgss->statusdesc = 'Tiada Rekod';
                    $pgss->totalworkinghour = 'Tiada Rekod';
                    $pgss->totalotduration = 'Tiada Rekod';
                    $pgss->waktuanjal = 'Tiada Rekod';
                }
            } else {

                $pgss->tarikh = 'Tiada Rekod';
                $pgss->clockintime = 'Tiada Rekod';
                $pgss->clockouttime = 'Tiada Rekod';
                $pgss->statusdesc = 'Tiada Rekod';
                $pgss->totalworkinghour = 'Tiada Rekod';
                $pgss->totalotduration = 'Tiada Rekod';
                $pgss->waktuanjal = 'Tiada Rekod';

            }
        }

        $pengesahan_dilulus = Permohonan::where('pegawai_lulus_id', $user_id)
        // to get only list of true permohonan
            ->where('lulus_sebelum', '=', '1')
            ->orderByDesc("created_at")
            ->get();

        foreach ($pengesahan_dilulus as $pel) {
            $uuuuid = UserPermohonan::where("permohonan_id", $pel->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;
            $pel->nama_pemohon = $pemohon;
        }

        foreach ($pengesahan_dilulus as $pdl) {
            $userekedatangan = Ekedatangan::where('staffno', $customerid)
                ->where('tarikh', ">=", $pdl->mohon_mula_kerja)->first();

            try {
                $pdl->tarikh = $userekedatangan->tarikh;
                $pdl->clockintime = $userekedatangan->clockintime;
                $pdl->clockouttime = $userekedatangan->clockouttime;
                $pdl->statusdesc = $userekedatangan->statusdesc;
                $pdl->totalworkinghour = $userekedatangan->totalworkinghour;
                $pdl->totalotduration = $userekedatangan->totalotduration;
                $pdl->waktuanjal = $userekedatangan->waktuanjal;
            } catch (Exception $e) {
                $pdl->tarikh = 'tiada data';
                $pdl->clockintime = 'tiada data';
                $pdl->clockouttime = 'tiada data';
                $pdl->statusdesc = 'tiada data';
                $pdl->totalworkinghour = 'tiada data';
                $pdl->totalotduration = 'tiada data';
                $pdl->waktuanjal = 'tiada data';
            }
        }

        $user = User::where('id', $user_id)->get();

        $pengguna = User::all();

        // status staff
        $user_permohonan = auth()->user()->permohonans;

        $mohon = $user_permohonan->count();

        $mohon_p = 0;
        $mohon_t = 0;
        $mohon_dp = 0;
        $mohon_lulus = 0;
        $mohon_pengesahan = 0;
        $mohon_gagal = 0;
        $dalam_semakan = 0;
        $mohon_pengesahan_ditolak = 0;
        foreach ($user_permohonan as $up) {
            if ($up->sokong_sebelum === 1 && $up->sokong_selepas === 1) {
                $mohon_p++;
            }
            if ($up->sokong_sebelum === 0 || $up->sokong_selepas === 0) {
                $mohon_t++;
            }
            if ($up->sokong_sebelum === null || $up->sokong_selepas === null) {
                $mohon_dp++;
            }

            if ($up->lulus_sebelum === 1) {
                $mohon_lulus++;
            }
            if ($up->lulus_selepas == 1) {
                $mohon_pengesahan++;
            }
            if ($up->lulus_selepas === 0) {
                $mohon_pengesahan_ditolak++;
            }
            if ($up->lulus_sebelum === 0 || $up->lulus_selepas === 0) {
                $mohon_gagal++;
            }
            if ($up->lulus_selepas === null && $up->sokong_sebelum === null) {
                $new[] = $up->id;
                $dalam_semakan++;
            }

        }

        // status penyelia
        $p_sokong_all = DB::table('permohonans')
            ->where('pegawai_sokong_id', '=', $user_id)
            ->count();
        $p_sokong = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_sebelum', '=', '1']])
            ->count();
        $p_tolak_sokong = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_sebelum', '=', '0']])
            ->count();
        $p_sokong_proses = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_sebelum', '=', null]])
            ->count();

        $p_lulus_all = DB::table('permohonans')
            ->where('pegawai_lulus_id', '=', $user_id)
            ->count();
        $p_lulus = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_sebelum', '=', '1']])
            ->count();
        $p_tolak_lulus = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_sebelum', '=', '0']])
            ->count();
        $p_lulus_proses = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_sebelum', '=', null]])
            ->count();

        // status kb

        $p_sokong_selepas_all = DB::table('permohonans')
            ->where('pegawai_sokong_id', '=', $user_id)
            ->count();
        $p_sokong_selepas = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_selepas', '=', '1']])
            ->count();
        $p_tolak_sokong_selepas = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_selepas', '=', '0']])
            ->count();
        $p_sokong_selepas_proses = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user_id], ['sokong_selepas', '=', null]])
            ->count();

        $p_lulus_selepas_all = DB::table('permohonans')
            ->where('pegawai_lulus_id', '=', $user_id)
            ->count();
        $p_lulus_selepas = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_selepas', '=', '1']])
            ->count();
        $p_tolak_lulus_selepas = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_selepas', '=', '0']])
            ->count();
        $p_lulus_selepas_proses = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user_id], ['lulus_selepas', '=', null]])
            ->count();

        $data = [
            'permohonans' => $permohonans,
            'pengesahans' => $pengesahans,
            'permohonan_disokongs' => $permohonan_disokongs,
            'permohonan_dilulus' => $permohonan_dilulus,
            'pengesahan_disokongs' => $pengesahan_disokongs,
            'pengesahan_dilulus' => $pengesahan_dilulus,
            'user' => $user,
            'mohon' => $mohon,
            'pengguna' => $pengguna,
            'mohon_p' => $mohon_p,
            'mohon_t' => $mohon_t,
            'mohon_dp' => $mohon_dp,
            'mohon_lulus' => $mohon_lulus,
            'mohon_gagal' => $mohon_gagal,
            'mohon_pengesahan' => $mohon_pengesahan,
            'mohon_pengesahan_ditolak' => $mohon_pengesahan_ditolak,
            'dalam_semakan' => $dalam_semakan,

            'p_sokong_all' => $p_sokong_all,
            'p_sokong' => $p_sokong,
            'p_tolak_sokong' => $p_tolak_sokong,
            'p_sokong_proses' => $p_sokong_proses,
            'p_lulus_all' => $p_lulus_all,
            'p_lulus' => $p_lulus,
            'p_tolak_lulus' => $p_tolak_lulus,
            'p_lulus_proses' => $p_lulus_proses,

            'p_sokong_selepas_all' => $p_sokong_selepas_all,
            'p_sokong_selepas' => $p_sokong_selepas,
            'p_tolak_sokong_selepas' => $p_tolak_sokong_selepas,
            'p_sokong_selepas_proses' => $p_sokong_selepas_proses,
            'p_lulus_selepas_all' => $p_lulus_selepas_all,
            'p_lulus_selepas' => $p_lulus_selepas,
            'p_tolak_lulus_selepas' => $p_tolak_lulus_selepas,
            'p_lulus_selepas_proses' => $p_lulus_selepas_proses,

            // 'userekedatangan'=>$userekedatangan,
            'customerid' => $customerid,
            'userspengesahan' => $userspengesahan,
            // 'permohonan'=> $permohonan,
            // 'user_permohonans'=>$user_permohonans,
        ];

        switch (auth()->user()->role) {
            case 'kakitangan':
            case 'kerani_semakan':
            case 'kerani_pemeriksa':
                return view('permohonan.index.default', $data);
                break;

            case 'penyelia':
                return view('permohonan.index.penyelia', $data);
                break;

            case 'ketua_bahagian':
            case 'ketua_jabatan':
                return view('permohonan.index.ketua', $data);
                break;
            default:
                abort(404);
                break;
        }
    }

    public function create(Request $request)
    {
        $pegawailulus = User::whereIn('role', array('ketua_jabatan', 'ketua_bahagian'))->get();
        $pegawaisokong = User::whereIn('role', array('ketua_bahagian', 'penyelia'))->get();

        $pemohon = User::whereIn('role', array('kakitangan', 'kerani_pemeriksa', 'kerani_semakan'))
            ->where('status', 'aktif')
            ->get();

        $jabatan_user = auth()->user()->usercode->HR_JABATAN;
        $jabatan_penguatkuasa = Jabatan::where('GE_KETERANGAN_JABATAN', 'JABATAN PENGUATKUASAAN')
            ->first()->GE_KOD_JABATAN; // 11

        $userJabatanPenguatkuasa = false;
        if ($jabatan_user == $jabatan_penguatkuasa) {
            $userJabatanPenguatkuasa = true;
        }

        return view('permohonan.create', compact([
            'pegawailulus', 'pegawaisokong', 'pemohon', 'userJabatanPenguatkuasa',
        ]));
    }

    public function store(Request $request)
    {

        if ($request->jenis_permohonan == 'individu') {
            $permohonan = new Permohonan;

            $mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));
            $mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));

            // check beza jam kalau lebih 12 jam return back
            $mula_kerja = strtotime($request->mohon_mula_kerja);
            $akhir_kerja = strtotime($request->mohon_akhir_kerja);
            $beza_jam = ($akhir_kerja - $mula_kerja) / 3600;

            if ($beza_jam > 12) {
                return redirect()->back()->withErrors(['error_jam' => 'Jumlah jam permohonan kerja lebih masa  anda melebihi had masa 12 jam']);
            }

            // check date kalau x sama return back
            $tarikh_mula = date("d", strtotime($request->mohon_mula_kerja));
            $tarikh_akhir = date("d", strtotime($request->mohon_akhir_kerja));

            if ($tarikh_mula != $tarikh_akhir) {
                return redirect()->back()->withErrors(['error_tarikh' => 'Sila buat permohonan asing untuk tarikh berbeza']);
            }

            $masa_akhir = date("H:i", strtotime($request->mohon_akhir_kerja));
            $masa_mula = date("H:i", strtotime($request->mohon_mula_kerja));

            if ($masa_akhir < $masa_mula) {
                return redirect()->back()->withErrors(['error_jam' => 'Masa mula melebihi masa tamat']);
            }

            $permohonan->mohon_mula_kerja = $mohon_mula_kerja;
            $permohonan->mohon_akhir_kerja = $mohon_akhir_kerja;
            $permohonan->lokasi = $request->lokasi;
            $permohonan->tujuan = $request->tujuan;
            $permohonan->jenis_permohonan = $request->jenis_permohonan;
            $permohonan->pegawai_sokong_id = $request->pegawai_sokong_id;
            $permohonan->pegawai_lulus_id = $request->pegawai_lulus_id;
            $permohonan->p_pegawai_sokong_id = $request->pegawai_sokong_id;
            $permohonan->p_pegawai_lulus_id = $request->pegawai_lulus_id;
            $permohonan->jenis_masa = $request->jenis_masa;

            $permohonan->save();

            $audit = new Audit;
            $audit->user_id = auth()->user()->id;
            $audit->name = auth()->user()->name;
            $audit->peranan = auth()->user()->role;
            $audit->description = 'Tambah Permohonan Jenis: ' . $permohonan->jenis_permohonan;
            $audit->save();

            $user_permohonan = new UserPermohonan;
            $user_permohonan->user_id = auth()->user()->id;
            $user_permohonan->permohonan_id = $permohonan->id;
            $user_permohonan->save();

        }

        if ($request->jenis_permohonan == 'berkumpulan') {
            for ($i = 0; $i < count($request->pemohon); $i++) {
                $permohonan = new Permohonan;

                $mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));
                $mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));

                $mula_kerja = strtotime($request->mohon_mula_kerja);
                $akhir_kerja = strtotime($request->mohon_akhir_kerja);
                $beza_jam = ($akhir_kerja - $mula_kerja) / 3600;

                if ($beza_jam > 12) {
                    return redirect()->back()->withErrors(['error_jam' => 'Jumlah jam permohonan kerja lebih masa  anda melebihi had masa 12 jam']);
                }

                $tarikh_mula = date("d", strtotime($request->mohon_mula_kerja));
                $tarikh_akhir = date("d", strtotime($request->mohon_akhir_kerja));

                if ($tarikh_mula != $tarikh_akhir) {
                    return redirect()->back()->withErrors(['error_tarikh' => 'Sila buat permohonan asing untuk tarikh berbeza']);
                }

                // $permohonan = Permohonan::create($request->all());
                $permohonan->mohon_mula_kerja = $mohon_mula_kerja;
                $permohonan->mohon_akhir_kerja = $mohon_akhir_kerja;
                $permohonan->lokasi = $request->lokasi;
                $permohonan->tujuan = $request->tujuan;
                $permohonan->jenis_permohonan = $request->jenis_permohonan;
                $permohonan->pegawai_sokong_id = $request->pegawai_sokong_id;
                $permohonan->pegawai_lulus_id = $request->pegawai_lulus_id;
                $permohonan->p_pegawai_sokong_id = $request->pegawai_sokong_id;
                $permohonan->p_pegawai_lulus_id = $request->pegawai_lulus_id;
                $permohonan->save();

                // Audit::create([
                //     'user_id' => auth()->user()->id,
                //     'name' => auth()->user()->name,
                //     'peranan' => auth()->user()->role,
                //     'description' => 'Tambah Permohonan Jenis: ' . $permohonan->jenis_permohonan,
                //     'permohonan_id' => $permohonan->id,
                // ]);
                $audit = new Audit;
                $audit->user_id = auth()->user()->id;
                $audit->name = auth()->user()->name;
                $audit->peranan = auth()->user()->role;
                $audit->description = 'Tambah Permohonan Jenis: ' . $permohonan->jenis_permohonan;
                $audit->save();

                $user_dipohon = User::where('nric', $request->pemohon[$i])->first();

                // UserPermohonan::create([
                //     'user_id' => $user_dipohon->id,
                //     'permohonan_id' => $permohonan->id,
                // ]);
                $user_permohonan = new UserPermohonan;
                $user_permohonan->user_id = $user_dipohon->id;
                $user_permohonan->permohonan_id = $permohonan->id;
                $user_permohonan->save();
            }
        }

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);
    }

    public function show(Permohonan $permohonan)
    {
        return view('permohonan.show', [
            'permohonan' => $permohonan,
        ]);
    }
    public function edit(Request $request, Permohonan $permohonan)
    {
        // Create  option on select pegawai

        $users = User::whereIn('role', array('penyelia', 'ketua_bahagian', 'ketua_jabatan'))->get();
        $user_permohonans = UserPermohonan::all();

        //  Create pegawai name

        $pegawai_sokong = User::where('id', $permohonan->pegawai_sokong_id)->first();
        $permohonan->pegawai_sokong_name = $pegawai_sokong->name;

        $pegawai_lulus = User::where('id', $permohonan->pegawai_lulus_id)->first();
        $permohonan->pegawai_lulus_name = $pegawai_lulus->name;

        // Create kakitangan permohonan list

        $kakitanganpermohonans = UserPermohonan::where('permohonan_id', '=', $permohonan->id)->get();

        // Create  option on select kakitangan

        $kakitangan = User::whereIn('role', array('penyelia', 'kakitangan', 'kerani_semakan', 'kerani_pemeriksa'))->get();

        // Create  other obj to get user attributes

        $user_permohonans_maklumat_all = [];
        foreach ($kakitanganpermohonans as $up) {
            $tmp = User::where("id", $up->user_id)->first();
            $user_permohonans_maklumat = (object) [];
            $user_permohonans_maklumat->nama = $tmp->name;
            $user_permohonans_maklumat->permohonan_id = $up->permohonan_id;
            $user_permohonans_maklumat->email = $tmp->email;
            $user_permohonans_maklumat->nric = $tmp->nric;
            $user_permohonans_maklumat->id = $up->id;
            $user_permohonans_maklumat_all[] = $user_permohonans_maklumat;
        }

        $jabatan_user = auth()->user()->usercode->HR_JABATAN;
        $jabatan_penguatkuasa = Jabatan::where('GE_KETERANGAN_JABATAN', 'JABATAN PENGUATKUASAAN')
            ->first()->GE_KOD_JABATAN; // 11

        $userJabatanPenguatkuasa = false;
        if ($jabatan_user == $jabatan_penguatkuasa) {
            $userJabatanPenguatkuasa = true;
        }

        return view('permohonan.edit', [
            'permohonan' => $permohonan,
            'users' => $users,
            'user_permohonans' => $user_permohonans,
            'kakitangan' => $kakitangan,
            'kakitanganpermohonans' => $user_permohonans_maklumat_all,
            'userJabatanPenguatkuasa' => $userJabatanPenguatkuasa,
        ]);
    }
    public function update(Request $request, Permohonan $permohonan)
    {
        if ($request->mohon_mula_kerja) {
            $mohon_mula_kerja = $request->mohon_mula_kerja;
            $permohonan->mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));
        }

        if ($request->mohon_akhir_kerja) {
            $mohon_akhir_kerja = $request->mohon_akhir_kerja;
            $permohonan->mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));
        }

        $permohonan->lokasi = $request->lokasi;
        $permohonan->tujuan = $request->tujuan;
        $permohonan->pegawai_sokong_id = $request->pegawai_sokong_id;
        $permohonan->pegawai_lulus_id = $request->pegawai_lulus_id;
        $permohonan->p_pegawai_sokong_id = $request->pegawai_sokong_id;
        $permohonan->p_pegawai_lulus_id = $request->pegawai_lulus_id;
        $permohonan->jenis_masa = $request->jenis_masa;

        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);
    }
    public function destroy(Request $request, Permohonan $permohonan)
    {

        if ($permohonan) {
            if ($permohonan->delete()) {

                $redirected_url = '/permohonans/';
                return redirect($redirected_url)->with('buang');
            } else {
                return "something wrong";
            }
        } else {
            return "not exist";
        }
    }
    public function sokong_sebelum($id)
    {

        $permohonan = Permohonan::find($id);
        $permohonan->sokong_sebelum = true;
        $permohonan->tarikh_sokong = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function tolak_sokong_sebelum(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->sokong_sebelum = false;
        $permohonan->tarikh_sokong = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->sokong_sebelum_sebab = $request->sokong_sebelum_sebab;

        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function lulus_sebelum($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->lulus_sebelum = true;
        $permohonan->tarikh_lulus = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function tolak_lulus_sebelum(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->lulus_sebelum = false;
        $permohonan->tarikh_lulus = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->lulus_sebelum_sebab = $request->lulus_sebelum_sebab;

        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function sebenar_mula_akhir_kerja(Request $request)
    {

        $permohonan = Permohonan::find($request->id);
        $sebenar_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));
        $sebenar_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));
        // $sebenar_mula_kerja = $request->mohon_mula_kerja;
        // $sebenar_akhir_kerja = $request->mohon_akhir_kerja;
        $permohonan->sebenar_mula_kerja = $sebenar_mula_kerja;
        $permohonan->sebenar_akhir_kerja = $sebenar_akhir_kerja;

        $permohonan->save();

        Session::put('permohonan_id', $permohonan);

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function sokong_selepas($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->sokong_selepas = true;
        $permohonan->tarikh_sokong_selepas_ = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function tolak_sokong_selepas(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->sokong_selepas = false;
        $permohonan->tarikh_sokong_selepas_ = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->sokong_selepas_sebab = $request->sokong_selepas_sebab;

        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function lulus_selepas($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->lulus_selepas = true;
        $permohonan->tarikh_lulus_selepas = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function tolak_lulus_selepas(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan->lulus_selepas = false;
        $permohonan->tarikh_lulus_selepas = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->lulus_selepas_sebab = $request->lulus_selepas_sebab;

        $permohonan->save();

        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function kemaskini_masa_mula(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_mula_kerja = $request->masa_sebenar_baru_mula;
        $permohonan->save();
    }
    public function kemaskini_masa_akhir(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_akhir_kerja = $request->masa_sebenar_baru_akhir;
        $permohonan->save();
    }

    public function kemaskini_masa_mula_saya(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_mula_kerja = $request->masa_sebenar_baru_mula_saya;
        $permohonan->save();
    }
    public function kemaskini_masa_akhir_saya(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_akhir_kerja = $request->masa_sebenar_baru_akhir_saya;
        $permohonan->save();
    }

    public function kemaskini_jam_tuntutan(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->jam_tuntutan = $request->kemaskini_jam_tuntutan;
        $permohonan->save();
    }
    public function kemaskini_total_tuntutan(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->total_tuntutan = $request->kemaskini_total_tuntutan;
        $permohonan->save();
    }
    public function kemaskini_status2(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->status2 = $request->kemaskini_status2;
        $permohonan->save();
    }
    public function jana_tuntutan(Request $request)
    {
        // Aku ambik smua data permohonan filter by (current user), (current month), (lulus_selepas==1)
        // for each stiap permohonan
        // create satu tuntutan
        //$user = User::where('')
        //$permohonan_dihantar = Permohonan::where('user_id', $request->user()->id)
        //    ->where('lulus_selepas', 1)->get();
        // checking

        $permohonan_dihantar = User::find($request->user()->id)
            ->permohonans()
            ->where('lulus_selepas', '1')
            ->where('status_tuntutan', '=', null)
            ->orderByDesc("created_at")
            ->get();

        if (count($permohonan_dihantar) == 0) {
            $redirected_url = '/tuntutans/';
            return redirect($redirected_url)
                ->with('status_tuntutan', 'Tiada Data Permohonan Tuntutan');
        }

        $jumlah_jam_tuntutan = 0;
        $jumlah_total_tuntutan = 0;
        $jumlah_status2 = 0;

        foreach ($permohonan_dihantar as $pd) {
            $jumlah_jam_tuntutan = $jumlah_jam_tuntutan + $pd->jam_tuntutan;
            $jumlah_total_tuntutan = $jumlah_total_tuntutan + $pd->total_tuntutan;
            $jumlah_status2 = $jumlah_status2 + $pd->status2;
        }

        $tuntutan = new Tuntutan;

        //$sebenar_mula_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_mula_kerja_tuntutan));
        //$sebenar_akhir_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_akhir_kerja_tuntutan));
        //$tuntutan->sebenar_mula_kerja_tuntutan = $sebenar_mula_kerja_tuntutan;
        //$tuntutan->sebenar_akhir_kerja_tuntutan = $sebenar_akhir_kerja_tuntutan ;
        $tuntutan->jumlah_jam_tuntutan = $jumlah_jam_tuntutan;
        $tuntutan->jumlah_tuntutan = $jumlah_total_tuntutan;
        $tuntutan->status = $jumlah_status2;
        $tuntutan->pegawai_sokong_id = $permohonan_dihantar[0]->pegawai_sokong_id;
        $tuntutan->pegawai_lulus_id = $permohonan_dihantar[0]->pegawai_lulus_id;

        $tuntutan->user_id = $request->user()->id;

        $tuntutan->save();

        foreach ($permohonan_dihantar as $pd) {

            // update permohonan
            $permohonan_telah_dituntut = Permohonan::find($pd->id);
            $permohonan_telah_dituntut->status_tuntutan = 1;

            // //update jumlah jam
            // $permohonan_telah_dituntut->jumlah_biasa_siang = $permohonan_telah_dituntut->jam_kerja_am_siang;
            // $permohonan_telah_dituntut->jumlah_biasa_malam = $permohonan_telah_dituntut->jam_kerja_am_malam;
            // $permohonan_telah_dituntut->jumlah_rehat_siang = $permohonan_telah_dituntut->jam_kerja_cuti_siang;
            // $permohonan_telah_dituntut->jumlah_rehat_malam = $permohonan_telah_dituntut->jam_kerja_cuti_malam;
            // $permohonan_telah_dituntut->jumlah_am_siang = $permohonan_telah_dituntut->jam_kerja_biasa_siang;
            // $permohonan_telah_dituntut->jumlah_am_malam = $permohonan_telah_dituntut->jam_kerja_biasa_malam;

            $permohonan_telah_dituntut->save();

            $permohonan_tuntutans = new PermohonanTuntutan;
            $permohonan_tuntutans->tuntutan_id = $tuntutan->id;
            $permohonan_tuntutans->permohonan_id = $pd->id;
            $permohonan_tuntutans->save();
        }

        // $permohonan_tuntutans->permohonan_id = $request->user()->id;

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function kemaskinipegawaipengesah(Request $request, Permohonan $permohonan)
    {
        $permohonan->update([
            'p_pegawai_sokong_id' => $request->p_pegawai_sokong_id,
            'p_pegawai_lulus_id' => $request->p_pegawai_lulus_id,
        ]);
        $redirected_url = '/permohonans/';
        return redirect($redirected_url);

    }
    public function SokongAll(Request $request)
    {
        $ids = $request->ids;
        // DB::table("permohonans")->whereIn('id',explode(",",$ids))->delete();
        DB::table("permohonans")->whereIn('id', explode(",", $ids))();
        return response()->json(['success' => "Sokong successfully."]);
    }

    public function update_masa_mula_akhir(Request $request, Permohonan $permohonan)
    {
        $permohonan->update([
            'sebenar_mula_kerja' => $request->masa_mula,
            'sebenar_akhir_kerja' => $request->masa_akhir,
            'sah_mula_kerja' => 1,
        ]);
        return back();
    }

    public function update_jenis_masa(Request $request)
    {
        $permohonan = Permohonan::find($request->id);

        $permohonan->update([
            'jenis_masa' => $request->jenis_masa,
        ]);

        return response()->json();

    }

}
