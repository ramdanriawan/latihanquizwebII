<!DOCTYPE html>
@php
    $dbName = DB::getDatabaseName();
    $tables = DB::select("show tables where `Tables_in_$dbName` not in('users', 'migrations')");
@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts Bawaan laravel -->
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    {{--  data tables --}}
    <script src="/node_modules/jquery/dist/jquery.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/dataTables.jqueryui.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/dataTables.buttons.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/buttons.jqueryui.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/jszip.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/pdfmake.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/vfs_fonts.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/buttons.html5.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/buttons.print.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/buttons.colVis.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/dataTables.select.min.js" charset="utf-8"></script>
    <script src="/node_modules/datatables/dataTables.checkboxes.min.js"></script>

    <link rel="stylesheet" href="/node_modules/datatables/jquery-ui.css">
    <link rel="stylesheet" href="/node_modules/datatables/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="/node_modules/datatables/buttons.jqueryui.min.css">
    <link rel="stylesheet" href="/node_modules/datatables/select.dataTables.min.css">
    <link type="text/css"  href="/node_modules/datatables/dataTables.checkboxes.css" rel="stylesheet" />

    {{--  sweetalert --}}
    <script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}" charset="utf-8"></script>
    <link rel="stylesheet" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

    {{--  Accounting js --}}
    <script src="{{asset('js/accounting.min.js')}}" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    {{--  punya sendiri --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/barang/script.js') }}" defer></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Data Master <span class="caret"></span>
                            </a>
                           <div class="dropdown-menu">
                               @foreach($tables as $table)
                                @php
                                    $table = (array) $table;
                                    $table["Tables_in_$dbName"] = substr_replace($table["Tables_in_$dbName"], '', -1);
                                @endphp

                               <a class="dropdown-item" href="{{ url("admin/{$table["Tables_in_$dbName"]}") }}">
                                   Data {{$table["Tables_in_$dbName"]}}
                               </a>
                               <a class="dropdown-item" href="{{ url("admin/{$table["Tables_in_$dbName"]}/create") }}">
                                   Tambah  {{$table["Tables_in_$dbName"]}}
                               </a>
                               @endforeach
                          </div>
                       </li>

                          {{-- menu untuk print laporan --}}
                          <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                              Laporan <span class="caret"></span>
                            </a>
                                 <div class="dropdown-menu">
                                   <a class="dropdown-item" onclick="window.open('{{ url('admin/laporan/barang') }}', '_blank', 'width=100');" style='cursor: pointer;'>
                                     Laporan Data Barang
                                   </a>
                                   <a class="dropdown-item" onclick="window.open('{{ url('admin/laporan/pelanggan') }}', '_blank', 'width=100');" style='cursor: pointer;'>
                                     Laporan Data Pelanggan
                                   </a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="{{ url('admin/laporan/transaksi') }}" >
                                     Laporan Transaksi
                                   </a>
                                </div>
                            </li>
                      @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class='container'>
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
