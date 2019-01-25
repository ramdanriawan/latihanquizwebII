<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pembelian;
use App\Penjualan;
use App\Pelanggan;
use App\Satpam;
use App\PenjualanDetail;

class LaporanController extends Controller
{
	public function barang()
	{
		$data['barangs'] = Barang::all();

		return view('laporan.barang', $data);
	}

	public function pelanggan()
	{
	    $data['pelanggans'] = Pelanggan::all();

		return view('laporan.pelanggan', $data);
	}

	public function transaksi()
	{
		return view('laporan.transaksi');
	}

	public function pembelian(Request $request)
	{
		//tentukan tanggal mulai dan sampai kapan laporan mau diprint
		$mulai             = $request->get('mulai');
		$sampai            = $request->get('sampai');
		$data['mulai']     = $mulai;
		$data['sampai']    = $sampai;

		// ambil data pembelian berdasarkan tanggal mulai yang sudah dibuat
		$data['pembelians'] = Pembelian::whereBetween('created_at', [$mulai, $sampai])->get();

		// tampilkan laporan pembeliannya
		return view('laporan.pembelian', $data);
	}

	public function penjualan(Request $request)
	{
		//tentukan tanggal mulai dan sampai kapan laporan mau diprint
		$mulai             = $request->get('mulai');
		$sampai            = $request->get('sampai');
		$data['mulai']     = $mulai;
		$data['sampai']    = $sampai;

		// ambil data pembelian berdasarkan tanggal mulai yang sudah dibuat
		$data['penjualans'] = Penjualan::whereBetween('created_at', [$mulai, $sampai])->get();

		return view('laporan.penjualan', $data);
	}

	public function satpam()
	{
		$data['satpams'] = Satpam::all();

		return view('laporan.satpam', $data);
	}
}
