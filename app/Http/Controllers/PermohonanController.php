<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;
use App\Models\Audit;
use Illuminate\Support\Facades\DB;


class PermohonanController extends Controller
{
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

        // Kakitangan 
        $user_id = $request->user()->id;   
        $permohonans = User::find($user_id)->permohonans()->get();

        // Sokongan permohonan
        $permohonan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)->get();

        $user = User::where('id', $user_id)->get();

        // status staff
        $mohon = DB::table('user_permohonans')
        ->where('user_id','=','2')
        ->count();

        return view('permohonan.index',[
            'permohonans'=> $permohonans,
            'permohonan_disokongs'=> $permohonan_disokongs,
            'user'=>$user,
            'mohon'=>$mohon,
        ]);
    }

    public function create()
    {
        return view('permohonan.create');
    }

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

        $audit = new Audit;
        $audit->user_id = $request->user()->id;
        $audit->name = $request->user()->name;
        $audit->peranan = $request->user()->role;
        $audit->description =  'Tambah Permohonan Jenis: '.$permohonan->jenis_permohonan;
        $audit->save(); 

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

    public function show(Permohonan $permohonan)
    {
        return view('permohonan.show',[
            'permohonan'=> $permohonan,
        ]);
    }

    public function edit(Permohonan $permohonan)
    {
        return view('permohonan.edit',[
            'permohonan'=> $permohonan,
        ]);
    }

    public function update(Request $request, Permohonan $permohonan)
    {
        if($request->mohon_mula_kerja) {
            $mohon_mula_kerja = $request->mohon_mula_kerja;    
            $permohonan->mohon_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));  
        }

        if($request->mohon_akhir_kerja) {
            $mohon_akhir_kerja = $request->mohon_akhir_kerja;    
            $permohonan->mohon_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));  
        }        
        
        $permohonan->lokasi = $request-> lokasi;
        $permohonan->tujuan = $request-> tujuan;
        $permohonan->pegawai_sokong_id = $request-> pegawai_sokong_id;
        $permohonan->pegawai_lulus_id = $request-> pegawai_lulus_id;

        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        
    }

    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
