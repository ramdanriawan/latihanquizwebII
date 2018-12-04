@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data {{$halaman}}</div>
                <div class="card-body">

                    @include('layouts.partials.errors')
                    @include('layouts.partials.success')

                    {!! $datas['setCreateForm']->setCreateForm($errors) !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
