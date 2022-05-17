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

            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                            href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                class="ni ni-bell-55 mr-2"></i>Sokong Permohonan kakitangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                                class="ni ni-calendar-grid-58 mr-2"></i>Sah Pengesahan kakitangan</a>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN
                                                DISOKONG
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_sokong }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN
                                                SOKONG
                                                DITOLAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_tolak_sokong }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN
                                                SOKONG
                                                PERLU SEMAKAN
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_sokong_proses }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN
                                                DILULUSKAN
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_lulus }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN
                                                LULUS
                                                DITOLAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_tolak_lulus }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN
                                                LULUS
                                                PERLU DISEMAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_lulus_proses }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
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
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula<br><br>Waktu Akhir</th>
                                                <th>Lokasi<br><br>Tujuan</th>
                                                <th>Pegawai Sokong <br><br>Pegawai Lulus</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonan_disokongs as $permohonan)
                                                <tr>
                                                    <th>
                                                        {{ $loop->index + 1 }}
                                                    </th>
                                                    <td>
                                                        {{ $permohonan->nama_pemohon }}<br><br>

                                                        @if ($permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @elseif($permohonan->jenis_permohonan == 'berkumpulan')
                                                            <span class="badge badge-pill badge-primary">BERKUMPULAN</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->mohon_mula_kerja }}<br><br>

                                                        {{ $permohonan->mohon_akhir_kerja }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->lokasi }}<br><br>

                                                        {{ $permohonan->tujuan }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>


                                                    @if ($permohonan->sokong_sebelum === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Perlu
                                                                Semakan</span>
                                                        </td>
                                                        <td>
                                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="ni ni-single-copy-04"></i></a>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#tolaksokongansebelum{{ $permohonan->id }}">
                                                                <i class="ni ni-basket"></i>
                                                            </button>

                                                            <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="ni ni-like-2"></i></a>
                                                        </td>
                                                    @elseif($permohonan->sokong_sebelum === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Lulus
                                                                Permohonan
                                                                PG1</span><br><br>

                                                            @if ($permohonan->lulus_sebelum === null)
                                                                <span class="badge badge-pill badge-primary">Dalam
                                                                    Semakan
                                                                    PG2</span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 1)
                                                        <span class="badge badge-pill badge-success">Lulus Permohonan
                                                            PG2</span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG2</span><br><br>
                                                        {{ $permohonan->lulus_sebelum_sebab }}
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @endif
                                                    </td>
                                                @elseif($permohonan->sokong_sebelum === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG1</span><br><br>
                                                        {{ $permohonan->sokong_sebelum_sebab }}

                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Permohonan Ditolak
                                                        </span>
                                                    </td>
                                            @endif

                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="tolaksokongansebelum{{ $permohonan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-default">
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
                                                                                value="{{ $permohonan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
                                                                                <input class="form-control"
                                                                                    name="sokong_sebelum_sebab"
                                                                                    placeholder="Sebab" type="text">

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <a input type="submit" class="btn btn-danger btn-sm">Tolak axs</a> --}}
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-secondary">Hantar</button>


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
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Lulus Permohonan (Borang A1 / A2 )</h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula<br><br>Waktu Akhir</th>
                                                <th>Lokasi<br><br>Tujuan</th>
                                                <th>Pegawai Sokong <br><br>Pegawai Lulus</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($permohonan_dilulus as $permohonan)
                                                <tr>
                                                    <th>
                                                        {{ $loop->index + 1 }}
                                                    </th>
                                                    <td>
                                                        {{ $permohonan->nama_pemohon }}<br><br>
                                                        @if ($permohonan->jenis_permohonan == 'individu')
                                                            <span class="badge badge-pill badge-warning">INDIVIDU</span>
                                                        @elseif($permohonan->jenis_permohonan == 'berkumpulan')
                                                            <span class="badge badge-pill badge-primary">BERKUMPULAN</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->mohon_mula_kerja }}<br><br>

                                                        {{ $permohonan->mohon_akhir_kerja }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->lokasi }}<br><br>

                                                        {{ $permohonan->tujuan }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>

                                                    @if ($permohonan->sokong_sebelum === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Semakan Pegawai
                                                                Sokong</span><br><br>

                                                            <span class="badge badge-pill badge-primary">Semakan Pegawai
                                                                Lulus</span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->sokong_sebelum === 1)
                                                        <td class="text-center">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Permohonan PG1</span>
                                                                </div>
                                                                @if (isset($permohonan->jenis_masa))
                                                                    <div class="col-12 text-center">
                                                                        <label class="h5 my-0 py-0 mt-2 " for="">
                                                                            Jenis
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
                                                                <br><br>
                                                            </div>
                                                            @if ($permohonan->lulus_sebelum === null)
                                                        <td class="tindakan">
                                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="ni ni-single-copy-04"></i></a>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#tolaklulussebelum{{ $permohonan->id }}">
                                                                <i class="ni ni-basket"></i>
                                                            </button>

                                                            <a href="/lulus_sebelum/{{ $permohonan->id }}/"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="ni ni-like-2"></i></a>
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 1)
                                                        <span class="badge badge-pill badge-success">Lulus Permohonan
                                                            PG2</span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG2</span><br><br>
                                                        {{ $permohonan->lulus_sebelum_sebab }}

                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @endif
                                                    </td>
                                                @elseif($permohonan->sokong_sebelum === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG1</span><br><br>
                                                        {{ $permohonan->sokong_sebelum_sebab }}<br><br>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    </td>
                                            @endif
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="tolaklulussebelum{{ $permohonan->id }}"
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
                                                                <form method="POST" action="/tolak_lulus_sebelum">
                                                                    @csrf
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="Perkara">Sebab Tolak
                                                                                Permohonan</label>
                                                                            <input type="hidden"
                                                                                value="{{ $permohonan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
                                                                                <input class="form-control"
                                                                                    name="lulus_sebelum_sebab"
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

        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
            <div>
                <div class="container-fluid mt--6">

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGESAHAN
                                                DISOKONG
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_sokong_selepas }}</span>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN SOKONG
                                                DITOLAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_tolak_sokong_selepas }}</span>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN SOKONG
                                                PERLU SEMAKAN
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_sokong_selepas_proses }}</span>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGESAHAN
                                                DILULUSKAN
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_lulus_selepas }}</span>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LULUS
                                                DITOLAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_tolak_lulus_selepas }}</span>
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
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LULUS
                                                PERLU DISEMAK
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $p_lulus_selepas_proses }}</span>
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
                    {{-- Sokong Pengesahaan --}}
                    <div class="row">
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
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula Kerja lulus <br>Waktu Akhir Kerja lulus</th>
                                                <th>Ekedatangan</th>
                                                <th>Waktu Mula Sebenar<br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong<br>Pegawai Lulus</th>
                                                <th>Status</th>
                                                <th>TIndakan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($pengesahan_disokongs as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->nama_pemohon }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->mohon_mula_kerja }}<br><br>
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

                                                    </td>
                                                    <td>
                                                        @if ($permohonan->sokong_selepas === null)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarMula({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_mula_kerja }}><br><br>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            {{ $permohonan->sebenar_mula_kerja }}
                                                        @endif


                                                        @if ($permohonan->sokong_selepas === null)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>

                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarAkhir({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_akhir_kerja }}>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            {{ $permohonan->sebenar_akhir_kerja }}
                                                        @endif
                                                    </td>
                                                    <td>

                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>

                                                    @if ($permohonan->sebenar_mula_kerja != null)
                                                        @if ($permohonan->sokong_selepas === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu
                                                                    Semakan</span><br>


                                                            <td class="kemaskini">
                                                                <a href="" class="btn btn-primary btn-sm"><i
                                                                        class="ni ni-single-copy-04"></i></a>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaksokongselepas{{ $permohonan->id }}">
                                                                    <i class="ni ni-basket"></i>
                                                                </button>
                                                                <a href="/sokong_selepas/{{ $permohonan->id }}/"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="ni ni-like-2"></i></a>
                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak
                                                                    Pengesahan </span><br><br>
                                                                {{ $permohonan->sokong_selepas_sebab }}


                                                                <span class="badge badge-pill badge-danger"> Pengesahan
                                                                    Ditolak</span><br><br>
                                                            </td>
                                                            <td>
                                                                --
                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Lulus
                                                                    Pengesahan </span><br><br>

                                                                @if ($permohonan->lulus_selepas === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Pengesahan </span><br>
                                                                @elseif($permohonan->lulus_selepas === 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                        Pengesahan </span><br>
                                                                    {{ $permohonan->lulus_selepas_sebab }}
                                                                @elseif($permohonan->lulus_selepas === null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        semakan </span><br>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                --
                                                            </td>
                                                        @endif
                                                    @elseif($permohonan->sebenar_mula_kerja == null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary"> Semakan
                                                                Kakitangan</span><br><br>

                                                            <span class="badge badge-pill badge-primary"> Semakan
                                                                Kakitangan</span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @endif
                                                </tr>

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
                                                                                        placeholder="Sebab" type="text">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-secondary">Hantar</button>

                                                                        {{-- <a input type="submit" class="btn btn-danger btn-sm">Tolak axs</a> --}}
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- Modal tolak lulus selepas -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Lulus Pengesahaan --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Lulus Pengesahan (Borang B1)</h3>
                                </div>
                                <div class="table-responsive py-4">
                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">

                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Waktu Mula Kerja lulus <br>Waktu Akhir Kerja lulus</th>
                                                <th>Ekedatangan</th>
                                                <th>Waktu Mula Sebenar<br>Waktu Akhir Sebenar</th>
                                                <th>Pegawai Sokong<br>Pegawai Lulus</th>
                                                <th>Status</th>
                                                <th>TIndakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengesahan_dilulus as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->nama_pemohon }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->mohon_mula_kerja }}<br><br>

                                                        {{ $permohonan->mohon_akhir_kerja }}
                                                    </td>
                                                    <td>
                                                        <h5> Tarikh : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->tarikh }}</span> </h5>
                                                        <h5> Mula : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->clockintime }}</span> </h5>
                                                        <h5> Akhir : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->clockouttime }}</span> </h5>
                                                        {{-- <h5>  Jumlah OT  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalworkinghour}}</span> </h5> --}}
                                                        <h5> Status : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->statusdesc }}</span> </h5>
                                                        {{-- <h5>  Jumlah Jam  : <span style ="color:rgb(255, 0, 21)">{{$permohonan->totalotduration}}</span> </h5> --}}
                                                        <h5> Waktu Anjal : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->waktuanjal }}</span> </h5>
                                                        @if (isset($permohonan->jenis_masa))
                                                            <div class="row">

                                                                <div class="col-12 text-center">
                                                                    <label class="h5 my-0 py-0 mt-2 " for="">
                                                                        Jenis
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
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->lulus_selepas === null)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>

                                                            {{-- <input type="datetime-local" onchange="kemaskiniMasaSebenarMula({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}><br> <br> --}}
                                                            <h5 value={{ $permohonan->sebenar_mula_kerja }}></h5>
                                                        @elseif($permohonan->lulus_selepas === 1)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                        @elseif($permohonan->lulus_selepas === 0)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                        @endif


                                                        @if ($permohonan->lulus_selepas === null)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>

                                                            {{-- <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhir({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}><br> --}}
                                                            <h5 value={{ $permohonan->sebenar_akhir_kerja }}></h5>
                                                        @elseif($permohonan->lulus_selepas === 1)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>
                                                        @elseif($permohonan->lulus_selepas === 0)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>
                                                    @if ($permohonan->sokong_selepas === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Sokong
                                                            </span><br><br>



                                                            @if ($permohonan->lulus_selepas === null)
                                                        <td>
                                                            {{-- <a href=""
                                                                    class="btn btn-success btn-sm">Kemaskini</a><br> --}}
                                                            @if ($permohonan->sah_mula_kerja)
                                                                <a href="/lulus_selepas/{{ $permohonan->id }}/"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="ni ni-like-2"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#tolaklulusselepas{{ $permohonan->id }}">
                                                                    <i class="ni ni-basket"></i>
                                                                </button>
                                                            @else
                                                                Pemohon Belum Sahkan Masa
                                                            @endif
                                                        </td>
                                                    @elseif($permohonan->lulus_selepas === 1)
                                                        <span class="badge badge-pill badge-success">Lulus
                                                        </span>
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_selepas === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan
                                                        </span><br><br>
                                                        {{ $permohonan->lulus_selepas_sebab }}
                                                        </td>
                                                        <td>
                                                            --
                                                        </td>
                                                    @endif
                                                @elseif($permohonan->sokong_selepas === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan
                                                        </span><br><br>
                                                        {{ $permohonan->sokong_selepas_sebab }}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak
                                                            Pengesahan</span>
                                                    </td>
                                                @elseif($permohonan->sokong_selepas === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan
                                                        </span><br><br>

                                                        <span class="badge badge-pill badge-primary">Dalam Proses</span>
                                                    </td>
                                                    <td>
                                                        --
                                                    </td>
                                            @endif
                                            </td>


                                            </tr>
                                            <!-- Modal tolak lulus selepas -->
                                            <div class="modal fade" id="tolaklulusselepas{{ $permohonan->id }}"
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
                                                                <form method="POST" action="/tolak_lulus_selepas">
                                                                    @csrf
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="Perkara">Sebab Tolak
                                                                                Permohonan</label>
                                                                            <input type="hidden"
                                                                                value="{{ $permohonan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
                                                                                <input class="form-control"
                                                                                    name="lulus_selepas_sebab"
                                                                                    placeholder="Sebab" type="text">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-secondary">Hantar</button>

                                                                    {{-- <a input type="submit" class="btn btn-danger btn-sm">Tolak axs</a> --}}
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

        function kemaskiniMasaSebenarMulaSaya(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/permohonans-ubah-masa_mula_saya/" + obj,
                type: "POST",
                data: {
                    "masa_sebenar_baru_mula_saya": obj2.value
                }

            });
            window.location.reload();
        }

        function kemaskiniMasaSebenarAkhirSaya(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/permohonans-ubah-masa_akhir_saya/" + obj,
                type: "POST",
                data: {
                    "masa_sebenar_baru_akhir_saya": obj2.value
                }

            });
            window.location.reload();

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


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });


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
