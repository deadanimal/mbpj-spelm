<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user_role = $request->user()->role;

        // if ($user_role == 'kakitangan') {
        //     $permohonans = Permohonan::where('');
        // } elseif ($user_role == 'penyelia' or $user_role == 'kerani_pemeriksa' or $user_role == 'kerani_semakan' ) {

        // } else {
            
        // }    
                //kakitangan,penyelia,kerani semakan,kerani pemeriksa,pentadbir sistem nampak yang permohonan yang dia mohon individu/kumpulan  
                //penyelia/kb/kj boleh nampak permohonan yang dia pegawai sokong/lulus  
        $user_id = $request->user()->id;   

        $permohonans = Permohonan::where('user_id', $user_id);
        $permohonan_disokongs = Permohonan::where([
            ['pegawai_lulus_id','=',$user_id],
            ['pegawai_sokong_id','=',$user_id],
        ]);

        return view('permohonan.index',[
            'permohonans'=> $permohonans,
            'permohonan_disokongs'=> $permohonan_disokongs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permohonan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permohonan = new Permohonan;
        $mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));  
        $mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));  
        $permohonan->mohon_mula_kerja = $mohon_mula_kerja;
        $permohonan->mohon_akhir_kerja = $mohon_akhir_kerja; 
        $permohonan->lokasi = $request-> lokasi;
        $permohonan->tujuan = $request-> tujuan;
        $permohonan->jenis_permohonan = $request-> jenis_permohonan;
        $permohonan->pegawai_sokong_id = $request-> pegawai_sokong_id;
        $permohonan->pegawai_lulus_id = $request-> pegawai_lulus_id;
        $permohonan->save();

        if ($permohonan->jenis_permohonan == 'individu') {
            $user_permohonan = new UserPermohonan;
            $user_permohonan->user_id = $request->user()->id;
            $user_permohonan->permohonan_id = $permohonan->id;
            $user_permohonan->save();
        } else {

        }

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function show(Permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permohonan $permohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
