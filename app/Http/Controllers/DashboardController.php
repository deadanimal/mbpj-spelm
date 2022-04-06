<?php

namespace App\Http\Controllers;

use App\Models\Audit;
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
            if ($role == 'kakitangan') {
                return view('dashboard.kakitangan_dashboard', $data);
            } elseif ($role == 'pentadbir_sistem') {

                // $audit = Audit::all();
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

            } elseif ($role == 'penyelia') {
                return view('dashboard.penyelia_dashboard', $data);
            } elseif ($role == 'ketua_bahagian') {
                return view('dashboard.ketua_bahagian_dashboard');
            } elseif ($role == 'ketua_jabatan') {
                return view('dashboard.ketua_jabatan_dashboard');
            } elseif ($role == 'datuk_bandar') {
                return view('dashboard.datuk_bandar_dashboard');
            } elseif ($role == 'kerani_semakan') {
                return view('dashboard.kerani_semakan_dashboard', $data);
            } elseif ($role == 'kerani_pemeriksa') {
                return view('dashboard.kerani_periksa_dashboard', $data);
            } elseif ($role == 'pelulus_pindaan') {
                return view('dashboard.pelulus_pindaan_dashboard');
            }
        } else {
            Auth::logout();
            return view('dashboard.inactive');
            // return 'text';
        }

    }

}
