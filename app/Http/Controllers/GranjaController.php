<?php

namespace App\Http\Controllers;

use App\Granja;
use App\Galpones;
use App\Crianza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GranjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $granja = Granja::all();
        return view('admin.granjas.index', compact('granja'));
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
     * @param  \App\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function show(Granja $granja)
    {
        $galpones = Galpones::where('granja_id', '=', $granja->id)->get();
        $garlopa = $galpones->pluck('id');
        
        $test = DB::table('crianzas')->where('galpones_id', '=',$garlopa)->get();
        return view('admin.granjas.show', compact('granja', 'galpones', 'test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function edit(Granja $granja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Granja $granja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Granja $granja)
    {
        //
    }

    public function close(Granja $granja)
    {
        //
    }
}
