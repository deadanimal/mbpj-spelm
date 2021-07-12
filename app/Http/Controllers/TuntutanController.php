<?php

namespace App\Http\Controllers;

use App\Models\Tuntutan;
use Illuminate\Http\Request;

class TuntutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('tuntutan.index');
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
     * @param  \App\Models\Tuntutan  $tuntutan
     * @return \Illuminate\Http\Response
     */
    public function show(Tuntutan $tuntutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuntutan  $tuntutan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuntutan $tuntutan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuntutan  $tuntutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuntutan $tuntutan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuntutan  $tuntutan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuntutan $tuntutan)
    {
        //
    }
}
