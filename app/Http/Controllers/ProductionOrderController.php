<?php

namespace App\Http\Controllers;

use App\ProductionOrder;
use App\ProductionOrderDetail;
use App\Lote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\LoteStock;
use Auth;

class ProductionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = Carbon::now();
        $orders = ProductionOrder::orderByDesc('id')->get();
        $username = Auth::user()->name;     
        $user = Auth::user()->id; 

        return view('prodor.index', compact('orders', 'hoy', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = Auth::user()->name;     
        $user = Auth::user()->id; 
        return view('prodor.create', compact('user', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = ProductionOrder::create($request->all());


        return redirect()->route('prodor.index', $orders->id)
            ->withSuccessMessage('Creaste el Registro Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodor = ProductionOrder::where('id', $id)->firstOrFail();
        $prodordet = ProductionOrderDetail::with('lote')->where('production_order_id', $prodor->id)->get();  
        $lote = Lote::all()->pluck('name', 'id');
        $incubado = $prodor->incubado_at;
      $incubato = Carbon::now()->subDays(20);
        return view('prodor.show', compact('prodor', 'prodordet', 'lote', 'incubado', 'incubato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionOrder $productionOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionOrder $productionOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductionOrder  $productionOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionOrder $productionOrder)
    {
        //
    }

    public function incubar(Request $request, ProductionOrder $prodor)
    {
        $user = Auth::user()->name;    
        $date = Carbon::now();
        $prodor->total_hi_blanco=$request->huevinc;
        $prodor->total_hi_color=$request->huevincbr;
        $prodor->incubado_por = $user;
        $prodor->incubado_at = $date;    
        $prodor->status = "Incubadora";
        $prodor->save();

        return back()->withSuccessMessage('Enviaste a Incubar Todo');

    }

    public function nacer(ProductionOrder $prodor)
    {
        $user = Auth::user()->name;    
        $date = Carbon::now();
        $prodor->nacido_por = $user;
        $prodor->nacido_at = $date;    
        $prodor->status = "Nacimiento";
        $prodor->save();

        return back()->withSuccessMessage('Hiciste Nacer muchos BB');

    }


    public function podedit(ProductionOrderDetail $prodordet)
    {
        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }
        
        $hoy = Carbon::now();
        return view('prodor.prodordet.edit', compact('prodordet', 'hoy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductionOrderDetail  $productionOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function podupdate(Request $request, $pepe)
    {
        $prodordet = ProductionOrderDetail::where('id', $pepe)->firstOrFail();
        $prodordet->update($request->all());
        return back()->withSuccessMessage('Eliminaste la Muestra Correctamente');
    }




}
