<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Audit;
use App\Models\Manual;



use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    public function index()
    {
        // $faqs = Faq::find($faq)->faqs()->get();

        $manuals = Manual::all();
         $faqs = Faq::all();

        return view ('faq.index',[

            'faqs'=>$faqs,
            'manuals'=>$manuals

            ]);
    }
    
    public function create()
    {
         
        return view('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $audit = new Audit;
        // $audit->user_id = $user->id;
        // $audit->name = $user->name;
        // $audit->description =  'Senarai FAQ Ditambah';
        // $audit->save();
         
        $faq = new Faq;
        $faq->tajuk_aduan = $request-> tajuk_aduan;
        $faq->maklumat = $request-> maklumat; 
        $faq->save();

        $audit = new Audit;
        $audit->user_id = $request->user()->id;
        $audit->name = $request->user()->name;
        $audit->peranan = $request->user()->role;

        $audit->description =  'Senarai FAQ Ditambah. Tajuk: '.$faq->tajuk_aduan;
        $audit->save();        

        return view('faq.show');
        
        // $redirected_url= '/permohonans/';
        // return redirect($redirected_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('faq.show',[
            'faq'=> $faq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faq.edit',[
            'faq'=> $faq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->tajuk_aduan = $request-> tajuk_aduan;
        $faq->maklumat = $request-> maklumat; 
        $faq->save();

        $audit = new Audit;
        $audit->user_id = $request->user()->id;
        $audit->name = $request->user()->name;
        $audit->peranan = $request->user()->role;

        $audit->description =  'Senarai FAQ Dikemaskini. Tajuk: '.$faq->tajuk_aduan;
        $audit->save();   

        $redirected_url= '/faqs';
        return redirect($redirected_url);        
    }

    public function destroy(Request $request,Faq $faq)
    {
        
        if($faq)
        {
            if($faq->delete()){

                 $audit = new Audit;
                 $audit->user_id = $request->user()->id;
                 $audit->name = $request->user()->name;
                 $audit->peranan = $request->user()->role;
                 $audit->description =  'Senarai FAQ Dibuang. Tajuk: '.$faq->tajuk_aduan;
                 $audit->save(); 

                // $user = $request->user();
                // $audit = new Audit;
                // $audit->user_id = $user->id;
                // $audit->name = $user->name;
                // $audit->description =  'Senarai FAQ dibuang';
                // $audit->save();
            
              $redirected_url= '/faqs/';
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
