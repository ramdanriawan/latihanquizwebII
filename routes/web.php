<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::model('user', 'User');

Route::prefix('admin')->middleware("auth")->group(function(){
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('barang', 'BarangController');
    Route::resource('pembelian', 'PembelianController');

    // penjualan
    Route::resource('penjualan', 'PenjualanController');
    Route::post('penjualan/penjualandetail/{penjualan_id}/add', 'PenjualanController@penjualanDetailAdd');
    Route::delete('penjualan/penjualandetail/{penjualanDetailId}/delete', 'PenjualanController@penjualanDetailDelete');
    Route::get('penjualan/penjualandetail/{penjualan_id}', 'PenjualanController@penjualanDetail');

    Route::resource('kategoryn', 'KategorynController');

    // ini route untuk membuat laporan dari bapak dari bapak
    Route::get('laporan/barang','LaporanController@barang');
	Route::get('laporan/pelanggan','LaporanController@pelanggan');
	Route::get('laporan/transaksi','LaporanController@transaksi');
	Route::get('laporan/penjualan','LaporanController@penjualan');
	Route::get('laporan/pembelian','LaporanController@pembelian');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
