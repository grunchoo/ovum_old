<?php

namespace App\Http\Controllers;

use App\loteprod;
use Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class LoteprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loteprod = loteprod::all();
        $hoy = Carbon::now();
        return view('loteprod.index', compact('loteprod', 'hoy'));
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
     * @param  \App\loteprod  $loteprod
     * @return \Illuminate\Http\Response
     */
    public function show(loteprod $loteprod)
    {
        $now = Carbon::now();
        return view('loteprod.show', compact('loteprod', 'now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loteprod  $loteprod
     * @return \Illuminate\Http\Response
     */
    public function edit(loteprod $loteprod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loteprod  $loteprod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loteprod $loteprod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loteprod  $loteprod
     * @return \Illuminate\Http\Response
     */
    public function destroy(loteprod $loteprod)
    {
        //
    }
}
