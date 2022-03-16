<?php

namespace App\Http\Controllers;


use App\Models\Laporan;
use App\Models\UserPermohonan;
use App\Models\Permohonan;

use App\Models\User;
use Carbon\Carbon;
use Auth;
use PDF;

use Illuminate\Http\Request;



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
        $lapor_permohonan=Permohonan::All();
        $get_user=User::orderBy('name','ASC')->get();
        return view ('laporan.index',[
            'lapor_permohonan'=>$lapor_permohonan,
            'get_user'=>$get_user,

        ]);    }

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
        $permohonan = count(UserPermohonan::where('user_id',$id)->where('permohonan_id')->get());
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
            "currentdate"=>$currentdate,

        ])->setPaper('a4');

        $pdf->save('laporan_permohonan.pdf');

        return view('laporan.pdf_viewer', [
            "url"=> '/laporan_permohonan.pdf',
            "title"=>'Laporan ',
            "link_kembali" => '/laporans',
        ]);

    
    }
}
