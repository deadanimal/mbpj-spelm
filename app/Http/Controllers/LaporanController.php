<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use App\Models\Jabatan;
use App\Models\Laporan;
use App\Models\Permohonan;
use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Laporan Kehadiran
        // get User kehadiran untuk P,KB,KJ
        $lapor_permohonan = Permohonan::All();
        $get_user = User::orderBy('name', 'ASC')->get();
        return view('laporan.index', [
            'lapor_permohonan' => $lapor_permohonan,
            'get_user' => $get_user,
            'bahagian' => Bahagian::all(),
            'jabatan' => Jabatan::all(),
        ]);}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
    public function filter_laporan(Request $request, $id)
    {

        $getpermohonan = UserPermohonan::where('user_id', $id)->get();
        $getuser = User::where('id', $id)->first();
        $permohonan = count(UserPermohonan::where('user_id', $id)->where('permohonan_id')->get());
        // $tidak_hadir = count(UserRollcall::where('penguatkuasa_id',$id)->where('lulus', 0)->get());
        // $belum_hadir = count(UserRollcall::where('penguatkuasa_id',$id)->where('lulus', null)->get());

        $currentdate = Carbon::now()->format('Y-m-d ');

        //cetakan
        $pdf = PDF::loadView('laporan.laporan_permohonan', [
            "getuser" => $getuser,
            // "hadir" => $hadir,
            // "tidak_hadir" => $tidak_hadir,
            // "belum_hadir" => $belum_hadir,
            // "laporan_permohonan_ind" => $tajuk_rollcall,
            "currentdate" => $currentdate,

        ])->setPaper('a4');

        $pdf->save('laporan_permohonan.pdf');

        return view('laporan.pdf_viewer', [
            "url" => '/laporan_permohonan.pdf',
            "title" => 'Laporan ',
            "link_kembali" => '/laporans',
        ]);

    }

    public function filter_laporan_2(Request $request)
    {
        $tuntutans = Tuntutan::with('user')
            ->whereYear('created_at', '=', $request->tahun)
            ->whereMonth('created_at', '=', $request->bulan)
            ->get();

        //Get Jabatan and Bahagian
        foreach ($request->jabatan as $j) {
            $jabatans[] = Jabatan::where('GE_KOD_JABATAN', $j)->first();
        }

        foreach ($request->bahagian as $b) {
            $bahagians[] = Bahagian::where('GE_KOD_JABATAN', substr($b, 0, 2))
                ->where('GE_KOD_BAHAGIAN', substr($b, 2, 2))
                ->first();
        }

        foreach ($jabatans as $j) {
            $temp = null;
            foreach ($bahagians as $b) {
                if ($b->GE_KOD_JABATAN == $j->GE_KOD_JABATAN) {
                    $temp[] = $b;
                }
            }
            $j['bahagians'] = $temp;
        }

        foreach ($jabatans as $j) {
            if ($j->bahagians != null) {

                foreach ($j->bahagians as $b) {
                    $temp2 = null;
                    foreach ($tuntutans as $tuntutan) {
                        if ($tuntutan->user->department_code != null) {

                            if (strlen($tuntutan->user->department_code) == 6) {
                                if (substr($tuntutan->user->department_code, 0, 2) == $j->GE_KOD_JABATAN) {
                                    if (substr($tuntutan->user->department_code, 2, 4) == $j->GE_KOD_BAHAGIAN) {
                                        $temp2[] = $tuntutan;
                                    }
                                }
                            } elseif (strlen($tuntutan->user->department_code) == 5) {
                                if (substr("0" . $tuntutan->user->department_code, 0, 2) == $j->GE_KOD_JABATAN) {
                                    if (substr("0" . $tuntutan->user->department_code, 2, 2) == $b->GE_KOD_BAHAGIAN) {
                                        $temp2[] = $tuntutan;
                                    }
                                }
                            } else {
                                dd('Department Code Invalid');
                            }

                        }
                    }
                    $b['tuntutans_data'] = $temp2;
                }

            }
        }
        $pdf = PDF::loadView('laporan.laporan_senarai_elaun', [
            'jabatan' => $jabatans,
        ]);
        $pdf->setOptions(['isPhpEnabled' => true]);
        $pdf->setPaper('a4', 'landscape');

        $pdf->save('laporan_senarai_elaun.pdf');

        return view('laporan.pdf_viewer', [
            "url" => '/laporan_senarai_elaun.pdf',
            "title" => 'Laporan ',
            "link_kembali" => '/laporans',
        ]);

    }

    public function sebulan_pergaji(Request $request)
    {
        $jabatan = Jabatan::where('GE_KOD_JABATAN', $request->jabatan)->first();

        $bahagian = Bahagian::where('GE_KOD_JABATAN', substr($request->bahagian, 0, 2))
            ->where('GE_KOD_BAHAGIAN', substr($request->bahagian, 2, 2))
            ->first();

        switch (auth()->user()->role) {
            case 'datuk_bandar':
                $role = 'sebulan_gaji';
                break;
            case 'ketua_jabatan':
                $role = 'pergaji';
                break;

            default:
                $role = 'invalid';
                break;
        }

        if ($role == 'invalid') {
            abort(404);
        }
        $pdf = PDF::loadView('laporan.' . $role, [
            'jabatan' => $jabatan,
            'bahagian' => $bahagian,
            'tuntutans' => Tuntutan::with('user')->get(),
        ]);

        $pdf->save($role . '.pdf');
        return view('laporan.pdf_viewer', [
            "url" => '/' . $role . '.pdf',
            "title" => 'Laporan ',
            "link_kembali" => '/laporans',
        ]);
    }

    public function senarai_nama(Request $request)
    {
        $tuntutans = Tuntutan::with('user')
            ->whereYear('created_at', '=', $request->tahun)
            ->whereMonth('created_at', '=', $request->bulan)
            ->get();

        switch ($request->bulan) {
            case '1':
                $bulan = "JANUARI";
                break;
            case '2':
                $bulan = "FEBRUARI";
                break;
            case '3':
                $bulan = "MAC";
                break;
            case '4':
                $bulan = "APRIL";
                break;
            case '5':
                $bulan = "MEI";
                break;
            case '6':
                $bulan = "JUN";
                break;
            case '7':
                $bulan = "JULAI";
                break;
            case '8':
                $bulan = "OGOS";
                break;
            case '9':
                $bulan = "SEPTEMBER";
                break;
            case '10':
                $bulan = "OKTOBER";
                break;
            case '11':
                $bulan = "NOVEMBER";
                break;
            case '12':
                $bulan = "DISEMBER";
                break;
        }

        $pdf = PDF::loadView('laporan.laporan_senarai_nama', [
            'tuntutans' => $tuntutans,
            'bulan' => $bulan,
            'tahun' => $request->tahun,
        ]);

        $pdf->save('laporan_senarai_nama.pdf');
        return view('laporan.pdf_viewer', [
            "url" => '/laporan_senarai_nama.pdf',
            "title" => 'Laporan ',
            "link_kembali" => '/laporans',
        ]);

    }

}
