@extends('layouts.laporan.head')
<body  style="background: white;" onload='window.print(); window.close()'>
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="printLaporan">
                    <center class='printLaporanTitle'>
                        <h3>
                            <i class="fas fa-building"></i>    PT. SUKA SUKA GUELAH
                        </h3>
                        <h4>
                            <i class="fas fa-truck-loading"></i>    LAPORAN PENJUALAN
                        </h3>
                        <span>
                            <i class="far fa-calendar-alt"></i> Periode / Tanggal {{ date('d-m-Y', strtotime($_GET['mulai'])) }} s/d {{ date('d-m-Y', strtotime($_GET['sampai'])) }}
                        </span>
                    </center>

                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th  style='padding: 0'><div class="printLaporanThead">#No</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Nama Pelanggan</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Nama Barang</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Jumlah</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Total Harga</div></th>
                                </tr>
                        </thead>
                        <tbody> @php $no = 1; @endphp
                            @foreach ($penjualans as $penjualan)
                                @foreach($penjualan->penjualanDetail as $penjualanDetail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $penjualan->pelanggan->nama }}</td>
                                        <td>{{ $penjualanDetail->barang->nama }}</td>
                                        <td class="letterSpacing">{{ number_format($penjualanDetail->jumlah, 2, ',', '.') }}</td>
                                        <td class="letterSpacing">Rp{{ number_format($penjualan->total_harga, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    @include('layouts.laporan.tandaTangan')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
