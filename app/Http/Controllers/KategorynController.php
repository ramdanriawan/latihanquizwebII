<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settingan\Settingan;
use App\Kategoryn;

class KategorynController extends Controller
{
    public function __construct()
    {
        $this->settingan = new Settingan(new Kategoryn());
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

    public function show(Kategoryn $kategoryn)
    {

        return $this->settingan->setShow($kategoryn);
    }

    public function edit(Kategoryn $kategoryn)
    {
        return $this->settingan->setEdit($kategoryn);
    }

    public function update(Request $request, Kategoryn $kategoryn)
    {
        return $this->settingan->setUpdate($request, $kategoryn);
    }

    public function destroy(Kategoryn $kategoryn)
    {
        return $this->settingan->setDestroy($kategoryn);
    }
}
