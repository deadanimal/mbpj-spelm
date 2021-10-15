<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use App\Models\UserPermohonan;
use App\Models\PermohonanTuntutan;

use Illuminate\Http\Request;
use App\Models\Audit;
use Illuminate\Support\Facades\DB;
use App\Models\Tuntutan;
use Carbon\Carbon;
use Session;


class PermohonanController extends Controller
{
    public function index(Request $request)
    {

        // Kakitangan 
        $user_id = $request->user()->id;  

        $permohonans = User::find($user_id)
        ->permohonans()
        ->orderByDesc("created_at")
        ->get();

        //kakitangan get pengesahan by lulus only
        $pengesahans = User::find($user_id)
        ->permohonans()
        ->where('lulus_sebelum','=','1')
        ->orderByDesc("created_at")
        ->get();


        // Sokongan permohonan _____________________

        $permohonan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)
        ->orderByDesc("created_at")
        ->get();

        foreach ($permohonan_disokongs as $ps){
            $uid = UserPermohonan::where("permohonan_id", $ps->id)->first()->user_id;
            $pemohon = User::where("id", $uid)->first()->name;
            $ps->nama_pemohon = $pemohon;
        }

        $permohonan_dilulus = Permohonan::where('pegawai_lulus_id', $user_id)
        ->orderByDesc("created_at")
        ->get();

        foreach ($permohonan_dilulus as $pl){
            $uuid = UserPermohonan::where("permohonan_id", $pl->id)->first()->user_id;
            $pemohon = User::where("id", $uuid)->first()->name;
            $pl->nama_pemohon = $pemohon;
        }

        // Sokongan pengesahan____________________________

        $pengesahan_disokongs = Permohonan::where('pegawai_sokong_id', $user_id)
        // to get only list of true permohonan 

        ->where('lulus_sebelum','=','1')
        ->orderByDesc("created_at")
        ->get();

        foreach ($pengesahan_disokongs as $pes){
            $uuuid = UserPermohonan::where("permohonan_id", $pes->id)->first()->user_id;
            $pemohon = User::where("id", $uuuid)->first()->name;
            $pes->nama_pemohon = $pemohon;
        }

        $pengesahan_dilulus = Permohonan::where('pegawai_lulus_id', $user_id)
         // to get only list of true permohonan 
        ->where('lulus_sebelum','=','1')
        ->orderByDesc("created_at")
        ->get();

        foreach ($pengesahan_dilulus as $pel){
            $uuuuid = UserPermohonan::where("permohonan_id", $pel->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;
            $pel->nama_pemohon = $pemohon;
        }

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

        //status kb

        $p_sokong_selepas_all = DB::table('permohonans')
        ->where('pegawai_sokong_id','=',$user_id)
        ->count();
        $p_sokong_selepas = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_selepas','=','1']])
        ->count();
        $p_tolak_sokong_selepas = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_selepas','=','0']])
        ->count();
        $p_sokong_selepas_proses = DB::table('permohonans')
        ->where([['pegawai_sokong_id','=',$user_id],['sokong_selepas','=',null]])
        ->count();

        $p_lulus_selepas_all = DB::table('permohonans')
        ->where('pegawai_lulus_id','=',$user_id)
        ->count();
        $p_lulus_selepas = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_selepas','=','1']])
        ->count();
        $p_tolak_lulus_selepas = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_selepas','=','0']])
        ->count();
        $p_lulus_selepas_proses = DB::table('permohonans')
        ->where([['pegawai_lulus_id','=',$user_id],['lulus_selepas','=',null]])
        ->count();


        return view('permohonan.index',[
            'permohonans'=> $permohonans,
            'pengesahans'=> $pengesahans,
            'permohonan_disokongs'=> $permohonan_disokongs,
            'permohonan_dilulus'=> $permohonan_dilulus,
            'pengesahan_disokongs'=>$pengesahan_disokongs,
            'pengesahan_dilulus'=>$pengesahan_dilulus,
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
            
            'p_sokong_selepas_all'=>$p_sokong_selepas_all,
            'p_sokong_selepas'=>$p_sokong_selepas,
            'p_tolak_sokong_selepas'=>$p_tolak_sokong_selepas,
            'p_sokong_selepas_proses'=>$p_sokong_selepas_proses,
            'p_lulus_selepas_all'=>$p_lulus_selepas_all,
            'p_lulus_selepas'=>$p_lulus_selepas,
            'p_tolak_lulus_selepas'=>$p_tolak_lulus_selepas,
            'p_lulus_selepas_proses'=>$p_lulus_selepas_proses,



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
    public function sebenar_mula_akhir_kerja(Request $request)
    {

        $permohonan = Permohonan::find($request->id);
        $sebenar_mula_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));  
        $sebenar_akhir_kerja = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));  
        // $sebenar_mula_kerja = $request->mohon_mula_kerja; 
        // $sebenar_akhir_kerja = $request->mohon_akhir_kerja;
        $permohonan-> sebenar_mula_kerja = $sebenar_mula_kerja;
        $permohonan-> sebenar_akhir_kerja = $sebenar_akhir_kerja;


        $permohonan->save();

        Session::put('permohonan_id', $permohonan);

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    // public function sebenar_tuntutan_mula_akhir(Request $request)
    // {
    //     $permohonan = Tuntutan::find($request->id);
    //     $sebenar_mula_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->mohon_mula_kerja));  
    //     $sebenar_akhir_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->mohon_akhir_kerja));  
      
    //     $permohonan-> sebenar_mula_kerja_tuntutan = $sebenar_mula_kerja_tuntutan;
    //     $permohonan-> sebenar_akhir_kerja_tuntutan = $sebenar_akhir_kerja_tuntutan;

    //     $permohonan->save();

    //     $redirected_url= '/permohonans/';
    //     return redirect($redirected_url);        

    // }
    public function sokong_selepas($id)
    
    {
        $permohonan = Permohonan::find($id);
        $permohonan-> sokong_selepas = true;
        $permohonan-> tarikh_sokong_selepas_= Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function tolak_sokong_selepas(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan-> sokong_selepas = false;
        $permohonan-> tarikh_sokong_selepas_ = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan-> sokong_selepas_sebab = $request-> sokong_selepas_sebab;

        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function lulus_selepas($id)

    {
        $permohonan = Permohonan::find($id);
        $permohonan-> lulus_selepas = true;
        $permohonan-> tarikh_lulus_selepas= Carbon::now()->format('Y-m-d H:i:s');
        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }
    public function tolak_lulus_selepas(Request $request)
    {
        $permohonan = Permohonan::find($request->id);
        $permohonan-> lulus_selepas = false;
        $permohonan-> tarikh_lulus_selepas = Carbon::now()->format('Y-m-d H:i:s');
        $permohonan-> lulus_selepas_sebab = $request-> lulus_selepas_sebab;

        $permohonan->save();

        $redirected_url= '/permohonans/';
        return redirect($redirected_url);        

    }

    public function kemaskini_masa_mula(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_mula_kerja = $request->masa_sebenar_baru_mula;
        $permohonan->save();
    }
    public function kemaskini_masa_akhir(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_akhir_kerja = $request->masa_sebenar_baru_akhir;
        $permohonan->save();
    }
    public function kemaskini_masa_mula_saya(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_mula_kerja = $request->masa_sebenar_baru_mula_saya;
        $permohonan->save();
    }
    public function kemaskini_masa_akhir_saya(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->sebenar_akhir_kerja = $request->masa_sebenar_baru_akhir_saya;
        $permohonan->save();
    }
    public function kemaskini_jam_tuntutan(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->jam_tuntutan = $request->kemaskini_jam_tuntutan;
        $permohonan->save();
    }
    public function kemaskini_total_tuntutan(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->total_tuntutan = $request->kemaskini_total_tuntutan;
        $permohonan->save();
    }
    public function kemaskini_status2(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        $permohonan->status2 = $request->kemaskini_status2;
        $permohonan->save();
    }

    public function jana_tuntutan(Request $request) {
        // Aku ambik smua data permohonan filter by (current user), (current month), (lulus_selepas==1)
        // for each stiap permohonan 
            // create satu tuntutan

        //$user = User::where('')
    
        //$permohonan_dihantar = Permohonan::where('user_id', $request->user()->id)
        //    ->where('lulus_selepas', 1)->get();

        // checking
        
        $permohonan_dihantar = User::find($request->user()->id)
        ->permohonans()
        // >where('lulus_selepas', '1')
        ->where('status_tuntutan','=',null)

        ->orderByDesc("created_at")
        ->get();

        if (count($permohonan_dihantar)==0) {
            $redirected_url= '/tuntutans/';
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

        //$sebenar_mula_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_mula_kerja_tuntutan));  
        //$sebenar_akhir_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_akhir_kerja_tuntutan));  
        //$tuntutan->sebenar_mula_kerja_tuntutan = $sebenar_mula_kerja_tuntutan;
        //$tuntutan->sebenar_akhir_kerja_tuntutan = $sebenar_akhir_kerja_tuntutan ;
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

       
        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);

        
    }

}


