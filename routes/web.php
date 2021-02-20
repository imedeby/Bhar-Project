<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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


Route::match(['get', 'post'] ,'/admin', 'AdminController@login');
Route::group(['middleware' => ['auth' ,'auth.admin']], function(){
    Route::match(['get', 'post'] ,'/admin/dashboard', 'ManageController@admindashboard');
    Route::get('admin/factinit','ManageController@factinit');
    Route::match(['get', 'post'] ,'/admin/add_facture', 'ManageController@indexf');
    Route::match(['get', 'post'] ,'/admin/indexfacture', 'ManageController@indexfacture');
    Route::match(['get', 'post'] ,'/admin/addItem','ManageController@addItem');
    Route::get('admin/indexstock','ManageController@indexstock');
    Route::match(['get', 'post'] ,'/admin/editItem','ManageController@editItem');
    Route::post('/admin/deleteItem','ManageController@deleteItem');
    Route::match(['get', 'post'] ,'/admin/editFacture/{id}','ManageController@editFacture');
    Route::post('/admin/updateFacture','ManageController@updateFacture');
    Route::post('/admin/validFacture','ManageController@validFacture');
    Route::post('/admin/deleteFacture','ManageController@deleteFacture');
    Route::match(['get', 'post'] ,'/admin/addFacture','ManageController@addFacture');
    Route::get('/admin/hist_facture', 'ManageController@histfacture');
    Route::match(['get', 'post'] , '/admin/getPDF/{id}', ['as' => 'admin/getPDF', 'uses' => 'ManageController@getPDF']);
    Route::match(['get', 'post'] ,'/admin/addStock', 'ManageController@addStock');
    Route::get('/admin/datastock', 'ManageController@indexs');
    Route::match(['get', 'post'] ,'/admin/editStock','ManageController@editStock');
    Route::post('/admin/deleteStock','ManageController@deleteStock');
    Route::get('/admin/liststock','ManageController@stockl');
    Route::get('/admin/stocklist','ManageController@stocklist');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPasswd');
    Route::post('/admin/update-pwd', 'AdminController@updatePasswd');
});
Route::group(['middleware' => ['auth' ,'auth.depot']], function(){
    Route::match(['get', 'post'] ,'/depot/dashboard', 'ManageController@depotdashboard');
    Route::post('/depot/validFacture','ManageController@validFacture');
    Route::match(['get', 'post'] , '/depot/getPDF/{id}', ['as' => 'admin/getPDF', 'uses' => 'ManageController@getPDF']);
    Route::get('/depot/depinit','ManageController@depinit');
    Route::get('/depot/datastock', 'ManageController@indexsdepot');
    Route::get('/depot/settings', 'AdminController@settings');
    Route::get('/depot/check-pwd', 'AdminController@checkPasswd');
    Route::post('/depot/update-pwd', 'AdminController@updatePasswd');
});
Route::group(['middleware' => ['auth' ,'auth.reglement']], function(){
    Route::match(['get', 'post'] ,'/reglement/dashboard', 'ManageController@reglementdashboard');
    Route::post('/reglement/validFacture','ManageController@validFacture');
    Route::post('/reglement/avanceFacture','ManageController@avanceFacture');
    Route::get('/reglement/reginit','ManageController@reginit');
    Route::get('/reglement/settings', 'AdminController@settings');
    Route::get('/reglement/check-pwd', 'AdminController@checkPasswd');
    Route::post('/reglement/update-pwd', 'AdminController@updatePasswd');
});

Route::get('/logout', 'AdminController@logout');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
