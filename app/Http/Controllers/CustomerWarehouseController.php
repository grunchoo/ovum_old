<?php

namespace App\Http\Controllers;

use App\CustomerWarehouse;
use App\Customer;
use Illuminate\Http\Request;

class CustomerWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerWarehouse $warehouse)
    {
        $warehouse = CustomerWarehouse::orderBy('id')->get();
        
        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }

        return view('customers.warehouse.index', compact('warehouse'));
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
     * @param  \App\CustomerWarehouse  $customerWarehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = CustomerWarehouse::where('id', $id)->firstOrFail();


        return view('customers.warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerWarehouse  $customerWarehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerWarehouse $customerWarehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerWarehouse  $customerWarehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerWarehouse $customerWarehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerWarehouse  $customerWarehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerWarehouse $customerWarehouse)
    {
        //
    }
}
