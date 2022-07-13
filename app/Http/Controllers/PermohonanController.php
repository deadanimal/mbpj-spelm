<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Ekedatangan;
use App\Models\Jabatan;
use App\Models\Permohonan;
use App\Models\PermohonanLevel1;
use App\Models\PermohonanLevel2;
use App\Models\PermohonanTuntutan;
use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PermohonanController extends Controller
{
    public function index(Permohonan $permohonan)
    {
        $user = auth()->user();

        $permohonans = $user
            ->permohonans()
            ->whereNull('lulus_sebelum')
            ->orderByDesc("created_at")
            ->get();

        $pengesahans = Permohonan::where([
            ['lulus_sebelum', '1'],
            ['user_id', auth()->id()],
        ])->whereNull('lulus_selepas')
            ->get()
            ->each(function ($ps) {
                $ps->update([
                    'sebenar_mula_kerja' => $ps->mohon_mula_kerja,
                    'sebenar_akhir_kerja' => $ps->mohon_akhir_kerja,
                ]);

                $ps->sebenar_mula_kerja_formatted = str_replace(' ', 'T', $ps->mohon_mula_kerja);
                $ps->sebenar_akhir_kerja_formatted = str_replace(' ', 'T', $ps->mohon_akhir_kerja);

            });

        function eKedatangan($user, $pengesahans, $jenis)
        {
            foreach ($pengesahans as $p) {
                if ($user->user_code !== null) {

                    switch ($jenis) {
                        case 'pengesahan':
                        case 'pengesahan_sokong':
                            $userekedatangan = Ekedatangan::where('staffno', $user->user_code)
                                ->whereDate('tarikh', "=", substr($p->mohon_mula_kerja, 0, 10))
                                ->first();
                            break;
                        case 'pengesahan_lulus':
                            $userekedatangan = Ekedatangan::where('staffno', $user->user_code)
                                ->where('tarikh', ">=", $p->mohon_mula_kerja)->first();
                            break;
                    }

                    if ($userekedatangan) {
                        $datetimeoraclein = timeInOut($userekedatangan->clockintime);
                        $datetimeoracleout = timeInOut($userekedatangan->clockouttime);
                    } else {
                        $datetimeoraclein = 'Tiada Rekod';
                        $datetimeoracleout = 'Tiada Rekod';
                    }
                }

                $p->tarikh = $userekedatangan->tarikh ?? 'Tiada Rekod';
                $p->clockintime = $datetimeoraclein;
                $p->clockouttime = $datetimeoracleout;
                $p->statusdesc = $userekedatangan->statusdesc ?? 'Tiada Rekod';
                $p->totalworkinghour = $userekedatangan->totalworkinghour ?? 'Tiada Rekod';
                $p->totalotduration = $userekedatangan->totalotduration ?? 'Tiada Rekod';
                $p->waktuanjal = $userekedatangan->waktuanjal ?? 'Tiada Rekod';
            }

            return $pengesahans;
        }

        function timeInOut($temptime)
        {
            $year = substr($temptime, 0, 4);
            $month = substr($temptime, 4, 2);
            $day = substr($temptime, 6, 2);
            $jam = substr($temptime, 8, 2);
            $minit = substr($temptime, 10, 2);
            $saat = substr($temptime, 12, 2);

            $arr = array($year, $month, $day);
            $datetimeoracleyear = implode("-", $arr);

            $are = array($jam, $minit, $saat);
            $datetimeoraclejam = implode(":", $are);

            $ari = array($datetimeoracleyear, $datetimeoraclejam);
            $datetimeoracle = implode(" ", $ari);

            return $datetimeoracle;
        }

        $pengesahans = eKedatangan($user, $pengesahans, 'pengesahan');

        $permohonanLevel2 = PermohonanLevel2::with('permohonan')->where('user_id', auth()->id())->get();

        $permohonanLevel2 = eKedatangan($user, $permohonanLevel2, 'pengesahan');

        $userspengesahan = User::whereIn('role', array('penyelia', 'ketua_bahagian', 'ketua_jabatan'))->get();

        $permohonan_disokongs = Permohonan::with('user')->where('pegawai_sokong_id', $user->id)
            ->orderBy("created_at", "desc")
            ->get();
        $permohonan_dilulus = Permohonan::with('user')->where('pegawai_lulus_id', $user->id)
            ->orderByDesc("created_at")
            ->get();

        $pengesahan_disokongs = Permohonan::with('user')->where('pegawai_sokong_id', $user->id)
            ->where('lulus_sebelum', '=', '1')
            ->orderByDesc("created_at")
            ->get();

        $pengesahan_disokongs = eKedatangan($user, $pengesahan_disokongs, 'pengesahan_sokong');

        $pengesahan_dilulus = Permohonan::with('user')->where('pegawai_lulus_id', $user->id)
            ->where('lulus_sebelum', '=', '1')
            ->orderByDesc("created_at")
            ->get();

        $pengesahan_dilulus = eKedatangan($user, $pengesahan_dilulus, 'pengesahan_lulus');

        $mohon_p = 0;
        $mohon_t = 0;
        $mohon_dp = 0;
        $mohon_lulus = 0;
        $mohon_pengesahan = 0;
        $mohon_gagal = 0;
        $dalam_semakan = 0;
        $mohon_pengesahan_ditolak = 0;
        foreach ($permohonans as $up) {
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
            ->where('pegawai_sokong_id', '=', $user->id)
            ->count();
        $p_sokong = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_sebelum', '=', '1']])
            ->count();
        $p_tolak_sokong = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_sebelum', '=', '0']])
            ->count();
        $p_sokong_proses = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_sebelum', '=', null]])
            ->count();

        $p_lulus_all = DB::table('permohonans')
            ->where('pegawai_lulus_id', '=', $user->id)
            ->count();
        $p_lulus = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_sebelum', '=', '1']])
            ->count();
        $p_tolak_lulus = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_sebelum', '=', '0']])
            ->count();
        $p_lulus_proses = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_sebelum', '=', null]])
            ->count();

        // status kb

        $p_sokong_selepas_all = DB::table('permohonans')
            ->where('pegawai_sokong_id', '=', $user->id)
            ->count();
        $p_sokong_selepas = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_selepas', '=', '1']])
            ->count();
        $p_tolak_sokong_selepas = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_selepas', '=', '0']])
            ->count();
        $p_sokong_selepas_proses = DB::table('permohonans')
            ->where([['pegawai_sokong_id', '=', $user->id], ['sokong_selepas', '=', null]])
            ->count();

        $p_lulus_selepas_all = DB::table('permohonans')
            ->where('pegawai_lulus_id', '=', $user->id)
            ->count();
        $p_lulus_selepas = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_selepas', '=', '1']])
            ->count();
        $p_tolak_lulus_selepas = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_selepas', '=', '0']])
            ->count();
        $p_lulus_selepas_proses = DB::table('permohonans')
            ->where([['pegawai_lulus_id', '=', $user->id], ['lulus_selepas', '=', null]])
            ->count();

        $data = [
            'permohonans' => $permohonans,
            'pengesahans' => $pengesahans,
            'permohonan_disokongs' => $permohonan_disokongs,
            'permohonan_dilulus' => $permohonan_dilulus,
            'pengesahan_disokongs' => $pengesahan_disokongs,
            'pengesahan_dilulus' => $pengesahan_dilulus,
            'user' => $user,
            'mohon' => $permohonans->count(),
            'pengguna' => User::all(),
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

            'customerid' => $user->user_code,
            'userspengesahan' => $userspengesahan,
            'permohonanLevel1' => PermohonanLevel1::with('permohonan')->where('user_id', auth()->id())->get(),
            'permohonanLevel2' => $permohonanLevel2,
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
        abort_if(auth()->user()->usercode == null, 466);

        $pemohon = User::whereIn('role', array('kakitangan', 'penyelia', 'kerani_pemeriksa', 'kerani_semakan'))
            ->where('status', 'aktif')
            ->get();

        $jabatan_user = auth()->user()->usercode->HR_JABATAN;

        $pegawailulusAll = User::whereIn('role', array('ketua_jabatan', 'ketua_bahagian'))->get();
        $pegawaisokongAll = User::whereIn('role', array('ketua_bahagian', 'penyelia'))->get();

        $pegawailulus = [];
        $pegawaisokong = [];

        foreach ($pegawailulusAll as $pl) {
            if (isset($pl->usercode)) {
                if ($pl->usercode->HR_JABATAN == $jabatan_user) {
                    array_push($pegawailulus, $pl);
                }
            }
        }
        foreach ($pegawaisokongAll as $ps) {
            if (isset($ps->usercode)) {
                if ($ps->usercode->HR_JABATAN == $jabatan_user) {
                    array_push($pegawaisokong, $ps);
                }
            }
        }
        $jabatan_penguatkuasa = Jabatan::where('GE_KETERANGAN_JABATAN', 'JABATAN PENGUATKUASAAN')
            ->first()->GE_KOD_JABATAN; // 11

        $userJabatanPenguatkuasa = false;
        if ($jabatan_user == $jabatan_penguatkuasa) {
            $userJabatanPenguatkuasa = true;
        }
        if ($jabatan_penguatkuasa == null) {
            $userJabatanPenguatkuasa = false;
        }

        return view('permohonan.create', compact([
            'pegawailulus', 'pegawaisokong', 'pemohon', 'userJabatanPenguatkuasa',
        ]));
    }

    public function store(Request $request)
    {
        $pemohon = explode(',', $request->pemohon);

        if ($request->jenis_permohonan == 'individu') {
            $permohonan = new Permohonan;

            $mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));

            $tarikh = date("Y-m-d", strtotime($request->mohon_mula_kerja));
            $mohon_akhir_kerja = $tarikh . " " . $request->mohon_akhir_kerja . ":00";
            $mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($mohon_akhir_kerja));

            // check beza jam kalau lebih 12 jam return back
            $mula_kerja = strtotime($request->mohon_mula_kerja);
            $akhir_kerja = strtotime($request->mohon_akhir_kerja);
            $beza_jam = ($akhir_kerja - $mula_kerja) / 3600;

            // if ($beza_jam > 12) {
            //     return redirect()->back()->withErrors(['error_jam' => 'Jumlah jam permohonan kerja lebih masa  anda melebihi had masa 12 jam']);
            // }

            // check date kalau x sama return back
            $tarikh_mula = date("d", strtotime($request->mohon_mula_kerja));
            $tarikh_akhir = date("d", strtotime($request->mohon_akhir_kerja));

            if ($tarikh_mula != $tarikh_akhir) {
                return redirect()->back()->withErrors(['error_tarikh' => 'Sila buat permohonan asing untuk tarikh berbeza']);
            }

            $masa_mula = date("H:i", strtotime($request->mohon_mula_kerja));
            $masa_akhir = date("H:i", strtotime($request->mohon_akhir_kerja));
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
            $permohonan->user_id = auth()->id();
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
            for ($i = 0; $i < count($pemohon); $i++) {
                $permohonan = new Permohonan;

                $mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));

                $tarikh = date("Y-m-d", strtotime($request->mohon_mula_kerja));
                $mohon_akhir_kerja = $tarikh . " " . $request->mohon_akhir_kerja . ":00";
                $mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($mohon_akhir_kerja));

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

                $user_dipohon = User::where('nric', $pemohon[$i])->first();

                $permohonan->mohon_mula_kerja = $mohon_mula_kerja;
                $permohonan->mohon_akhir_kerja = $mohon_akhir_kerja;
                $permohonan->lokasi = $request->lokasi;
                $permohonan->tujuan = $request->tujuan;
                $permohonan->jenis_permohonan = $request->jenis_permohonan;
                $permohonan->pegawai_sokong_id = $request->pegawai_sokong_id;
                $permohonan->pegawai_lulus_id = $request->pegawai_lulus_id;
                $permohonan->p_pegawai_sokong_id = $request->pegawai_sokong_id;
                $permohonan->p_pegawai_lulus_id = $request->pegawai_lulus_id;
                $permohonan->user_id = $user_dipohon->id;
                $permohonan->save();

                $audit = new Audit;
                $audit->user_id = auth()->user()->id;
                $audit->name = auth()->user()->name;
                $audit->peranan = auth()->user()->role;
                $audit->description = 'Tambah Permohonan Jenis: ' . $permohonan->jenis_permohonan;
                $audit->save();

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

        $pegawai_sokong = User::whereIn('role', array('penyelia', 'ketua_bahagian'))->where('id', $permohonan->pegawai_sokong_id)->first();
        $permohonan->pegawai_sokong_name = $pegawai_sokong->name;

        $pegawai_lulus = User::whereIn('role', array('ketua_jabatan', 'ketua_bahagian'))->where('id', $permohonan->pegawai_lulus_id)->first();
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
        if ($jabatan_penguatkuasa == null) {
            $userJabatanPenguatkuasa = false;
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
        $permohonan->tarikh_lulus = now()->format('Y-m-d H:i:s');
        $permohonan->save();

        PermohonanLevel1::create([
            'permohonan_id' => $permohonan->id,
            'pegawai_sokong_id' => $permohonan->pegawai_sokong_id,
            'pegawai_lulus_id' => $permohonan->pegawai_lulus_id,
            'user_id' => $permohonan->user_id,
        ]);

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

        PermohonanLevel2::create([
            'permohonan_id' => $permohonan->id,
            'pegawai_sokong_id' => $permohonan->pegawai_sokong_id,
            'pegawai_lulus_id' => $permohonan->pegawai_lulus_id,
            'user_id' => $permohonan->user_id,
        ]);

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
    public function kemaskini_masa_akhir_saya(Request $request)
    {
        Permohonan::find($request->permohonan_id)->update([
            'sebenar_akhir_kerja' => $request->masa_sebenar_baru_akhir_saya,
        ]);
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

    public function SubmitAll(Request $request)
    {
        switch ($request->jenis) {
            case 'sokong':
                Permohonan::find($request->permohonan_id)->update([
                    'sokong_sebelum' => $request->kelulusan,
                    'tarikh_sokong' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                break;
            case 'lulus':
                Permohonan::find($request->permohonan_id)->update([
                    'lulus_sebelum' => $request->kelulusan,
                    'tarikh_lulus' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                break;
            case 'sokongPengesahan':
                Permohonan::find($request->permohonan_id)->update([
                    'sokong_selepas' => $request->kelulusan,
                    'tarikh_sokong_selepas_' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                break;
            case 'lulusPengesahan':
                Permohonan::find($request->permohonan_id)->update([
                    'lulus_selepas' => $request->kelulusan,
                    'tarikh_lulus_selepas' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                break;
        }

    }

    public function update_masa_mula_akhir(Request $request, Permohonan $permohonan)
    {
        $permohonan->update([
            'sebenar_mula_kerja' => $request->masa_mula,
            'sebenar_akhir_kerja' => $request->masa_akhir,
            'sah_mula_kerja' => 1,
        ]);
        return redirect('/permohonans');
    }

    public function update_jenis_masa(Request $request)
    {
        $permohonan = Permohonan::find($request->id);

        $permohonan->update([
            'jenis_masa' => $request->jenis_masa,
        ]);

        return response()->json();

    }

    public function tolakPukal(Request $request)
    {
        $sebab = $request->jenis . "_sebab";
        foreach ($request->permohonan_id as $permohonan_id) {
            $permohonan = Permohonan::find($permohonan_id);
            $permohonan->update([
                $request->jenis => 0,
                $sebab => $request->$sebab,
            ]);
        }
        return back();

    }

    public function kemaskini_level3(Request $request, Permohonan $permohonan)
    {

        $permohonan->update([
            'pegawai_sokong_id' => $request->pegawai_sokong_id,
            'pegawai_lulus_id' => $request->pegawai_lulus_id,
        ]);
        return back();
    }

}
