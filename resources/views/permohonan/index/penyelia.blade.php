@extends('base')

@section('content')
    <div class="header bg-default pb-6">
        <div class="container-fluid ">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Permohonan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/permohonans"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/permohonans/create">Permohonan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Permohonan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-5 text-right mb-4">
                <a href="/permohonans/create" class="btn btn-sm btn-neutral"> + Tambah Permohonan</a>
            </div>
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mb-sm-3 mb-md-0 " id="tabs-icons-text-1-tab" data-toggle="tab"
                            href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                            aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Permohonan Penyelia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="penyeliasokongkakitangan-tab" data-toggle="tab"
                            href="#penyeliasokongkakitangan" role="tab" aria-controls="penyeliasokongkakitangan"
                            aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Semak Permohonan Kakitangan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                            aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Semak Pengesahan Kakitangan</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LEBIH
                                                MASA
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $permohonansAll->count() }}</span>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH
                                                MASA LULUS
                                            </h5>
                                            <span
                                                class="h2 font-weight-bold mb-0">{{ $permohonansAll->where('lulus_selepas', '1')->count() }}</span>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH
                                                MASA DITOLAK
                                            </h5>
                                            <span
                                                class="h2 font-weight-bold mb-0">{{ $permohonansAll->where('lulus_selepas', '0')->count() }}</span>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH
                                                MASA DALAM PROSES
                                            </h5>
                                            <span
                                                class="h2 font-weight-bold mb-0">{{ $permohonansAll->whereNull('lulus_selepas')->count() }}</span>
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
                    <!-- Permohonan as Kakitangan -->
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Permohonan Kerja Lebih Masa ( Borang Permohonan A1 dan A2)
                                    </h3>
                                </div>

                                <div class="table-responsive py-4">


                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">

                                            <tr>
                                                <th>No</th>
                                                <th>Mohon Mula <br><br> Mohon akhir</th>
                                                <th>Lokasi<br><br>Tujuan</th>
                                                <th>Pegawai Sokong <br><br> Pegawai Lulus </th>
                                                <th>Jenis <br><br> Permohonan</th>
                                                <th>Status</th>
                                                <th>Kemaskini</th>
                                                <th>Tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonans as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->lokasi }} <br><br>

                                                        {{ $permohonan->tujuan }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->sokong_sebelum == null)
                                                            <span class="badge badge-pill badge-primary">Dalam
                                                                Semakan</span>
                                                        @endif
                                                        @if ($permohonan->sokong_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Lulus
                                                                PG1</span><br><br>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum == null)
                                                            <span class="badge badge-pill badge-primary">Dalam Proses
                                                                Semakan</span>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Lulus PG2</span>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG2</span><br><br>
                                                            {{ $permohonan->lulus_sebelum_sebab }}
                                                        @endif
                                                        @if ($permohonan->sokong_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG1</span><br><br>
                                                            {{ $permohonan->sokong_sebelum_sebab }}
                                                            <span class="badge badge-pill badge-danger">Permohonan
                                                                Ditolak</span><br><br>
                                                        @endif
                                                    </td>
                                                    <td class="kemaskini">
                                                        <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                            class="btn btn-primary btn-sm"> Kemaskini <i
                                                                class="ni ni-single-copy-04"></i></a><br>
                                                        <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                            class="btn btn-danger btn-sm"> Tolak <i
                                                                class="ni ni-basket"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm" onclick="rekod1()">Rekod</button>
                                </div>
                                <div class="table-responsive py-4 d-none" id="rekod1">
                                    <table class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Mohon Mula <br><br> Mohon akhir</th>
                                                <th>Lokasi<br><br>Tujuan</th>
                                                <th>Pegawai Sokong <br><br> Pegawai Lulus </th>
                                                <th>Jenis <br><br> Permohonan</th>
                                                <th>Status</th>
                                                {{-- <th>Kemaskini</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonanLevel1 as $p)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->permohonan->sebenar_mula_kerja)) }}<br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->permohonan->sebenar_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        {{ $p->permohonan->lokasi }} <br><br>

                                                        <div class="text-center">
                                                            <button class="btn btn-sm btn-primary"
                                                                onclick="tujuan('{{ $p->permohonan->tujuan }}')">Tujuan</button>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        {{ $p->permohonan->pegawaiLulus->name }}
                                                        <br><br>
                                                        {{ $p->permohonan->pegawaiSokong->name }}
                                                    </td>
                                                    <td>
                                                        @if ($p->permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @else
                                                            <span class="badge badge-pill badge-warning">KUMPULAN</span>
                                                        @endif
                                                    <td>
                                                        @if ($p->permohonan->sokong_sebelum == null)
                                                            <span class="badge badge-pill badge-primary"> Dalam
                                                                Semakan</span>
                                                        @elseif($p->permohonan->sokong_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Sokong PG1</span>
                                                        @elseif($p->permohonan->sokong_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG1</span><br><br>
                                                            {{ $p->permohonan->sokong_sebelum_sebab }}
                                                        @endif
                                                        <br><br>
                                                        @if ($p->permohonan->lulus_sebelum == null)
                                                            <span class="badge badge-pill badge-primary"> Proses
                                                                Semakan</span>
                                                        @elseif($p->permohonan->lulus_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Lulus PG2</span>
                                                        @elseif($p->permohonan->lulus_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG2</span><br><br>
                                                            {{ $p->permohonan->lulus_sebelum_sebab }}
                                                        @endif
                                                    </td>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Pengesahan Kerja Lebih Masa ( Borang Pengesahan B1)
                                    </h3>
                                </div>
                                <div class="table-responsive py-4">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu Mula Kerja lulus<br><br>Waktu Akhir Kerja lulus</th>
                                                <th>Status EKedatangan</th>
                                                {{-- <th>Mula Kerja<br><br>Akhir Kerja</th>
                                            <th>Jumlah OT <br><br>Status Datang</th>
                                                <th>Jumlah OT<br><br>Waktu Anjal</th>--}} 
                                                <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong <br> <br> Pegawai Lulus</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($pengesahans as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        {{-- <input class="form-control" value="{{$permohonan->tarikh}}" disabled> --}}
                                                        <h5> Tarikh :  
                                                            @if ($permohonan->tarikh == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->tarikh}}</span>
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('d-m-Y', strtotime($permohona)n->tarikh) }}</span>
                                                                @else
                                                                    <span>{{  date('d-m-Y', strtotime($permohonan->tarikh)) }}</span>
                                                                @endif
                                                            @endif
                                                        </h5>
                                                        <h5> Mula : 
                                                            @if ($permohonan->clockintime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->clockintime}}</span>
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)"> {{  date('H:i:s', strtotime($permohonan->clo)ckintime) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($permohonan->clockintime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        <h5> Akhir : 
                                                            @if ($permohonan->clockouttime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->clockouttime}}</span>
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('H:i:s', strtotime($permohonan->clo)ckouttime) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($permohonan->clockouttime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        </h5>
                                                        {{-- <h5>  Jumlah OT  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalworkinghour}}</span> </h5> --}}
                                                        <h5> Status : 
                                                            @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)) || $permohonan->statusdesc == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $permohonan->statusdesc }}</span>
                                                            @else
                                                                <span>{{ $permohonan->statusdesc }}</span>
                                                            @endif
                                                        </h5>
                                                        {{-- <h5>  Jumlah Jam  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalotduration}}</span> </h5> --}}
                                                        <h5> Waktu Anjal :
                                                            @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)) || $permohonan->waktuanjal == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $permohonan->waktuanjal }}</span>
                                                            @else
                                                                <span>{{ $permohonan->waktuanjal }}</span>
                                                            @endif 
                                                        </h5>

                                                    </td>
                                                    <td>
                                                        @if (!$permohonan->sah_mula_kerja)
                                                            <form action="/update-masa-mula-akhir/{{ $permohonan->id }}"
                                                                method="post">
                                                                @csrf
                                                                <input name="masa_mula" type="time"
                                                                    class="form-control"
                                                                    onchange="kemaskiniMasaSebenarMulaSaya({{ $permohonan->id }}, this)"
                                                                    value={{ date('H:i', strtotime($permohonan->sebenar_mula_kerja)) }}><br>
                                                                <input name=" masa_akhir" type="time"
                                                                    class="form-control"
                                                                    onchange="kemaskiniMasaSebenarAkhirSaya({{ $permohonan->id }}, this)"
                                                                    value={{ date('H:i', strtotime($permohonan->sebenar_akhir_kerja)) }}><br>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-sm btn-success">
                                                                        Sah Masa</button>
                                                                </div>
                                                            </form>
                                                        @else
                                                            {{  date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}<br><br>
                                                            {{  date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}<br><br>
                                                        @endif

                                                    </td>
                                                    @if ($permohonan->lulus_sebelum == 1)
                                                        <td>

                                                            <form method="POST"
                                                                action="/kemaskinipegawaipengesah/{{ $permohonan->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">

                                                                    <select name="p_pegawai_sokong_id"
                                                                        class="form-control">
                                                                        @foreach ($userspengesahan as $userspengesahan1)
                                                                            <option
                                                                                {{ $permohonan->pegawaiSokong->id == $userspengesahan1->id ? 'selected' : '' }}
                                                                                value="{{ $userspengesahan1->id }} ">
                                                                                {{ $userspengesahan1->name }} -
                                                                                {{ $userspengesahan1->role }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">

                                                                    <select name="p_pegawai_lulus_id"
                                                                        class="form-control">
                                                                        @foreach ($userspengesahan as $userspengesahan2)
                                                                            <option
                                                                                {{ $permohonan->pegawaiLulus->id == $userspengesahan2->id ? 'selected' : '' }}
                                                                                value="{{ $userspengesahan2->id }}">
                                                                                {{ $userspengesahan2->name }} -
                                                                                {{ $userspengesahan2->role }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="text-center">

                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Kemaskini</button>
                                                                </div>
                                                            </form>

                                                        </td>

                                                        @if ($permohonan->sokong_selepas == 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Lulus
                                                                    Pengesahan pegawai PG1</span><br><br>

                                                                @if ($permohonan->lulus_selepas == 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Pengesahan pegawai PG2</span><br><br>
                                                                @elseif($permohonan->lulus_selepas == 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                        Pengesahan pegawai PG2</span><br><br>
                                                                    {{ $permohonan->lulus_selepas_sebab }}
                                                                @elseif($permohonan->lulus_selepas == null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        semakan pegawai PG2</span><br>
                                                                @endif

                                                            </td>
                                                        @elseif($permohonan->sokong_selepas == 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak
                                                                    Pengesahan pegawai PG1</span><br><br>
                                                                {{ $permohonan->sokong_selepas_sebab }}

                                                            </td>
                                                        @elseif($permohonan->sokong_selepas == null)
                                                            @if ($permohonan->sebenar_akhir_kerja == null)
                                                                <td class="kemaskini">

                                                                    <a href="/sebenar_mula_akhir_kerja/{{ $permohonan->id }}/"
                                                                        class="btn btn-success btn-sm"><i
                                                                            class="ni ni-send"></i></a>
                                                                    <button
                                                                        onclick="buangpermohonan({{ $permohonan->id }})"
                                                                        class="btn btn-danger btn-sm"><i
                                                                            class="ni ni-basket"></i></button>
                                                                </td>
                                                            @elseif($permohonan->sebenar_akhir_kerja != null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary"> Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @elseif($permohonan->lulus_sebelum == 0)
                                                    @endif
                                                </tr>
                                                <script>
                                                    function buangpermohonan(id) {
                                                        swal({
                                                            title: 'Makluman?',
                                                            text: "Hapus Permohonan?!",
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Buang',
                                                            cancelButtonText: 'Tutup',

                                                        }).then(result => {
                                                            console.log("result", result);
                                                            if (result.value == true) {
                                                                console.log("id", id);
                                                                $.ajax({
                                                                    url: "permohonans/" + id,
                                                                    type: "POST",
                                                                    data: {
                                                                        "id": id,
                                                                        "_token": "{{ csrf_token() }}",
                                                                        "_method": 'delete'
                                                                    },
                                                                    success: function(data) {
                                                                        location.reload();
                                                                    },
                                                                });

                                                            } else if (result.dismiss == "cancel") {
                                                                console.log("dismiss");
                                                            }
                                                        })
                                                    }
                                                </script>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm" onclick="rekod2()">Rekod</button>
                                </div>

                                <div class="table-responsive py-4 d-none" id="rekod2">
                                    <table class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu Mula Kerja lulus<br><br>Waktu Akhir Kerja lulus</th>
                                                <th>Status EKedatangan</th>
                                                <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong / Pegawai Lulus</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonanLevel2 as $p)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        <h5> Tarikh :  
                                                            @if ($p->tarikh == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->tarikh}}</span>
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('d-m-Y', strtotime($p->tarikh)) }}</span>
                                                                @else
                                                                    <span>{{  date('d-m-Y', strtotime($p->tarikh)) }}</span>
                                                                @endif
                                                            @endif
                                                        </h5>
                                                        <h5> Mula : 
                                                            @if ($p->clockintime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->clockintime}}
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)"> {{  date('H:i:s', strtotime($p->clockintime)) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($p->clockintime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        <h5> Akhir : 
                                                            @if ($p->clockouttime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->clockouttime}}
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('H:i:s', strtotime($p->clockouttime)) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($p->clockouttime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        </h5>
                                                        <h5> Status : 
                                                            @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))) || $p->statusdesc == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $p->statusdesc }}</span>
                                                            @else
                                                                <span>{{ $p->statusdesc }}</span>
                                                            @endif
                                                        </h5>
                                                        <h5> Waktu Anjal : 
                                                            @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))) || $p->waktuanjal == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $p->waktuanjal }}</span>
                                                            @else
                                                                <span>{{ $p->waktuanjal }}</span>
                                                            @endif
                                                        </h5>
                                                        @if (isset($p->permohonan->jenis_masa))
                                                            <div class="col-12 text-center">
                                                                <label class="h5 my-0 py-0 mt-2 " for="">
                                                                    Jenis
                                                                    Masa</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $p->permohonan->jenis_masa }}" readonly>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->permohonan->sebenar_mula_kerja)) }}<br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->permohonan->sebenar_akhir_kerja)) }}<br><br>
                                                    </td>
                                                    @if ($p->permohonan->lulus_sebelum == 1)
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="p_pegawai_sokong_id"
                                                                    value="{{ $p->permohonan->pegawaiSokong->name }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="p_pegawai_sokong_id"
                                                                    value="{{ $p->permohonan->pegawaiLulus->name }}"
                                                                    readonly>
                                                            </div>
                                                        </td>
                                                        @if ($p->permohonan->sokong_selepas == 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Sokong
                                                                </span><br><br>

                                                                @if ($p->permohonan->lulus_selepas == 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                    </span><br><br>
                                                                @elseif($p->permohonan->lulus_selepas == 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                    </span><br><br>
                                                                    {{ $p->permohonan->lulus_selepas_sebab }}
                                                                @elseif($p->permohonan->lulus_selepas == null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span><br>
                                                                @endif

                                                            </td>
                                                        @elseif($p->permohonan->sokong_selepas == 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak
                                                                </span><br><br>
                                                                {{ $p->permohonan->sokong_selepas_sebab }}

                                                            </td>
                                                        @elseif($p->permohonan->sokong_selepas == null)
                                                            @if ($p->permohonan->sebenar_akhir_kerja == null)
                                                                <td>
                                                                    --
                                                                </td>
                                                            @elseif($p->permohonan->sebenar_akhir_kerja != null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary"> Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @elseif($p->permohonan->lulus_sebelum == 0)
                                                    @endif
                                                </tr>
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

        {{-- Pemohonan --}}
        <div class="tab-pane fade" id="penyeliasokongkakitangan" role="tabpanel"
            aria-labelledby="penyeliasokongkakitangan-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary btn-sm " onclick="SokongAllKakitangan(1)">Sokong
                                Pilihan</button>
                            <button class="btn btn-danger btn-sm " onclick="SokongAllKakitangan(0)">Tolak
                                Pilihan</button>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Sokong Permohonan (Borang A1 / A2)</h3>

                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><input type="checkbox" id="SokongAllKakitangan"></th>
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula<br>Waktu Akhir</th>
                                                <th>Lokasi<br>Tujuan</th>
                                                <th>Pegawai Sokong <br> Pegawai Lulus </th>
                                                <th>Status</th>
                                                <th>tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonan_disokongs as $permohonan)
                                                <tr>
                                                    <td>
                                                        <input {{ $permohonan->sokong_sebelum !== null ? 'disabled' : '' }}
                                                            type="checkbox"
                                                            class="{{ $permohonan->sokong_sebelum !== null ? '' : 'sak' }}"
                                                            id="{{ $permohonan->id }}">
                                                    </td>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="nama pemohon">
                                                        {{ $permohonan->user->name ?? '' }} <br><br>

                                                        @if ($permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @elseif($permohonan->jenis_permohonan == 'berkumpulan')
                                                            <span class="badge badge-pill badge-primary">BERKUMPULAN</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->lokasi }}<br><br>

                                                        {{ $permohonan->tujuan }}
                                                    </td>
                                                    <td class="pelulus">
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>

                                                    <td>
                                                        @if ($permohonan->sokong_sebelum == null)
                                                            <div class="row text-center">
                                                                <div class="col-12">
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </div>
                                                            </div>
                                                        @elseif($permohonan->sokong_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan
                                                                PG1</span>
                                                        @elseif($permohonan->sokong_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                                PG1</span><br>
                                                            <span>Sebab Ditolak :
                                                                {{ $permohonan->sokong_sebelum_sebab }}
                                                            </span>
                                                        @endif
                                                        <br><br>
                                                        @if ($permohonan->lulus_sebelum == null)
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Pegawai</span>
                                                        @elseif($permohonan->lulus_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                                PG2</span>
                                                        @elseif($permohonan->lulus_sebelum)
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan
                                                                PG2</span>
                                                        @endif
                                                        <br><br>
                                                        @if (isset($permohonan->jenis_masa) && $permohonan->sokong_sebelum == null)
                                                            <div class="col-12 text-center">
                                                                <label class="h5 my-0 py-0 mt-2 " for=""> Jenis
                                                                    Masa</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-control"
                                                                    onchange="tukarJenisMasa(this,{{ $permohonan->id }});">
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Siang' ? 'selected' : '' }}
                                                                        value="Hari Biasa Siang">Hari Biasa
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Malam' ? 'selected' : '' }}
                                                                        value="Hari Biasa Malam">Hari Biasa
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Siang' ? 'selected' : '' }}
                                                                        value="Hari Rehat Siang">Hari Rehat
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Malam' ? 'selected' : '' }}
                                                                        value="Hari Rehat Malam">Hari Rehat
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Siang' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Siang">Pelepasan Am
                                                                        Siang</option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Malam' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Malam">Pelepasan Am
                                                                        Malam</option>
                                                                </select>
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($permohonan->sokong_sebelum == null)
                                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                                class="btn btn-primary btn-sm">Kemaskini <i
                                                                    class="ni ni-single-copy-04"></i></a><br>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#tolaksokongsebelum{{ $permohonan->id }}">Tolak
                                                                <i class="ni ni-basket"></i>
                                                            </button><br>
                                                            <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                                class="btn btn-success btn-sm">Sokong <i
                                                                    class="ni ni-like-2"></i></a>
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="tolaksokongsebelum{{ $permohonan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white" id="exampleModalLabel">
                                                                    Tolak
                                                                    Permohonan
                                                                    Kakitangan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form method="POST" action="/tolak_sokong_sebelum">
                                                                        @csrf
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="Perkara">Sebab Tolak
                                                                                    Permohonan</label>
                                                                                <input type="hidden"
                                                                                    value="{{ $permohonan->id }}"
                                                                                    name="id">

                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control"
                                                                                        name="sokong_sebelum_sebab"
                                                                                        placeholder="Sebab"
                                                                                        type="text">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </form>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary btn-sm"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm">Hantar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm" onclick="rekod3()">Rekod</button>
                                </div>

                                <!-- Light table -->
                                <div class="table-responsive py-4 d-none " id="rekod3">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><input type="checkbox" id="SokongAllKakitangan"></th>
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula<br>Waktu Akhir</th>
                                                <th>Lokasi<br>Tujuan</th>
                                                <th>Pegawai Sokong <br> Pegawai Lulus </th>
                                                <th>Status</th>
                                                <th>tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonan_disokongs_rekod as $permohonan)
                                                <tr>
                                                    <td>
                                                        <input {{ $permohonan->sokong_sebelum !== null ? 'disabled' : '' }}
                                                            type="checkbox"
                                                            class="{{ $permohonan->sokong_sebelum !== null ? '' : 'sak' }}"
                                                            id="{{ $permohonan->id }}">
                                                    </td>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="nama pemohon">
                                                        {{ $permohonan->user->name ?? '' }} <br><br>

                                                        @if ($permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @elseif($permohonan->jenis_permohonan == 'berkumpulan')
                                                            <span class="badge badge-pill badge-primary">BERKUMPULAN</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->lokasi }}<br><br>

                                                        {{ $permohonan->tujuan }}
                                                    </td>
                                                    <td class="pelulus">
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>

                                                    <td>
                                                        @if ($permohonan->sokong_sebelum == null)
                                                            <div class="row text-center">
                                                                <div class="col-12">
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </div>
                                                            </div>
                                                        @elseif($permohonan->sokong_sebelum == 1)
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan
                                                                PG1</span>
                                                        @elseif($permohonan->sokong_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                                PG1</span><br>
                                                            <span>Sebab Ditolak :
                                                                {{ $permohonan->sokong_sebelum_sebab }}
                                                            </span>
                                                        @endif
                                                        <br><br>
                                                        @if ($permohonan->lulus_sebelum == null)
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                Pegawai</span>
                                                        @elseif($permohonan->lulus_sebelum == 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                                PG2</span>
                                                        @elseif($permohonan->lulus_sebelum)
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan
                                                                PG2</span>
                                                        @endif
                                                        <br><br>
                                                        @if (isset($permohonan->jenis_masa) && $permohonan->sokong_sebelum == null)
                                                            <div class="col-12 text-center">
                                                                <label class="h5 my-0 py-0 mt-2 " for=""> Jenis
                                                                    Masa</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-control"
                                                                    onchange="tukarJenisMasa(this,{{ $permohonan->id }});">
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Siang' ? 'selected' : '' }}
                                                                        value="Hari Biasa Siang">Hari Biasa
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Malam' ? 'selected' : '' }}
                                                                        value="Hari Biasa Malam">Hari Biasa
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Siang' ? 'selected' : '' }}
                                                                        value="Hari Rehat Siang">Hari Rehat
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Malam' ? 'selected' : '' }}
                                                                        value="Hari Rehat Malam">Hari Rehat
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Siang' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Siang">Pelepasan Am
                                                                        Siang</option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Malam' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Malam">Pelepasan Am
                                                                        Malam</option>
                                                                </select>
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($permohonan->sokong_sebelum == null)
                                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="ni ni-single-copy-04"> Kemaskini </i></a><br>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#tolaksokongsebelum{{ $permohonan->id }}">Tolak
                                                                <i class="ni ni-basket"></i>
                                                            </button><br>
                                                            <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                                class="btn btn-success btn-sm"> Sokong <i
                                                                    class="ni ni-like-2"></i></a>
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="tolaksokongsebelum{{ $permohonan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white" id="exampleModalLabel">
                                                                    Tolak
                                                                    Permohonan
                                                                    Kakitangan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form method="POST" action="/tolak_sokong_sebelum">
                                                                        @csrf
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="Perkara">Sebab Tolak
                                                                                    Permohonan</label>
                                                                                <input type="hidden"
                                                                                    value="{{ $permohonan->id }}"
                                                                                    name="id">

                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control"
                                                                                        name="sokong_sebelum_sebab"
                                                                                        placeholder="Sebab"
                                                                                        type="text">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </form>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary btn-sm"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm">Hantar</button>
                                                                </div>
                                                            </div>
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

        {{-- Modal Tolak Pukal --}}
        <div class="modal fade" id="tolakPermohonanPukalModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Tolak Permohonan Kakitangan Secara Pukal
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/tolak_permohonan_pukal">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group" id="tolakPermohonanPukalDiv">
                                        <label for="Perkara">Sebab Tolak Permohonan</label>
                                        <input type="hidden" name="jenis" value="sokong_sebelum">
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" name="sokong_sebelum_sebab" placeholder="Sebab"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success btn-sm">Hantar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengesahan --}}
        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary btn-sm " onclick="SubmitPengesahanAll(1,'.spa')">Sokong
                                Pilihan</button>
                            <button class="btn btn-danger btn-sm " onclick="SubmitPengesahanAll(0,'.spa')">Tolak
                                Pilihan</button>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Sokong Pengesahan (Borang B1)</h3>

                                </div>
                                <div class="table-responsive py-4">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th> <input type="checkbox" id="SokongPengesahanAll" /></th>
                                                <th>No</th>
                                                <th>Nama Pemohon<br><br>Mula Kerja lulus <br><br>Akhir Kerja lulus</th>
                                                <th>Ekedatangan</th>
                                                <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong<br><br>Pegawai Lulus</th>

                                                <th>Status</th>
                                                <th>Tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @forelse($pengesahan_disokongs as $permohonan)
                                                <tr>
                                                    <td>
                                                        <input
                                                            {{ $permohonan->sokong_selepas !== null || !$permohonan->sah_mula_kerja ? 'disabled' : '' }}
                                                            type="checkbox"
                                                            class="{{ $permohonan->sokong_selepas !== null || !$permohonan->sah_mula_kerja ? '' : 'spa' }}"
                                                            id="{{ $permohonan->id }}">
                                                    </td>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->user->name ?? '' }}<br><br>

                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        <h5> Tarikh :  
                                                            @if ($permohonan->tarikh == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->tarikh}}</span>
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('d-m-Y', strtotime($permohonan->tarikh)) }}</span>
                                                                @else
                                                                    <span>{{  date('d-m-Y', strtotime($permohonan->tarikh)) }}</span>
                                                                @endif
                                                            @endif
                                                        </h5>
                                                        <h5> Mula : 
                                                            @if ($permohonan->clockintime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->clockintime}}
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)"> {{  date('H:i:s', strtotime($permohonan->clockintime))}}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($permohonan->clockintime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        <h5> Akhir : 
                                                            @if ($permohonan->clockouttime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$permohonan->clockouttime}}
                                                            @else
                                                                @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('H:i:s', strtotime($permohonan->clockouttime)) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($permohonan->clockouttime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        </h5>
                                                        <h5> Status : 
                                                            @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)) || $permohonan->statusdesc == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $permohonan->statusdesc }}</span>
                                                            @else
                                                                <span>{{ $permohonan->statusdesc }}</span>
                                                            @endif
                                                        </h5>
                                                        {{-- <h5>  Jumlah Jam  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalotduration}}</span> </h5> --}}
                                                        <h5> Waktu Anjal :
                                                            @if (date('H:i:s', strtotime($permohonan->clockintime)) != date('H:i:s', strtotime($permohonan->mohon_mula_kerja)) || $permohonan->waktuanjal == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $permohonan->waktuanjal }}</span>
                                                            @else
                                                                <span>{{ $permohonan->waktuanjal }}</span>
                                                            @endif 
                                                        </h5>
                                                        @if (isset($permohonan->jenis_masa))
                                                            <div class="col-12 text-center">
                                                                <label class="h5 my-0 py-0 mt-2 " for=""> Jenis
                                                                    Masa</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-control"
                                                                    onchange="tukarJenisMasa(this, {{ $permohonan->id }}) ">
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Siang' ? 'selected' : '' }}
                                                                        value="Hari Biasa Siang">Hari Biasa
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Biasa Malam' ? 'selected' : '' }}
                                                                        value="Hari Biasa Malam">Hari Biasa
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Siang' ? 'selected' : '' }}
                                                                        value="Hari Rehat Siang">Hari Rehat
                                                                        Siang
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Hari Rehat Malam' ? 'selected' : '' }}
                                                                        value="Hari Rehat Malam">Hari Rehat
                                                                        Malam
                                                                    </option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Siang' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Siang">Pelepasan Am
                                                                        Siang</option>
                                                                    <option
                                                                        {{ $permohonan->jenis_masa == 'Pelepasan Am Malam' ? 'selected' : '' }}
                                                                        value="Pelepasan Am Malam">Pelepasan Am
                                                                        Malam</option>
                                                                </select>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->lulus_selepas == null)
                                                            <input name="masa_mula" type="time" class="form-control"
                                                                onchange="kemaskiniMasaSebenarMulaSaya({{ $permohonan->id }}, this)"
                                                                value={{ date('H:i', strtotime($permohonan->sebenar_mula_kerja)) }}><br>
                                                            <input name=" masa_akhir" type="time" class="form-control"
                                                                onchange="kemaskiniMasaSebenarAkhirSaya({{ $permohonan->id }}, this)"
                                                                value={{ date('H:i', strtotime($permohonan->sebenar_akhir_kerja)) }}><br>
                                                        @else
                                                            {{  date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}<br><br>
                                                            {{  date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                                                        @endif


                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->sah_mula_kerja)
                                                            @if ($permohonan->sokong_selepas == null)
                                                                <span class="badge badge-pill badge-primary">Perlu <br><br>
                                                                    Semakan PG1</span><br>
                                                                <span class="badge badge-pill badge-primary">Perlu <br><br>
                                                                    Semakan PG2</span><br>
                                                            @elseif($permohonan->sokong_selepas == 0)
                                                                <span class="badge badge-pill badge-danger">Ditolak PG1
                                                                </span><br><br>
                                                                <span> Sebab Ditolak :
                                                                    {{ $permohonan->sokong_selepas_sebab }}
                                                                </span>
                                                            @elseif($permohonan->sokong_selepas == 1)
                                                                <span class="badge badge-pill badge-success">Lulus PG1
                                                                </span><br><br>
                                                                @if ($permohonan->lulus_selepas == null)
                                                                    <span class="badge badge-pill badge-primary">Perlu
                                                                        <br><br>
                                                                        Semakan PG2</span><br>
                                                                @elseif($permohonan->lulus_selepas == 1)
                                                                    <span class="badge badge-pill badge-success">Lulus PG2
                                                                    </span><br><br>
                                                                @elseif($permohonan->lulus_selepas == 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak PG2
                                                                    </span><br><br>
                                                                    <span> Sebab Ditolak :
                                                                        {{ $permohonan->lulus_selepas_sebab }}
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <span class="badge badge-pill badge-warning"> Semakan <br><br>
                                                                Kakitangan</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->sah_mula_kerja)
                                                            @if ($permohonan->sokong_selepas == null)
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongselepas{{ $permohonan->id }}">
                                                                    Tolak
                                                                    <i class="ni ni-basket"></i>
                                                                </button><br>
                                                                <a href="/sokong_selepas/{{ $permohonan->id }}/"
                                                                    class="btn btn-success btn-sm"> Sokong <i
                                                                        class="ni ni-like-2"></i></a>
                                                            @elseif($permohonan->sokong_selepas == 0)
                                                                --
                                                            @elseif($permohonan->sokong_selepas == 1)
                                                                @if ($permohonan->lulus_selepas == null)
                                                                    --
                                                                @elseif($permohonan->lulus_selepas == 1)
                                                                    --
                                                                @elseif($permohonan->lulus_selepas == 0)
                                                                    --
                                                                @endif
                                                            @endif
                                                        @else
                                                            <span class="badge badge-pill badge-warning"> Semakan <br><br>
                                                                Kakitangan</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                                <!-- Modal tolak sokong selepas -->
                                                <div class="modal fade" id="tolaksokongselepas{{ $permohonan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                    Permohonan
                                                                    Kakitangan</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form method="POST" action="/tolak_sokong_selepas">
                                                                        @csrf
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="Perkara">Sebab Tolak
                                                                                    Permohonan</label>
                                                                                <input type="hidden"
                                                                                    value="{{ $permohonan->id }}"
                                                                                    name="id">

                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control"
                                                                                        name="sokong_selepas_sebab"
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
                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm" onclick="rekod4()">Rekod</button>
                                </div>

                                <div class="table-responsive py-4 d-none" id="rekod4">
                                    <table class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu Mula Kerja lulus<br><br>Waktu Akhir Kerja lulus</th>
                                                <th>Status EKedatangan</th>
                                                <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong / Pegawai Lulus</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($pengesahan_disokongs_rekod as $p)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_mula_kerja)) }}
                                                        <br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_akhir_kerja)) }}
                                                    </td>
                                                    <td>
                                                        <h5> Tarikh :  
                                                            @if ($p->tarikh == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->tarikh}}</span>
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)">{{  date('d-m-Y', strtotime($p->tarikh)) }}</span>
                                                                @else
                                                                    {{  date('d-m-Y', strtotime($p->tarikh)) }}</span>
                                                                @endif
                                                            @endif
                                                        </h5>
                                                        <h5> Mula : 
                                                            @if ($p->clockintime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->clockintime}}
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)"> {{  date('H:i:s', strtotime($p->clockintime)) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($p->clockintime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        <h5> Akhir : 
                                                            @if ($p->clockouttime == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{$p->clockouttime}}
                                                            @else
                                                                @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))))
                                                                    <span style="color:rgb(255, 0, 21)"> {{  date('H:i:s', strtotime($p->clockouttime)) }}</span>
                                                                @else
                                                                    <span>{{  date('H:i:s', strtotime($p->clockouttime)) }}</span>
                                                                @endif
                                                            @endif                                                        
                                                        </h5>
                                                        <h5> Status : 
                                                            @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))) || $p->statusdesc == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $p->statusdesc }}</span>
                                                            @else
                                                                <span>{{ $p->statusdesc }}</span>
                                                            @endif
                                                        </h5>
                                                        <h5> Waktu Anjal : 
                                                            @if ((date('H:i:s', strtotime($p->clockintime))) != (date('H:i:s', strtotime($p->mohon_mula_kerja))) || $p->waktuanjal == "Tiada Rekod")
                                                                <span style="color:rgb(255, 0, 21)">{{ $p->waktuanjal }}</span>
                                                            @else
                                                                <span>{{ $p->waktuanjal }}</span>
                                                            @endif
                                                        </h5>
                                                        @if (isset($p->jenis_masa))
                                                            <div class="col-12 text-center">
                                                                <label class="h5 my-0 py-0 mt-2 " for="">
                                                                    Jenis
                                                                    Masa</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $p->jenis_masa }}" readonly>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_mula_kerja)) }}<br><br>
                                                        {{  date('d-m-Y H:i:s', strtotime($p->mohon_akhir_kerja)) }}<br><br>
                                                    </td>
                                                    @if ($p->lulus_sebelum == 1)
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="p_pegawai_sokong_id"
                                                                    value="{{ $p->pegawaiSokong->name }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="p_pegawai_sokong_id"
                                                                    value="{{ $p->pegawaiLulus->name }}" readonly>
                                                            </div>
                                                        </td>
                                                        @if ($p->sokong_selepas == 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Sokong
                                                                </span><br><br>

                                                                @if ($p->lulus_selepas == 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                    </span><br><br>
                                                                @elseif($p->lulus_selepas == 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                    </span><br><br>
                                                                    {{ $p->lulus_selepas_sebab }}
                                                                @elseif($p->lulus_selepas == null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span><br>
                                                                @endif

                                                            </td>
                                                        @elseif($p->sokong_selepas == 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak
                                                                </span><br><br>
                                                                {{ $p->sokong_selepas_sebab }}

                                                            </td>
                                                        @elseif($p->sokong_selepas == null)
                                                            @if ($p->sebenar_akhir_kerja == null)
                                                                <td>
                                                                    --
                                                                </td>
                                                            @elseif($p->sebenar_akhir_kerja != null)
                                                                <td>
                                                                    <span class="badge badge-pill badge-primary"> Dalam
                                                                        Semakan</span>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @elseif($p->lulus_sebelum == 0)
                                                    @endif
                                                </tr>
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

        {{-- Modal Tolak Pengesahan Pukal --}}
        <div class="modal fade" id="tolakSokongSelepasPukal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tolak Permohonan Kakitangan Secara Pukal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/tolak_permohonan_pukal">
                        <div class="modal-body">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group" id="tolakPukalSokongSelepasDiv">
                                    <label>Sebab Tolak Permohonan</label>
                                    <input class="form-control" name="sokong_selepas_sebab" type="text">
                                    <input type="hidden" name="jenis" value="sokong_selepas">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Hantar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="rekod1val" value='0'>
    <input type="hidden" id="rekod2val" value='0'>
    <input type="hidden" id="rekod3val" value='0'>
    <input type="hidden" id="rekod4val" value='0'>

    <script>
        function rekod1() {
            $("#rekod1").removeClass('d-none');

            let showRekod1 = $("#rekod1val").val();

            if (showRekod1 == "1") {
                $("#rekod1").addClass('d-none');
                $("#rekod1val").val("0");

            } else {
                $("#rekod1val").val("1");
            }

        }

        function rekod2() {
            $("#rekod2").removeClass('d-none');

            let showRekod2 = $("#rekod2val").val();

            if (showRekod2 == "1") {
                $("#rekod2").addClass('d-none');
                $("#rekod2val").val("0");

            } else {
                $("#rekod2val").val("1");
            }

        }

        function rekod3() {
            $("#rekod3").removeClass('d-none');

            let showRekod3 = $("#rekod3val").val();

            if (showRekod3 == "1") {
                $("#rekod3").addClass('d-none');
                $("#rekod3val").val("0");

            } else {
                $("#rekod3val").val("1");
            }

        }

        function rekod4() {
            $("#rekod4").removeClass('d-none');

            let showRekod4 = $("#rekod4val").val();

            if (showRekod4 == "1") {
                $("#rekod4").addClass('d-none');
                $("#rekod4val").val("0");

            } else {
                $("#rekod4val").val("1");
            }

        }
        $(document).ready(function() {
            $("#SokongAllKakitangan").click(function() {
                if ($(this).prop('checked')) {
                    $('.sak').prop('checked', true)
                } else {
                    $('.sak').prop('checked', false)
                }
            });


            $("#SokongPengesahanAll").click(function() {
                if ($(this).prop('checked')) {
                    $('.spa').prop('checked', true)
                } else {
                    $('.spa').prop('checked', false)
                }
            });
        });

        function SokongAllKakitangan(kelulusan) {
            let dicheck = false;
            jQuery.each($('.sak'), function(key, val) {
                if ($(val).prop('checked')) {
                    dicheck = true;
                }
            });

            if (dicheck && kelulusan == 1) {
                jQuery.each($('.sak'), function(key, val) {
                    if ($(val).prop('checked')) {
                        let permohonan_id = val.id;
                        $.ajax({
                            method: "POST",
                            url: "/PermohonanSubmitAll",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "permohonan_id": permohonan_id,
                                "kelulusan": kelulusan,
                                "jenis": "sokong",
                            },
                        });
                    }
                });
                alert("Permohonan berjaya dilulus");
                location.reload();
            } else if (kelulusan == 0 && dicheck) {
                $('#tolakPermohonanPukalModal').modal('toggle');
                jQuery.each($('.sak'), function(key, val) {
                    if ($(val).prop('checked')) {
                        let permohonan_id = val.id;
                        $("#tolakPermohonanPukalDiv").append(`
                            <input type="hidden" name="permohonan_id[]" value=` + permohonan_id + ` >
                        `);
                    }
                });
            } else {
                alert("Sila Pilih Permohonan");
            }

        }

        function SubmitPengesahanAll(kelulusan, childElement) {
            let dicheck = false;
            jQuery.each($(childElement), function(key, val) {
                if ($(val).prop('checked')) {
                    dicheck = true;
                }
            });

            if (dicheck && kelulusan == 1) {
                jQuery.each($(childElement), function(key, val) {
                    if ($(val).prop('checked')) {
                        let permohonan_id = val.id;
                        $.ajax({
                            method: "POST",
                            url: "/PermohonanSubmitAll",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "permohonan_id": permohonan_id,
                                "kelulusan": kelulusan,
                                "jenis": "sokongPengesahan",
                            },
                        });
                    }
                });
                alert("Permohonan berjaya dilulus");
                location.reload();
            } else if (dicheck && kelulusan == 0) {
                $("#tolakSokongSelepasPukal").modal('toggle');
                jQuery.each($(childElement), function(key, val) {
                    if ($(val).prop('checked')) {
                        let permohonan_id = val.id;
                        $("#tolakPukalSokongSelepasDiv").append(`
                                 <input type="hidden" name="permohonan_id[]" value=` + permohonan_id + ` >
                         `);
                    }
                });

            } else {
                alert("Sila Pilih Permohonan");
            }

        }


        function buangpermohonan(id) {
            swal({
                title: 'Makluman?',
                text: "Hapus Permohonan?!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Buang',
                cancelButtonText: 'Tutup',

            }).then(result => {
                console.log("result", result);
                if (result.value == true) {
                    console.log("id", id);
                    $.ajax({
                        url: "permohonans/" + id,
                        type: "POST",
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}",
                            "_method": 'delete'
                        },
                        success: function(data) {
                            location.reload();
                        },
                    });

                } else if (result.dismiss == "cancel") {
                    console.log("dismiss");
                }
            })
        }
    </script>
@endsection

@section('script')
    <script>
        function tukarJenisMasa(el, id) {
            $.ajax({
                method: "POST",
                url: "/update_jenis_masa",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "jenis_masa": el.value,
                    "id": id,
                },
            }).done(function(response) {
                alert("Jenis Masa Dikemaskini");
                // location.reload();
            });
        }

        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#permohonankakitangan tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            $('#pengesahankakitangan tbody th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });


            // DataTable
            var table = $('#permohonankakitangan').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });
            // DataTable
            var table = $('#pengesahankakitangan').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });

        });
        $(document).ready(function() {
            var table = $('table.display').DataTable();
        });

        //check tab
        if (window.location.href.indexOf("#ss2") > -1) {
            document.getElementById("penyeliasokongkakitangan").click()
        }



        // Sokong pengesahan
        function kemaskiniMasaSebenarMula(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/permohonans-ubah-masa_mula/" + obj,
                type: "POST",
                data: {
                    "masa_sebenar_baru_mula": obj2.value
                }

            });
            window.location.reload();
        }

        function kemaskiniMasaSebenarAkhir(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/permohonans-ubah-masa_akhir/" + obj,
                type: "POST",
                data: {
                    "masa_sebenar_baru_akhir": obj2.value
                }

            });
            window.location.reload();
        }
        // Kemaskini pengesahan
        function kemaskiniMasaSebenar(permohonan) {

            kemaskiniMasaSebenarMulaSaya(permohonan.id, permohonan.sebenar_mula_kerja)
            kemaskiniMasaSebenarAkhirSaya(permohonan.id, permohonan.sebenar_akhir_kerja)
            window.location.reload();

        }

        function kemaskiniMasaSebenarMulaSaya(id, obj2) {
            $.ajax({
                method: "POST",
                url: "/permohonans-ubah-masa_mula_saya/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "masa_sebenar_baru_mula_saya": obj2.value
                },
            }).done(function(response) {
                location.reload();
            });
        }

        function kemaskiniMasaSebenarAkhirSaya(id, obj2) {
            $.ajax({
                method: "POST",
                url: "/permohonans-ubah-masa_akhir_saya/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "masa_sebenar_baru_akhir_saya": obj2.value
                },
            }).done(function(response) {
                location.reload();
            });

        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {



            $('.delete_all').on('click', function(e) {


                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {


                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {


                        var join_selected_values = allVals.join(",");


                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            // $('[data-toggle=confirmation]').confirmation({
            //     rootSelector: '[data-toggle=confirmation]',
            //     onConfirm: function(event, element) {
            //         element.trigger('confirm');
            //     }
            // });


            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    // type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>
@endsection
