<?php

namespace App\Http\Controllers;

use App\Models\Makluman;
use App\Models\Audit;

use Illuminate\Http\Request;

class MaklumanController extends Controller
{
    
    public function index()
    {
        
             $maklumans = Makluman::all();
            return view ('makluman.index',[
                'maklumans'=>$maklumans
                ]);
        
    }

    public function create()
    
    {
            return view('makluman.create');
    
    }
    
    public function store(Request $request)
    {
        {
            $makluman = new Makluman;           
            $makluman->maklumat = $request-> maklumat;
            $makluman->save();

            $audit = new Audit;
            $audit->user_id = $request->user()->id;
            $audit->name = $request->user()->name;
            $audit->peranan = $request->user()->role;

            $audit->description =  'Senarai Helpdesk Ditambah.';
            $audit->save(); 

            $redirected_url= '/maklumans/';
            return redirect($redirected_url);
        }
    }

   
    public function show(Makluman $makluman)
    {
        return view('makluman.show',[
            'makluman'=> $makluman,
        ]);
    }

   
    public function edit(Makluman $makluman)
    {
        return view('makluman.edit',[
            'makluman'=> $makluman,
        ]);
    }

   
    public function update(Request $request, Makluman $makluman)
    {
       
        $makluman->maklumat = $request-> maklumat;
        $makluman->save();

        $audit = new Audit;
        $audit->user_id = $request->user()->id;
        $audit->name = $request->user()->name;
        $audit->peranan = $request->user()->role;

        $audit->description =  'Senarai Helpdesk Dikemaskini.';
        $audit->save(); 

        $redirected_url= '/maklumans/';
        return redirect($redirected_url);  
    }

   
    public function destroy(Request $request,Makluman $makluman)
    {
     
        if($makluman)
        {
            if($makluman->delete()){

                $audit = new Audit;
                $audit->user_id = $request->user()->id;
                $audit->name = $request->user()->name;
                $audit->peranan = $request->user()->role;

                $audit->description =  'Senarai Helpdesk Dibuang.';
                $audit->save(); 

              $redirected_url= '/maklumans/';
              return redirect($redirected_url)->with('buang');;  
              }
         else{
            return "something wrong";
             }     
                }
            else{
                return "roll call not exist";
                }       
    }
}
