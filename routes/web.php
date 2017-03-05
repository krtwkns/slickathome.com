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

	//Kasir
	    Route::group(['prefix'=>'kasir'], function(){
            Route::get('/',['as'=>'admin.kasir.index', 'uses'=>'Admin\KasirController@index']);
        });

    
    //Transaksi
    
    //User History
           
	//Barang
        Route::group(['prefix'=>'barang'], function(){
            Route::get('/',['as'=>'admin.barang.index', 'uses'=>'Admin\BarangController@index']);
            Route::get('/create',['as'=>'admin.artikel.create', 'uses'=>'Admin\ArtikelController@create']);
            Route::post('/create',['as'=>'admin.artikel.post.create', 'uses'=>'Admin\ArtikelController@postCreate']);
            Route::get('/{slug}/delete',['as'=>'admin.artikel.delete', 'uses'=>'Admin\ArtikelController@delete']);
           	Route::get('/{slug}/edit',['as'=>'admin.artikel.edit', 'uses'=>'Admin\ArtikelController@edit']);
           	Route::post('/{slug}/edit',['as'=>'admin.artikel.post.edit', 'uses'=>'Admin\ArtikelController@postEdit']);
            Route::get('/{slug}/status/{publish}',['as'=>'admin.artikel.publish', 'uses'=>'Admin\ArtikelController@publish']);

        });
});
