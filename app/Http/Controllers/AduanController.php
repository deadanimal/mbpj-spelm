<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    
    public function index()
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aduan = new Aduan;     
        $aduan->jenis_aduan = $request-> jenis_aduan;
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
