@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penjualan Detail Untuk <b>{{ $namaPelanggan }}</b></div>
                <div class="card-body">

                    @include('layouts.partials.errors')
                    @include('layouts.partials.success')

                    {{-- tampilkan form untuk menambah penjualan --}}
                    <form class='hidePrint' action="/admin/penjualan/penjualandetail/{{ $penjualanDetailId }}/add" method='post' id='penjualanDetailsCreate'>
                        {{ csrf_field() }}
                        <div class='form-group'>
                            <label>Id Barang</label>
                            <select class='form-control' name='barang_id'>
                                @foreach($barangs as $barangId => $barangNama)
                                    <option value='{{$barangId}}'>{{$barangNama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='form-group'>
                            <label>Harga Per Item</label>
                            <input type='number' name='harga_per_item' placeholder="Harga Per Item" class='form-control' autocomplete="off" min='0'>
                        </div>
                        <div class='form-group'>
                            <label>Stok</label>
                            <input type='number' name='stok' placeholder="Stok" class='form-control' autocomplete="off" min='0'>
                        </div>
                        <div class='form-group'>
                            <label>Jumlah</label>
                            <input type='number' name='jumlah' placeholder="Jumlah" class='form-control' autocomplete="off" min='0'>
                        </div>
                        <div class='form-group'>
                            <label>Total Harga</label>
                            <input type='number' name='total_harga' placeholder="Total Harga" class='form-control' autocomplete="off"  min='0'>
                        </div>
                        <div class='form-group'>
                            <button class='btn btn-primary' type='submit'>+Add</button>
                            <button class='btn btn-warning' type='reset'>Reset</button>
                        </div>
                    </form>

                    {{-- untuk melihat detail penjualan dari user --}}
                    <table class='table' id='penjualanDetailTable'> 
                        <thead>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th class="hidePrint">Action</th>
                        </thead>
                        <tbody>
                            @foreach($penjualanDetails as $penjualanDetail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penjualanDetail->barang->nama }}</td>
                                    <td>{{ number_format($penjualanDetail->jumlah, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($penjualanDetail->total, 2, ',', '.') }}</td>
                                    <td class="hidePrint">
                                        <span class='btn-group btn-group-sm'>
                                             <form id='formDelete' action='/admin/penjualan/penjualandetail/{{$penjualanDetail->id}}/delete' method='post'>
                                                 {{csrf_field()}}
                                                 <input type='hidden' name='_method' value='DELETE'>
                                             </form>
                                             <button form='formDelete' class='btn btn-danger btn-sm btn-delete' type='submit' data-nama='{{$penjualanDetail->id}}' data-token='{{csrf_token()}}'> <i class='far fa-trash-alt float-right'></i>
                                             </button>
                                     </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><h4>Total</h4></td><td></td><td></td><td><h4 class='text-success'>Rp{{ number_format(collect($penjualanDetails)->sum('total'), 2, ',', '.') }}</h4></td>
                        </tbody>
                        <tfoot>
                            <tr class="hidePrint">
                                <td></td><td></td><td></td><td colspan='2'><button class="btn btn-info btn-block"><i class='fas fa-print' id='printPenjualanDetail'> Print</i></button></td>
                            </tr>
                        </tfoot>
                    </tabel>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
