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

        </div>
    </div>

    {{-- All Info Card --}}
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LEBIH MASA
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon }}</span>
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA LULUS
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_lulus }}</span>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH MASA LULUS
                                    DITOLAK
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_gagal }}</span>
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA DALAM
                                    SEMAKAN
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_dp }}</span>
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
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LEBIH MASA
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_lulus }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA
                                    LULUS
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_pengesahan }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN KERJA LEBIH MASA LULUS
                                    DITOLAK
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $mohon_pengesahan_ditolak }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA
                                    DALAM SEMAKAN
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $dalam_semakan }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                    <i class="ni ni-chart-bar-32"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- All Tables --}}
    <div class="container-fluid mt--12">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 bg-default">
                        <h3 class="mb-0 text-white">Permohonan Kerja Lebih Masa ( Borang Permohonan A1 dan A2)
                        </h3>
                    </div>

                    <div class="table-responsive py-4">
                        <table id="permohonankakitangan"
                            class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead class="thead-light">

                                <tr>
                                    <th>No</th>
                                    <th>Mohon Mula <br><br> Mohon akhir</th>
                                    <th>Lokasi<br><br>Tujuan</th>
                                    <th>Pegawai Sokong <br><br> Pegawai Lulus </th>
                                    <th>Jenis <br><br> Permohonan</th>
                                    <th>Status</th>
                                    <th>Kemaskini</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($permohonans as $permohonan)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>

                                        <td>

                                            {{ $permohonan->mohon_mula_kerja }} <br><br>

                                            {{ $permohonan->mohon_akhir_kerja }}
                                        </td>
                                        <td>
                                            {{ $permohonan->lokasi }} <br><br>
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="tujuan('{{ $permohonan->tujuan }}')">Tujuan</button>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $permohonan->pegawaiSokong->name }}
                                            <br><br>
                                            {{ $permohonan->pegawaiLulus->name }}
                                        </td>
                                        <td>
                                            @if ($permohonan->jenis_permohonan == 'individu')
                                                <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                            @else
                                                <span class="badge badge-pill badge-warning">KUMPULAN</span>
                                            @endif
                                        <td>
                                            @if ($permohonan->sokong_sebelum === null)
                                                <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                            @elseif($permohonan->sokong_sebelum == 1)
                                                <span class="badge badge-pill badge-success">Sokong PG1</span>
                                            @elseif($permohonan->sokong_sebelum == 0)
                                                <span class="badge badge-pill badge-danger">Ditolak PG1</span><br><br>
                                                {{ $permohonan->sokong_sebelum_sebab }}
                                            @endif
                                            <br><br>
                                            @if ($permohonan->lulus_sebelum === null)
                                                <span class="badge badge-pill badge-primary"> Proses Semakan</span>
                                            @elseif($permohonan->lulus_sebelum === 1)
                                                <span class="badge badge-pill badge-success">Lulus PG2</span>
                                            @elseif($permohonan->lulus_sebelum === 0)
                                                <span class="badge badge-pill badge-danger">Ditolak
                                                    PG2</span><br><br>
                                                {{ $permohonan->lulus_sebelum_sebab }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($permohonan->lulus_sebelum === null)
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm"><i class="ni ni-single-copy-04"></i>
                                                </a>
                                            @endif
                                        </td>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" onclick="rekod1()">Rekod</button>
                    </div>

                    <div class="table-responsive py-4 d-none" id="rekod1">
                        <table class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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

                                            {{ $p->permohonan->mohon_mula_kerja }} <br><br>

                                            {{ $p->permohonan->mohon_akhir_kerja }}
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
                                            @if ($p->permohonan->sokong_sebelum === null)
                                                <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                            @elseif($p->permohonan->sokong_sebelum == 1)
                                                <span class="badge badge-pill badge-success">Sokong PG1</span>
                                            @elseif($p->permohonan->sokong_sebelum == 0)
                                                <span class="badge badge-pill badge-danger">Ditolak PG1</span><br><br>
                                                {{ $p->permohonan->sokong_sebelum_sebab }}
                                            @endif
                                            <br><br>
                                            @if ($p->permohonan->lulus_sebelum === null)
                                                <span class="badge badge-pill badge-primary"> Proses Semakan</span>
                                            @elseif($p->permohonan->lulus_sebelum === 1)
                                                <span class="badge badge-pill badge-success">Lulus PG2</span>
                                            @elseif($p->permohonan->lulus_sebelum === 0)
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
                    <div class="card-header border-0 bg-default">
                        <h3 class="mb-0 text-white ">Pengesahan Kerja Lebih Masa ( Borang Pengesahan B1)
                        </h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table id="pengesahankakitangan"
                            class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Mula Kerja lulus<br><br>Waktu Akhir Kerja lulus</th>
                                    <th>Status EKedatangan</th>
                                    <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                    <th>Tindakan</th>
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
                                            {{ $permohonan->mohon_mula_kerja }}
                                            <br><br>

                                            {{ $permohonan->mohon_akhir_kerja }}
                                        </td>
                                        <td>
                                            <h5> Tarikh : <span
                                                    style="color:rgb(255, 0, 21)">{{ $permohonan->tarikh }}</span>
                                            </h5>
                                            <h5> Mula : <span style="color:rgb(255, 0, 21)">
                                                    {{ $permohonan->clockintime }}</span> </h5>
                                            <h5> Akhir : <span
                                                    style="color:rgb(255, 0, 21)">{{ $permohonan->clockouttime }}</span>
                                            </h5>
                                            {{-- <h5>  Jumlah OT  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalworkinghour}}</span> </h5> --}}
                                            <h5> Status : <span
                                                    style="color:rgb(255, 0, 21)">{{ $permohonan->statusdesc }}</span>
                                            </h5>
                                            {{-- <h5>  Jumlah Jam  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalotduration}}</span> </h5> --}}
                                            <h5> Waktu Anjal : <span
                                                    style="color:rgb(255, 0, 21)">{{ $permohonan->waktuanjal }}</span>
                                            </h5>
                                            @if (isset($permohonan->jenis_masa))
                                                <div class="col-12 text-center">
                                                    <label class="h5 my-0 py-0 mt-2 " for="">
                                                        Jenis
                                                        Masa</label>
                                                </div>
                                                <div class="col-12">
                                                    @if (!$permohonan->sah_mula_kerja)
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
                                                    @else
                                                        <input type="text" class="form-control"
                                                            value="{{ $permohonan->jenis_masa }}" readonly>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                        <td>

                                            @if (!$permohonan->sah_mula_kerja)
                                                <form action="/update-masa-mula-akhir/{{ $permohonan->id }}"
                                                    method="post">
                                                    @csrf
                                                    <input name="masa_mula" type="time" class="form-control"
                                                        onchange="kemaskiniMasaSebenarMulaSaya({{ $permohonan->id }}, this)"
                                                        value={{ date('H:i', strtotime($permohonan->sebenar_mula_kerja)) }}><br>
                                                    <input name=" masa_akhir" type="time" class="form-control"
                                                        onchange="kemaskiniMasaSebenarAkhirSaya({{ $permohonan->id }}, this)"
                                                        value={{ date('H:i', strtotime($permohonan->sebenar_akhir_kerja)) }}><br>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            Sah Masa</button>
                                                    </div>
                                                </form>
                                            @else
                                                {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                {{ $permohonan->sebenar_akhir_kerja }}<br><br>
                                            @endif
                                        </td>
                                        @if ($permohonan->lulus_sebelum === 1)
                                            <td>
                                                <form method="POST"
                                                    action="/kemaskinipegawaipengesah/{{ $permohonan->id }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <select name="p_pegawai_sokong_id" class="form-control">
                                                            <option value="{{ $permohonan->p_pegawai_sokong_id }}">
                                                                {{ $permohonan->pegawaiSokong->name }}</option>

                                                            @foreach ($userspengesahan as $userspengesahan1)
                                                                <option
                                                                    {{ $permohonan->p_pegawai_sokong_id == $userspengesahan1->id ? 'selected' : '' }}
                                                                    value="{{ $userspengesahan1->id }} ">
                                                                    {{ $userspengesahan1->name }} -
                                                                    {{ $userspengesahan1->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="p_pegawai_lulus_id" class="form-control">
                                                            @foreach ($userspengesahan as $userspengesahan2)
                                                                <option
                                                                    {{ $permohonan->p_pegawai_lulus_id == $userspengesahan2->id ? 'selected' : '' }}
                                                                    value="{{ $userspengesahan2->id }}">
                                                                    {{ $userspengesahan2->name }} -
                                                                    {{ $userspengesahan2->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm">Kemaskini</button><br>
                                                    </div>
                                                </form>
                                            </td>
                                            @if ($permohonan->sokong_selepas === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success">Sokong </span><br><br>

                                                    @if ($permohonan->lulus_selepas === 1)
                                                        <span class="badge badge-pill badge-success">Lulus </span><br><br>
                                                    @elseif($permohonan->lulus_selepas === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak </span><br><br>
                                                        {{ $permohonan->lulus_selepas_sebab }}
                                                    @elseif($permohonan->lulus_selepas === null)
                                                        <span class="badge badge-pill badge-primary">Dalam
                                                            Semakan</span><br>
                                                    @endif

                                                </td>
                                            @elseif($permohonan->sokong_selepas === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak </span><br><br>
                                                    {{ $permohonan->sokong_selepas_sebab }}

                                                </td>
                                            @elseif($permohonan->sokong_selepas === null)
                                                @if ($permohonan->sebenar_akhir_kerja == null)
                                                    <td>
                                                        --
                                                    </td>
                                                @elseif($permohonan->sebenar_akhir_kerja != null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                                    </td>
                                                @endif
                                            @endif
                                        @elseif($permohonan->lulus_sebelum === 0)
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" onclick="rekod2()">Rekod</button>
                    </div>

                    <div class="table-responsive py-4 d-none" id="rekod2">
                        <table class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                                            {{ $p->permohonan->mohon_mula_kerja }} <br><br>

                                            {{ $p->permohonan->mohon_akhir_kerja }}
                                        </td>
                                        <td>
                                            <h5> Tarikh : <span style="color:rgb(255, 0, 21)">{{ $p->tarikh }}</span>
                                            </h5>
                                            <h5> Mula : <span style="color:rgb(255, 0, 21)">
                                                    {{ $p->clockintime }}</span> </h5>
                                            <h5> Akhir : <span
                                                    style="color:rgb(255, 0, 21)">{{ $p->clockouttime }}</span>
                                            </h5>
                                            <h5> Status : <span
                                                    style="color:rgb(255, 0, 21)">{{ $p->statusdesc }}</span>
                                            </h5>
                                            <h5> Waktu Anjal : <span
                                                    style="color:rgb(255, 0, 21)">{{ $p->waktuanjal }}</span>
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
                                            {{ $p->permohonan->sebenar_mula_kerja }}<br><br>
                                            {{ $p->permohonan->sebenar_akhir_kerja }}<br><br>
                                        </td>
                                        @if ($p->permohonan->lulus_sebelum === 1)
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="p_pegawai_sokong_id"
                                                        value="{{ $p->permohonan->pegawaiSokong->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="p_pegawai_sokong_id"
                                                        value="{{ $p->permohonan->pegawaiLulus->name }}" readonly>
                                                </div>
                                            </td>
                                            @if ($p->permohonan->sokong_selepas === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success">Sokong </span><br><br>

                                                    @if ($p->permohonan->lulus_selepas === 1)
                                                        <span class="badge badge-pill badge-success">Lulus </span><br><br>
                                                    @elseif($p->permohonan->lulus_selepas === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak </span><br><br>
                                                        {{ $p->permohonan->lulus_selepas_sebab }}
                                                    @elseif($p->permohonan->lulus_selepas === null)
                                                        <span class="badge badge-pill badge-primary">Dalam
                                                            Semakan</span><br>
                                                    @endif

                                                </td>
                                            @elseif($p->permohonan->sokong_selepas === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak </span><br><br>
                                                    {{ $p->permohonan->sokong_selepas_sebab }}

                                                </td>
                                            @elseif($p->permohonan->sokong_selepas === null)
                                                @if ($p->permohonan->sebenar_akhir_kerja == null)
                                                    <td>
                                                        --
                                                    </td>
                                                @elseif($p->permohonan->sebenar_akhir_kerja != null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                                    </td>
                                                @endif
                                            @endif
                                        @elseif($p->permohonan->lulus_sebelum === 0)
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

    <input type="hidden" id="rekod1val" value='0'>
    <input type="hidden" id="rekod2val" value='0'>
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
                location.reload();
            });
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

        function tujuan(t) {
            Swal.fire(
                'Tujuan',
                t,
            );
        }
    </script>

@endsection

@section('script')
    <script>
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


            $('#SokongAll').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });


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



        });
    </script>
@endsection
