<?php

namespace App\Http\Controllers;

use App\Models\Faq;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    public function index()
    {
        // $faqs = Faq::find($faq)->faqs()->get();
         $faqs = Faq::all();
        return view ('faq.index',[
            'faqs'=>$faqs
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

        $faq = new Faq;
        $faq->tajuk_aduan = $request-> tajuk_aduan;
        $faq->maklumat = $request-> maklumat; 
        $faq->save();
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

        $redirected_url= '/faqs/';
        return redirect($redirected_url);        
    }

    public function destroy(Faq $faq)
    {
        //
    }
}
