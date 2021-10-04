<?php

namespace App\Http\Controllers;

use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\PermohonanTuntutan;
use Illuminate\Support\Facades\DB;



class TuntutanController extends Controller
{
  
    public function index(Request $request)
    {
        $user = User::get('role');
        $user_id = $request->user()->id;  
    
        $tuntutan_k = User::find($user_id)
        ->permohonans()
        ->where('lulus_selepas','=','1')
        ->orderByDesc("created_at")
        ->get();

        $tuntutan_k_l = User::find($user_id)
        ->permohonans()
        ->get();

        $sokong_tuntutan = Tuntutan::where('pegawai_sokong_id', $user_id)->get();

        $lulus_tuntutan = Tuntutan::where('pegawai_lulus_id', $user_id)->get();

        // $tuntutan = Tuntutan::where('tuntutans')
        // ->tuntutans()
        // ->get();

         return view ('tuntutan.index',[
            'tuntutan_k'=>$tuntutan_k,
            'tuntutan_k_l'=>$tuntutan_k_l,
            // 'tuntutan'=>$tuntutan,

            'sokong_tuntutan'=>$sokong_tuntutan,
            'lulus_tuntutan'=>$lulus_tuntutan,

         ]);
        
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tuntutan = new Tuntutan;

        $sebenar_mula_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_mula_kerja_tuntutan));  
        $sebenar_akhir_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_akhir_kerja_tuntutan));  
        $tuntutan->sebenar_mula_kerja_tuntutan = $sebenar_mula_kerja_tuntutan;
        $tuntutan->sebenar_akhir_kerja_tuntutan = $sebenar_akhir_kerja_tuntutan ;
        $tuntutan->jumlah_jam_tuntutan = $request-> jumlah_jam_tuntutan;
        $tuntutan->jumlah_tuntutan = $request-> jumlah_tuntutan;
        $tuntutan->status = $request-> status;
        $tuntutan->pegawai_sokong_id = $request -> pegawai_sokong_id;
        $tuntutan->pegawai_lulus_id = $request -> pegawai_lulus_id;

        $tuntutan->user_id = $request->user()->id;

    
        $tuntutan->save();

        $permohonan_tuntutans = new PermohonanTuntutan;
        $permohonan_tuntutans->tuntutan_id = $tuntutan->id;
        $permohonan_tuntutans->permohonan_id = $request->user()->id;
        // $permohonan_tuntutans->permohonan_id = $request->user()->id;


        $permohonan_tuntutans->save();

    
        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);
    }

    public function show(Tuntutan $tuntutan)
    {
        //
    }


    public function edit(Tuntutan $tuntutan)
    {
        //
    }

    public function update(Request $request, Tuntutan $tuntutan)
    {
        //
    }


    public function destroy(Tuntutan $tuntutan)
    {
        //
    }

}
