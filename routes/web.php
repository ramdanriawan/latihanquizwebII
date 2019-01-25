<?php

//untuk front controller 
Route::get('/', 'FrontController@index');

// untuk daftar
Route::get('/member/daftar', 'MemberController@daftar');
Route::post('/member/simpandaftar', 'MemberController@simpanDaftar');
Route::post('/member/proseslogin', 'MemberController@prosesLogin');

Route::get('/member/login', 'MemberController@login');

Route::prefix('member')->middleware(['member'])->group(function(){
    
    // untuk beranda ketika user berhasil login
    Route::get('beranda', 'MemberController@beranda');
    
    // untuk beranda ketika user berhasil login
    Route::get('produk', 'MemberController@produk');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::model('user', 'User');

Route::prefix('admin')->middleware("admin")->group(function(){
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('barang', 'BarangController');
    Route::resource('pembelian', 'PembelianController');

    // penjualan
    Route::resource('penjualan', 'PenjualanController');
    Route::post('penjualan/penjualandetail/{penjualan_id}/add', 'PenjualanController@penjualanDetailAdd');
    Route::delete('penjualan/penjualandetail/{penjualanDetailId}/delete', 'PenjualanController@penjualanDetailDelete');
    Route::get('penjualan/penjualandetail/{penjualan_id}', 'PenjualanController@penjualanDetail');

    Route::resource('kategoryn', 'KategorynController');
    
    // untuk satpams
    Route::resource('satpam', 'SatpamController');

    // ini route untuk membuat laporan dari bapak
    Route::get('laporan/barang','LaporanController@barang');
	Route::get('laporan/pelanggan','LaporanController@pelanggan');
	Route::get('laporan/transaksi','LaporanController@transaksi');
	Route::get('laporan/penjualan','LaporanController@penjualan');
    Route::get('laporan/pembelian','LaporanController@pembelian');
    Route::get('laporan/satpam','LaporanController@satpam');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
