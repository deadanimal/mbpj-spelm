@extends('base')

@section('content')

    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Tuntutan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Tuntutan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tuntutan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            @if (Session::has('success1'))
                <script>
                    alert("Tuntutan Diperiksa Berjaya Dihantar")
                </script>
            @endif

            @if (Session::has('success2'))
                <script>
                    alert("Tuntutan Disemak Berjaya Dihantar")
                </script>
            @endif

            @if (auth()->user()->role == 'kakitangan')
            @elseif(auth()->user()->role == 'penyelia')
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Tuntutan Elaun Lebih Masa
                                {{ Auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Semak Tuntutan Elaun Lebih
                                Masa Kakitangan</a>
                        </li>
                    </ul>
                </div>
            @elseif(auth()->user()->role == 'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa')
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Tuntutan Elaun Lebih Masa
                                {{ Auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Semak Tuntutan Elaun Lebih
                                Masa Kakitangan</a>
                        </li>
                    </ul>
                </div>
            @elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan')
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="ni ni-calendar-grid-58 mr-2"></i>Tuntutan Elaun Lebih Masa
                                Kakitangan</a>
                        </li>
                    </ul>
                </div>
            @else
            @endif
        </div>
    </div>
    {{-- user first --}}
    @if (auth()->user()->role == 'kakitangan')
        <div class="container-fluid mt--6">
            {{-- Card tuntutan --}}
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN LEBIH MASA
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                        LULUS
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH MASA
                                        LULUS DITOLAK
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tuntutan Kakitangan --}}
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <a type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                        data-target="#PastiTuntutan" href="/bulktuntutan">Hantar Tuntutan</a>
                </div>
                <div class="col-md-12">

                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0 ">Hantar Tuntutan Elaun Lebih Masa</h3>
                        </div>

                        {{-- @if (session('status_tuntutan'))
                        {{session('status_tuntutan')}}
                    @endif --}}
                        <?php
                    if(Session::has('status_tuntutan')){
                        ?>
                        <script>
                            alert("{{ Session::get('status_tuntutan') }}");
                        </script>
                        <?php
                    }
                    ?>

                        <!-- Light table -->
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                            style="overflow-x:scroll; width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th> No</th>
                                    <th> Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                    <th> Hari Biasa <br> Siang / Malam</th>
                                    <th> Hari Rehat <br> Siang / Malam</th>
                                    <th> Pelepasan AM <br> Siang / Malam</th>
                                    <th> Sebab Lebih Masa</th>
                                    {{-- <th> Tindakan</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tuntutan_k2 as $tuntutan_k)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            <input type="text" id="sebenar_mula_kerja_tuntutan"
                                                name="sebenar_mula_kerja_tuntutan"
                                                value="{{ $tuntutan_k->sebenar_mula_kerja }}" disabled><br><br>

                                            <input type="text" id="sebenar_akhir_kerja_tuntutan"
                                                name="sebenar_akhir_kerja_tuntutan"
                                                value="{{ $tuntutan_k->sebenar_akhir_kerja }}" disabled>
                                        </td>
                                        <td>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_biasa_siang }}" disabled>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_biasa_malam }}" disabled>

                                        </td>
                                        <td>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_cuti_siang }}" disabled>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_cuti_malam }}" disabled>

                                        </td>
                                        <td>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_am_siang }}" disabled>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_am_malam }} " disabled>

                                        </td>
                                        <td>
                                            {{ $tuntutan_k->tujuan }}
                                        </td>
                                        {{-- <td >
                                <select name="pegawai_sokong_id" class="form-control">
                                    <option hidden value="{{$tuntutan_k->pegawai_sokong_id}}" selected>
                                        {{$tuntutan_k->pegawai_sokong}} <br>
                                    </option>
                                    
                                </select><br>
                            
                                <select name="pegawai_lulus_id" class="form-control">
                                    <option hidden value="{{$tuntutan_k->pegawai_lulus_id}}" selected>
                                        {{$tuntutan_k->pegawai_lulus}} 
                                    </option>
                                    
                                </select>                                
                            </td> --}}

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_biasa }} </td>
                                    <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_rehat }} </td>
                                    <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_am }} </td>
                                    <td id="jumlah_jam_keseluruhan">Jumlah Jam : {{ $jumlah_jam_keseluruhan }}</td>


                                </tr>
                            </tfoot>

                            <!--calculate shift-->

                            <!-- Modal -->
                            <div class="modal fade" id="PastiTuntutan" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="text-white modal-title" id="exampleModalLabel">Makluman</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-red">
                                            Sila pastikan Tuntutan yang akan dihantar disemak dan anda bersetuju dengan
                                            jumlah tuntutan berikut
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-dismiss="modal">Tutup</button>
                                            <a href="/bulktuntutan" class="btn btn-primary btn-sm float-right">Hantar
                                                Tuntutan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </table>

                    </div>
                </div>
            </div>
            {{-- Tuntutan Kakitangan diluluskan --}}
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Tuntutan Dalam Proses Semakan</h3>
                        </div>
                        <!-- Light table -->
                        <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th> No</th>
                                    <th> Status Dalaman</th>
                                    <th> Status Perbendaharaan</th>
                                    {{-- <th> Tindakan </th> --}}
                                    <th> ETC </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuntutan_lulus as $tuntutan_lulus)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>


                                        @if ($tuntutan_lulus->sokong_tuntutan === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>:
                                                {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>:
                                                    {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                        Diluluskan</span>: {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>:
                                                    {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($tuntutan_lulus->periksa_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam
                                                        Semakan</span><br><br>
                                                @elseif($tuntutan_lulus->periksa_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>
                                                    <br><br>
                                                @endif
                                            </td>
                                        @elseif($tuntutan_lulus->sokong_tuntutan === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Tuntutan disokong</span>:
                                                {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>:
                                                    {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                        Diluluskan</span>: {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>:
                                                    {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Status periksa di kakitangan --}}
                                                @if ($tuntutan_lulus->periksa_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span> :
                                                    KERANI PEMERIKSA<br><br>

                                                    @if ($tuntutan_lulus->semak_tuntutan === null)
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span> :
                                                        KERANI SEMAKAN<br><br>
                                                    @elseif($tuntutan_lulus->semak_tuntutan === 1)
                                                        <span class="badge badge-pill badge-success">Tuntutan
                                                            Diluluskan</span> : KERANI SEMAKAN <br><br>
                                                    @endif
                                                @elseif($tuntutan_lulus->periksa_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan Diperiksa</span>
                                                    : KERANI PEMERIKSA <br><br>

                                                    @if ($tuntutan_lulus->semak_tuntutan === null)
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span> :
                                                        KERANI SEMAKAN<br><br>
                                                    @elseif($tuntutan_lulus->semak_tuntutan === 1)
                                                        <span class="badge badge-pill badge-success">Tuntutan
                                                            Diluluskan</span> : KERANI SEMAKAN <br><br>
                                                    @endif
                                                @endif
                                            </td>
                                        @elseif($tuntutan_lulus->sokong_tuntutan === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> :
                                                {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam
                                                        Semakan</span><br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                        Diluluskan</span><br><br>
                                                @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> :
                                                    {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($tuntutan_lulus->periksa_tuntutan === null)
                                                    <span class="badge badge-pill badge-primary">Dalam
                                                        Semakan</span><br><br>
                                                @elseif($tuntutan_lulus->periksa_tuntutan === 1)
                                                    <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>
                                                    <br><br>
                                                @endif
                                            </td>
                                        @endif
                                        {{-- <td>
                                    <form method="POST" action="/kemaskinipegawaituntutan/{{$tuntutan_lulus->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                           
                                            <select name="pegawai_sokong_id" class="form-control" style="width:100px ; height:35px;">
                                                <option  value="{{$tuntutan_lulus->pegawai_sokong_id}}">{{$tuntutan_lulus->pegawai_sokong_id}}</option>
    
                                                @foreach ($pegawaituntutan as $pegawaituntutan1)
                                                <option value="{{$pegawaituntutan1->id}} ">
                                                    {{$pegawaituntutan1->name}} - {{$pegawaituntutan1->role}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">

                                            <select name="pegawai_lulus_id" class="form-control"  style="width:100px ; height:35px;">
                                                <option value="{{$tuntutan_lulus->pegawai_lulus_id}}" >{{$tuntutan_lulus->pegawai_lulus_id}}</option>
                                                @foreach ($pegawaituntutan as $pegawaituntutan2)
                                                <option value="{{$pegawaituntutan2->id}}">
                                                    {{$pegawaituntutan2->name}} - {{$pegawaituntutan2->role}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Kemaskini</button><br>
                                    </form>
                                </td> --}}
                                        <td>
                                            <a href="/tuntutans/{{ $tuntutan_lulus->id }}/"
                                                class="btn btn-primary btn-sm">Lihat</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'penyelia')
        <div class="container-fluid mt--6">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                    aria-labelledby="tabs-icons-text-1-tab">
                    <div>
                        {{-- Card tuntutan --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                                    LEBIH MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS DITOLAK
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Tuntutan sebagai kakitangan --}}
                        <div class="row ">
                            <div class="col-md-12 mb-3">
                                <a type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#PastiTuntutan" href="/bulktuntutan">Hantar Tuntutan</a>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header  border-0 bg-default mb-4">
                                        <h3 class="mb-0 text-white ">Hantar Tuntutan Elaun Lebih Masa</h3>
                                    </div>

                                    {{-- @if (session('status_tuntutan'))
                                    {{session('status_tuntutan')}}
                                @endif --}}
                                    <?php
                                if(Session::has('status_tuntutan')){
                                    ?>
                                    <script>
                                        alert("{{ Session::get('status_tuntutan') }}");
                                    </script>
                                    <?php
                                }
                                ?>

                                    <!-- Light table -->
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">

                                            <tr>

                                                <th> No</th>
                                                <th> Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th> Hari Biasa <br> Siang / Malam</th>
                                                <th> Hari Rehat <br> Siang / Malam</th>
                                                <th> Pelepasan AM <br> Siang / Malam</th>
                                                <th> Sebab Lebih Masa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tuntutan_k2 as $tuntutan_k)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        <input type="text" id="sebenar_mula_kerja_tuntutan"
                                                            name="sebenar_mula_kerja_tuntutan"
                                                            value="{{ $tuntutan_k->sebenar_mula_kerja }}"
                                                            disabled><br><br>

                                                        <input type="text" id="sebenar_akhir_kerja_tuntutan"
                                                            name="sebenar_akhir_kerja_tuntutan"
                                                            value="{{ $tuntutan_k->sebenar_akhir_kerja }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_biasa_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_biasa_malam }}" disabled>

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_cuti_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_cuti_malam }}" disabled>

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_am_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_am_malam }} " disabled>

                                                    </td>
                                                    <td>
                                                        {{ $tuntutan_k->tujuan }}
                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>

                                                <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_biasa }} </td>
                                                <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_rehat }} </td>
                                                <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_am }} </td>
                                                <td>Jumlah Jam : {{ $jumlah_jam_keseluruhan }}</td>



                                            </tr>
                                        </tfoot>

                                        <!--calculate shift-->

                                        <!-- Modal -->
                                        <div class="modal fade" id="PastiTuntutan" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="text-white modal-title" id="exampleModalLabel">Makluman
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-red">
                                                        Sila pastikan Tuntutan yang akan dihantar disemak dan anda bersetuju
                                                        dengan jumlah tuntutan berikut
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm "
                                                            data-dismiss="modal">Tutup</button>
                                                        <a href="/bulktuntutan"
                                                            class="btn btn-primary btn-sm float-right">Hantar Tuntutan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </table>

                                </div>
                            </div>
                        </div>
                        {{-- Tuntutan sebagai kakitangan diluluskan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header bg-default  border-0 mb-3">
                                        <h3 class="text-white mb-0">Tuntutan Dalam Proses Semakan</h3>
                                    </div>
                                    <!-- Light table -->
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                {{-- <th> Tuntutan ID</th>
                                    
                                        <th> Jumlah Jam Tuntutan</th>
                                        <th> Jumlah Tuntutan</th>
                                        <th> Status</th> --}}
                                                <th> Status Dalaman</th>
                                                <th> Status Perbendaharaan</th>
                                                <th> Kemaskini </th>
                                                <th> Tindakan </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tuntutan_lulus as $tuntutan_lulus)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    {{-- <td >
                                            {{$tuntutan_lulus->id}}
                                         </td>
                                     
                                        <td >
                                            {{$tuntutan_lulus->jumlah_jam_tuntutan}}
                                         </td>
                                         <td >
                                            {{$tuntutan_lulus->jumlah_tuntutan}}
                                         </td>
                                         <td >
                                            {{$tuntutan_lulus->status}}
                                         </td> --}}

                                                    @if ($tuntutan_lulus->sokong_tuntutan === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam
                                                                Semakan</span>:
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @elseif($tuntutan_lulus->sokong_tuntutan === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Tuntutan
                                                                disokong</span>:
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @elseif($tuntutan_lulus->sokong_tuntutan === 0)
                                                        <td>
                                                            <span class="badge badge-pill badge-danger">Tuntutan
                                                                Ditolak</span> :
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span><br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span><br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span> :
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <form method="POST"
                                                            action="/kemaskinipegawaituntutan/{{ $tuntutan_lulus->id }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">

                                                                <select name="pegawai_sokong_id" class="form-control"
                                                                    style="width:100px ; height:35px;">
                                                                    @foreach ($pegawaituntutan as $pegawaituntutan1)
                                                                        <option
                                                                            {{ $tuntutan_lulus->pegawai_sokong_id == $pegawaituntutan1->id ? 'selected' : '' }}
                                                                            value="{{ $pegawaituntutan1->id }} ">
                                                                            {{ $pegawaituntutan1->name }} -
                                                                            {{ $pegawaituntutan1->role }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">

                                                                <select name="pegawai_lulus_id" class="form-control"
                                                                    style="width:100px ; height:35px;">
                                                                    <option
                                                                        value="{{ $tuntutan_lulus->pegawai_lulus_id }}">
                                                                        {{ $tuntutan_lulus->pegawai_lulus_id }}</option>
                                                                    @foreach ($pegawaituntutan as $pegawaituntutan2)
                                                                        <option
                                                                            {{ $tuntutan_lulus->pegawai_lulus_id == $pegawaituntutan2->id ? 'selected' : '' }}
                                                                            value="{{ $pegawaituntutan2->id }}">
                                                                            {{ $pegawaituntutan2->name }} -
                                                                            {{ $pegawaituntutan2->role }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Kemaskini</button><br>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="/tuntutans/{{ $tuntutan_lulus->id }}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <div>
                        {{-- Card tuntutan --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                                    LEBIH MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS DITOLAK
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sokong tuntutan kakitangan as Penyelia --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Sokong Tuntutan</h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>
                                                    {{-- <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                            </div> --}}

                                                    <th> No</th>
                                                    {{-- <th> Tuntutan ID</th> --}}
                                                    <th> Nama Pemohon</th>
                                                    {{-- <th> Jumlah Jam Tuntutan</th> --}}
                                                    <th> Pegawai Sokong <br> Pegawai Lulus </th>
                                                    <th> Tindakan</th>
                                                    <th> Status</th>

                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($sokong_tuntutan as $sokong_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $sokong_tuntutan->nama_pemohon }}
                                                        </td>
                                                        {{-- <td >   
                                                <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$sokong_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                            
                                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$sokong_tuntutan->jumlah_tuntutan}} "disabled >
                                            
                                                <input type="text" id="status" name="status" value="{{$sokong_tuntutan->status}}" disabled >
                                            </td> --}}

                                                        <td>
                                                            {{ $sokong_tuntutan->pegawai_sokong }} <br><br>

                                                            {{ $sokong_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($sokong_tuntutan->sokong_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>
                                                                <a href="/tuntutans/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-primary btn-sm">Lihat</a><br>
                                                                <a href="/sokong_tuntutan/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-success btn-sm">Sokong</a><br>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                                    Tolak
                                                                </button>
                                                            </td>
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    disokong</span>
                                                            </td>
                                                            @if ($sokong_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diluluskan</span>

                                                                    {{-- <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a> --}}

                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                </td>
                                                            @endif
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif

                                                    </tr>
                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                        Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_sokong_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $sokong_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="sokong_tuntutan_sebab"
                                                                                            placeholder="Sebab" type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-secondary btn-sm"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-secondary btn-sm">Hantar</button>

                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>



                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lulus tuntutan kakitangan as Penyelia --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Lulus Tuntutan </h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <!-- Light table -->
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>
                                                    {{-- <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div> --}}

                                                    <th> No</th>
                                                    {{-- <th> Tuntutan ID</th> --}}
                                                    <th> Nama Pemohon</th>
                                                    {{-- <th> Jumlah Jam Tuntutan</th> --}}
                                                    <th> Pegawai Lulus <br><br> Pegawai Sokong </th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        {{-- <td>
                                                    {{$lulus_tuntutan->id}}
                                                </td> --}}
                                                        <td>
                                                            {{ $lulus_tuntutan->nama_pemohon }}
                                                        </td>
                                                        {{-- <td >   
                                                    <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$lulus_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$lulus_tuntutan->jumlah_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="status" name="status" value="{{$lulus_tuntutan->status}}" disabled >
                                                </td> --}}

                                                        <td>
                                                            {{ $lulus_tuntutan->pegawai_sokong }} <br><br>

                                                            {{ $lulus_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($lulus_tuntutan->sokong_tuntutan === null)
                                                            @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan Pegawai Sokong</span>
                                                                </td>
                                                                <td>
                                                                    --
                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        disokong</span><br><br>

                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>

                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Tuntutan
                                                                        Ditolak</span>

                                                                </td>
                                                            @endif
                                                        @elseif ($lulus_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success"> Tuntutan
                                                                    Disokong</span><br><br>
                                                                <a href="/tuntutans/{{ $lulus_tuntutan->id }}/"
                                                                    class="btn btn-primary btn-sm">Lihat</a>
                                                            </td>
                                                            <td>
                                                                @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                    <a href="/tuntutans/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lihat</a>
                                                                    <a href="/lulus_tuntutan/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Sokong</a>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#tolaksokongtuntutan{{ $lulus_tuntutan->id }}">
                                                                        Tolak
                                                                    </button>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Tuntutan </span>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                @endif
                                                            </td>
                                                        @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif


                                                    </tr>

                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaklulustuntutan{{ $lulus_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                        Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_lulus_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $lulus_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="lulus_tuntutan_sebab"
                                                                                            placeholder="Sebab" type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-secondary btn-sm"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-secondary btn-sm">Hantar</button>

                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'ketua_bahagian')
        <div class="container-fluid mt--6">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                    aria-labelledby="tabs-icons-text-1-tab">
                    <div>
                        {{-- Card tuntutan --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                                    LEBIH MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS DITOLAK
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sokong tuntutan ketua jabatan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Sokong Tuntutan</h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>

                                                    <th> No</th>
                                                    <th> Nama Pemohon</th>
                                                    {{-- <th> Jumlah Jam Tuntutan</th> --}}
                                                    <th> Pegawai Sokong <br> Pegawai Lulus </th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>

                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($sokong_tuntutan as $sokong_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $sokong_tuntutan->nama_pemohon }}
                                                        </td>
                                                        {{-- <td >   
                                                <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$sokong_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                            
                                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$sokong_tuntutan->jumlah_tuntutan}} "disabled >
                                            
                                                <input type="text" id="status" name="status" value="{{$sokong_tuntutan->status}}" disabled >
                                            </td> --}}

                                                        <td>
                                                            {{ $sokong_tuntutan->pegawai_sokong }} <br><br>

                                                            {{ $sokong_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($sokong_tuntutan->sokong_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>
                                                                <a href="/tuntutans/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="ni ni-zoom-split-in"></i></a>
                                                                <a href="/sokong_tuntutan/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="ni ni-like-2"></i></a>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                                    <i class="ni ni-basket"></i>
                                                                </button>
                                                            </td>
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    disokong</span>
                                                            </td>
                                                            @if ($sokong_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diluluskan</span>

                                                                    <a href="/tuntutans/{{ $sokong_tuntutan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lihat</a>

                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                </td>
                                                            @endif
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif

                                                    </tr>
                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title text-white"
                                                                        id="exampleModalLabel">Tolak Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_sokong_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div>
                                                                                    <label>Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $sokong_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <textarea cols="50" rows="4" name="sokong_tuntutan_sebab" placeholder="Sebab" type="text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <button type="submit"
                                                                                    class="btn btn-success btn-sm">Hantar</button>

                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    data-dismiss="modal">Tutup</button>
                                                                            </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>



                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lulus tuntutan ketua jabatan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Lulus Tuntutan </h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <!-- Light table -->
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th> No</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Pegawai Lulus <br><br> Pegawai Sokong </th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $lulus_tuntutan->nama_pemohon }}
                                                        </td>
                                                        <td>
                                                            {{ $lulus_tuntutan->pegawai_sokong }} <br><br>

                                                            {{ $lulus_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($lulus_tuntutan->sokong_tuntutan === null)
                                                            @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan Pegawai Sokong</span>
                                                                </td>
                                                                <td>
                                                                    --
                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        disokong</span><br><br>

                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>

                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Tuntutan
                                                                        Ditolak</span>

                                                                </td>
                                                            @endif
                                                        @elseif ($lulus_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success"> Tuntutan
                                                                    Disokong</span><br><br>

                                                            </td>
                                                            <td>
                                                                @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                    <a href="/tuntutans/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lihat</a><br>
                                                                    <a href="/lulus_tuntutan/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Lulus</a><br>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#tolaksokongtuntutan{{ $lulus_tuntutan->id }}">
                                                                        Tolak
                                                                    </button>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Tuntutan </span>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                @endif
                                                            </td>
                                                        @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif


                                                    </tr>

                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaklulustuntutan{{ $lulus_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                        Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_lulus_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $lulus_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="lulus_tuntutan_sebab"
                                                                                            placeholder="Sebab" type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-secondary">Hantar</button>

                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'ketua_jabatan')
        <div class="container-fluid mt--6">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                    aria-labelledby="tabs-icons-text-1-tab">
                    <div>
                        {{-- Card tuntutan --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                                    LEBIH MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS DITOLAK
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sokong tuntutan ketua jabatan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Sokong Tuntutan</h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>

                                                    <th> No</th>
                                                    <th> Tuntutan ID</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Jumlah Jam Tuntutan</th>
                                                    <th> Pegawai </th>
                                                    <th> Tindakan</th>
                                                    <th> Status</th>

                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($sokong_tuntutan as $sokong_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ $sokong_tuntutan->id }}
                                                        </td>
                                                        <td>
                                                            {{ $sokong_tuntutan->nama_pemohon }}
                                                        </td>
                                                        <td>
                                                            <input type="text" id="jumlah_jam_tuntutan"
                                                                name="jumlah_jam_tuntutan"
                                                                value="{{ $sokong_tuntutan->jumlah_jam_tuntutan }} "
                                                                disabled>

                                                            <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan"
                                                                value="{{ $sokong_tuntutan->jumlah_tuntutan }} "
                                                                disabled>

                                                            <input type="text" id="status" name="status"
                                                                value="{{ $sokong_tuntutan->status }}" disabled>
                                                        </td>

                                                        <td>
                                                            {{ $sokong_tuntutan->pegawai_sokong }} <br>

                                                            {{ $sokong_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($sokong_tuntutan->sokong_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>
                                                                <a href="/tuntutans/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-primary btn-sm">Lihat</a><br>
                                                                <a href="/sokong_tuntutan/{{ $sokong_tuntutan->id }}/"
                                                                    class="btn btn-success btn-sm">Sokong</a><br>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                                    Tolak
                                                                </button>
                                                            </td>
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    disokong</span>
                                                            </td>
                                                            @if ($sokong_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diluluskan</span>

                                                                    <a href="/tuntutans/{{ $sokong_tuntutan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lihat</a>

                                                                </td>
                                                            @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                </td>
                                                            @endif
                                                        @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif

                                                    </tr>
                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                        Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_sokong_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $sokong_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="sokong_tuntutan_sebab"
                                                                                            placeholder="Sebab" type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-secondary">Hantar</button>

                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>



                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lulus tuntutan ketua jabatan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Lulus Tuntutan </h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <!-- Light table -->
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>
                                                    {{-- <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div> --}}

                                                    <th> No</th>
                                                    <th> Tuntutan ID</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Jumlah Jam Tuntutan</th>
                                                    <th> Pegawai Lulus <br><br> Pegawai Sokong </th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ $lulus_tuntutan->id }}
                                                        </td>
                                                        <td>
                                                            {{ $lulus_tuntutan->nama_pemohon }}
                                                        </td>
                                                        <td>
                                                            <input type="text" id="jumlah_jam_tuntutan"
                                                                name="jumlah_jam_tuntutan"
                                                                value="{{ $lulus_tuntutan->jumlah_jam_tuntutan }} "
                                                                disabled>

                                                            <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan"
                                                                value="{{ $lulus_tuntutan->jumlah_tuntutan }} "
                                                                disabled>

                                                            <input type="text" id="status" name="status"
                                                                value="{{ $lulus_tuntutan->status }}" disabled>
                                                        </td>

                                                        <td>
                                                            {{ $lulus_tuntutan->pegawai_sokong }} <br><br>

                                                            {{ $lulus_tuntutan->pegawai_lulus }}
                                                        </td>

                                                        @if ($lulus_tuntutan->sokong_tuntutan === null)
                                                            @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan Pegawai Sokong</span>
                                                                </td>
                                                                <td>
                                                                    --
                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        disokong</span><br><br>

                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>

                                                                </td>
                                                            @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Tuntutan
                                                                        Ditolak</span>

                                                                </td>
                                                            @endif
                                                        @elseif ($lulus_tuntutan->sokong_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success"> Tuntutan
                                                                    Disokong</span><br><br>
                                                                <a href="/tuntutans/{{ $lulus_tuntutan->id }}/"
                                                                    class="btn btn-primary btn-sm">Lihat</a>
                                                            </td>
                                                            <td>
                                                                @if ($lulus_tuntutan->lulus_tuntutan === null)
                                                                    <a href="/tuntutans/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lihat</a>
                                                                    <a href="/lulus_tuntutan/{{ $lulus_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Sokong</a>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#tolaksokongtuntutan{{ $lulus_tuntutan->id }}">
                                                                        Tolak
                                                                    </button>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Tuntutan </span>
                                                                @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                                    <span class="badge badge-pill badge-danger"> Tuntutan
                                                                        Ditolak</span>
                                                                @endif
                                                            </td>
                                                        @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif


                                                    </tr>

                                                    <!-- Modal tolak sokong tuntutan-->
                                                    <div class="modal fade"
                                                        id="tolaklulustuntutan{{ $lulus_tuntutan->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                        Tuntutan
                                                                        Kakitangan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="/tolak_lulus_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $lulus_tuntutan->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="lulus_tuntutan_sebab"
                                                                                            placeholder="Sebab" type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-secondary">Hantar</button>

                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Lebih 1/3 tuntutan ketua jabatan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Sah Tuntutan Lebih 1/3 gaji</h3>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive py-4">
                                        <!-- Light table -->
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th> No</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Pegawai Lulus <br><br> Pegawai Sokong </th>
                                                    <th> Status</th>
                                                    <th> Jenis</th>
                                                    <th> Tindakan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($semak_satupertiga as $tsp)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $tsp->nama_pemohon }}</td>
                                                        <td>{{ $tsp->pegawai_sokong }}<br> {{ $tsp->pegawai_lulus }}
                                                        </td>
                                                        @if ($tsp->lulus_kj == '1')
                                                            <td><span
                                                                    class="badge badge-pill badge-success">Diluluskan</span>
                                                            </td>
                                                        @elseif($tsp->lulus_kj == '0')
                                                            <td><span class="badge badge-pill badge-danger">Ditolak</span>
                                                            </td>
                                                        @elseif($tsp->lulus_kj === null)
                                                            <td><span class="badge badge-pill badge-primary">Belum
                                                                    Dinilai</span></td>
                                                        @endif
                                                        @if ($tsp->lulus_satupertiga == '1' && $tsp->lulus_sebulan == '0')
                                                            <td>Satu Pertiga Gaji</td>
                                                            <td>
                                                                <a href="/semaksatupertiga/{{ $tsp->id }}"
                                                                    class="btn btn-primary btn-sm ">Semak</a>
                                                                @if ($tsp->lulus_kj === null)
                                                                    <a href="/lulus_tuntutan_satu_pertiga/{{ $tsp->id }}"
                                                                        class="btn btn-success btn-sm ">Lulus</a>
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#tolaksatupertiga{{ $tsp->id }}">
                                                                        Tolak
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        @elseif ($tsp->lulus_satupertiga == '1' && $tsp->lulus_sebulan == '1')
                                                            <td>Sebulan Gaji <br> Semakan Datuk Bandar</td>
                                                            <td>
                                                                <a href="/semaksatupertiga/{{ $tsp->id }}"
                                                                    class="btn btn-primary btn-sm ">Semak</a>
                                                                @if ($tsp->lulus_db === null && $tsp->lulus_kj === null)
                                                                    <a href="/lulus_tuntutan_satu_pertiga/{{ $tsp->id }}"
                                                                        class="btn btn-success btn-sm ">Lulus</a>
                                                                @endif
                                                            </td>
                                                        @else
                                                            <td>Invalid</td>
                                                        @endif

                                                    </tr>
                                                    <div class="modal fade" id="tolaksatupertiga{{ $tsp->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="tolaksatupertigaLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="tolaksatupertigaLabel">
                                                                        Tolak Tuntutan 1/3 gaji</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="/tolak_satupertiga/{{$tsp->id}}" method="post">
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                            <label for="">Sebab Menolak</label>
                                                                            <input type="text" class="form-control" name="sebab_menolak">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                            class="btn btn-primary btn-sm">Hantar</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'datuk_bandar')
        <div class="container-fluid mt--6">
            {{-- Card tuntutan lebih sebulan gaji --}}
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                        LEBIH SEBULAN GAJI
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                        LEBIH SEBULAN GAJI DILULUSKAN
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH TUNTUTAN ELAUN
                                        LEBIH SEBULAN GAJI DITOLAK
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH TUNTUTAN ELAUN
                                        LEBIH SEBULAN GAJI (RM)
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- Tuntutan lebih sebulan gaji --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Sah Tuntutan Lebih Sebulan Gaji</h3>
                        </div>
                        <!-- Light table -->
                        {{-- <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th> Tarikh Mohon</th>
                            <th> Waktu Kerja</th>
                            <th> Perkara</th>
                            <th> Status</th>
                            <th> Jenis Permohonan
                            </th>
                            <!-- eKedatangan -->
                            <th>clockintime</th>
                            <th>clockouttime</th>
                            <th>totalworkinghour</th>
                            <th>otstarttime1</th>
                            <th>otendtime1</th>
                            <th>otdurationt1</th>
                        </tr>
                    </thead>
                    
                    <tbody class="list">

                    </tbody>
                </table> --}}


                        <div class="table-responsive py-4">
                            <!-- Light table -->
                            <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                style="overflow-x:scroll; width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th> No</th>
                                        <th> Nama Pemohon</th>
                                        <th> Pegawai Lulus <br><br> Pegawai Sokong </th>
                                        <th> Status</th>
                                        <th> Tindakan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($semak_sebulan as $tsp)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $tsp->nama_pemohon }}</td>
                                            <td>{{ $tsp->pegawai_sokong }} <br> {{ $tsp->pegawai_lulus }}</td>
                                            @if ($tsp->lulus_db == '1')
                                                <td><span class="badge badge-pill badge-success">Diluluskan</span>
                                                </td>
                                            @elseif($tsp->lulus_db == '0')
                                                <td><span class="badge badge-pill badge-danger">Ditolak</span>
                                                </td>
                                            @elseif($tsp->lulus_db === null)
                                                <td><span class="badge badge-pill badge-primary">Belum
                                                        Dinilai</span></td>
                                            @endif
                                            <td>
                                                <a href="/semaksebulan/{{ $tsp->id }}"
                                                    class="btn btn-primary btn-sm ">Semak</a>
                                                @if ($tsp->lulus_db === null)
                                                    <a href="/lulus_tuntutan_sebulan/{{ $tsp->id }}"
                                                        class="btn btn-success btn-sm ">Sah</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksebulan{{$tsp->id}}">
                                                        Tolak
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tolaksebulan{{$tsp->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="tolaksebulanLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tolaksebulanLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <form action="/tolak_sebulan/{{$tsp->id}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label for="">Sebab Ditolak</label>
                                                        <input type="text" class="form-control" name="sebab_ditolak">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa')
        <div class="container-fluid mt--6">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                    aria-labelledby="tabs-icons-text-1-tab">
                    <div>
                        {{-- Card tuntutan --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                                    LEBIH MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                    LULUS DITOLAK
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH
                                                    MASA
                                                </h5>
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                            <div class="col-auto">
                                                <div
                                                    class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Tuntutan sebagai kakitangan --}}
                        <div class="row ">
                            <div class="col-md-12 mb-3">
                                <a type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#PastiTuntutan" href="/bulktuntutan">Hantar Tuntutan</a>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header bg-default border-0 mb-3">
                                        <h3 class="text-white mb-0">Hantar Tuntutan Elaun Lebih Masa</h3>
                                    </div>

                                    {{-- @if (session('status_tuntutan'))
                                    {{session('status_tuntutan')}}
                                @endif --}}
                                    <?php
                                if(Session::has('status_tuntutan')){
                                    ?>
                                    <script>
                                        alert("{{ Session::get('status_tuntutan') }}");
                                    </script>
                                    <?php
                                }
                                ?>

                                    <!-- Light table -->
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">

                                            <tr>

                                                <th> No</th>
                                                <th> Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th> Hari Biasa <br> Siang / Malam</th>
                                                <th> Hari Rehat <br> Siang / Malam</th>
                                                <th> Pelepasan AM <br> Siang / Malam</th>
                                                <th> Sebab Lebih Masa</th>
                                                {{-- <th> Pegawai </th> --}}
                                                {{-- <th> Tindakan</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tuntutan_k2 as $tuntutan_k)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        <input type="text" id="sebenar_mula_kerja_tuntutan"
                                                            name="sebenar_mula_kerja_tuntutan"
                                                            value="{{ $tuntutan_k->sebenar_mula_kerja }}"
                                                            disabled><br><br>

                                                        <input type="text" id="sebenar_akhir_kerja_tuntutan"
                                                            name="sebenar_akhir_kerja_tuntutan"
                                                            value="{{ $tuntutan_k->sebenar_akhir_kerja }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_biasa_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_biasa_malam }}" disabled>

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_cuti_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_cuti_malam }}" disabled>

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_am_siang }}" disabled>
                                                        <input class="text-center" type="text" style="width:60px;"
                                                            onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                            value="{{ $tuntutan_k->jam_kerja_am_malam }} " disabled>

                                                    </td>

                                                    <td>
                                                        {{ $tuntutan_k->tujuan }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_biasa }} </td>
                                                <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_rehat }} </td>
                                                <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_am }} </td>
                                                <td id="jumlah_jam_keseluruhan">Jumlah Jam :
                                                    {{ $jumlah_jam_keseluruhan }}
                                                </td>
                                                {{-- <td></td> --}}

                                            </tr>
                                        </tfoot>

                                        <!--calculate shift-->

                                        <!-- Modal -->
                                        <div class="modal fade" id="PastiTuntutan" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="text-white modal-title" id="exampleModalLabel">Makluman
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-red">
                                                        Sila pastikan Tuntutan yang akan dihantar disemak dan anda bersetuju
                                                        dengan jumlah tuntutan berikut
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Tutup</button>
                                                        <a href="/bulktuntutan"
                                                            class="btn btn-primary float-right btn-sm">Hantar Tuntutan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </table>

                                </div>
                            </div>
                        </div>
                        {{-- Tuntutan sebagai kakitangan diluluskan --}}
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header bg-default border-0 mb-3">
                                        <h3 class="text-white mb-0">Tuntutan Dalam Proses Semakan</h3>
                                    </div>
                                    <!-- Light table -->
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>

                                                <th> Status Dalaman</th>
                                                <th> Status Perbendaharaan</th>
                                                <th> Kemaskini </th>
                                                <th> Tindakan </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tuntutan_lulus as $tuntutan_lulus)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>



                                                    @if ($tuntutan_lulus->sokong_tuntutan === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam
                                                                Semakan</span>:
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @elseif($tuntutan_lulus->sokong_tuntutan === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Tuntutan
                                                                disokong</span>:
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>:
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @elseif($tuntutan_lulus->sokong_tuntutan === 0)
                                                        <td>
                                                            <span class="badge badge-pill badge-danger">Tuntutan
                                                                Ditolak</span> :
                                                            {{ $tuntutan_lulus->pegawai_sokong }}<br><br>

                                                            @if ($tuntutan_lulus->lulus_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan</span><br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                                                                <span class="badge badge-pill badge-success">Tuntutan
                                                                    Diluluskan</span><br><br>
                                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span> :
                                                                {{ $tuntutan_lulus->pegawai_lulus }}<br><br>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Kerani</span><br><br>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <form method="POST"
                                                            action="/kemaskinipegawaituntutan/{{ $tuntutan_lulus->id }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">

                                                                <select name="pegawai_sokong_id" class="form-control">
                                                                    @foreach ($pegawaituntutan as $pegawaituntutan1)
                                                                        <option
                                                                            {{ $tuntutan_lulus->pegawai_sokong_id == $pegawaituntutan1->id ? 'selected' : '' }}
                                                                            value="{{ $pegawaituntutan1->id }} ">
                                                                            {{ $pegawaituntutan1->name }} -
                                                                            {{ $pegawaituntutan1->role }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">

                                                                <select name="pegawai_lulus_id" class="form-control">
                                                                    @foreach ($pegawaituntutan as $pegawaituntutan2)
                                                                        <option
                                                                            {{ $tuntutan_lulus->pegawai_lulus_id == $pegawaituntutan2->id ? 'selected' : '' }}
                                                                            value="{{ $pegawaituntutan2->id }}">
                                                                            {{ $pegawaituntutan2->name }} -
                                                                            {{ $pegawaituntutan2->role }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Kemaskini</button><br>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <a href="/tuntutans/{{ $tuntutan_lulus->id }}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    w
                    <div>
                        {{-- Card semakan tuntutan --}}
                        {{-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN LEBIH MASA
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                        LULUS
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">TUNTUTAN ELAUN LEBIH MASA
                                        LULUS DITOLAK
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
                        {{-- filter semakan tuntutan kakitangan --}}
                        {{-- <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Carian</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form>
                            <div class="row">
                                <div class="col mb-4">
                                    <h4>Pilih Jabatan</h4>
                                    <input type="text" class="form-control form-control-sm" placeholder="Pilih Jabatan">
                                </div>
                                <div class="col mb-4">
                                    <h4>Nama Kakitangan</h4>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nama Kakitangan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <h4>Tahun Permohonan</h4>
                                    <input id="start" class="form-control form-control-sm" type="date" /><br />
                                </div>
                                <div class="col-sm">
                                    <h4>Bulan Permohonan<h4>
                                    <input id="start"class="form-control form-control-sm" type="date" /><br />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row float-right">
                        <div class="col-sm ">
                            <button id="clearFilter" class="btn btn-sm btn-danger">Hapus Carian </button>
                            <button class="btn btn-sm btn-primary " id="filter">Carian</button>
                        </div>
                    </div>
                </div>
            </div> --}}
                        {{-- semakan tuntutan kakitangan --}}
                        @if (auth()->user()->role == 'kerani_pemeriksa')
                            <div class="row ">
                                <div class="col-md-12 mb-3">
                                    {{-- <button  class="btn btn-primary btn-sm " data-url="{{ url('PeriksaTuntutanAll') }}">Sokong Pilihan</button> --}}
                                    {{-- <button  class="btn btn-danger btn-sm " data-url="{{ url('PeriksaTolakTuntutanAll') }}">Tolak Pilihan</button> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Periksa Tuntutan Elaun Lebih Masa </h3>
                                        </div>

                                        <!-- Light table -->
                                        <table id="example"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>
                                                    {{-- <th><input type="checkbox" id="PeriksaTuntutanAll"></th> --}}
                                                    <th> No</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($periksa_tuntutan as $periksa_tuntutan)
                                                    <tr>
                                                        {{-- <td><input type="checkbox" class="sub_chk" data-id=""></td> --}}
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $periksa_tuntutan->nama_pemohon }}
                                                        </td>


                                                        @if ($periksa_tuntutan->periksa_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>

                                                                <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                    class="btn btn-danger btn-sm">Periksa</a><br>
                                                                {{-- <a href="/periksa_tuntutan/{{$periksa_tuntutan->id}}/"
                                                        class="btn btn-success btn-sm">Hantar</a><br> --}}
                                                                {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksemaktuntutan{{$periksa_tuntutan->id}}">
                                                        Tolak
                                                    </button> --}}
                                                            </td>
                                                        @elseif($periksa_tuntutan->periksa_tuntutan === 1)
                                                            @if ($periksa_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @elseif($periksa_tuntutan->periksa_tuntutan === 1)
                                                                <td>
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diperiksa</span><br><br>

                                                                    @if ($periksa_tuntutan->semak_tuntutan === null)
                                                                        <span class="badge badge-pill badge-primary">Dalam
                                                                            Proses</span>
                                                                    @elseif($periksa_tuntutan->semak_tuntutan === 1)
                                                                        <span class="badge badge-pill badge-success">Lulus
                                                                            Semakan</span>
                                                                    @endif


                                                                </td>
                                                            @elseif($periksa_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                </td>
                                                            @endif


                                                            <td>
                                                                {{-- <span class="badge badge-pill badge-success">Tuntutan disokong</span> --}}
                                                                <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                    class="btn btn-default btn-sm">Lihat </a>
                                                            </td>
                                                        @elseif($periksa_tuntutan->periksa_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                            </div>
                            {{-- periksa tuntutan kakitangan --}}
                        @elseif(auth()->user()->role == 'kerani_semakan')
                            <div class="row ">
                                {{-- <div class="col-md-12 mb-3">
                            <button  class="btn btn-primary btn-sm " data-url="{{ url('SemakTuntutanAll') }}">Sokong Pilihan</button>
                            <button  class="btn btn-danger btn-sm " data-url="{{ url('SemakTolakTuntutanAll') }}">Tolak Pilihan</button>
                        </div> --}}
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Semak Tuntutan Elaun Lebih Masa </h3>
                                        </div>

                                        <!-- Light table -->
                                        <table id="tablekeranisemak"
                                            class="display table table-striped table-bordered dt-responsive nowrap"
                                            style="overflow-x:scroll; width:100%">
                                            <thead class="thead-light">

                                                <tr>
                                                    {{-- <td><input type="checkbox" id="SemakTuntutanAll"></td> --}}

                                                    <th> No</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($semak_tuntutan as $semak_tuntutan)
                                                    <tr>
                                                        {{-- <td><input type="checkbox" class="sub_chk" data-id=""></td> --}}

                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $semak_tuntutan->nama_pemohon }}
                                                        </td>


                                                        @if ($semak_tuntutan->semak_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>
                                                                @if ($semak_tuntutan->periksa_tuntutan === null)
                                                                    <span class="badge badge-pill badge-danger"> Semakan
                                                                        Pemeriksa</span>
                                                                @elseif($semak_tuntutan->periksa_tuntutan === 1)
                                                                    <span class="badge badge-pill badge-success"> Tuntutan
                                                                        Diperiksa </span><br><br>

                                                                    <a href="/tuntutans/{{ $semak_tuntutan->id }}/"
                                                                        class="btn btn-danger btn-sm">Semak</a><br>
                                                                @endif
                                                                {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksemaktuntutan{{$semak_tuntutan->id}}">
                                                        Tolak
                                                    </button> --}}
                                                            </td>
                                                        @elseif($semak_tuntutan->semak_tuntutan === 1)
                                                            <td>
                                                                @if ($semak_tuntutan->semak_tuntutan === null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Proses</span>
                                                                @elseif($semak_tuntutan->semak_tuntutan === 0)
                                                                    <span
                                                                        class="badge badge-pill badge-danger">Ditolak</span>
                                                                @elseif($semak_tuntutan->semak_tuntutan === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Semakan</span>
                                                                @endif


                                                            </td>

                                                            <td>

                                                                <a href="/tuntutans/{{ $semak_tuntutan->id }}/"
                                                                    class="btn btn-default btn-sm">Lihat</a>
                                                            </td>
                                                            @if ($semak_tuntutan->lulus_tuntutan === null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @elseif($semak_tuntutan->semak_tuntutan === 1)

                                                            @elseif($semak_tuntutan->lulus_tuntutan === 0)
                                                                <td>
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                </td>
                                                            @endif
                                                        @elseif($semak_tuntutan->semak_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan
                                                                    Ditolak</span>

                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                            </tbody>


                                        </table>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 'pelulus_pindaan')
        <div class="container-fluid mt--6">

            {{-- Permohonan pindaan tuntutan --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Pindaan Tuntutan</h3>
                        </div>
                        <!-- Light table -->
                        <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>No Tuntutan</th>
                                    <th> Kerani BEP</th>
                                    <th> Sebab Kemaskini</th>
                                    <th> Tuntutan Kakitangan </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuntutan_kemaskini as $tuntutan_kemaskini)
                                    <tr>
                                        <th>{{ $tuntutan_kemaskini->id }}</th>
                                        <th>{{ $tuntutan_kemaskini->kerani_periksa_name }}<br><br>
                                            {{ $tuntutan_kemaskini->kerani_semak_name }}</th>
                                        <th>Sebab : {{ $tuntutan_kemaskini->mohon_kemaskini1_sebab }}<br><br> Sebab :
                                            {{ $tuntutan_kemaskini->mohon_kemaskini2_sebab }}</th>
                                        <th>{{ $tuntutan_kemaskini->kakitangan_name }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Error --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Modul ini tidak dibekalkan pada peranan anda.
                            Sila hubungi pentadbir sistem anda.</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>
    {{-- <script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tablekeranisemak thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#tablekeranisemak').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script> --}}

    <script>
        // Kemaskini jam tuntutan

        $(document).ready(function() {

            //check tab
            if (window.location.href.indexOf("#2") > -1) {
                document.getElementById("tabs-icons-text-2-tab").click()
            }

            var data_tuntutan = <?php echo $tuntutan_k2; ?>;
            kiraJumlahJam(data_tuntutan);
        });


        function kiraJumlahJam(data_tuntutan) {
            let jumlah_jam_tuntutan = 0;
            let jumlah_total_tuntutan = 0;
            let jumlah_status2 = 0;

            for (let i = 0; i < data_tuntutan.length; i++) {
                jumlah_jam_tuntutan = jumlah_jam_tuntutan + data_tuntutan[i].jam_tuntutan;
                jumlah_total_tuntutan = jumlah_jam_tuntutan + data_tuntutan[i].total_tuntutan;
                jumlah_status2 = jumlah_status2 + data_tuntutan[i].status2;
            }

            $("#jumlah_jam_tuntutan").text("Jumlah: " + jumlah_jam_tuntutan);
            $("#jumlah_total_tuntutan").text("Jumlah: " + jumlah_total_tuntutan);
            $("#jumlah_status2").text("Jumlah: " + jumlah_status2);

        }

        function KemaskiniJamTuntutan(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_jam_tuntutan/" + obj,
                type: "POST",
                data: {
                    "kemaskini_jam_tuntutan": obj2.value
                }

            });
        }

        function KemaskiniTotalTuntutan(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_total_tuntutan/" + obj,
                type: "POST",
                data: {
                    "kemaskini_total_tuntutan": obj2.value
                }

            });
        }

        function KemaskiniStatus2(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_status2/" + obj,
                type: "POST",
                data: {
                    "kemaskini_status2": obj2.value
                }

            });
        }
    </script>
@endsection
