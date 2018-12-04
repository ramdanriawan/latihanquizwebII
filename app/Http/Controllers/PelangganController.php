<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use App\Settingan\Settingan;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->settingan = new Settingan(new Pelanggan());
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

    public function show(Pelanggan $pelanggan)
    {

        return $this->settingan->setShow($pelanggan);
    }

    public function edit(Pelanggan $pelanggan)
    {
        return $this->settingan->setEdit($pelanggan);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        return $this->settingan->setUpdate($request, $pelanggan);
    }

    public function destroy(Pelanggan $pelanggan)
    {
        return $this->settingan->setDestroy($pelanggan);
    }
}
