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
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

    Route::get('/', ['as'=>'admin.']);

	//Kasir
	    Route::group(['prefix'=>'kasir'], function(){
            Route::get('/',['as'=>'admin.kasir.index', 'uses'=>'Admin\KasirController@index']);
        });

    
    //Transaksi
    
    //User History
        Route::group(['prefix'=>'user-history'], function(){
            Route::get('/', ['as'=>'admin.user-history.index', 'uses'=>'Admin\UserHistoryController@index']);
        });        
           
	//Barang
        Route::group(['prefix'=>'barang'], function(){
            Route::get('/',['as'=>'admin.barang.index', 'uses'=>'Admin\BarangController@index']);
            Route::get('/tambah',['as'=>'admin.barang.tambah', 'uses'=>'Admin\BarangController@tambah']);
            Route::post('/tambah',['as'=>'admin.barang.post.tambah', 'uses'=>'Admin\BarangController@postTambah']);
            Route::get('/{id}/hapus',['as'=>'admin.barang.hapus', 'uses'=>'Admin\BarangController@hapus']);
           	Route::get('/{slug}/edit',['as'=>'admin.artikel.edit', 'uses'=>'Admin\ArtikelController@edit']);
           	Route::post('/{slug}/edit',['as'=>'admin.artikel.post.edit', 'uses'=>'Admin\ArtikelController@postEdit']);
            Route::get('/{slug}/status/{publish}',['as'=>'admin.artikel.publish', 'uses'=>'Admin\ArtikelController@publish']);

        });
});
