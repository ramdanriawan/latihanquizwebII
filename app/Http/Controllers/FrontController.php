<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class FrontController extends Controller
{
    public function index()
    {
    	$data['barangs'] = Barang::latest()->take(6)->get();

    	return view('front_utama', $data);
    }
}
