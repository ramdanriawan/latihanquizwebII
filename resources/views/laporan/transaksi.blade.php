@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Pilih Laporan Beserta Periode Yang Diinginkan</h4>
                    </div>
                    <div class="card-body">
                        {{-- Untuk Pembelian  --}}
                        <div class="card card-body">
                            <h5>Pembelian</h5>
                            <form class='form-inline' action='/admin/laporan/pembelian' target='print_popup' onsubmit='window.open("about:blank", "print_popup", "width=100");'>
                                <label for="" style="margin-right: 10px;"> Mulai </label>
                                <input class='form-control' type='date' name='mulai' />
                                <label for="" style="margin-right: 10px; margin-left: 10px;"> Sampai </label>
                                <input class='form-control' type='date' name='sampai' value='<?= date('Y-m-d') ?>'/>
                                <button class='btn btn-primary' type='submit' style='display: inline; margin-top: 10px;'>
                                    <i class='fas fa-print'> Print</i>
                                </button>
                            </form>
                        </div>
                        <hr>
                        {{-- Untuk Pembelian  --}}
                        <div class="card card-body">
                            <h5>Penjualan</h5>
                            <form class='form-inline' action='/admin/laporan/penjualan'  target='print_popup' onsubmit='window.open("about:blank", "print_popup", "width=100");'>
                                <label for="" style="margin-right: 10px;"> Mulai </label>
                                <input class='form-control' type='date' name='mulai' />
                                <label for="" style="margin-right: 10px; margin-left: 10px;"> Sampai </label>
                                <input class='form-control' type='date' name='sampai' value='<?= date('Y-m-d') ?>'/>
                                <button class='btn btn-primary' type='submit'  style='display: inline; margin-top: 10px;'>
                                    <i class='fas fa-print'> Print</i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
