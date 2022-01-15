<?php

namespace App\Http\Controllers;

use App\Crianza;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrianzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crianzas = Crianza::where('estado', '=', "Activa")->get();
        $now = Carbon::now();
        return view('admin.crianzas.index', compact('crianzas', 'now'));
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
     * @param  \App\Crianza  $crianza
     * @return \Illuminate\Http\Response
     */
    public function show(Crianza $crianza)
    {
        $now = Carbon::now();
        $mort = $crianza->aves_ingresadas - $crianza->aves_actuales;
        $pmort = round($mort * 100 / $crianza->aves_ingresadas, 2);
        return view('admin.crianzas.show', compact('crianza', 'now', 'mort', 'pmort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crianza  $crianza
     * @return \Illuminate\Http\Response
     */
    public function edit(Crianza $crianza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crianza  $crianza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crianza $crianza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crianza  $crianza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crianza $crianza)
    {
        //
    }
}
