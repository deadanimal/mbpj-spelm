<?php

namespace App\Http\Controllers;

use App\Models\UserPermohonan;
use Illuminate\Http\Request;

class UserPermohonanController extends Controller
{
    
    public function index()
    {  

        $user_permohonans = UserPermohonan::all();
        return view('permohonan.edit',[
            'user_permohonans'=> $user_permohonans,

        ]);
    }


    public function create()
    {
        return view('user_permohonans.create');
    }

    
    public function store(Request $request)
    {
       
        if( $request->user_id ) {
            foreach ($request->user_id as $key => $value) {

                $user_permohonans = new UserPermohonan;
                
                $user_permohonans->permohonan_id = $request->permohonan_id ;
                $user_permohonans->user_id = $value;
                $user_permohonans -> save();    
                      
            }
        } 
        return back()->with('success', 'Kakitangan Berjaya Ditambah.');
       
    }
      
    public function show(UserPermohonan $userPermohonan)
    {
        //
    }

    
    public function edit(UserPermohonan $userPermohonan)
    {
        //
    }

   
    public function update(Request $request, UserPermohonan $userPermohonan)
    {
        //
    }

    
    public function destroy(UserPermohonan $userPermohonan)
    {
        //
    }
}
