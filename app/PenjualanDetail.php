<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function barang()
    {
    	return $this->belongsTo('\App\Barang');
    }
}
