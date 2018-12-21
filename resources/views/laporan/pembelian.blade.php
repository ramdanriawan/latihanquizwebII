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
                            <i class="fas fa-truck-loading"></i>    LAPORAN PEMBELIAN
                        </h3>
                        <span>
                            <i class="far fa-calendar-alt"></i> Periode / Tanggal {{ date('d-m-Y', strtotime($_GET['mulai'])) }} s/d {{ date('d-m-Y', strtotime($_GET['sampai'])) }}
                        </span>
                    </center>
                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th  style='padding: 0'><div class="printLaporanThead">#No</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Nama Barang</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Nama Pemasok</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Jumlah</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Harga</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Total Harga</div></th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelians as $pembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pembelian->barang->nama }}</td>
                                    <td>{{ $pembelian->nama_pemasok }}</td>
                                    <td class="letterSpacing">{{ number_format($pembelian->jumlah, 2, ',', '.') }}</td>
                                    <td class="letterSpacing">Rp{{ number_format($pembelian->harga, 2, ',', '.') }}</td>
                                    <td class="letterSpacing">Rp{{ number_format($pembelian->total_harga, 2, ',', '.') }}</td>
                                </tr>
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
