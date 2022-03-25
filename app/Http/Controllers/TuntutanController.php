<?php

namespace App\Http\Controllers;

use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\PermohonanTuntutan;
use Illuminate\Support\Facades\DB;
use App\Models\OracleCuti;
use App\Models\OracleCutiAm;
use App\Models\OracleGaji;



use Session;

use Carbon\Carbon;
use Auth;
use PDF;
use Exception;

class TuntutanController extends Controller
{
  
    public function index(Request $request,Tuntutan $tuntutan){
  
        $user = User::get('role');
        $user_id = $request->user()->id;  
    
        $tuntutan_k = User::find($user_id)
        ->permohonans()
        ->where('lulus_selepas','=','1')
        ->where('status_tuntutan','=',null)
        ->orderByDesc("created_at")
        ->get();

        $jumlah_jam_biasa = 0;
        $jumlah_jam_rehat = 0;
        $jumlah_jam_am = 0;
        $jumlah_jam_keseluruhan = 0;
        

        // foreach ($tuntutan_k as $ps){
        //     $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
        //     $ps->pegawai_sokong = $pegawai_sokong;
        // }
        
        foreach ($tuntutan_k as $pl){

            $pegawai_sokong = User::where("id", $pl ->pegawai_sokong_id)->first()->name;
            $update_permohonan = Permohonan::where('id', $pl->id)->first();
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
            $pl->pegawai_sokong = $pegawai_sokong;

            
            //tumpang
            $time = explode(" ",$pl->sebenar_mula_kerja);
            $sebenar_mula_kerja_ts = strtotime($time[1]);
            $jumlah_jam_bekerja = strtotime($pl->sebenar_akhir_kerja) - strtotime($pl->sebenar_mula_kerja);
            $jumlah_jam_bekerja = $jumlah_jam_bekerja/3600;

            //cek kadar siang
            // $lb_siang = strtotime("10:00:00");
            // $ub_siang = strtotime("18:00:00");

            $lb_siang = strtotime("06:00:00");
            $ub_siang = strtotime("21:59:00");

            //cek kadar malam
            $lb_malam = strtotime("22:00:00");
            $ub_malam = strtotime("05:59:00");

            //checking hari pelepasan am

            $check_am = count(OracleCutiAm::where('hr_tarikh', $time[0])->get());

            $weekend = false;
            $dt1 = strtotime($time[0]);
            $dt2 = date("l", $dt1);
            $dt3 = strtolower($dt2);
            if(($dt3 == "saturday" )|| ($dt3 == "sunday"))
		    {
                $weekend = true;
            }
            // $check_weekend =
            if ($check_am > 0) {
                //kerja time cuti am
                if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_mula_kerja_ts <= $ub_siang ) {
                    $pl->kadar_am_siang = "1.75";
                    $pl->jam_kerja_am_siang = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_am_siang = round($jumlah_jam_bekerja,3);
                    $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja,3);
                    // dd($jumlah_jam_bekerja);

                }
                else  {
                    $pl->kadar_am_malam = "2.00";
                    $pl->jam_kerja_am_malam = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_am_malam = round($jumlah_jam_bekerja,3);
                    $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja,3);
                }

                //cuti rehat
            } elseif($weekend) {
                if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_mula_kerja_ts <= $ub_siang ) {
                    $pl->kadar_cuti_siang = "1.25";
                    $pl->jam_kerja_cuti_siang = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_rehat_siang = $jumlah_jam_bekerja;
                    $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;
                }
                else  {
                    $pl->kadar_cuti_malam = "1.50";
                    $pl->jam_kerja_cuti_malam = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_rehat_malam = $jumlah_jam_bekerja;
                    $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;

                }
            }
             //hari biasa
            else {
                if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_mula_kerja_ts <= $ub_siang ) {
                    $pl->kadar_biasa_siang = "1.125";
                    $pl->jam_kerja_biasa_siang = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_biasa_siang = $jumlah_jam_bekerja;
                    $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;

                }
                else  {
                    $pl->kadar_biasa_malam = "1.25";
                    $pl->jam_kerja_biasa_malam = $jumlah_jam_bekerja;
                    $update_permohonan->jumlah_biasa_malam = $jumlah_jam_bekerja;
                    $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;

                }
            }

            $jumlah_jam_keseluruhan = $jumlah_jam_keseluruhan + $jumlah_jam_biasa + $jumlah_jam_rehat + $jumlah_jam_am;

            // dd($jumlah_jam_keseluruhan);
            // cek kadar 

            $update_permohonan->save();
            
        }
        
        $tuntutan_lulus = Tuntutan::where('user_id',$user_id)
        ->orderByDesc("created_at")
        ->get();

        // foreach ($tuntutan_lulus as $ps){
        //     $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
        //     $ps->pegawai_sokong = $pegawai_sokong;
        // }
        foreach ($tuntutan_lulus as $pl){
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pegawai_sokong = User::where("id", $pl ->pegawai_sokong_id)->first()->name;
            $pl->pegawai_sokong = $pegawai_sokong;
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
        // foreach ($sokong_tuntutan as $ps){
        //     $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
        //     $ps->pegawai_sokong = $pegawai_sokong;
        // }
        // foreach ($sokong_tuntutan as $pl){
        //     $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
        //     $pl->pegawai_lulus = $pegawai_lulus;
        // }

        foreach ($sokong_tuntutan as $npt){
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $npt ->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt ->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            $npt->nama_pemohon = $pemohon;
        }

        // lulus tuntutan

        $lulus_tuntutan = Tuntutan::where('pegawai_lulus_id', $user_id)
        ->orderByDesc("created_at")
        ->get();

        // foreach ($lulus_tuntutan as $ps){
        //     $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
        //     $ps->pegawai_sokong = $pegawai_sokong;
        // }
        // foreach ($lulus_tuntutan as $pl){
        //     $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
        //     $pl->pegawai_lulus = $pegawai_lulus;
        // }

        foreach ($lulus_tuntutan as $npt){
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $npt ->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt ->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            $npt->nama_pemohon = $pemohon;
        }
        // semak tuntutan kerani semakan
        $semak_tuntutan = Tuntutan::all();

        // foreach ($semak_tuntutan as $ps){
        //     $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
        //     $ps->pegawai_sokong = $pegawai_sokong;
        // }
        // foreach ($semak_tuntutan as $pl){
        //     $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
        //     $pl->pegawai_lulus = $pegawai_lulus;
        // }
        foreach ($semak_tuntutan as $npt){
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;
            $npt->nama_pemohon = $pemohon;

            $pegawai_sokong = User::where("id", $npt ->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt ->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            // $pegawai_sokong = User::where("id", $npt ->pegawai_sokong_id)->first()->name;
        }

        // periksa tuntutan kerani periksa
        $periksa_tuntutan = Tuntutan::all();

        foreach ($periksa_tuntutan as $npt){
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;
            $npt->nama_pemohon = $pemohon;

            $pegawai_sokong = User::where("id", $npt ->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt ->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;


        }

        //pelulus pindaan rekod 

        $tuntutan_kemaskini = Tuntutan::where('mohon_kemaskini_periksa','=',1)
        ->orWhere('mohon_kemaskini_semak','=',1)
        ->orderByDesc("created_at")
        ->get();

        //get_name_kerani
        foreach ($tuntutan_kemaskini as $kpn){
            $kerani_periksa_name = User::where("id", $kpn ->kerani_pemeriksa_id)->first()->name;
            $kpn->kerani_periksa_name = $kerani_periksa_name;
            $kakitangan_name = User::where("id", $kpn ->user_id)->first()->name;
            $kpn->kakitangan_name = $kakitangan_name;
        }

        // foreach ($tuntutan_kemaskini as $ksn){
        //     $kerani_semak_name = User::where("id", $ksn ->kerani_semakan_id)->first()->name;
        //     $ksn->kerani_semak_name = $kerani_semak_name;
        // // }
        // foreach ($tuntutan_kemaskini as $kn){
        //     $kakitangan_name = User::where("id", $kn ->user_id)->first()->name;
        //     $kn->kakitangan_name = $kakitangan_name;
        // }
        // // dd($kerani_semak_name);


        $semak_satupertiga = Tuntutan::where('lulus_satupertiga', 1)
        ->orderByDesc("created_at")
        ->get();

        foreach ($semak_satupertiga as $sspt){
            $uuuuid = Tuntutan::where("id", $sspt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $sspt ->pegawai_sokong_id)->first()->name;
            $sspt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $sspt ->pegawai_lulus_id)->first()->name;
            $sspt->pegawai_lulus = $pegawai_lulus;

            $sspt->nama_pemohon = $pemohon;
        }
        $semak_sebulan = Tuntutan::where('lulus_satupertiga', 1)
        ->orderByDesc("created_at")
        ->get();

        foreach ($semak_sebulan as $sspt){
            $uuuuid = Tuntutan::where("id", $sspt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $sspt ->pegawai_sokong_id)->first()->name;
            $sspt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $sspt ->pegawai_lulus_id)->first()->name;
            $sspt->pegawai_lulus = $pegawai_lulus;

            $sspt->nama_pemohon = $pemohon;
        }

        // dd($semak_satupertiga);
        //get kemaskini pegawai 
        $pegawaituntutan = User::whereIn('role', array('penyelia','ketua_bahagian','ketua_jabatan'))->get(); 
         return view ('tuntutan.index',[
            'tuntutan_k2'=>$tuntutan_k,
            'tuntutan_k'=>$tuntutan_k,
            // 'tuntutans'=>$tuntutans,
            'sokong_tuntutan'=>$sokong_tuntutan,
            'lulus_tuntutan'=>$lulus_tuntutan,

            'tuntutan_lulus'=>$tuntutan_lulus,

            'semak_tuntutan'=>$semak_tuntutan,
            'periksa_tuntutan'=>$periksa_tuntutan,

            'pegawaituntutan'=>$pegawaituntutan,

            'jumlah_jam_biasa'=>$jumlah_jam_biasa,
            'jumlah_jam_rehat'=>$jumlah_jam_rehat,
            'jumlah_jam_am'=>$jumlah_jam_am,
            'jumlah_jam_keseluruhan' => $jumlah_jam_keseluruhan,

            'tuntutan_kemaskini'=>$tuntutan_kemaskini,
            'semak_satupertiga'=>$semak_satupertiga,
            'semak_sebulan'=>$semak_sebulan,
            // 'tuntutan_satupertiga'=> Tuntutan::where('lulus_satupertiga', 1)->get(),
            // 'tuntutan_sebulan'=> Tuntutan::where('lulus_sebulan', 1)->get(),
         ]);
        
    }
    public function create(){
    }
    public function store(Request $request){
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
    public function show(Tuntutan $tuntutan , Request $request){

        $user = User::get('role');

        $user_id = $request->user()->id;  

        

        // dd($kiraangajijam);

        // dd($kiraangaji);


        $permohonan_id = PermohonanTuntutan::where('tuntutan_id',$tuntutan->id)
        ->get();
        $permohonan_ygdituntut = [];

        foreach ($permohonan_id as $pydt) {
            $temp = Permohonan::where('id', $pydt->permohonan_id)->first();
            array_push($permohonan_ygdituntut, $temp);
        }
        foreach ($permohonan_ygdituntut as $ps){
            $pegawai_sokong = User::where("id", $ps ->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($permohonan_ygdituntut as $pl){
            $user_permohonan = UserPermohonan::where('permohonan_id', $pl->id) -> first()->user_id;
            $user= User::where ('id','=',$user_permohonan)->first();
            $pegawai_lulus = User::where("id", $pl ->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
        }
        // dd($permohonan_ygdituntut);

        // dd($user);

        $biasa_siang_total = 0;
        $biasa_malam_total = 0;
        $rehat_siang_total = 0;
        $rehat_malam_total = 0;
        $am_siang_total = 0;
        $am_malam_total = 0;

        $jumlah_jam_keseluruhan_show_biasa = 0;
        $jumlah_jam_keseluruhan_show_rehat = 0;
        $jumlah_jam_keseluruhan_show_am = 0;


     

        foreach ($permohonan_ygdituntut as $pyd){
            
            #siang
            $biasa_siang_total = number_format($biasa_siang_total + $pyd->jumlah_biasa_siang,3) ;
            $biasa_malam_total = number_format($biasa_malam_total + $pyd->jumlah_biasa_malam ,3);

            #siang
            $rehat_siang_total = number_format($rehat_siang_total + $pyd->jumlah_rehat_siang ,3);
            $rehat_malam_total = number_format($rehat_malam_total + $pyd->jumlah_rehat_malam ,3);

            #siang
            $am_siang_total = number_format($am_siang_total + $pyd->jumlah_am_siang ,3);
            $am_malam_total = number_format($am_malam_total + $pyd->jumlah_am_malam ,3);


        }

        #calculate
        $jumlah_jam_keseluruhan_show_biasa = $jumlah_jam_keseluruhan_show_biasa + $biasa_siang_total + $biasa_malam_total;
        $jumlah_jam_keseluruhan_show_rehat = $jumlah_jam_keseluruhan_show_rehat + $rehat_siang_total + $rehat_malam_total;
        $jumlah_jam_keseluruhan_show_am = $jumlah_jam_keseluruhan_show_am + $am_siang_total + $am_malam_total;

        #persamaan jam
        $pj_biasa_siang = $biasa_siang_total*1.125;
        $pj_biasa_malam = $biasa_malam_total*1.25;
        $pj_rehat_siang = $rehat_siang_total*1.25;
        $pj_rehat_malam = $rehat_malam_total*1.5;
        $pj_am_siang = $am_siang_total*1.75;
        $pj_am_malam = $am_malam_total*2;

        // tambah save logic


        //total Jumlah Jam
        $jumlah_jam_kiraan = 0;
        $jumlah_jam_kiraan = $jumlah_jam_kiraan + $jumlah_jam_keseluruhan_show_biasa + $jumlah_jam_keseluruhan_show_rehat + $jumlah_jam_keseluruhan_show_am;
        //Total Persamaan Jam
        $jumlah_jam_persamaan = 0;
        $jumlah_jam_persamaan = $jumlah_jam_persamaan + $pj_biasa_siang + $pj_biasa_malam + $pj_rehat_siang + $pj_rehat_malam + $pj_am_siang + $pj_am_malam;


        //kiraan gaji
        $oraclegaji = OracleGaji::where('hr_no_pekerja','=',$user->user_code)->get('hr_gaji_pokok')->first()->hr_gaji_pokok;

        // dd($oraclegaji);

        $kiraangaji = 0;
        $kiraangajijam = 0;
        $JumlahRM = 0;


        $kiraangaji = round($oraclegaji * 12,3);
        $kiraangajijam = round($kiraangaji / 2504,3);
        $JumlahRM = round($kiraangajijam * $jumlah_jam_persamaan,3);


        //TODO
        //if jumlah jam_persamaan lebih dari 69 => set status lulus1/3 = 1
        //if jumlah jam_persamaan lebih dari 208 => set status lulussebulan = 1

        //test 1/3
        //$jumlah_jam_persamaan =300;

        if ($jumlah_jam_persamaan > 69.555 && $jumlah_jam_persamaan < 208.666) {
            $tuntutan->lulus_satupertiga = 1;
            $tuntutan->lulus_sebulan = 0;

            $tuntutan->save();
        }

        if ($jumlah_jam_persamaan > 208.666) {
            $tuntutan->lulus_sebulan = 1;
            $tuntutan->lulus_satupertiga = 1;
            $tuntutan->save();

        }


        return view('tuntutan.semaktuntutan',[
            'tuntutan'=> $tuntutan,
            'permohonan_ygdituntut'=>$permohonan_ygdituntut,
            "pegawai_lulus"=>$permohonan_ygdituntut[0]->pegawai_lulus,
            "pegawai_sokong"=>$permohonan_ygdituntut[0]->pegawai_sokong,
            "user"=>$user,
            "jumlah_jam_keseluruhan_show_biasa"=>$jumlah_jam_keseluruhan_show_biasa,
            "jumlah_jam_keseluruhan_show_rehat"=>$jumlah_jam_keseluruhan_show_rehat,
            "jumlah_jam_keseluruhan_show_am"=>$jumlah_jam_keseluruhan_show_am,

            // JUMLAH JAM
            "biasa_siang_total"=>$biasa_siang_total,
            "biasa_malam_total"=>$biasa_malam_total,
            "rehat_siang_total"=>$rehat_siang_total,
            "rehat_malam_total"=>$rehat_malam_total,
            "am_siang_total"=>$am_siang_total,
            "am_malam_total"=>$am_malam_total,

            // JUMLAH DUIT OT
            "pj_biasa_siang"=>$pj_biasa_siang,
            "pj_biasa_malam"=>$pj_biasa_malam,
            "pj_rehat_siang"=>$pj_rehat_siang,
            "pj_rehat_malam"=>$pj_rehat_malam,
            "pj_am_siang"=>$pj_am_siang,
            "pj_am_malam"=>$pj_am_malam,

            "jumlah_jam_kiraan"=> $jumlah_jam_kiraan,
            "jumlah_jam_persamaan" => $jumlah_jam_persamaan,

            "oraclegaji"=>$oraclegaji,
            "kiraangaji"=>$kiraangaji,
            "kiraangajijam"=>$kiraangajijam,
            "JumlahRM"=>$JumlahRM,



        ]);
    }
    public function edit(Tuntutan $tuntutan){
    }
    public function update(Request $request, Tuntutan $tuntutan){
    }
    public function destroy(Request $request, Tuntutan $tuntutan){
    }
    public function sokong_tuntutan($id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> sokong_tuntutan = true;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';


        return redirect($redirected_url);        

    }
    public function tolak_sokong_tuntutan(Request $request){
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> sokong_tuntutan = false;
        $tuntutan-> sokong_tuntutan_sebab = $request-> sokong_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function lulus_tuntutan($id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> lulus_tuntutan = true;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function tolak_lulus_tuntutan(Request $request){
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> lulus_tuntutan = false;
        $tuntutan-> lulus_tuntutan_sebab = $request-> lulus_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function semak_tuntutan(Request $request,$id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> semak_tuntutan = true;
        $tuntutan-> kerani_semakan_id = $request->user()->id;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';

        return redirect($redirected_url)->with('success2','lulus semakan');        
   

    }
    public function tolak_semak_tuntutan(Request $request){
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> semak_tuntutan = false;
        $tuntutan-> semak_sebab = $request-> semak_sebab;
        $tuntutan-> kerani_semakan_id = $request->user()->id;


        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function periksa_tuntutan(Request $request, $id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> periksa_tuntutan = true;
        $tuntutan-> kerani_pemeriksa_id = $request->user()->id;
        $tuntutan->save();

        $redirected_url= '/tuntutans/';

        
        // echo '<script language="javascript">';
        // echo 'document.getElementById("tabs-icons-text-2-tab").click()';
        // echo '</script>';
        
        return redirect($redirected_url)->with('success1','periksa tuntutan');        

    }
    public function tolak_periksa_tuntutan(Request $request){
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan-> periksa_tuntutan = false;
        $tuntutan-> periksa_sebab = $request-> periksa_sebab;
        $tuntutan-> kerani_pemeriksa_id = $request->user()->id;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function kemaskinipegawaituntutan(Request $request, $id){
        
        $tuntutan = Tuntutan::find($id);

        $tuntutan->pegawai_sokong_id = $request-> pegawai_sokong_id;
        $tuntutan->pegawai_lulus_id = $request-> pegawai_lulus_id;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);

    }
    public function laporan_tuntutan(Request $request,$tuntutan){

        $getpermohonan = UserPermohonan::where('user_id', $request->user()->id)->get();
        $getuser = User::where('id', $request->user()->id)->first();

        //get laporan

        $permohonan_id = PermohonanTuntutan::where('tuntutan_id',$tuntutan)
        ->get();

        $semak_tuntutan = [];
        foreach ($permohonan_id as $pydt) {
            $temp = Permohonan::where('id', $pydt->permohonan_id)->first();
            array_push($semak_tuntutan, $temp);
        }
        // dd($semak_tuntutan);

        // $permohonan = count(UserPermohonan::where('user_id',$id)->where('permohonan_id')->get());
        // $tidak_hadir = count(UserRollcall::where('penguatkuasa_id',$id)->where('lulus', 0)->get());
        // $belum_hadir = count(UserRollcall::where('penguatkuasa_id',$id)->where('lulus', null)->get());

        $currentdate = Carbon::now()->format('Y-m-d ');

        //cetakan
        $pdf = PDF::loadView('tuntutan.laporan_tuntutan', [
            "getuser" => $getuser,
            "semak_tuntutan" => $semak_tuntutan,
            // "tidak_hadir" => $tidak_hadir,
            // "belum_hadir" => $belum_hadir,
            // "laporan_permohonan_ind" => $tajuk_rollcall,
            "currentdate"=>$currentdate,

        ])->setPaper('a4');

        $pdf->save('laporan_tuntutan.pdf');

        return view('laporan.pdf_viewer', [
            "url"=> '/laporan_tuntutan.pdf',
            "title"=>'Laporan Tuntutan',
            "link_kembali" => '/tuntutans',

        ]);

    
    }
    public function mohon_kemaskini(Request $request,$id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> mohon_kemaskini_periksa = true;
        $tuntutan-> kerani_pemeriksa_id = $request->user()->id;
        $tuntutan-> mohon_kemaskini1_sebab = $request-> mohon_kemaskini1_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function mohon_kemaskini2(Request $request,$id){
        
        $tuntutan = Tuntutan::find($id);
        $tuntutan-> mohon_kemaskini_semak = true;
        $tuntutan-> kerani_semakan_id = $request->user()->id;
        $tuntutan-> mohon_kemaskini2_sebab = $request-> mohon_kemaskini2_sebab;

        $tuntutan->save();

        $redirected_url= '/tuntutans/';
        return redirect($redirected_url);        

    }
    public function kemaskinitindakanperiksa(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        if ($permohonan->tindakan_periksa == 1) {
            $permohonan->tindakan_periksa = 0;
        }
        else {
            $permohonan->tindakan_periksa = 1;
        }
        $permohonan->save();

    }
    public function kemaskinitindakansemakan(Request $request, $id_permohonan) {
        $permohonan = Permohonan::find($id_permohonan);
        if ($permohonan->tindakan_semakan == 1) {
            $permohonan->tindakan_semakan = 0;
        }
        else {
            $permohonan->tindakan_semakan = 1;
        }
        $permohonan->save();

    }
    public function semaksatupertiga(Request $request, $tuntutan){

        $permohonans_pertiga = [];

        $permohonan_tuntutan_pertiga = PermohonanTuntutan::where('tuntutan_id', $tuntutan)->get();
        foreach($permohonan_tuntutan_pertiga as $pt) {
            $permohonan = Permohonan::where('id', $pt->permohonan_id)->first();
            array_push($permohonans_pertiga, $permohonan);

        }
    
        return view('tuntutan.semaksatupertiga', compact('permohonans_pertiga'));
    }
    public function semaksebulan(Request $request,$tuntutan){

        $permohonans_sebulan = [];

        $permohonan_tuntutan_sebulan = PermohonanTuntutan::where('tuntutan_id', $tuntutan)->get();
        foreach($permohonan_tuntutan_sebulan as $pt) {
            $permohonan = Permohonan::where('id', $pt->permohonan_id)->first();
            array_push($permohonans_sebulan, $permohonan);

        }

        return view('tuntutan.semaksebulan',compact('permohonans_sebulan'));
    }
}
