<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;
use App\Models\Audit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PermohonanController extends Controller
{
    public function index(Request $request)
    {

        // Kakitangan 
        $user_id = $request->user()->id;   
        // $permohonans = User::find($user_id)->permohonans()->get();
        $permohonans = User::find($user_id)->permohonans()->get();
        $pengesahans = User::find($user_id)
        ->permohonans()
        ->where('lulus_sebelum','=','1')
        ->get();


        // Sokongan permohonan
        $permohonan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)->get();
        $permohonan_dilulus = Permohonan::where('pegawai_lulus_id', $user_id)->get();

        $user = User::where('id', $user_id)->get();

        $pengguna = User::all();


        // status staff
        $mohon = DB::table('user_permohonans')
        ->where('user_id','=',$user_id)
        ->count();
        

        $mohon_p = DB::table('permohonans')
        ->join('user_permohonans','permohonans.id','=','user_permohonans.permohonan_id')
        ->select('permohonans.sokong_sebelum')
        ->where('sokong_sebelum','=',1)
        ->count();

        $mohon_t = DB::table('permohonans')
        ->join('user_permohonans','permohonans.id','=','user_permohonans.permohonan_id')
        ->select('permohonans.sokong_sebelum')
        ->where('sokong_sebelum','=',0)
        ->count();

        $mohon_dp = DB::table('permohonans')
        ->join('user_permohonans','permohonans.id','=','user_permohonans.permohonan_id')
        ->select('permohonans.sokong_sebelum')
        ->where('sokong_sebelum','=',null)
        ->count();


        // status penyelia
        $p_sokong_all = DB::table('permohonans')
        ->where('pegawai_sokong_id','=',$user_id)
        ->count();
        $p_sokong = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_sebelum','=','1']])
        ->count();
        $p_tolak_sokong = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_sebelum','=','0']])
        ->count();
        $p_sokong_proses = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_sebelum','=',null]])
        ->count();

        $p_lulus_all = DB::table('permohonans')
        ->where('pegawai_lulus_id','=',$user_id)
        ->count();
        $p_lulus = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_sebelum','=','1']])
        ->count();
        $p_tolak_lulus = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_sebelum','=','0']])
        ->count();
        $p_lulus_proses = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_sebelum','=',null]])
        ->count();


        return view('permohonan.index',[
            'permohonans'=> $permohonans,
            'pengesahans'=> $pengesahans,
            'permohonan_disokongs'=> $permohonan_disokongs,
            'permohonan_dilulus'=> $permohonan_dilulus,
            'user'=>$user,
            'mohon'=>$mohon,
            'pengguna'=>$pengguna,
            'mohon_p' =>$mohon_p ,
            'mohon_t' =>$mohon_t ,
            'mohon_dp' =>$mohon_dp ,
            'p_sokong_all'=>$p_sokong_all,
            'p_sokong'=>$p_sokong,
            'p_tolak_sokong'=>$p_tolak_sokong,
            'p_sokong_proses'=>$p_sokong_proses,
            'p_lulus_all'=>$p_lulus_all,
            'p_lulus'=>$p_lulus,
            'p_tolak_lulus'=>$p_tolak_lulus,
            'p_lulus_proses'=>$p_lulus_proses,



        ]);
    }

    public function create(Request $request)
    {

         $pegawai = User::whereIn('role', array('penyelia','ketua_bahagian','ketua_jabatan'))->get();     


        return view('permohonan.create',[
            'pegawai'=>$pegawai,

        ]);
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

        } elseif ($permohonan->jenis_permohonan == 'berkumpulan') {
          
            $user_permohonan = new UserPermohonan;
            $user_permohonan->user_id = $request->user()->id;
            $user_permohonan->permohonan_id = $permohonan->id;
            $user_permohonan->save();
           
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

    public function edit(Request $request ,Permohonan $permohonan)
    {

   // Create  option on select pegawai 

        $users = User::whereIn('role', array('penyelia','ketua_bahagian','ketua_jabatan'))->get();     
        $user_permohonans = UserPermohonan::all();

   //  Create pegawai name

        $pegawai_sokong = User::where('id',$permohonan->pegawai_sokong_id)->first();   
        $permohonan -> pegawai_sokong_name = $pegawai_sokong -> name;  

        $pegawai_lulus = User::where('id',$permohonan->pegawai_lulus_id)->first();   
        $permohonan -> pegawai_lulus_name = $pegawai_lulus -> name;  

    // Create kakitangan permohonan list

        $kakitanganpermohonans = UserPermohonan::where('permohonan_id','=',$permohonan->id)->get();
    
    // Create  option on select kakitangan 

        $kakitangan = User::whereIn('role', array('penyelia','kakitangan','kerani_semakan','kerani_pemeriksa'))->get();   

    // Create  other obj to get user attributes
    
        $user_permohonans_maklumat_all = [];
        foreach ($kakitanganpermohonans as $up) {    
            $tmp = User::where("id", $up->user_id)->first();
            $user_permohonans_maklumat = (object)[];
            $user_permohonans_maklumat -> nama = $tmp -> name;
            $user_permohonans_maklumat -> permohonan_id = $up -> permohonan_id;
            $user_permohonans_maklumat -> email = $tmp -> email;
            $user_permohonans_maklumat -> nric = $tmp -> nric;
            $user_permohonans_maklumat -> id = $up -> id;
            $user_permohonans_maklumat_all[] = $user_permohonans_maklumat;
        }

        // dd("data baru", $user_permohonans_maklumat_all);

        return view('permohonan.edit',[
            'permohonan'=> $permohonan,
            'users'=> $users,
            'user_permohonans'=> $user_permohonans,
            'kakitangan'=>$kakitangan,
            'kakitanganpermohonans'=>$user_permohonans_maklumat_all,
            

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

    public function destroy(Request $request,Permohonan $permohonan )
    {
        
        if($permohonan)
        {
            if($permohonan->delete()){
         
              $redirected_url= '/permohonans/';
              return redirect($redirected_url)->with('buang');;  
              }
         else{
            return "something wrong";
             }     
                }
            else{
                return "not exist";
                }       
    }
    public function sokong_sebelum($id)
    {
        
        $permohonan = Permohonan::find($id);
        $permohonan-> sokong_sebelum = true;
        $permohonan-> tarikh_sokong = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function tolak_sokong_sebelum(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan-> sokong_sebelum = false;
        $permohonan-> tarikh_sokong = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan-> sokong_sebelum_sebab = $request-> sokong_sebelum_sebab;

        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function lulus_sebelum($id)
    
    {
        $permohonan = Permohonan::find($id);
        $permohonan-> lulus_sebelum = true;
        $permohonan-> tarikh_lulus = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function tolak_lulus_sebelum(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan-> lulus_sebelum = false;
        $permohonan-> tarikh_lulus = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan-> lulus_sebelum_sebab = $request-> lulus_sebelum_sebab;

        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }

}
