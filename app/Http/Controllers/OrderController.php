<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Notifiable;
use App\Order;
use Alert;
use App\Customer;
use App\OrderDetail;
use App\Product;
use App\ProductionOrder;
use Carbon\Carbon;
use Auth;
use App\Mail\NuevoPedido;

class OrderController extends Controller
{
    public function index()
    {
        $hoy = Carbon::now();
        $orders = Order::where('creator_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        //$orders = Order::orderByDesc('id')->paginate();
        

        return view('orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {

        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }
        
        $hoy = Carbon::now();
        return view('orders.edit', compact('order', 'hoy'));
    }


    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        
        return redirect()->route('orders.show', $order->id)
        ->withSuccessMessage('Creaste el Registro Correctamente');
        
    }

    public function create()
    {
        $userid = Auth::user()->name;         
        $user = Auth::user()->id;     

        return view('orders.create', compact('userid', 'user'));
    }

    public function show(Order $order)
    {
        $detail = OrderDetail::with('productAdditional')->where('order_id', $order->id)->get();  
       
        
        return view('orders.show', compact('order', 'detail'));
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        $destinatarios = ('victor.grun@grupomotta.com');

        Mail::to($destinatarios)->queue(new NuevoPedido($order));
        return redirect()->route('orders.index', $order->id) 
            ->withSuccessMessage('Creaste el Pedido Correctamente');
    }

    public function orderlist(Order $order, ProductionOrder $prodor)
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $hoy = Carbon::now();
        

        return view('orders.orderlist', compact('orders'));
    }

    public function selectorder(Order $order)
    {
        $hoy = Carbon::now();
        $prodor = ProductionOrder::orderBy('id')->get();
        $list =  ProductionOrder::orderBy('id')->where('dateofend', '>', $hoy)->get();
        $orders = Order::orderBy('id')->get();
        return view('orders.selectorder', compact('orders', 'prodor', 'list'));
    }

    public function aprobacion(Order $order)
    {
        //
    }
}
