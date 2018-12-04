<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Barang;
use App\Settingan\Settingan;
use Illuminate\Http\Request;

class PembelianController extends Controller
{

     public function __construct()
    {
        $this->settingan = new Settingan(new Pembelian, new Barang);
    }

    public function index()
    {
        return $this->settingan->setIndex();
    }

    public function create()
    {
        return $this->settingan->setCreate();
    }

    public function store(Request $request)
    {
        Barang::findOrFail($request->barang_id)->increment('stok', $request->jumlah);

        return $this->settingan->setStore($request);
    }

    public function show(Pembelian $pembelian)
    {
        return $this->settingan->setShow($pembelian);
    }

    public function edit(Pembelian $pembelian)
    {
        return $this->settingan->setEdit($pembelian);
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        Barang::findOrFail($request->barang_id)->decrement('stok', $pembelian->jumlah);
        Barang::findOrFail($request->barang_id)->increment('stok', $request->jumlah);

        return $this->settingan->setUpdate($request, $pembelian);
    }

    public function destroy(Pembelian $pembelian)
    {
        return $this->settingan->setDestroy($pembelian);
    }
}
