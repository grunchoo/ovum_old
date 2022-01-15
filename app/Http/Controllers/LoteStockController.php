<?php

namespace App\Http\Controllers;

use App\LoteStock;
use App\Lote;
use Illuminate\Http\Request;

class LoteStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = LoteStock::where('stock', '>', '0')->get();
        return view('lotes.stock.index', compact('stock'));
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
     * @param  \App\LoteStock  $loteStock
     * @return \Illuminate\Http\Response
     */
    public function show(LoteStock $loteStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoteStock  $loteStock
     * @return \Illuminate\Http\Response
     */
    public function edit(LoteStock $loteStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoteStock  $loteStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoteStock $loteStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoteStock  $loteStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoteStock $loteStock)
    {
        //
    }
}
