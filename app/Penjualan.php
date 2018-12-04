<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $guarded = [];

    public function penjualanDetail()
    {
    	return $this->hasMany('\App\PenjualanDetail');
    }

    public function pelanggan()
    {
    	return $this->belongsTo('\App\Pelanggan', 'id_pelanggans');
    }

    public function barang()
    {
    	return $this->belongsTo('\App\Barang', 'id_barangs');
    }

}
