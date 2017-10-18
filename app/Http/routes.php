<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::resource('/customers', 'CustomerController');
Route::get('/customers/archive/{id}', 'CustomerController@archive');
Route::get('/customers/unarchive/{id}', 'CustomerController@unarchive');
Route::get('/customer/archive', 'CustomerController@showArchive');
Route::get('/customer/export', 'CustomerController@excel');
Route::post('import', [ 'as' => 'customers.import', 'uses' => 'CustomerController@import']);
//Route::post('customers/destroy/select', [ 'as' =>'customers.destroy.select', 'uses' => 'CustomerController@destroy']);
Route::post('/foo/bar', 'CustomerController@desSel');
//Route::post('customer/destroy', [ 'as' => 'customer.destroy', 'uses' => 'CustomerController@destroySel']);
//Route::post('/foo/bar', function (\Illuminate\Http\Request $request) {
//    $ids = $request->input('ids');
//    // ... save in database | session
//    $request->session()->put('data', $ids);
//    dd('okr');
//
//});

Route::resource('/order', 'ProductOrderController');
Route::resource('/suppliers', 'SupplierController');
Route::get('/suppliers/archive/{id}', 'SupplierController@archive');
Route::get('/suppliers/unarchive/{id}', 'SupplierController@unarchive');
Route::get('/supplier/archive', 'SupplierController@showArchive');
Route::get('/supplier/export', 'SupplierController@excel');
Route::post('import1', [ 'as' => 'suppliers.import', 'uses' => 'SupplierController@import']);
Route::post('/sup/foo', 'SupplierController@desSel');

Route::get('/sup_product/{id}', 'SupplierController@supplierProduct');
Route::get('/sup_order', 'SupplierController@supOrder');
Route::post('sup_order', [ 'as' => 'sup_order.sotreSupOrder', 'uses' => 'SupplierController@sotreSupOrder']);
Route::post('sup_order_pros', [ 'as' => 'sup_order_pros.sotreSupOrderPros', 'uses' => 'SupplierController@sotreSupOrderPros']);

Route::get('/add_sup_pro/{id}', 'ProductController@createPro');
//Route::get('add_sup_pro', [ 'as' => '/add_sup_pro/{id}', 'uses' => 'ProductController@createPro']);
//Route::post('/add_sup_pro/store', 'ProductController@storePro');
Route::post('add_sup_pro', [ 'as' => 'add_sup_pro.store', 'uses' => 'ProductController@storePro']);

Route::resource('/executers', 'ExecutersController');
Route::get('/executers/archive/{id}', 'ExecutersController@archive');
Route::get('/executers/unarchive/{id}', 'ExecutersController@unarchive');
Route::get('/executer/archive', 'ExecutersController@showArchive');
Route::get('/executer/export', 'ExecutersController@excel');
Route::post('import2', [ 'as' => 'executers.import', 'uses' => 'ExecutersController@import']);
Route::get('/exe_service', 'ExecutersController@exeService');
Route::post('exe_service', [ 'as' => 'exe_service.exeService', 'uses' => 'ExecutersController@sotreExeService']);
Route::post('exe_service_store', [ 'as' => 'exe_service_store.storeExecService', 'uses' => 'ExecutersController@storeExecService']);

Route::resource('/services', 'ServiceController');
Route::resource('categories', 'CategoryController');
Route::get('categories/destroy/{id}', 'CategoryController@destroy');

Route::resource('products', 'ProductController');
Route::get('products/destroy/{id}', 'ProductController@destroy')->middleware('admin');
Route::resource('/estimates', 'EstimatesController');
Route::get('estimates/destroy/{id}', 'EstimatesController@destroy')->middleware('admin');
Route::resource('/bills', 'BillsController');
Route::get('bills/destroy/{id}', 'BillsController@destroy')->middleware('admin');
Route::get('/bill/export/{id}', 'BillsController@excel')->middleware('admin');
Route::resource('/agents', 'SellingAgentController');
Route::get('agents/destroy/{id}', 'SellingAgentController@destroy')->middleware('admin');



Route::group(['prefix' => 'admin', 'namespace' => 'admin',
    'middleware' => 'admin'], function()
{
    Route::resource('admin', 'AdminController');

});



Route::get('/home', 'HomeController@index');
