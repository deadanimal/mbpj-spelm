<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    
    public function index(Request $request)
    {
        //    $user = $request->user();
        //    $role = $user->role;
        //    if($role == 'pentadbir_sistem'){
        //          $aduans = Aduan::all();

        //    }else {
        //        $aduans = Aduan::where('pengadu_id', $user->id);
        //    }
        //    return view ('aduan.index',[
        //             'aduans'=>$aduans
        //    ]);

        //    $aduan ->pengadu_id = $request -> user()->id;

        {
            // $faqs = Faq::find($faq)->faqs()->get();
             $aduans = Aduan::all();
            return view ('aduan.index',[
                'aduans'=>$aduans
                ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aduan.create');

    }
    public function store(Request $request)
    {
        $aduan = new Aduan;     
        $aduan->jenis_aduan = $request-> jenis_aduan;
        // 
        $aduan->aduan = $request-> aduan;
        $aduan->jawab_aduan = $request-> jawab_aduan;

        $aduan->save();
        $redirected_url= '/aduans/';
        return redirect($redirected_url);
    }
    public function show(Aduan $aduan)
    {
        return view('aduan.show',[
            'aduan'=> $aduan,
        ]);
    }
    public function edit(Aduan $aduan)
    {
        return view('aduan.edit',[
            'aduan'=> $aduan,
        ]);
    }
    public function update(Request $request, Aduan $aduan)
    {
        $aduan->jenis_aduan = $request-> jenis_aduan;
        $aduan->aduan = $request-> aduan;
        $aduan->jawab_aduan = $request-> jawab_aduan;

        $aduan->save();

        $redirected_url= '/aduans/';
        return redirect($redirected_url);  

     }
    public function destroy(Aduan $aduan)
    {
        //
    }
}
