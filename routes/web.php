<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);



//Routes

Route::middleware(['auth'])->group(function() {
    //Roles
Route::get('/', 'HomeController@index')->name('home');



Route::post('roles/store', 'RoleController@store')->name('roles.store')
->middleware('can:roles.create');

Route::get('roles', 'RoleController@index')->name('roles.index')
->middleware('can:roles.index');

Route::get('roles/create', 'RoleController@create')->name('roles.create')
->middleware('can:roles.create');

Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
->middleware('can:roles.edit');

Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
->middleware('can:roles.show'); 

Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
->middleware('can:roles.destroy');  

Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
->middleware('can:roles.edit');  



//Users
Route::get('users', 'UserController@index')->name('users.index')
->middleware('can:users.index');

Route::get('users/create', 'UserController@create')->name('users.create')
->middleware('can:users.create');

Route::put('users/{user}', 'UserController@update')->name('users.update')
->middleware('can:users.edit');

Route::get('users/{user}', 'UserController@show')->name('users.show')
->middleware('can:users.show'); 

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
->middleware('can:users.destroy');  

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
->middleware('can:users.edit');  



Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

/* ---------------Orders------------------- */

Route::get('orders/orderlist', 'OrderController@orderlist')->name('orders.orderlist')->middleware('can:orders.orderlist');
Route::get('orders/selectorder', 'OrderController@selectorder')->name('orders.selectorder')->middleware('can:orders.selectorder');
Route::post('orders/store', 'OrderController@store')->name('orders.store')->middleware('can:orders.create');
Route::get('orders', 'OrderController@index')->name('orders.index')->middleware('can:orders.index');
Route::get('orders/create', 'OrderController@create')->name('orders.create')->middleware('can:orders.create');
Route::put('orders/{order}', 'OrderController@update')->name('orders.update')->middleware('can:orders.edit');
Route::get('orders/{order}', 'OrderController@show')->name('orders.show')->middleware('can:orders.show');
Route::delete('orders/{order}', 'OrderController@destroy')->name('orders.destroy')->middleware('can:orders.destroy');
Route::get('orders/{order}/edit', 'OrderController@edit')->name('orders.edit')->middleware('can:orders.edit');

Route::post('ordersdetail', 'OrderDetailController@addvacuna')->name('ordersdetail.addvacuna')->middleware('can:orders.edit');

/* ---------------ProductionOrders------------------- */


Route::post('prodor/store', 'ProductionOrderController@store')->name('prodor.store')->middleware('can:prodor.store'); 
Route::get('prodor', 'ProductionOrderController@index')->name('prodor.index')->middleware('can:prodor.index');
Route::get('prodor/create', 'ProductionOrderController@create')->name('prodor.create')->middleware('can:prodor.create');
Route::put('prodor/{prodor}', 'ProductionOrderController@update')->name('prodor.update')->middleware('can:prodor.update');
Route::get('prodor/{prodor}', 'ProductionOrderController@show')->name('prodor.show')->middleware('can:prodor.show');
Route::delete('prodor/{prodor}', 'ProductionOrderController@destroy')->name('prodor.destroy')->middleware('can:prodor.destroy');
Route::get('prodor/{prodor}/edit', 'ProductionOrderController@edit')->name('prodor.edit')->middleware('can:prodor.edit');
Route::get('prodor/{prodor}/incubar', 'ProductionOrderController@incubar')->name('prodor.incubar')->middleware('can:prodor.incubar');
Route::get('prodor/{prodor}/nacer', 'ProductionOrderController@nacer')->name('prodor.nacer')->middleware('can:prodor.nacer');


Route::get('postura', 'PosturaController@index')->name('postura.index')->middleware('can:postura.index');
Route::get('postura/create/{lote}', 'PosturaController@create')->name('postura.create')->middleware('can:postura.index');
Route::post('postura/store', 'PosturaController@store')->name('postura.store')->middleware('can:postura.index');
Route::get('postura/{postura}', 'PosturaController@show')->name('postura.show')->middleware('can:postura.index');

Route::get('loteprod', 'LoteprodController@index')->name('loteprod.index')->middleware('can:postura.index');
Route::get('loteprod/{loteprod}', 'LoteprodController@show')->name('loteprod.show')->middleware('can:postura.index');


Route::post('prodordet/store', 'ProductionOrderDetailController@store')->name('prodordet.store');
Route::get('prodordet/create', 'ProductionOrderDetailController@create')->name('prodordet.create');
Route::put('prodordet/{prodordet}/update', 'ProductionOrderDetailController@update')->name('prodordet.update');
Route::get('prodordet/{prodordet}/edit', 'ProductionOrderDetailController@edit')->name('prodordet.edit');

//Route::get('stock/get_by_lotes', 'LoteStockController@get_by_lotes')->name('stock.get_by_lotes');
Route::get('stock', 'LoteStockController@index')->name('stock.index')->middleware('can:stock.index');;

Route::get('/qr', function () {return view('qr.scaner');});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
