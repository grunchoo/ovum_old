<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use App\Customer;
use App\CustomerWarehouse;
use App\Order;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Carbon\Carbon;
use Auth;

class CustomerController extends Controller
{
    public function index(Customer $customer)
    {
        $customers = Customer::orderBy('id')->get();
        
        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        
        return redirect()->route('customers.index', $customer->id) 
            ->withSuccessMessage('Creaste el Pedido Correctamente');
    }

    public function edit(Customer $customer)
    {

        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }
        
        return view('customers.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        
        return redirect()->route('customers.index', $customer->id)
            ->withSuccessMessage('Actualizaste el Cliente Correctamente');
        
    }

    public function show($id)
    {
        $orders = Order::where('customer_id', $id)->orderBy('id', 'desc')->get();
        $granjas = CustomerWarehouse::where('customer_id', $id)->orderBy('id')->get();
        $total = $orders->sum('cantidad');
        if($total == 0){
            $perc1 = 0;
            $perc2 = 0;
            $perc3 = 0;
            $perc4 = 0;
        }
        else if($total){
        $pr1 = $orders->where('product_id','=','1')->sum('cantidad');
        $pr2 = $orders->where('product_id','=','2')->sum('cantidad');
        $pr3 = $orders->where('product_id','=','3')->sum('cantidad');
        $pr4 = $orders->where('product_id','=','4')->sum('cantidad');
        $perc1 = number_format($pr1 * 100 / $total, 2);
        $perc2 = number_format($pr2 * 100 / $total, 2);
        $perc3 = number_format($pr3 * 100 / $total, 2);
        $perc4 = number_format($pr4 * 100 / $total, 2);
    }
 
        $customers = Customer::where('id', $id)->firstOrFail();
        return view('customers.show', compact('customers', 'granjas', 'orders', 'perc1' ,'perc2', 'perc3', 'perc4'));
    }

}
