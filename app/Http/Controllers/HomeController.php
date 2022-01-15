<?php

namespace App\Http\Controllers;


use Alert;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Product;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $label = DB::table('orders')
                        ->select(DB::raw('customers.provincia as p, SUM(cantidad) as y'))
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->groupBy('customers.provincia')
                        ->get();


         $ventas = DB::table('orders')->where( 'orders.created_at', '>', Carbon::now()->subDays(30))
                        ->select(DB::raw('products.name as x, SUM(cantidad) as y'))
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->groupBy('product_id')
                        ->get();

        
        $vtaw80 = DB::table('orders')->where( 'orders.product_id', '=', "1")
                        ->select(DB::raw('orders.creator_date as x, SUM(cantidad) as y'))
                        ->groupBy('creator_date')
                        ->get();
        $vtabr = DB::table('orders')->where( 'orders.product_id', '=', "2")
                        ->select(DB::raw('orders.creator_date as x, SUM(cantidad) as y'))
                        ->groupBy('creator_date')
                        ->get();

        

        $d = DB::table('orders')->where( 'orders.product_id', '=', "1")->get();

        $ventass = $d;

        return view('home', compact('ventas', 'label', 'vtaw80', 'vtabr', 'ventass'));
    }
}
