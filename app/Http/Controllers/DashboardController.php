<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Bahagian;
use App\Models\Jabatan;
use App\Models\OracleGaji;
use App\Models\OracleUnit;
use App\Models\Permohonan;
use App\Models\Tuntutan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(Request $request, Permohonan $permohonan)
    {

        $user = Auth::user();
        $role = $user->role;
        $status = $user->status;

        $jumlah_tuntutan = 0;
        $jumlah_permohonan = 0;
        $jumlah_permohonan_lulus = 0;

        $currentYear = now()->year;
        for ($i = 0; $i < 5; $i++) {

            $bil_permohonan = 0;
            $permohonan_lulus = 0;

            $userT = Tuntutan::whereYear('created_at', $currentYear - $i)
                ->where('user_id', $user->id)->count();

            foreach ($user->permohonans as $p) {
                if ($p->created_at->year == $currentYear - $i) {
                    $bil_permohonan++;

                    if ($p != null && $p->lulus_selepas == 1) {
                        $permohonan_lulus++;
                        $jumlah_permohonan_lulus++;
                    }

                }
            }

            $jumlah_permohonan += $bil_permohonan;
            $jumlah_tuntutan += $userT;

            $p[$i] = [
                $currentYear - $i,
                $bil_permohonan,
                $userT,
                $permohonan_lulus,
            ];

        }

        $data = [
            'p' => $p,
            'jumlah_permohonan' => $jumlah_permohonan,
            'jumlah_permohonan_lulus' => $jumlah_permohonan_lulus,
            'jumlah_tuntutan' => $jumlah_tuntutan,
        ];

        if ($status == 'aktif') {

            function checkMP()
            {
                abort_if(auth()->user()->usercode == null, 466);
                $MaklumatPekerjaan = OracleGaji::where('hr_no_pekerja', auth()->user()->user_code)->first();
                if ($MaklumatPekerjaan == null) {
                    echo '<script>alert("User Tiada Maklumat Pekerjaan")</script>';
                    abort(500);
                }
                return $MaklumatPekerjaan;
            }

                $bilPermohonan = Permohonan::all()->count(); 
                $bilPermohonanLulus = Permohonan::where(['sokong_sebelum'=>1,'lulus_sebelum'=>1,'sokong_selepas'=>1,'lulus_selepas'=>1])->get()->count();
                $bilTuntutan = Tuntutan::all()->count();
                $bilTuntutanLulus = Tuntutan::where(['sokong_tuntutan'=>1,'lulus_tuntutan'=>1])->get()->count();


            switch ($role) {
                case 'kakitangan':
                    return view('dashboard.kakitangan_dashboard', $data);
                    break;

                case 'pentadbir_sistem':
                    $harini = date("Y-m-d");
                    $harini = date_create($harini);

                    // status staff
                    $staffjumlah = DB::table('users')
                        ->count();

                    $staffaktif = DB::table('users')
                        ->where('status', '=', 'aktif')
                        ->count();

                    $staffxaktif = DB::table('users')
                        ->where('status', '=', 'tidak_aktif')
                        ->count();

                    $limabelasharisebelum = date_sub($harini, date_interval_create_from_date_string("3 days"));
                    $audits = Audit::where('created_at', '>=', $limabelasharisebelum)->orderBy('created_at', 'DESC')->get();

                    return view('dashboard.pentadbir_dashboard', [
                        'audits' => $audits,
                        'staffjumlah' => $staffjumlah,
                        'staffaktif' => $staffaktif,
                        'staffxaktif' => $staffxaktif,
                    ]);
                    break;

                case 'penyelia':
                    return view('dashboard.penyelia_dashboard', $data);
                    break;

                case 'ketua_bahagian':
                    $MaklumatPekerjaan = checkMP();
                    $listUnit = OracleUnit::where('ge_kod_bahagian', $MaklumatPekerjaan->hr_bahagian)->get();
                    foreach ($listUnit as $lu) {
                        $lu['bil'] = OracleGaji::where('hr_unit', $lu->ge_kod_unit)->count();
                    }
                    
                    return view('dashboard.ketua_bahagian_dashboard', compact('listUnit','bilPermohonan','bilPermohonanLulus','bilTuntutan','bilTuntutanLulus'));
                    break;
                case 'ketua_jabatan':
                    $MaklumatPekerjaan = checkMP();
                    $kodJabatan = $MaklumatPekerjaan->hr_jabatan;
                    $listBahagian = Bahagian::where('ge_kod_jabatan', $kodJabatan)->get();
                    foreach ($listBahagian as $lb) {
                        $lb['bil'] = OracleGaji::where('hr_bahagian', $lb->ge_kod_bahagian)->count();
                    }
                    return view('dashboard.ketua_jabatan_dashboard', compact('listBahagian','bilPermohonan','bilPermohonanLulus','bilTuntutan','bilTuntutanLulus'));
                    break;
                case 'datuk_bandar':
                    $listJabatan = Jabatan::all();
                    foreach ($listJabatan as $j) {
                        $j['bil'] = OracleGaji::where('hr_jabatan', $j->ge_kod_jabatan)->count();
                    }
                    return view('dashboard.datuk_bandar_dashboard', compact('listJabatan'));
                    break;
                case 'kerani_semakan':
                    return view('dashboard.kerani_semakan_dashboard', $data);
                    break;
                case 'kerani_pemeriksa':
                    return view('dashboard.kerani_periksa_dashboard', $data);
                    break;
                case 'pelulus_pindaan':
                    return view('dashboard.pelulus_pindaan_dashboard');
                    break;
            }
        } else {
            Auth::logout();
            return view('dashboard.inactive');
            // return 'text';
        }

    }
}
