<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use App\Settingan\Settingan;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->settingan = new Settingan(new Barang());
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
        return $this->settingan->setStore($request);
    }

    public function show(Barang $barang)
    {

        return $this->settingan->setShow($barang);
    }

    public function edit(Barang $barang)
    {

        return $this->settingan->setEdit($barang);
    }

    public function update(Request $request, Barang $barang)
    {
        return $this->settingan->setUpdate($request, $barang);
    }

    public function destroy(Barang $barang)
    {
        return $this->settingan->setDestroy($barang);
    }
}
