<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::model('user', 'User');

Route::prefix('admin')->middleware("auth")->group(function(){
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('barang', 'BarangController');
    Route::resource('pembelian', 'PembelianController');
    Route::resource('penjualan', 'PenjualanController');
    Route::resource('kategoryn', 'KategorynController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
