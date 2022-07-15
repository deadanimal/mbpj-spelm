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
                <div class="col-md-12 mb-3 text-right">
                    <p class="col d-inline h4 text-red">Tuntutan akan dihantar secara automatik pada
                        {{ $tarikh_auto_hantar_tuntutan }} </p>
                    <a type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#PastiTuntutan"
                        href="/bulktuntutan">Hantar Tuntutan</a>
                </div>
                <div class="col-md-12">

                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0 ">Hantar Tuntutan Elaun Lebih Masa</h3>
                        </div>
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
                        <table id="example" class="table table-striped table-bordered ">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th> No</th>
                                    <th> Pegawai Sokong / Pegawai Lulus</th>
                                    <th> Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                    <th> Hari Biasa <br> Siang / Malam</th>
                                    <th> Hari Rehat <br> Siang / Malam</th>
                                    <th> Pelepasan AM <br> Siang / Malam</th>
                                    <th> Sebab <br> Lebih <br> Masa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuntutan_k2 as $tuntutan_k)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            <form action="/kemaskini_pegawai_level3/{{ $tuntutan_k->id }}"
                                                method="post">
                                                @method('put')
                                                @csrf
                                                <select name="pegawai_sokong_id" class="form-control mb-3">
                                                    @foreach ($pegawaiSokong as $p)
                                                        <option
                                                            {{ $tuntutan_k->pegawai_sokong_id == $p->id ? 'selected' : '' }}
                                                            value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>

                                                <select name="pegawai_lulus_id" class="form-control">
                                                    @foreach ($pegawaiLulus as $p)
                                                        <option
                                                            {{ $tuntutan_k->pegawai_lulus_id == $p->id ? 'selected' : '' }}
                                                            value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="text-center mt-3">
                                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                </div>
                                            </form>
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
                                                value="{{ $tuntutan_k->jam_kerja_biasa_siang !== null ? round($tuntutan_k->jam_kerja_biasa_siang, 3) : '' }}"
                                                disabled> <br> <br>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniJamTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_biasa_malam !== null ? round($tuntutan_k->jam_kerja_biasa_malam, 3) : '' }}"
                                                disabled>

                                        </td>
                                        <td>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_cuti_siang !== null ? round($tuntutan_k->jam_kerja_cuti_siang, 3) : '' }}"
                                                disabled><br> <br>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniTotalTuntutan({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_cuti_malam !== null ? round($tuntutan_k->jam_kerja_cuti_malam, 3) : '' }}"
                                                disabled>
                                        </td>
                                        <td>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_am_siang !== null ? round($tuntutan_k->jam_kerja_am_siang, 3) : '' }}"
                                                disabled><br> <br>
                                            <input class="text-center" type="text" style="width:60px;"
                                                onchange="KemaskiniStatus2({{ $tuntutan_k->id }}, this)"
                                                value="{{ $tuntutan_k->jam_kerja_am_malam !== null ? round($tuntutan_k->jam_kerja_am_malam, 3) : '' }} "
                                                disabled>

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

                                    <td id="jumlah_jam_biasa">Jumlah:{{ round($jumlah_jam_biasa, 3) }} </td>
                                    <td id="jumlah_jam_rehat">Jumlah:{{ round($jumlah_jam_rehat, 3) }} </td>
                                    <td id="jumlah_jam_am">Jumlah:{{ round($jumlah_jam_am, 3) }} </td>
                                    <td id="jumlah_jam_keseluruhan">Jumlah Jam : {{ round($jumlah_jam_keseluruhan, 3) }}
                                    </td>


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
                <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel"
                    aria-labelledby="tabs-icons-text-2-tab">
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
                                                        id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                        <form method="POST"
                                                                            action="/tolak_sokong_tuntutan">
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
                                                                                            placeholder="Sebab"
                                                                                            type="text">

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
                                                        id="tolaklulustuntutan{{ $lulus_tuntutan->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                        <form method="POST"
                                                                            action="/tolak_lulus_tuntutan">
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
                                                                                            placeholder="Sebab"
                                                                                            type="text">

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
                                                        id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                        <form method="POST"
                                                                            action="/tolak_sokong_tuntutan">
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
                                                        id="tolaklulustuntutan{{ $lulus_tuntutan->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                        <form method="POST"
                                                                            action="/tolak_lulus_tuntutan">
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
                                                                                            placeholder="Sebab"
                                                                                            type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
                                                            {{ $sokong->id }}
                                                        </td>
                                                        <td>
                                                            {{ $sokong->nama_pemohon }}
                                                        </td>
                                                        <td>
                                                            <input type="text" id="jumlah_jam_tuntutan"
                                                                name="jumlah_jam_tuntutan"
                                                                value="{{ $sokong->jumlah_jam_tuntutan }} " disabled>

                                                            <input type="text" id="jumlah_tuntutan"
                                                                name="jumlah_tuntutan"
                                                                value="{{ $sokong->jumlah_tuntutan }} " disabled>

                                                            <input type="text" id="status" name="status"
                                                                value="{{ $sokong->status }}" disabled>
                                                        </td>

                                                        <td>
                                                            {{ $sokong->pegawai_sokong }} <br>

                                                            {{ $sokong->pegawai_lulus }}
                                                        </td>

                                                        @if ($sokong_tuntutan->sokong_tuntutan === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            </td>
                                                            <td>
                                                                <a href="/tuntutans/{{ $sokong->id }}/"
                                                                    class="btn btn-primary btn-sm">Lihat</a><br>
                                                                <a href="/sokong_tuntutan/{{ $sokong->id }}/"
                                                                    class="btn btn-success btn-sm">Sokong</a><br>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongtuntutan{{ $sokong->id }}">
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

                                                                    <a href="/tuntutans/{{ $sokong->id }}/"
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
                                                    <div class="modal fade" id="tolaksokongtuntutan{{ $sokong->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                        <form method="POST"
                                                                            action="/tolak_sokong_tuntutan">
                                                                            @csrf
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="Perkara">Sebab Tolak
                                                                                        Tuntutan </label>
                                                                                    <input type="hidden"
                                                                                        value="{{ $sokong->id }}"
                                                                                        name="id">

                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <input class="form-control"
                                                                                            name="sokong_tuntutan_sebab"
                                                                                            placeholder="Sebab"
                                                                                            type="text">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
                                                            value="{{ $lulus_tuntutan->jumlah_tuntutan }} " disabled>

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

                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control"
                                                                                        name="lulus_tuntutan_sebab"
                                                                                        placeholder="Sebab"
                                                                                        type="text">

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
                                <div class="table-responsive pt-4">
                                    <!-- Light table -->
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><input type="checkbox" id="submitSatuPerTigaAll"></th>
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
                                                    <td>
                                                        @if ($tsp->lulus_kj !== null)
                                                            <input type="checkbox" class=""
                                                                id="{{ $tsp->id }}" disabled>
                                                        @else
                                                            <input type="checkbox" class="sspta"
                                                                id="{{ $tsp->id }}">
                                                        @endif

                                                    </td>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $tsp->nama_pemohon }}</td>
                                                    <td>{{ $tsp->pegawai_sokong }}<br> {{ $tsp->pegawai_lulus }}
                                                    </td>
                                                    <td>
                                                        @if ($tsp->lulus_db)
                                                            <span class="badge badge-pill badge-success">Diluluskan
                                                                Datuk Bandar</span>
                                                        @else
                                                            @switch($tsp->lulus_kj)
                                                                @case('1')
                                                                    <span class="badge badge-pill badge-success">Diluluskan</span>
                                                                @break

                                                                @case('0')
                                                                    <span class="badge badge-pill badge-danger">Ditolak</span>
                                                                @break

                                                                @case(null)
                                                                    <span class="badge badge-pill badge-primary">Belum
                                                                        Dinilai</span>
                                                                @break
                                                            @endswitch
                                                        @endif
                                                    </td>
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
                                                        <td>Sebulan Gaji
                                                            <br>
                                                            Semakan Datuk Bandar
                                                        </td>
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
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="tolaksatupertigaLabel" aria-hidden="true">
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
                                                            <form action="/tolak_satupertiga/{{ $tsp->id }}"
                                                                method="post">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <label for="">Sebab Menolak</label>
                                                                    <input type="text" class="form-control"
                                                                        name="sebab_menolak">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary btn-sm"
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
                                <div class="container mb-4">
                                    <div class="row ">
                                        <div class="col">
                                            <button class="btn btn-primary btn-sm "
                                                onclick="SubmitTuntutanAll(1,'SatuPerTigaKJ','.sspta')">Sokong
                                                Pilihan</button>
                                            <button class="btn btn-danger btn-sm "
                                                onclick="SubmitTuntutanAll(0,'SatuPerTigaKJ','.sspta')">Tolak
                                                Pilihan</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- Modal Tolak Satu Per Tiga All --}}
                        <div class="modal fade" id="tolakPukalSatuTigaTuntutanModal" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tolak Tuntutan Kakitangan</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/tolak_tuntutan_pukal">
                                        <div class="modal-body">
                                            @csrf
                                            <label for="Perkara">Sebab Tolak Tuntutan </label>
                                            <input type="hidden" name="jenis" value="satu_pertiga">
                                            <input class="form-control" name="tolak_satu_per_tiga_sebab"
                                                placeholder="Sebab" type="text">
                                            <div id="tolakPukalSatuTigaTuntutanDiv">

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Hantar</button>
                                        </div>
                                    </form>
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
                        <div class="table-responsive pt-4">
                            <!-- Light table -->
                            <table id="example"
                                class="display table table-striped table-bordered dt-responsive nowrap"
                                style="overflow-x:scroll; width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th><input type="checkbox" id="SebulanGajiAll"></th>
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
                                            <td>
                                                @if ($tsp->lulus_db === null)
                                                    <input type="checkbox" class="sga" id="{{ $tsp->id }}">
                                                @else
                                                    <input type="checkbox" class="" id="{{ $tsp->id }}"
                                                        disabled>
                                                @endif
                                            </td>
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
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#tolaksebulan{{ $tsp->id }}">
                                                        Tolak
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tolaksebulan{{ $tsp->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="tolaksebulanLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tolaksebulanLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/tolak_sebulan/{{ $tsp->id }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label for="">Sebab Ditolak</label>
                                                            <input type="text" class="form-control"
                                                                name="sebab_ditolak">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>

                        <div class="container mb-4">
                            <div class="row ">
                                <div class="col">
                                    <button class="btn btn-primary btn-sm "
                                        onclick="SubmitTuntutanAll(1,'SebulanGajiDB','.sga')">Sokong
                                        Pilihan</button>
                                    <button class="btn btn-danger btn-sm "
                                        onclick="SubmitTuntutanAll(0,'SebulanGajiDB','.sga')">Tolak
                                        Pilihan</button>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Tolak Sebulan All --}}
                        <div class="modal fade" id="tolakPukalSebulanGajiTuntutanModal" tabindex="-1"
                            role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tolak Tuntutan Kakitangan</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/tolak_tuntutan_pukal">
                                        <div class="modal-body">
                                            @csrf
                                            <label for="Perkara">Sebab Tolak Tuntutan </label>
                                            <input type="hidden" name="jenis" value="sebulan_gaji">
                                            <input class="form-control" name="tolak_sebulan_sebab" placeholder="Sebab"
                                                type="text">
                                            <div id="tolakPukalSebulanGajiTuntutanDiv">

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Hantar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN
                                                    ELAUN
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
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN
                                                    LEBIH
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
                                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN
                                                    LEBIH
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
                                    <table id="example"
                                        class="table table-striped table-bordered dt-responsive nowrap"
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
                                                        <h5 class="text-white modal-title" id="exampleModalLabel">
                                                            Makluman
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
                <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel"
                    aria-labelledby="tabs-icons-text-2-tab">
                    <div>
                        {{-- semakan tuntutan kakitangan --}}
                        @if (auth()->user()->role == 'kerani_pemeriksa')
                            <div class="row ">
                                <div class="col-md-12 mb-3">
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
                                                    <th> ID Pemohon</th>
                                                    <th> Nama Pemohon</th>
                                                    <th> Jenis</th>
                                                    <th> Status</th>
                                                    <th> Tindakan</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($periksa_tuntutans as $periksa_tuntutan)
                                                    <tr>
                                                        {{-- <td><input type="checkbox" class="sub_chk" data-id=""></td> --}}
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>

                                                        <td>
                                                            {{ $periksa_tuntutan->usercode }}
                                                        </td>

                                                        <td>
                                                            {{ $periksa_tuntutan->nama_pemohon }}
                                                        </td>

                                                        <td>
                                                            {{ $periksa_tuntutan->jenis }}
                                                        </td>
                                                        <td>
                                                            @if ($periksa_tuntutan->periksa_tuntutan === null)
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span>
                                                            @elseif($periksa_tuntutan->periksa_tuntutan == 0)
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            @elseif($periksa_tuntutan->periksa_tuntutan == 1)
                                                                @if ($periksa_tuntutan->lulus_tuntutan === null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                @elseif($periksa_tuntutan->lulus_tuntutan == 0)
                                                                    <span class="badge badge-pill badge-danger">Kelulusan
                                                                        Ditolak Pegawai</span>
                                                                @elseif ($periksa_tuntutan->semak_tuntutan === null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Proses</span>
                                                                @elseif($periksa_tuntutan->semak_tuntutan == 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Semakan</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diperiksa</span><br><br>
                                                                @endif
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($periksa_tuntutan->periksa_tuntutan === null)
                                                                <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                    class="btn btn-danger btn-sm">Periksa</a><br>
                                                            @elseif($periksa_tuntutan->periksa_tuntutan == 0)
                                                                <span class="badge badge-pill badge-danger"> Tuntutan
                                                                    Ditolak</span>
                                                            @elseif($periksa_tuntutan->periksa_tuntutan == 1)
                                                                @if ($periksa_tuntutan->lulus_tuntutan === null)
                                                                    <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Lihat</a><br>
                                                                @elseif($periksa_tuntutan->lulus_tuntutan === 0)

                                                                @elseif ($periksa_tuntutan->semak_tuntutan === null)
                                                                    <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Lihat</a><br>
                                                                @elseif($periksa_tuntutan->semak_tuntutan === 1)
                                                                    <a href="/tuntutans/{{ $periksa_tuntutan->id }}/"
                                                                        class="btn btn-success btn-sm">Lihat</a><br>
                                                                @else
                                                                    <span class="badge badge-pill badge-success">Tuntutan
                                                                        Diperiksa</span><br><br>
                                                                @endif
                                                            @endif
                                                        </td>
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

                                                @foreach ($semak_tuntutans as $semak_tuntutan)
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
        $("#submitSatuPerTigaAll").click(function() {
            if ($(this).prop('checked')) {
                $(".sspta").prop('checked', true);
            } else {
                $(".sspta").prop('checked', false);
            }
        });
        $("#SebulanGajiAll").click(function() {
            if ($(this).prop('checked')) {
                $(".sga").prop('checked', true);
            } else {
                $(".sga").prop('checked', false);
            }
        });

        function SubmitTuntutanAll(kelulusan, jenis, childElement) {
            let dicheck = false;
            jQuery.each($(childElement), function(key, val) {
                if ($(val).prop('checked')) {
                    dicheck = true;
                }
            });

            if (dicheck) {
                if (kelulusan == 1) {
                    jQuery.each($(childElement), function(key, val) {
                        if ($(val).prop('checked')) {
                            let tuntutan_id = val.id;
                            $.ajax({
                                method: "POST",
                                url: "/TuntutanSubmitAll",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "tuntutan_id": tuntutan_id,
                                    "kelulusan": kelulusan,
                                    "jenis": jenis,
                                },
                            });
                        }
                    });
                    alert("Tuntutan berjaya dilulus");
                    location.reload();
                }
                if (kelulusan == 0) {
                    switch (jenis) {
                        case "SatuPerTigaKJ":
                            var TheModal = "#tolakPukalSatuTigaTuntutanModal";
                            var TheDiv = "#tolakPukalSatuTigaTuntutanDiv";
                            break;
                        case "SebulanGajiDB":
                            var TheModal = "#tolakPukalSebulanGajiTuntutanModal";
                            var TheDiv = "#tolakPukalSebulanGajiTuntutanDiv";
                            break;
                        default:
                            break;
                    }

                    $(TheModal).modal('toggle');
                    jQuery.each($(childElement), function(key, val) {
                        if ($(val).prop('checked')) {
                            let tuntutan_id = val.id;
                            $(TheDiv).append(`  
                            <input type="hidden" name="tuntutan_id[]" value="` + tuntutan_id + `"> 
                            `);
                        }
                    });

                }
            } else {
                alert("Sila Pilih Tuntutan");
            }
        }


        // Kemaskini jam tuntutan

        $(document).ready(function() {
            $('table.display').DataTable();

            //check tab
            if (window.location.href.indexOf("#2") > -1) {
                document.getElementById("tabs-icons-text-2-tab").click()
            }

            var data_tuntutan = @json($tuntutan_k2->toArray());
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
