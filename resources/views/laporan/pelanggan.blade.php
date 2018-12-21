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
                            <i class="fas fa-truck-loading"></i>    LAPORAN PELANGGAN
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
                                        <th  style='padding: 0'><div class="printLaporanThead">Alamat</div></th>
                                    </tr>
                            </thead>

                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- untuk bikin tanda tangan  --}}
                    @include('layouts.laporan.tandaTangan')
                </div>
            </div>
        </div>
    </div>
