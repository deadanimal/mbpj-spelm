<?php

namespace App\Http\Controllers;

use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\PermohonanTuntutan;
use Illuminate\Support\Facades\DB;
use Session;



class TuntutanController extends Controller
{
  
    public function index(Request $request,Tuntutan $tuntutan)
    {
        $user = User::get('role');
        $user_id = $request->user()->id;  
    
        $tuntutan_k = User::find($user_id)
        ->permohonans()
        ->where('lulus_selepas','=','1')
        ->orderByDesc("created_at")
        ->get();

        foreach ($tuntutan_k as $ps){
            $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($tuntutan_k as $pl){
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
        }

        // $tuntutan_k_l = User::find($user_id)
        // ->permohonans()
        
        $tuntutan_lulus = Tuntutan::where('user_id',$user_id)
        // ->tuntutans()
        ->orderByDesc("created_at")
        ->get();

        foreach ($tuntutan_lulus as $ps){
            $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($tuntutan_lulus as $pl){
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
        }
        // ->get();

        // $tuntutans = User::find($user_id)
        // ->tuntutans()
        // ->get();

        // sokong tuntutan

        $sokong_tuntutan = Tuntutan::where('pegawai_sokong_id', $user_id)
        ->orderByDesc("created_at")
        ->get();

        //cari sebab/tujuan tuntutan dari permohonan
        // foreach ($sokong_tuntutan as $ctujuan){
        //     $cari_tujuan = Permohonan::find($permohonan);   
        //     $ctujuan->cari_tujuan = $cari_tujuan;
        //     dd ($ctujuan);
        // }
        //cari nama pegawai
        foreach ($sokong_tuntutan as $ps){
            $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($sokong_tuntutan as $pl){
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
        }

        // lulus tuntutan

        $lulus_tuntutan = Tuntutan::where('pegawai_lulus_id', $user_id)
        ->orderByDesc("created_at")
        ->get();

        foreach ($lulus_tuntutan as $ps){
            $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($lulus_tuntutan as $pl){
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
        }

        $semak_tuntutan = Tuntutan::all();
        // dd($semak_tuntutan);

         return view ('tuntutan.index',[
            'tuntutan_k'=>$tuntutan_k,
            // 'tuntutan_k_l'=>$tuntutan_k_l,
            // 'tuntutans'=>$tuntutans,

            'sokong_tuntutan'=>$sokong_tuntutan,
            'lulus_tuntutan'=>$lulus_tuntutan,

            'tuntutan_lulus'=>$tuntutan_lulus,

            'semak_tuntutan'=>$semak_tuntutan,

         ]);
        
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $permohonan = Session::get('permohonan_id');
        // dd($permohonan);
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
        $permohonan_tuntutans->permohonan_id = $permohonan->id;
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
    public function sokong_tuntutan($id)
    {
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> sokong_tuntutan = true;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function tolak_sokong_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> sokong_tuntutan = false;
        $tuntutan-> sokong_tuntutan_sebab = $request-> sokong_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function lulus_tuntutan($id)
    {
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> lulus_tuntutan = true;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function tolak_lulus_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> lulus_tuntutan = false;
        $tuntutan-> lulus_tuntutan_sebab = $request-> lulus_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }

}
