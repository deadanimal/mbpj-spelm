<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Oracle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index() {  

        // $useroracle = Oracle::where('USERID',3099)->get()->first();

        // dd ($useroracle);

   
        $users = User::all();

        // status staff
        $stafjumlah = DB::table('users')
        ->count();

        $staffaktif = DB::table('users')
        ->where('status','=','aktif')
        ->count();

        $staffxaktif = DB::table('users')
        ->where('status','=','tidak_aktif')
        ->count();

        $bilpt = DB::table('users')
        ->where('role','=','kakitangan')
        ->count();

        $bilt = DB::table('users')
        ->where('role','=','pentadbir_sistem')
        ->count();

        $bilp = DB::table('users')
        ->where('role','=','penyelia')
        ->count();

        $bildb = DB::table('users')
        ->where('role','=','datuk_bandar')
        ->count();

        $bilkb = DB::table('users')
        ->where('role','=','ketua_bahagian')
        ->count();

        $bilkj = DB::table('users')
        ->where('role','=','ketua_jabatan')
        ->count();

        $bilkp = DB::table('users')
        ->where('role','=','kerani_pemeriksa')
        ->count();

        $bilks = DB::table('users')
        ->where('role','=','kerani_semakan')
        ->count();

        $bilpp = DB::table('users')
        ->where('role','=','pelulus_pindaan')
        ->count();

        return view ('pentadbir_sistem.index',[
            'users'=>$users,
            'stafjumlah'=>$stafjumlah,
            'staffaktif' => $staffaktif,
            'staffxaktif' => $staffxaktif,
            'bilpt' => $bilpt,
            'bilt' => $bilt,
            'bildb' => $bildb,
            'bilkj' => $bilkj,
            'bilkb' => $bilkb,
            'bilp' => $bilp, 
            'bilkp' => $bilkp,
            'bilks' => $bilks,
            'bilpp' => $bilpp,  

        ]);

    }

    public function edit(User $user)
    {
        $roles = [
            "kakitangan" => "Kakitangan",
            "penyelia" => "Penyelia",
            "ketua_bahagian" => "Ketua Bahagian",
            "ketua_jabatan" => "Ketua Jabatan",
            "kerani_semakan" => "Kerani Semakan",
            "kerani_pemeriksa" => "Kerani Pemeriksa",
            "datuk_bandar" => "Datuk Bandar",
            "pentadbir_sistem" => "Pentadbir Sistem",
            "pelulus_pindaan" => "Pelulus Pindaan"

        ];
        $status = [
            "aktif" => "Aktif",
            "tidak_aktif" =>"Tidak Aktif"

        ];
        return view('pentadbir_sistem.edit',[
            'user'=> $user,
            'roles' => $roles,
            'status' => $status

        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->status = $request-> status;
        $user->role = $request-> role;
       
        $user->save();
        $redirected_url= '/users/';
        return redirect($redirected_url);        
    }
    public function kemaskini(Request $request) 
    
    {
        $user =User::where('user_code', $request->user_code);
        $user->role = $request ->role;
        $user->status = $request ->status;
        $user->save();

        $redirected_url= '/users/';
        return redirect($redirected_url);        
    }

    public function tukar_kata_laluan() {
        
    }

    public function getmajlisuser() {  

        $useroracle = Oracle::all();

        foreach ($useroracle as $majlisuser){
            // $uid = Oracle::where("", $majlisuser->id)->first()->user_id;


            // status check
            if ($majlisuser->userloginstatuscode === null) {
                $user = new User();
                $user->id = $majlisuser->userid;
                $user->name = $majlisuser->name;
                $user->email = $majlisuser->email;
                $user->password = $majlisuser->userpassword;
                $user->user_code = $majlisuser->customerid;
                $user->department_code = $majlisuser->departmentcode;
                $user->nric = $majlisuser->username;
                $user->phone = $majlisuser->mobile_phone;
                $user->role = 'kakitangan';
                $user->status = 'tidak_aktif';
    
                $user->save();

            }
           
        }
       
        return view ('pentadbir_sistem.index',[
           
            'useroracle'=>$useroracle, 
            'user'=>$user,
        ]);

    }
}
