<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\Faq;

use Illuminate\Http\Request;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show(Manual $manual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function edit(Manual $manual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manual $manual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manual $manual)
    {
        if($manual)
        {
            if($manual->delete()){

                // $audit = new Audit;
                // $audit->user_id = $request->user()->id;
                // $audit->name = $request->user()->name;
                // $audit->peranan = $request->user()->role;

                // $audit->description =  'Senarai Helpdesk Dibuang.';
                // $audit->save(); 

              $redirected_url= '/manuals/';
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
    public function createForm(){
        return view('file-upload');
      }
    
      public function fileUpload(Request $req){
            $req->validate([
                'file' => 'required|mimes:png,PNG,jpg,PDF,pdf|max:2048'
            ]);
    
            $fileModel = new Manual;

            // $manual = new Manual;           
            // $manual->maklumat = $request-> maklumat;
            // $manual->save();


            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

                $fileModel->notis = $req-> notis;
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;


                $fileModel->save();
    
                return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
            }
       }
       public function download($id)
       {
        $path = storage_path('app/public/uploads/file.pdf');
        return response()->download($path);
       }
}
