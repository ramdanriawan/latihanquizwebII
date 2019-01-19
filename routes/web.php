<?php

//untuk front controller 
Route::get('/', 'FrontController@index');

// untuk daftar
Route::get('/member/daftar', 'MemberController@daftar');
Route::post('/member/simpandaftar', 'MemberController@simpanDaftar');
Route::post('/member/proseslogin', 'MemberController@prosesLogin');

Route::get('/member/login', 'MemberController@login');

Route::prefix('member')->middleware(['member2'])->group(function(){
    
    // untuk beranda ketika user berhasil login
    Route::get('beranda', 'MemberController@beranda');
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

    // ini route untuk membuat laporan dari bapak dari bapak
    Route::get('laporan/barang','LaporanController@barang');
	Route::get('laporan/pelanggan','LaporanController@pelanggan');
	Route::get('laporan/transaksi','LaporanController@transaksi');
	Route::get('laporan/penjualan','LaporanController@penjualan');
	Route::get('laporan/pembelian','LaporanController@pembelian');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function(){
    return Hash::check('mautauajakamu98', '$2y$10$3dHAbWHXRfcdx3JeFUWg9uZIE/59yvY5UF6bUnUGIKix68Uf3reCe') ? 'benar' : 'salah';
});