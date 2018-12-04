@extends('layouts.app')
{{-- {{dd($datas)}} --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

                <div class="card-header">Data {{ $halaman }}
                <div class="card-body">
                   <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                              @foreach($columns as $column)
                                   <th>{{ $column }}</th>
                               @endforeach
                           </tr>
                       </thead>
                       <tbody>
                        {{-- ini buat ngatasi setEditForm kalo di foreach pakai cara biasa --}}
                        @php
                         $datasSetEditFormTemp = $datas['setEditForm'];
                          unset($datas['setEditForm']);
                        @endphp

                        @foreach($datas as $data)
                          {{-- {{ dd( $data->barang->nama ) }} --}}
                          <tr> 
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $data->barang->nama }} </td>
                            <td> {{ $data->nama_pemasok }} </td>
                            <td> {{ $data->jumlah }} </td>
                            <td> {{ $data->harga }} </td>
                            <td> {{ $data->total_harga }} </td>
                              <td>
                                 <span class='btn-group btn-group-sm'>
                                     <button class='btn btn-primary btn-sm indexBtnEdit' data-id='{{$data->id}}' data-toggle='modal' data-target='#editModal{{$data->id}}'>
                                         <i class='far fa-edit'></i>
                                     </button>
                                     <form id='formDelete' action='/admin/{{ strtolower($halaman) }}/{{$data->id}}' method='post'>
                                         {{csrf_field()}}
                                         <input type='hidden' name='_method' value='DELETE'>
                                     </form>
                                     <button form='formDelete' class='btn btn-danger btn-sm btn-delete' type='submit' data-nama='{{$data->id}}' data-token='{{csrf_token()}}'> <i class='far fa-trash-alt'></i>
                                     </button>
                                 </span>

                            </td>
                          </tr>
                        @endforeach
                         {{-- {!! $setTbody !!} --}}
                       </tbody>
                   </table>
                </div>
                    @if(method_exists($datas, 'links'))
                        {{ $datas->links() }}
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

{{--  ini adalah modal untuk menampilkan gambar --}}
<div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Gambar untuk <span id="dataGambarNama"></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
          <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" id='gambarItem'>
                {{--  nanti itemnya akan muncul disini --}}
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@php $datas['setEditForm'] = $datasSetEditFormTemp @endphp
@foreach($datas as $data)
        {{--  ini adalah modal untuk edit barang yang ada di tiap row tabel --}}
        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-body">
                <div class="card">
                <div class="card-header">Edit data</div>
                    <div class="card-body">

                        @include('layouts.partials.errors')
                        @include('layouts.partials.success')

                        @if(get_class($data) != 'App\Settingan\Settingan') 
                            {!! $datas['setEditForm']->setEditForm($errors, $data) !!}
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endforeach
