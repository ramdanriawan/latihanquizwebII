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
                            <i class="fas fa-truck-loading"></i>    LAPORAN BARANG
                        </h3>
                        <span>
                            <i class="far fa-calendar-alt"></i> Periode / Tanggal {{ date('d-m-Y') }}
                         </span>
                    </center>

                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th  style='padding: 0'><div class="printLaporanThead">#No</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Nama</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Harga Jual</div></th>
                                    <th  style='padding: 0'><div class="printLaporanThead">Stok</div></th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td class="letterSpacing">Rp{{ number_format($barang->harga_jual, 2, ',', '.') }}</td>
                                    <td class="letterSpacing">{{ number_format($barang->stok, 0, '', '.') }}</td>
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
