<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Settingan\Settingan;
use App\PenjualanDetail;
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
        // kurangkan dulu stoknya
        Barang::findOrFail($request->id_barangs)->decrement('stok', $request->jumlah);

        // simpan dulu data penjualannya
        $penjualanCreate = Penjualan::create($request->all());

        // dapatkan id penjualan yang telah disave
        $penjualanId = $penjualanCreate->id;

        // setelah id didapatkan baru sekarang save penjuaalannya
        $penjualanCreate->save();

        // kalo udah, baru simpan lagi data penjualan detailnya
        $penjualanDetailSave = PenjualanDetail::create([
                    'penjualan_id' => $penjualanId,
                    'barang_id'    => $request->id_barangs,
                    'jumlah'       => $request->jumlah,
                    'total'        => $request->jumlah * $request->harga_per_item
                ])->save();

        // setelah penjualan terbuat redirect ke halaman untuk menambah penjualan lainnya
        return redirect("/admin/penjualan/penjualandetail/$penjualanId")->with('pesan', 'Berhasil Menambah Penjualan');
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

    public function penjualanDetail($penjualan_id)
    {
        // pastikan penjualan telah terbuat sebelumnya
        $penjualan = Penjualan::findOrFail($penjualan_id);

        // dapatkan semua data penjualan berdasarkan id yang telah diberikan
        $penjualanDetail = PenjualanDetail::where('penjualan_id', $penjualan_id)->get();

        // untuk pluck data barang
        $barang = Barang::pluck('nama', 'id');

        // untuk pluck data pelanggan
        $pelanggan = Pelanggan::pluck('nama', "id");

        // untuk menentukan nama pelanggan
        $namaPelanggan = Pelanggan::findOrFail($penjualan->id_pelanggans)->nama;
        
        // $this->settingan->halaman = "penjualandetail/$penjualan_id/add";
        return view('penjualanDetail.create', [
            'penjualanDetails'  => $penjualanDetail,
            'penjualanDetailId' => $penjualan_id,
            'barangs'            => $barang,
            'namaPelanggan'     => $namaPelanggan
        ]);
    }

    public function penjualanDetailAdd($penjualan_id, Request $request)
    {
        // kurangkan stok barang
        Barang::findOrFail($request->barang_id)->decrement('stok', $request->jumlah);

        // simpan ke database
        $penjualanDetailSave = PenjualanDetail::create([
                    'penjualan_id' => $penjualan_id,
                    'barang_id'    => $request->barang_id,
                    'jumlah'       => $request->jumlah,
                    'total'        => $request->jumlah * $request->harga_per_item
                ])->save();

        // setelah penjualan terbuat redirect ke halaman untuk menambah penjualan lainnya
        return redirect("/admin/penjualan/penjualandetail/$penjualan_id")->with('success', 'Berhasil Menambah Penjualan Detail');
    }

    public function penjualanDetailDelete($penjualanDetailId)
    {
        PenjualanDetail::findOrFail($penjualanDetailId)->delete();

        return back()->with('success', 'Berhasil Menghapus Data Penjualan Detail');
    }
}