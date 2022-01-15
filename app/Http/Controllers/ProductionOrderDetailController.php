<?php

namespace App\Http\Controllers;

use App\ProductionOrderDetail;
use App\Lote;
use App\LoteStock;
use App\ProductionOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Alert;

class ProductionOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $user = Auth::user()->id;     

        return view('orders.create', compact('userid', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = ProductionOrderDetail::create($request->all());


        return redirect()->back()
            ->withSuccessMessage('Creaste el Registro Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductionOrderDetail  $productionOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionOrderDetail $prodordet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductionOrderDetail  $productionOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }
        
        $prodordet = ProductionOrderDetail::where('id', $id)->firstOrFail();
        $ponele = $prodordet->production_order_id;
        $hoy = Carbon::now();
        return view('prodor.prodordet.edit', compact('prodordet','ponele', 'hoy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductionOrderDetail  $productionOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prodordet = ProductionOrderDetail::where('id', $id)->firstOrFail();
       
        $prodordet->update($request->all());

        $ponele = $prodordet->production_order_id;

        return redirect('prodor/'.$ponele)->withSuccessMessage('Eliminaste la Muestra Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductionOrderDetail  $productionOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionOrderDetail $productionOrderDetail)
    {
        //
    }
/**
    public function incubacion(Request $request, ProductionOrder $prodor)
    {
        $this->validate($request, [
            'production_order_id'   => 'required'
        ]);
        
            $resultado = ProductionOrderDetail::create([
                'production_order_id' => $request->input('production_order_id'),
                'lote_id' => $request->input('lote_id'),
                'lote_stock_id' => $request->input('lote_stock_id'),
                'huevosinc' => $request->input('huevosinc'),
               
            ]);
            $baja = LoteStock::edit([
                'id' => $request->input('lote_stock_id'),
                'baja' => $request->input('huevosinc'),
            ])
            
            
            return redirect()->back()->withSuccessMessage('Agregaste nueva vacuna');
    
    }
     */
}
