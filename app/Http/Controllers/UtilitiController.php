<?php

namespace App\Http\Controllers;

use App\Models\Utiliti;
use Illuminate\Http\Request;

class UtilitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utiliti = Utiliti::all();
        return view('utiliti.index', compact('utiliti'));
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
        for ($i = 1; $i <= 12; $i++) {
            $utiliti = Utiliti::where('bulan', $i)->first();
            if (!$utiliti) {
                Utiliti::create([
                    'bulan' => $i,
                    'tarikh' => $request->tarikh[$i - 1],
                ]);
            } else {
                $utiliti->update([
                    'tarikh' => $request->tarikh[$i - 1],
                ]);
            }

        }

        return back()->with('success', 'Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function show(Utiliti $utiliti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function edit(Utiliti $utiliti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utiliti $utiliti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utiliti $utiliti)
    {
        //
    }
}
