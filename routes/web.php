<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>['auth','role:admin|karyawan']], function () {
Route::resource('jenbar', 'JenbarController');
Route::resource('pemasok', 'PemasokController');
Route::resource('barang', 'BarangController');
Route::resource('penjualan', 'PenjualanController');
Route::resource('pembelian', 'PembelianController');
});
Route::group(['middleware'=>['auth','role:admin']],function(){
	Route::resource('user','UserController');
});