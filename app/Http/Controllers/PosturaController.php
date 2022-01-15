<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use Carbon\Carbon;
use App\postura;
use App\loteprod;
use App\SupplierWarehouse;
use Illuminate\Http\Request;

class PosturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postura=postura::all();
        return view('postura.index', compact('postura'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lote)
    {     
        $user_id = Auth::user()->id; 
        $hoy = Carbon::now();    
        $lotes = loteprod::where('id', '=', $lote)->get();

        return view('postura.create', compact('user_id', 'hoy', 'lote', 'lotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = $request->incub + $request->comlimp + $request->sucio + $request->rotos + $request->tirados;
        $postura = Postura::create($request->all());
        $postura->total = $total;
        $postura->save();

        
        


        return redirect()->route('home')
            ->withSuccessMessage('Se Registraron los Datos Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\postura  $postura
     * @return \Illuminate\Http\Response
     */
    public function show(postura $postura)
    {
        
        return view('postura.show', compact('postura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\postura  $postura
     * @return \Illuminate\Http\Response
     */
    public function edit(postura $postura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\postura  $postura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postura $postura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\postura  $postura
     * @return \Illuminate\Http\Response
     */
    public function destroy(postura $postura)
    {
        //
    }
}
