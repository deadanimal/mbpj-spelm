<?php

namespace App\Http\Controllers;

use App\Models\Makluman;
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

        $redirected_url= '/maklumans/';
        return redirect($redirected_url);  
    }

   
    public function destroy(Makluman $makluman)
    {
     
        if($makluman)
        {
            if($makluman->delete()){
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
