<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Settingan\Settingan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->settingan = new Settingan(new Penjualan, new Pelanggan, new Barang);
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
        Barang::findOrFail($request->id_barang)->decrement('stok', $request->jumlah);
        return $this->settingan->setStore($request);
    }

    public function show(Penjualan $penjualan)
    {
        return $this->settingan->setShow($penjualan);
    }

    public function edit(Penjualan $penjualan)
    {
        return $this->settingan->setEdit($penjualan);
    }

    public function update(Request $request, Penjualan $penjualan)
    {

        Barang::findOrFail($request->id_barang)->increment('stok', $penjualan->jumlah);
        Barang::findOrFail($request->id_barang)->decrement('stok', $request->jumlah);

        return $this->settingan->setUpdate($request, $penjualan);
    }

    public function destroy(Penjualan $penjualan)
    {
        return $this->settingan->setDestroy($penjualan);
    }
}
