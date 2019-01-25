@extends('layouts.front.front')
@section('content')
        <div class="col-md-9 mt-4">
            <div class="card">
                <div class="card-header">DASHBOARD</div>
                <div class="card-body">
                        SELAMAT DATANG {{ \Auth::guard('member')->user()->nama }}
                </div>
            </div>
        </div>
@endsection