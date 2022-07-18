<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use App\Models\Ekedatangan;
use App\Models\OracleCutiAm;
use App\Models\OracleGaji;
use App\Models\Permohonan;
use App\Models\PermohonansDibuang;
use App\Models\PermohonanTuntutan;
use App\Models\PermohonanTuntutanDibuang;
use App\Models\Tuntutan;
use App\Models\User;
use App\Models\UserPermohonan;
use App\Models\Utiliti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Session;

class TuntutanController extends Controller
{

    public function index(Request $request, Tuntutan $tuntutan)
    {

        $user = User::get('role');
        $user_id = $request->user()->id;

        $tuntutan_k = User::find($user_id)
            ->permohonans()
            ->where('lulus_selepas', '=', '1')
            ->where('status_tuntutan', '=', null)
            ->orderByDesc("created_at")
            ->get();

        $jumlah_jam_biasa = 0;
        $jumlah_jam_rehat = 0;
        $jumlah_jam_am = 0;
        $jumlah_jam_keseluruhan = 0;

        foreach ($tuntutan_k as $pl) {
            $pegawai_sokong = User::where("id", $pl->pegawai_sokong_id)->first()->name;
            $update_permohonan = Permohonan::where('id', $pl->id)->first();
            $pegawai_lulus = User::where("id", $pl->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;
            $pl->pegawai_sokong = $pegawai_sokong;

            //tumpang
            $time = explode(" ", $pl->sebenar_mula_kerja);
            $time2 = explode(" ", $pl->sebenar_akhir_kerja);
            $sebenar_mula_kerja_ts = strtotime($time[1]);
            $sebenar_akhir_kerja_ts = strtotime($time2[1]);
            $jumlah_jam_bekerja = strtotime($pl->sebenar_akhir_kerja) - strtotime($pl->sebenar_mula_kerja);
            $jumlah_jam_bekerja = $jumlah_jam_bekerja / 3600;
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
            if (($dt3 == "saturday") || ($dt3 == "sunday")) {
                $weekend = true;
            }

            if (isset($pl->jenis_masa)) {
                switch ($pl->jenis_masa) {
                    case 'Hari Biasa Siang':
                        $pl->kadar_biasa_siang = "1.125";
                        $pl->jam_kerja_biasa_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_biasa_siang = $jumlah_jam_bekerja;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;
                        break;
                    case 'Hari Biasa Malam':
                        $pl->kadar_biasa_malam = "1.25";
                        $pl->jam_kerja_biasa_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_biasa_malam = $jumlah_jam_bekerja;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;
                        break;
                    case 'Hari Rehat Siang':
                        $pl->kadar_cuti_siang = "1.25";
                        $pl->jam_kerja_cuti_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_rehat_siang = $jumlah_jam_bekerja;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;
                        break;
                    case 'Hari Rehat Malam':
                        $pl->kadar_cuti_malam = "1.50";
                        $pl->jam_kerja_cuti_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_rehat_malam = $jumlah_jam_bekerja;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;
                        break;
                    case 'Pelepasan Am Siang':
                        $pl->kadar_am_siang = "1.75";
                        $pl->jam_kerja_am_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_am_siang = round($jumlah_jam_bekerja, 3);
                        $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja, 3);
                        break;
                    case 'Pelepasan Am Malam':
                        $pl->kadar_am_malam = "2.00";
                        $pl->jam_kerja_am_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_am_malam = round($jumlah_jam_bekerja, 3);
                        $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja, 3);

                        break;
                    default:
                        dd("invalid jenis masa");
                        break;
                }
                $update_permohonan->save();

            } else {

                // $check_weekend
                if ($check_am > 0) {
                    //kerja time cuti am
                    if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_akhir_kerja_ts <= $ub_siang) {
                        $pl->kadar_am_siang = "1.75";
                        $pl->jam_kerja_am_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_am_siang = round($jumlah_jam_bekerja, 3);
                        $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja, 3);

                    } elseif ($sebenar_mula_kerja_ts >= $lb_malam && $sebenar_akhir_kerja_ts <= $ub_malam) {
                        $pl->kadar_am_malam = "2.00";
                        $pl->jam_kerja_am_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_am_malam = round($jumlah_jam_bekerja, 3);
                        $jumlah_jam_am = $jumlah_jam_am + round($jumlah_jam_bekerja, 3);

                    } elseif ($sebenar_mula_kerja_ts >= $lb_siang && !($sebenar_akhir_kerja_ts <= $ub_siang)) {
                        $pl->kadar_am_siang = "1.75";
                        $masa = (strtotime('21:59') - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_am_siang = $masa;
                        $update_permohonan->jumlah_am_siang = $masa;
                        $jumlah_jam_am = $jumlah_jam_am + $masa;

                        $pl->kadar_am_malam = "2.00";
                        $masa_akhir = ($sebenar_akhir_kerja_ts - strtotime('21:59')) / 3600;
                        $pl->jam_kerja_am_malam = $masa_akhir;
                        $update_permohonan->jumlah_am_malam = $masa_akhir;
                        $jumlah_jam_am = $jumlah_jam_am + $masa_akhir;

                    } elseif ($sebenar_mula_kerja_ts >= strtotime('00:00') && $sebenar_akhir_kerja_ts >= $lb_siang) {

                        $pl->kadar_am_siang = "1.75";
                        $masa = ($sebenar_akhir_kerja_ts - $ub_malam) / 3600;
                        $pl->jam_kerja_am_siang = $masa;
                        $update_permohonan->jumlah_am_siang = $masa;
                        $jumlah_jam_am = $jumlah_jam_am + $masa;

                        $pl->kadar_am_malam = "2.00";
                        $masa_akhir = ($ub_malam - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_am_malam = $masa_akhir;
                        $update_permohonan->jumlah_am_malam = $masa_akhir;
                        $jumlah_jam_am = $jumlah_jam_am + $masa_akhir;

                    }

                    //cuti rehat
                } elseif ($weekend) {
                    if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_akhir_kerja_ts <= $ub_siang) {
                        $pl->kadar_cuti_siang = "1.25";
                        $pl->jam_kerja_cuti_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_rehat_siang = $jumlah_jam_bekerja;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;

                    } elseif ($sebenar_mula_kerja_ts >= $lb_malam && $sebenar_akhir_kerja_ts <= $ub_malam) {
                        $pl->kadar_cuti_malam = "1.50";
                        $pl->jam_kerja_cuti_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_rehat_malam = $jumlah_jam_bekerja;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $jumlah_jam_bekerja;

                    } elseif ($sebenar_mula_kerja_ts >= $lb_siang && !($sebenar_akhir_kerja_ts <= $ub_siang)) {
                        $pl->kadar_cuti_siang = "1.125";
                        $masa = (strtotime('21:59') - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_cuti_siang = $masa;
                        $update_permohonan->jumlah_rehat_siang = $masa;
                        $jumlah_jam_am = $jumlah_jam_rehat + $masa;

                        $pl->kadar_cuti_malam = "1.25";
                        $masa_akhir = ($sebenar_akhir_kerja_ts - strtotime('21:59')) / 3600;
                        $pl->jam_kerja_cuti_malam = $masa_akhir;
                        $update_permohonan->jumlah_rehat_malam = $masa_akhir;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $masa_akhir;

                    } elseif ($sebenar_mula_kerja_ts >= strtotime('00:00') && $sebenar_akhir_kerja_ts >= $lb_siang) {

                        $pl->kadar_cuti_siang = "1.125";
                        $masa = ($sebenar_akhir_kerja_ts - $ub_malam) / 3600;
                        $pl->jam_kerja_cuti_siang = $masa;
                        $update_permohonan->jumlah_rehat_siang = $masa;
                        $jumlah_jam_am = $jumlah_jam_rehat + $masa;

                        $pl->kadar_cuti_malam = "1.25";
                        $masa_akhir = ($ub_malam - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_cuti_malam = $masa_akhir;
                        $update_permohonan->jumlah_rehat_malam = $masa_akhir;
                        $jumlah_jam_rehat = $jumlah_jam_rehat + $masa_akhir;

                    }
                }
                //hari biasa
                else {
                    if ($sebenar_mula_kerja_ts >= $lb_siang && $sebenar_akhir_kerja_ts <= $ub_siang) {
                        $pl->kadar_biasa_siang = "1.125";
                        $pl->jam_kerja_biasa_siang = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_biasa_siang = $jumlah_jam_bekerja;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;

                    } elseif ($sebenar_mula_kerja_ts >= $lb_malam && $sebenar_akhir_kerja_ts <= $ub_malam) {
                        $pl->kadar_biasa_malam = "1.25";
                        $pl->jam_kerja_biasa_malam = $jumlah_jam_bekerja;
                        $update_permohonan->jumlah_biasa_malam = $jumlah_jam_bekerja;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $jumlah_jam_bekerja;

                    } elseif ($sebenar_mula_kerja_ts >= $lb_siang && !($sebenar_akhir_kerja_ts <= $ub_siang)) {
                        $pl->kadar_biasa_siang = "1.125";
                        $masa = (strtotime('21:59') - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_biasa_siang = $masa;
                        $update_permohonan->jumlah_biasa_siang = $masa;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $masa;

                        $pl->kadar_biasa_malam = "1.25";
                        $masa_akhir = ($sebenar_akhir_kerja_ts - strtotime('21:59')) / 3600;
                        $pl->jam_kerja_biasa_malam = $masa_akhir;
                        $update_permohonan->jumlah_biasa_malam = $masa_akhir;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $masa_akhir;

                    } elseif ($sebenar_mula_kerja_ts >= strtotime('00:00') && $sebenar_akhir_kerja_ts >= $lb_siang) {
                        $pl->kadar_biasa_siang = "1.125";
                        $masa = ($sebenar_akhir_kerja_ts - $ub_malam) / 3600;
                        $pl->jam_kerja_biasa_siang = $masa;
                        $update_permohonan->jumlah_biasa_siang = $masa;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $masa;

                        $pl->kadar_biasa_malam = "1.25";
                        $masa_akhir = ($ub_malam - $sebenar_mula_kerja_ts) / 3600;
                        $pl->jam_kerja_biasa_malam = $masa_akhir;
                        $update_permohonan->jumlah_biasa_malam = $masa_akhir;
                        $jumlah_jam_biasa = $jumlah_jam_biasa + $masa_akhir;

                    }
                }

                $update_permohonan->save();
            }

        }
        $jumlah_jam_keseluruhan = $jumlah_jam_keseluruhan + $jumlah_jam_biasa + $jumlah_jam_rehat + $jumlah_jam_am;

        $tuntutan_lulus = Tuntutan::where('user_id', $user_id)
            ->orderByDesc("created_at")
            ->get();

        foreach ($tuntutan_lulus as $pl) {
            $pegawai_lulus = User::where("id", $pl->pegawai_lulus_id)->first()->name;
            $pegawai_sokong = User::where("id", $pl->pegawai_sokong_id)->first()->name;
            $pl->pegawai_sokong = $pegawai_sokong;
            $pl->pegawai_lulus = $pegawai_lulus;
        }

        $sokong_tuntutan = Tuntutan::where('pegawai_sokong_id', $user_id)
            ->orderByDesc("created_at")
            ->get();

        foreach ($sokong_tuntutan as $npt) {
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $npt->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            $npt->nama_pemohon = $pemohon;
        }

        // lulus tuntutan

        $lulus_tuntutan = Tuntutan::where('pegawai_lulus_id', $user_id)
            ->orderByDesc("created_at")
            ->get();

        foreach ($lulus_tuntutan as $npt) {
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $npt->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            $npt->nama_pemohon = $pemohon;
        }
        // semak tuntutan kerani semakan
        $semak_tuntutans = Tuntutan::orderBy('created_at', 'DESC')->get();

        foreach ($semak_tuntutans as $npt) {
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;
            $npt->nama_pemohon = $pemohon;

            $pegawai_sokong = User::where("id", $npt->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

        }

        $periksa_tuntutans = Tuntutan::orderBy('created_at', 'DESC')->get();

        foreach ($periksa_tuntutans as $npt) {
            $uuuuid = Tuntutan::where("id", $npt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first();
            $npt->nama_pemohon = $pemohon->name;
            $npt->usercode = $pemohon->user_code;

            $pegawai_sokong = User::where("id", $npt->pegawai_sokong_id)->first()->name;
            $npt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $npt->pegawai_lulus_id)->first()->name;
            $npt->pegawai_lulus = $pegawai_lulus;

            if ($npt->lulus_satupertiga == null && $npt->lulus_sebulan == null) {
                $npt['jenis'] = "Biasa";
            }
            if ($npt->lulus_satupertiga == 1 && $npt->lulus_sebulan == 0) {
                $npt['jenis'] = "Satu Pertiga";
            }
            if ($npt->lulus_satupertiga == 1 && $npt->lulus_sebulan == 1) {
                $npt['jenis'] = "Sebulan";
            }
        }

        //pelulus pindaan rekod

        $tuntutan_kemaskini = Tuntutan::where('mohon_kemaskini_periksa', '=', 1)
            ->orWhere('mohon_kemaskini_semak', '=', 1)
            ->orderByDesc("created_at")
            ->get();

        //get_name_kerani
        foreach ($tuntutan_kemaskini as $kpn) {
            $kerani_periksa_name = User::where("id", $kpn->kerani_pemeriksa_id)->first()->name;
            $kpn->kerani_periksa_name = $kerani_periksa_name;
            $kakitangan_name = User::where("id", $kpn->user_id)->first()->name;
            $kpn->kakitangan_name = $kakitangan_name;
        }

        $semak_satupertiga = Tuntutan::where('lulus_satupertiga', 1)
            ->orderByDesc("created_at")
            ->get();

        foreach ($semak_satupertiga as $sspt) {
            $uuuuid = Tuntutan::where("id", $sspt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $sspt->pegawai_sokong_id)->first()->name;
            $sspt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $sspt->pegawai_lulus_id)->first()->name;
            $sspt->pegawai_lulus = $pegawai_lulus;

            $sspt->nama_pemohon = $pemohon;
        }
        $semak_sebulan = Tuntutan::where('lulus_satupertiga', 1)
            ->where('lulus_sebulan', 1)
            ->orderByDesc("created_at")
            ->get();

        foreach ($semak_sebulan as $sspt) {
            $uuuuid = Tuntutan::where("id", $sspt->id)->first()->user_id;
            $pemohon = User::where("id", $uuuuid)->first()->name;

            $pegawai_sokong = User::where("id", $sspt->pegawai_sokong_id)->first()->name;
            $sspt->pegawai_sokong = $pegawai_sokong;

            $pegawai_lulus = User::where("id", $sspt->pegawai_lulus_id)->first()->name;
            $sspt->pegawai_lulus = $pegawai_lulus;

            $sspt->nama_pemohon = $pemohon;
        }

        // dd($semak_satupertiga);
        //get kemaskini pegawai
        $pegawaituntutan = User::whereIn('role', array('penyelia', 'ketua_bahagian', 'ketua_jabatan'))->get();

        $bulan_sekarang = now()->month;
        $hari_db = Utiliti::where('bulan', $bulan_sekarang)->first()->tarikh;
        if (now()->day > (int) $hari_db) {
            $bulan_sekarang++;
            $hari_db = Utiliti::where('bulan', $bulan_sekarang)->first()->tarikh;
        }
        $tarikh_auto_hantar_tuntutan = $hari_db . "/" . $bulan_sekarang . "/" . now()->year;

        return view('tuntutan.index', [
            'tuntutan_k2' => $tuntutan_k,
            'tuntutan_k' => $tuntutan_k,
            // 'tuntutans'=>$tuntutans,
            'sokong_tuntutan' => $sokong_tuntutan,
            'lulus_tuntutan' => $lulus_tuntutan,

            'tuntutan_lulus' => $tuntutan_lulus,

            'semak_tuntutans' => $semak_tuntutans,
            'periksa_tuntutans' => $periksa_tuntutans,

            'pegawaituntutan' => $pegawaituntutan,

            'jumlah_jam_biasa' => $jumlah_jam_biasa,
            'jumlah_jam_rehat' => $jumlah_jam_rehat,
            'jumlah_jam_am' => $jumlah_jam_am,
            'jumlah_jam_keseluruhan' => $jumlah_jam_keseluruhan,

            'tuntutan_kemaskini' => $tuntutan_kemaskini,
            'semak_satupertiga' => $semak_satupertiga,
            'semak_sebulan' => $semak_sebulan,
            'tarikh_auto_hantar_tuntutan' => $tarikh_auto_hantar_tuntutan,
            // 'tuntutan_satupertiga'=> Tuntutan::where('lulus_satupertiga', 1)->get(),
            // 'tuntutan_sebulan'=> Tuntutan::where('lulus_sebulan', 1)->get(),
            'pegawaiSokong' => User::whereIn('role', array('penyelia', 'ketua_bahagian'))->get(),
            'pegawaiLulus' => User::whereIn('role', array('ketua_bahagian', 'ketua_jabatan'))->get(),

        ]);

    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $permohonan = Session::get('permohonan_id');
        // dd($permohonan);
        $tuntutan = new Tuntutan;

        $sebenar_mula_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_mula_kerja_tuntutan));
        $sebenar_akhir_kerja_tuntutan = date("Y-m-d H:i:s", strtotime($request->sebenar_akhir_kerja_tuntutan));
        $tuntutan->sebenar_mula_kerja_tuntutan = $sebenar_mula_kerja_tuntutan;
        $tuntutan->sebenar_akhir_kerja_tuntutan = $sebenar_akhir_kerja_tuntutan;
        $tuntutan->jumlah_jam_tuntutan = $request->jumlah_jam_tuntutan;
        $tuntutan->jumlah_tuntutan = $request->jumlah_tuntutan;
        $tuntutan->status = $request->status;
        $tuntutan->pegawai_sokong_id = $request->pegawai_sokong_id;
        $tuntutan->pegawai_lulus_id = $request->pegawai_lulus_id;

        $tuntutan->user_id = $request->user()->id;

        $tuntutan->save();

        $permohonan_tuntutans = new PermohonanTuntutan;
        $permohonan_tuntutans->tuntutan_id = $tuntutan->id;
        $permohonan_tuntutans->permohonan_id = $permohonan->id;
        // $permohonan_tuntutans->permohonan_id = $request->user()->id;

        $permohonan_tuntutans->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);
    }
    public function show(Tuntutan $tuntutan, Request $request)
    {

        // $user = User::get('role');
        $user = null;

        $user_id = $request->user()->id;

        $permohonan_id = PermohonanTuntutan::where('tuntutan_id', $tuntutan->id)
            ->get();
        $permohonan_ygdituntut = [];
        foreach ($permohonan_id as $pydt) {
            $temp = Permohonan::where('id', $pydt->permohonan_id)->first();
            array_push($permohonan_ygdituntut, $temp);
        }
        foreach ($permohonan_ygdituntut as $ps) {
            $pegawai_sokong = User::where("id", $ps->pegawai_sokong_id)->first()->name;
            $ps->pegawai_sokong = $pegawai_sokong;
        }
        foreach ($permohonan_ygdituntut as $pl) {
            $user_permohonan = UserPermohonan::where('permohonan_id', $pl->id)->first()->user_id;
            $user = User::where('id', '=', $user_permohonan)->first();
            $pegawai_lulus = User::where("id", $pl->pegawai_lulus_id)->first()->name;
            $pl->pegawai_lulus = $pegawai_lulus;

            $userekedatangan = Ekedatangan::where('staffno', $user->user_code)
                ->whereDate('tarikh', "=", substr($pl->mohon_mula_kerja, 0, 10))
                ->first();

            if ($userekedatangan != null) {
                $pl['tarikh'] = $userekedatangan->tarikh;
                $pl['clockouttime'] = $userekedatangan->clockouttime;
                $pl['clockintime'] = $userekedatangan->clockintime;
                $pl['statusdesc'] = $userekedatangan->tarikh;
                $pl['waktuanjal'] = $userekedatangan->waktuanjal;
            } else {
                $pl['tarikh'] = 'Tiada Rekod';
                $pl['clockouttime'] = 'Tiada Rekod';
                $pl['clockintime'] = 'Tiada Rekod';
                $pl['statusdesc'] = 'Tiada Rekod';
                $pl['waktuanjal'] = 'Tiada Rekod';
            }

        }

        $biasa_siang_total = 0;
        $biasa_malam_total = 0;
        $rehat_siang_total = 0;
        $rehat_malam_total = 0;
        $am_siang_total = 0;
        $am_malam_total = 0;

        $jumlah_jam_keseluruhan_show_biasa = 0;
        $jumlah_jam_keseluruhan_show_rehat = 0;
        $jumlah_jam_keseluruhan_show_am = 0;

        foreach ($permohonan_ygdituntut as $pyd) {

            #siang
            $biasa_siang_total = number_format($biasa_siang_total + $pyd->jumlah_biasa_siang, 3);
            $biasa_malam_total = number_format($biasa_malam_total + $pyd->jumlah_biasa_malam, 3);

            #siang
            $rehat_siang_total = number_format($rehat_siang_total + $pyd->jumlah_rehat_siang, 3);
            $rehat_malam_total = number_format($rehat_malam_total + $pyd->jumlah_rehat_malam, 3);

            #siang
            $am_siang_total = number_format($am_siang_total + $pyd->jumlah_am_siang, 3);
            $am_malam_total = number_format($am_malam_total + $pyd->jumlah_am_malam, 3);

        }

        #calculate
        $jumlah_jam_keseluruhan_show_biasa = $jumlah_jam_keseluruhan_show_biasa + $biasa_siang_total + $biasa_malam_total;
        $jumlah_jam_keseluruhan_show_rehat = $jumlah_jam_keseluruhan_show_rehat + $rehat_siang_total + $rehat_malam_total;
        $jumlah_jam_keseluruhan_show_am = $jumlah_jam_keseluruhan_show_am + $am_siang_total + $am_malam_total;

        #persamaan jam
        $pj_biasa_siang = $biasa_siang_total * 1.125;
        $pj_biasa_malam = $biasa_malam_total * 1.25;
        $pj_rehat_siang = $rehat_siang_total * 1.25;
        $pj_rehat_malam = $rehat_malam_total * 1.5;
        $pj_am_siang = $am_siang_total * 1.75;
        $pj_am_malam = $am_malam_total * 2;

        // tambah save logic

        //total Jumlah Jam
        $jumlah_jam_kiraan = 0;
        $jumlah_jam_kiraan = $jumlah_jam_kiraan + $jumlah_jam_keseluruhan_show_biasa + $jumlah_jam_keseluruhan_show_rehat + $jumlah_jam_keseluruhan_show_am;
        //Total Persamaan Jam
        $jumlah_jam_persamaan = 0;
        $jumlah_jam_persamaan = $jumlah_jam_persamaan + $pj_biasa_siang + $pj_biasa_malam + $pj_rehat_siang + $pj_rehat_malam + $pj_am_siang + $pj_am_malam;

        //kiraan gaji
        if ($user == null) {
            $oraclegaji = 0;
        } else {
            $oraclegaji = OracleGaji::where('hr_no_pekerja', '=', $user->user_code)->get('hr_gaji_pokok')->first()->hr_gaji_pokok;
        }

        // dd($oraclegaji);

        $kiraangaji = 0;
        $kiraangajijam = 0;
        $JumlahRM = 0;

        $kiraangaji = round($oraclegaji * 12, 3);
        $kiraangajijam = round($kiraangaji / 2504, 3);
        $JumlahRM = round($kiraangajijam * $jumlah_jam_persamaan, 3);

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

        //permohonan yang dibuang
        $p_t_d = PermohonanTuntutanDibuang::where('tuntutan_id', $tuntutan->id)->get();

        $permohonanTuntutanDibuang = [];
        foreach ($p_t_d as $ptd) {
            array_push($permohonanTuntutanDibuang, PermohonansDibuang::where('id', $ptd->permohonan_id)->first());
        }

        foreach ($permohonanTuntutanDibuang as $pl) {
            if ($user == null) {
                $userekedatangan = null;
            } else {
                $userekedatangan = Ekedatangan::where('staffno', $user->user_code)
                    ->whereDate('tarikh', "=", substr($pl->mohon_mula_kerja, 0, 10))
                    ->first();
            }

            if ($userekedatangan != null) {
                $pl['tarikh'] = $userekedatangan->tarikh;
                $pl['clockouttime'] = $userekedatangan->clockouttime;
                $pl['clockintime'] = $userekedatangan->clockintime;
                $pl['statusdesc'] = $userekedatangan->tarikh;
                $pl['waktuanjal'] = $userekedatangan->waktuanjal;
            } else {
                $pl['tarikh'] = 'Tiada Rekod';
                $pl['clockouttime'] = 'Tiada Rekod';
                $pl['clockintime'] = 'Tiada Rekod';
                $pl['statusdesc'] = 'Tiada Rekod';
                $pl['waktuanjal'] = 'Tiada Rekod';
            }

        }

        return view('tuntutan.semaktuntutan', [
            'tuntutan' => $tuntutan,
            'permohonan_ygdituntut' => $permohonan_ygdituntut,
            "pegawai_lulus" => $pegawai_lulus,
            "pegawai_sokong" => $pegawai_sokong,
            "user" => $user,
            "jumlah_jam_keseluruhan_show_biasa" => $jumlah_jam_keseluruhan_show_biasa,
            "jumlah_jam_keseluruhan_show_rehat" => $jumlah_jam_keseluruhan_show_rehat,
            "jumlah_jam_keseluruhan_show_am" => $jumlah_jam_keseluruhan_show_am,

            // JUMLAH JAM
            "biasa_siang_total" => $biasa_siang_total,
            "biasa_malam_total" => $biasa_malam_total,
            "rehat_siang_total" => $rehat_siang_total,
            "rehat_malam_total" => $rehat_malam_total,
            "am_siang_total" => $am_siang_total,
            "am_malam_total" => $am_malam_total,

            // JUMLAH DUIT OT
            "pj_biasa_siang" => $pj_biasa_siang,
            "pj_biasa_malam" => $pj_biasa_malam,
            "pj_rehat_siang" => $pj_rehat_siang,
            "pj_rehat_malam" => $pj_rehat_malam,
            "pj_am_siang" => $pj_am_siang,
            "pj_am_malam" => $pj_am_malam,

            "jumlah_jam_kiraan" => $jumlah_jam_kiraan,
            "jumlah_jam_persamaan" => $jumlah_jam_persamaan,

            "oraclegaji" => $oraclegaji,
            "kiraangaji" => $kiraangaji,
            "kiraangajijam" => $kiraangajijam,
            "JumlahRM" => $JumlahRM,

            "permohonan_dibuang" => $permohonanTuntutanDibuang,
        ]);
    }
    public function edit(Tuntutan $tuntutan)
    {
    }
    public function update(Request $request, Tuntutan $tuntutan)
    {
    }
    public function destroy(Request $request, Tuntutan $tuntutan)
    {
    }
    public function sokong_tuntutan($id)
    {

        $tuntutan = Tuntutan::find($id);
        $tuntutan->sokong_tuntutan = true;
        $tuntutan->save();

        $redirected_url = '/tuntutans/';

        return redirect($redirected_url);

    }
    public function tolak_sokong_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan->sokong_tuntutan = false;
        $tuntutan->sokong_tuntutan_sebab = $request->sokong_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function lulus_tuntutan($id)
    {

        $tuntutan = Tuntutan::find($id);
        $tuntutan->lulus_tuntutan = true;
        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function tolak_lulus_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan->lulus_tuntutan = false;
        $tuntutan->lulus_tuntutan_sebab = $request->lulus_tuntutan_sebab;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function semak_tuntutan(Request $request, $id)
    {

        $tuntutan = Tuntutan::find($id);
        $tuntutan->semak_tuntutan = true;
        $tuntutan->kerani_semakan_id = $request->user()->id;
        $tuntutan->save();

        $redirected_url = '/tuntutans/';

        return redirect($redirected_url)->with('success2', 'lulus semakan');

    }
    public function tolak_semak_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan->semak_tuntutan = false;
        $tuntutan->semak_sebab = $request->semak_sebab;
        $tuntutan->kerani_semakan_id = $request->user()->id;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function periksa_tuntutan(Request $request, $id)
    {
        $tuntutan = Tuntutan::find($id);
        $tuntutan->periksa_tuntutan = true;
        $tuntutan->kerani_pemeriksa_id = $request->user()->id;
        $tuntutan->save();

        $redirected_url = '/tuntutans/';

        return redirect($redirected_url)->with('success1', 'periksa tuntutan');

    }
    public function tolak_periksa_tuntutan(Request $request)
    {
        $tuntutan = Tuntutan::find($request->id);
        $tuntutan->periksa_tuntutan = false;
        $tuntutan->periksa_sebab = $request->periksa_sebab;
        $tuntutan->kerani_pemeriksa_id = $request->user()->id;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function kemaskinipegawaituntutan(Request $request, Tuntutan $tuntutan)
    {

        $tuntutan->update([
            'pegawai_sokong_id' => $request->pegawai_sokong_id,
            'pegawai_lulus_id' => $request->pegawai_lulus_id,
        ]);

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);
    }
    public function laporan_tuntutan(Request $request, $tuntutan)
    {

        $getpermohonan = UserPermohonan::where('user_id', $request->user()->id)->get();

        //get laporan

        $permohonanT = PermohonanTuntutan::where('tuntutan_id', $tuntutan)
            ->get();

        $getuser = Permohonan::find($permohonanT[0]->permohonan_id)->user;

        $maklumat_pekerjaan = OracleGaji::where('hr_no_pekerja', $getuser->user_code)->first();
        $bahagian_code = $maklumat_pekerjaan->HR_BAHAGIAN;

        $gaji = $maklumat_pekerjaan->HR_GAJI_POKOK;
        $bahagian = Bahagian::where('ge_kod_bahagian', $bahagian_code)->first()->GE_KETERANGAN;

        //done

        $semak_tuntutan = [];
        foreach ($permohonanT as $pydt) {
            $temp = Permohonan::where('id', $pydt->permohonan_id)->first();
            array_push($semak_tuntutan, $temp);
        }

        $currentdate = Carbon::now()->format('Y-m-d ');

        foreach ($semak_tuntutan as $pl) {
            $user_permohonan = UserPermohonan::where('permohonan_id', $pl->id)->first()->user_id;
            $user = User::where('id', '=', $user_permohonan)->first();

            $userekedatangan = Ekedatangan::where('staffno', $user->user_code)
                ->whereDate('tarikh', "=", substr($pl->mohon_mula_kerja, 0, 10))
                ->first();

            if ($userekedatangan != null) {
                $pl['tarikh'] = $userekedatangan->tarikh;
                $pl['clockouttime'] = $userekedatangan->clockouttime;
                $pl['clockintime'] = $userekedatangan->clockintime;
                $pl['statusdesc'] = $userekedatangan->tarikh;
                $pl['waktuanjal'] = $userekedatangan->waktuanjal;
            } else {
                $pl['tarikh'] = 'Tiada Rekod';
                $pl['clockouttime'] = 'Tiada Rekod';
                $pl['clockintime'] = 'Tiada Rekod';
                $pl['statusdesc'] = 'Tiada Rekod';
                $pl['waktuanjal'] = 'Tiada Rekod';
            }
        }

        //cetakan
        $pdf = PDF::loadView('tuntutan.laporan_tuntutan', [
            "getuser" => $getuser,
            "bahagian" => $bahagian,
            "gaji" => $gaji,
            "semak_tuntutan" => $semak_tuntutan,

            "currentdate" => $currentdate,

        ])->setPaper('a4');

        $pdf->save('laporan_tuntutan.pdf');

        return view('laporan.pdf_viewer', [
            "url" => '/laporan_tuntutan.pdf',
            "title" => 'Laporan Tuntutan',
            "link_kembali" => '/tuntutans',

        ]);

    }
    public function mohon_kemaskini(Request $request, $id)
    {

        $tuntutan = Tuntutan::find($id);
        $tuntutan->mohon_kemaskini_periksa = true;
        $tuntutan->kerani_pemeriksa_id = $request->user()->id;
        $tuntutan->mohon_kemaskini1_sebab = $request->mohon_kemaskini1_sebab;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function mohon_kemaskini2(Request $request, $id)
    {

        $tuntutan = Tuntutan::find($id);
        $tuntutan->mohon_kemaskini_semak = true;
        $tuntutan->kerani_semakan_id = $request->user()->id;
        $tuntutan->mohon_kemaskini2_sebab = $request->mohon_kemaskini2_sebab;

        $tuntutan->save();

        $redirected_url = '/tuntutans/';
        return redirect($redirected_url);

    }
    public function kemaskinitindakanperiksa(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        if ($permohonan->tindakan_periksa == 1) {
            $permohonan->tindakan_periksa = 0;
        } else {
            $permohonan->tindakan_periksa = 1;
        }
        $permohonan->save();

    }
    public function kemaskinitindakansemakan(Request $request, $id_permohonan)
    {
        $permohonan = Permohonan::find($id_permohonan);
        if ($permohonan->tindakan_semakan == 1) {
            $permohonan->tindakan_semakan = 0;
        } else {
            $permohonan->tindakan_semakan = 1;
        }
        $permohonan->save();

    }
    public function semaksatupertiga(Request $request, $tuntutan)
    {

        $permohonans_pertiga = [];

        $permohonan_tuntutan_pertiga = PermohonanTuntutan::where('tuntutan_id', $tuntutan)->get();
        foreach ($permohonan_tuntutan_pertiga as $pt) {
            $permohonan = Permohonan::where('id', $pt->permohonan_id)->first();
            array_push($permohonans_pertiga, $permohonan);

        }

        return view('tuntutan.semaksatupertiga', compact('permohonans_pertiga'));
    }
    public function semaksebulan(Request $request, $tuntutan)
    {

        $permohonans_sebulan = [];

        $permohonan_tuntutan_sebulan = PermohonanTuntutan::where('tuntutan_id', $tuntutan)->get();
        foreach ($permohonan_tuntutan_sebulan as $pt) {
            $permohonan = Permohonan::where('id', $pt->permohonan_id)->first();
            array_push($permohonans_sebulan, $permohonan);

        }

        return view('tuntutan.semaksebulan', compact('permohonans_sebulan'));
    }

    public function lulus_tuntutan_satu_pertiga(Tuntutan $tuntutan)
    {
        $tuntutan->update([
            'lulus_kj' => 1,
        ]);
        return back();
    }
    public function lulus_tuntutan_sebulan(Tuntutan $tuntutan)
    {

        $tuntutan->update([
            'lulus_db' => 1,
        ]);
        return back();
    }

    public function tolak_satupertiga(Tuntutan $tuntutan, Request $request)
    {
        $tuntutan->update([
            'lulus_kj' => 0,
            'tolak_satu_per_tiga_sebab' => $request->sebab_menolak,
        ]);
        return back();
    }

    public function tolak_sebulan(Tuntutan $tuntutan, Request $request)
    {
        $tuntutan->update([
            'lulus_db' => 0,
            'tolak_sebulan_sebab' => $request->sebab_ditolak,
        ]);
        return back();
    }

    public function SubmitAll(Request $request)
    {
        $tuntutan = Tuntutan::find($request->tuntutan_id);
        switch ($request->jenis) {
            case 'SatuPerTigaKJ':
                $tuntutan->update([
                    'lulus_kj' => $request->kelulusan,
                ]);
                break;
            case 'SebulanGajiDB':
                $tuntutan->update([
                    'lulus_db' => $request->kelulusan,
                ]);
                break;

            default:
                # code...
                break;
        }
    }

    public function update_jenis_masa(Request $request)
    {
        $permohonan = Permohonan::find($request->id);

        // $kadar_biasa_siang = "1.125";
        // $kadar_biasa_malam = "1.25";
        // $kadar_cuti_siang = "1.25";
        // $kadar_cuti_malam = "1.50";
        // $kadar_am_siang = "1.75";
        // $kadar_am_malam = "2.00";
        $nilai_asal = 0;

        switch ($permohonan->jenis_masa) {
            case 'Hari Biasa Siang':
                $nilai_asal = $permohonan->jumlah_biasa_siang;
                $permohonan->update([
                    'jumlah_biasa_siang' => null,
                ]);
                break;
            case 'Hari Biasa Malam':
                $nilai_asal = $permohonan->jumlah_biasa_malam;
                $permohonan->update([
                    'jumlah_biasa_malam' => null,
                ]);
                break;
            case 'Hari Rehat Siang':
                $nilai_asal = $permohonan->jumlah_rehat_siang;
                $permohonan->update([
                    'jumlah_rehat_siang' => null,
                ]);
                break;
            case 'Hari Rehat Malam':
                $nilai_asal = $permohonan->jumlah_rehat_malam;
                $permohonan->update([
                    'jumlah_rehat_malam' => null,
                ]);
                break;
            case 'Pelepasan Am Siang':
                $nilai_asal = $permohonan->jumlah_am_siang;
                $permohonan->update([
                    'jumlah_am_siang' => null,
                ]);
                break;
            case 'Pelepasan Am Malam':
                $nilai_asal = $permohonan->jumlah_am_malam;
                $permohonan->update([
                    'jumlah_am_malam' => null,
                ]);
                break;
        }
        $permohonan->update([
            'jenis_masa' => $request->jenis_masa,
        ]);

        switch ($permohonan->jenis_masa) {
            case 'Hari Biasa Siang':
                $permohonan->update([
                    'jumlah_biasa_siang' => $nilai_asal,
                ]);
                break;
            case 'Hari Biasa Malam':
                $permohonan->update([
                    'jumlah_biasa_malam' => $nilai_asal,
                ]);
                break;
            case 'Hari Rehat Siang':
                $permohonan->update([
                    'jumlah_rehat_siang' => $nilai_asal,
                ]);
                break;
            case 'Hari Rehat Malam':
                $permohonan->update([
                    'jumlah_rehat_malam' => $nilai_asal,
                ]);
                break;
            case 'Pelepasan Am Siang':
                $permohonan->update([
                    'jumlah_am_siang' => $nilai_asal,
                ]);
                break;
            case 'Pelepasan Am Malam':
                $permohonan->update([
                    'jumlah_am_malam' => $nilai_asal,
                ]);
                break;
        }

    }

    public function buang_permohonan(Permohonan $permohonan)
    {
        $pt = PermohonanTuntutan::where('permohonan_id', $permohonan->id)->first();

        PermohonansDibuang::create($permohonan->attributesToArray());
        PermohonanTuntutanDibuang::create($pt->attributesToArray());

        $permohonan->delete();
        $pt->delete();

        return back();
    }

    public function kembali_permohonan(Request $request)
    {
        $permohonan = PermohonansDibuang::find($request->permohonan_id);
        $pt = PermohonanTuntutanDibuang::where('permohonan_id', $permohonan->id)->first();

        Permohonan::create($permohonan->attributesToArray());
        PermohonanTuntutan::create($pt->attributesToArray());

        $permohonan->delete();
        $pt->delete();

        return back();
    }

    public function kemaskini_semakan_kerani(Request $request)
    {
        if (auth()->user()->usercode->hr_jabatan == 11) {
            for ($i = 0; $i < count($request->permohonan_id); $i++) {
                $permohonan = Permohonan::find($request->permohonan_id[$i]);
                switch ($request->jenis_masa[$i]) {
                    case 'Hari Biasa Siang':
                        $permohonan->update([
                            'jumlah_biasa_siang' => $request->jumlah_biasa_siang[$i],
                        ]);
                        break;
                    case 'Hari Biasa Malam':
                        $permohonan->update([
                            'jumlah_biasa_malam' => $request->jumlah_biasa_malam[$i],
                        ]);
                        break;
                    case 'Hari Rehat Siang':
                        $permohonan->update([
                            'jumlah_rehat_siang' => $request->jumlah_rehat_siang[$i],
                        ]);
                        break;
                    case 'Hari Rehat Malam':
                        $permohonan->update([
                            'jumlah_rehat_malam' => $request->jumlah_rehat_malam[$i],
                        ]);
                        break;
                    case 'Pelepasan Am Siang':
                        $permohonan->update([
                            'jumlah_am_siang' => $request->jumlah_am_siang[$i],
                        ]);
                        break;
                    case 'Pelepasan Am Malam':
                        $permohonan->update([
                            'jumlah_am_malam' => $request->jumlah_am_malam[$i],
                        ]);
                        break;
                }
            }

        } else {
            for ($i = 0; $i < count($request->permohonan_id); $i++) {
                $permohonan = Permohonan::find($request->permohonan_id[$i]);
                if ($permohonan->jumlah_biasa_siang !== null) {
                    $permohonan->update([
                        'jumlah_biasa_siang' => $request->jumlah_biasa_siang[$i],
                    ]);
                }
                if ($permohonan->jumlah_biasa_malam !== null) {
                    $permohonan->update([
                        'jumlah_biasa_malam' => $request->jumlah_biasa_malam[$i],
                    ]);
                }
                if ($permohonan->jumlah_rehat_siang !== null) {
                    $permohonan->update([
                        'jumlah_rehat_siang' => $request->jumlah_rehat_siang[$i],
                    ]);
                }
                if ($permohonan->jumlah_rehat_malam !== null) {
                    $permohonan->update([
                        'jumlah_rehat_malam' => $request->jumlah_rehat_malam[$i],
                    ]);
                }
                if ($permohonan->jumlah_am_siang !== null) {
                    $permohonan->update([
                        'jumlah_am_siang' => $request->jumlah_am_siang[$i],
                    ]);
                }
                if ($permohonan->jumlah_am_malam !== null) {
                    $permohonan->update([
                        'jumlah_am_malam' => $request->jumlah_am_malam[$i],
                    ]);
                }
            }
        }
        return back();

    }

    public function tolakPukal(Request $request)
    {
        switch ($request->jenis) {
            case 'satu_pertiga':
                foreach ($request->tuntutan_id as $id) {
                    $tuntutan = Tuntutan::find($id);
                    $tuntutan->update([
                        'lulus_kj' => 0,
                        'tolak_satu_per_tiga_sebab' => $request->tolak_satu_per_tiga_sebab,
                    ]);
                }
                break;
            case 'sebulan_gaji':
                foreach ($request->tuntutan_id as $id) {
                    $tuntutan = Tuntutan::find($id);
                    $tuntutan->update([
                        'lulus_db' => 0,
                        'tolak_sebulan_sebab' => $request->tolak_sebulan_sebab,
                    ]);
                }
                break;
        }
        return back();
    }

    public function updateWaktuTuntutan(Permohonan $permohonan, Request $request)
    {
        $mk = $request->tarikh . " " . $request->masa_mula;
        $tk = $request->tarikh . " " . $request->masa_tamat;

        $permohonan->update([
            'sebenar_mula_kerja' => $mk,
            'sebenar_akhir_kerja' => $tk,
        ]);

        return back();
    }

}
