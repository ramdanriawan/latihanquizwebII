<?php

namespace App\Http\Controllers;

use App\Satpam;
use App\Settingan\Settingan;
use Illuminate\Http\Request;

class SatpamController extends Controller
{
    public function __construct()
    {
        $this->settingan = new Settingan(new Satpam());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->settingan->setIndex();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->settingan->setCreate();
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->settingan->setStore($request);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Satpam  $satpam
     * @return \Illuminate\Http\Response
     */
    public function show(Satpam $satpam)
    {
        return $this->settingan->setShow($satpam);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Satpam  $satpam
     * @return \Illuminate\Http\Response
     */
    public function edit(Satpam $satpam)
    {
        return $this->settingan->setEdit($satpam);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Satpam  $satpam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satpam $satpam)
    {
        return $this->settingan->setUpdate($request, $satpam);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Satpam  $satpam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satpam $satpam)
    {
        return $this->settingan->setDestroy($satpam);
        //
    }
}
