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
                        <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-icons-text-1-tab" data-toggle="tab"
                            href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                class="ni ni-bell-55 mr-2"></i>Permohonan Penyelia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="penyeliasokongkakitangan-tab" data-toggle="tab"
                            href="#penyeliasokongkakitangan" role="tab" aria-controls="penyeliasokongkakitangan"
                            aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Semak Permohonan Kakitangan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                            href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                                class="ni ni-calendar-grid-58 mr-2"></i>Semak Pengesahan Kakitangan</a>
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
                                            <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH
                                                MASA LULUS
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $mohon_p }}</span>
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
                                            <span class="h2 font-weight-bold mb-0">{{ $mohon_t }}</span>
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
                                                        @if ($permohonan->sokong_sebelum === null)
                                                            <span class="badge badge-pill badge-primary">Dalam
                                                                Semakan</span>
                                                        @endif
                                                        @if ($permohonan->sokong_sebelum === 1)
                                                            <span class="badge badge-pill badge-success">Lulus
                                                                PG1</span><br><br>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum === null)
                                                            <span class="badge badge-pill badge-primary">Dalam Proses
                                                                Semakan</span>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum === 1)
                                                            <span class="badge badge-pill badge-success">Lulus PG2</span>
                                                        @endif
                                                        @if ($permohonan->lulus_sebelum === 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG2</span><br><br>
                                                            {{ $permohonan->lulus_sebelum_sebab }}
                                                        @endif
                                                        @if ($permohonan->sokong_sebelum === 0)
                                                            <span class="badge badge-pill badge-danger">Ditolak
                                                                PG1</span><br><br>
                                                            {{ $permohonan->sokong_sebelum_sebab }}
                                                            <span class="badge badge-pill badge-danger">Permohonan
                                                                Ditolak</span><br><br>
                                                        @endif
                                                    </td>
                                                    <td class="kemaskini">
                                                        <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="ni ni-single-copy-04"></i></a>
                                                        <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="ni ni-basket"></i></button>
                                                    </td>
                                                </tr>
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
                                            <th>Jumlah OT<br><br>Waktu Anjal</th> --}}
                                                <th>Waktu Mula Sebenar<br><br>Waktu Akhir Sebenar</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($pengesahans as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        {{ $permohonan->mohon_mula_kerja }} <br><br>

                                                        {{ $permohonan->mohon_akhir_kerja }}
                                                    </td>
                                                    <td>
                                                        {{-- <input class="form-control" value="{{$permohonan->tarikh}}" disabled> --}}
                                                        <h5> Tarikh : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->tarikh }}</span>
                                                        </h5>
                                                        <h5> Mula : <span style="color:rgb(255, 0, 21)">
                                                                {{ $permohonan->clockintime }}</span> </h5>
                                                        <h5> Akhir : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->clockouttime }}</span>
                                                        </h5>
                                                        <h5> Jumlah OT : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->totalworkinghour }}</span>
                                                        </h5>
                                                        <h5> Status : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->statusdesc }}</span>
                                                        </h5>
                                                        <h5> Jumlah Jam : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->totalotduration }}</span>
                                                        </h5>
                                                        <h5> Waktu Anjal : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->waktuanjal }}</span>
                                                        </h5>


                                                    </td>
                                                    <td>
                                                        {{ $permohonan->sebenar_mula_kerja }}<br><br>

                                                        @if ($permohonan->sokong_selepas === null)
                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarMulaSaya({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_mula_kerja }}><br><br>
                                                        @elseif($permohonan->sokong_selepas === 1)

                                                        @elseif($permohonan->sokong_selepas === 0)
                                                        @endif

                                                        {{ $permohonan->sebenar_akhir_kerja }}<br>

                                                        @if ($permohonan->sokong_selepas === null)
                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarAkhirSaya({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_akhir_kerja }}>
                                                        @elseif($permohonan->sokong_selepas === 1)

                                                        @elseif($permohonan->sokong_selepas === 0)
                                                        @endif

                                                        {{-- <input class="form-control" value="{{$permohonan->mohon_akhir_kerja}}"
                                                disabled> --}}
                                                    </td>
                                                    @if ($permohonan->lulus_sebelum === 1)
                                                        <td>

                                                            <form method="POST"
                                                                action="/kemaskinipegawaipengesah/{{ $permohonan->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">

                                                                    <select name="p_pegawai_sokong_id"
                                                                        class="form-control"
                                                                        style="width:100px ; height:35px;">
                                                                        <option
                                                                            value="{{ $permohonan->p_pegawai_sokong_id }}">
                                                                            {{ $permohonan->p_pegawai_sokong_id }}
                                                                        </option>

                                                                        @foreach ($userspengesahan as $userspengesahan1)
                                                                            <option value="{{ $userspengesahan1->id }} ">
                                                                                {{ $userspengesahan1->name }} -
                                                                                {{ $userspengesahan1->role }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">

                                                                    <select name="p_pegawai_lulus_id"
                                                                        class="form-control"
                                                                        style="width:100px ; height:35px;">
                                                                        <option
                                                                            value="{{ $permohonan->p_pegawai_lulus_id }}">
                                                                            {{ $permohonan->p_pegawai_lulus_id }}
                                                                        </option>
                                                                        @foreach ($userspengesahan as $userspengesahan2)
                                                                            <option value="{{ $userspengesahan2->id }}">
                                                                                {{ $userspengesahan2->name }} -
                                                                                {{ $userspengesahan2->role }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Kemaskini</button><br>
                                                            </form>

                                                        </td>

                                                        @if ($permohonan->sokong_selepas === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Lulus
                                                                    Pengesahan pegawai PG1</span><br><br>

                                                                @if ($permohonan->lulus_selepas === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                        Pengesahan pegawai PG2</span><br><br>
                                                                @elseif($permohonan->lulus_selepas === 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                        Pengesahan pegawai PG2</span><br><br>
                                                                    {{ $permohonan->lulus_selepas_sebab }}
                                                                @elseif($permohonan->lulus_selepas === null)
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        semakan pegawai PG2</span><br>
                                                                @endif

                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak
                                                                    Pengesahan pegawai PG1</span><br><br>
                                                                {{ $permohonan->sokong_selepas_sebab }}

                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === null)
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
                                                    @elseif($permohonan->lulus_sebelum === 0)
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                                        <input {{ $permohonan->sokong_sebelum ? 'disabled' : '' }}
                                                            type="checkbox"
                                                            class="{{ $permohonan->sokong_sebelum ? '' : 'sak' }}"
                                                            id="{{ $permohonan->id }}">
                                                    </td>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="nama pemohon">
                                                        {{ $permohonan->nama_pemohon }} <br><br>

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
                                                    <td class="pelulus">
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>

                                                    @if ($permohonan->sokong_sebelum === null)
                                                        <td>
                                                            <div class="row text-center">
                                                                <div class="col-12">
                                                                    <span class="badge badge-pill badge-primary">Dalam
                                                                        Semakan</span>
                                                                </div>
                                                                @if (isset($permohonan->jenis_masa))
                                                                    <div class="col-12 text-center">
                                                                        <label class="h5 my-0 py-0 mt-2 " for="">
                                                                            Jenis
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
                                                            </div>
                                                        </td>

                                                        <td class="tindakan">
                                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="ni ni-single-copy-04"></i></a>

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#tolaksokongsebelum{{ $permohonan->id }}">
                                                                <i class="ni ni-basket"></i>
                                                            </button>
                                                            <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="ni ni-like-2"></i></a>
                                                        </td>
                                                    @elseif($permohonan->sokong_sebelum === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan
                                                                PG1</span><br><br>

                                                            @if ($permohonan->lulus_sebelum === null)
                                                                <span class="badge badge-pill badge-primary">Dalam Semakan
                                                                    Pegawai</span>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 1)
                                                        <span class="badge badge-pill badge-success">Lulus Permohonan
                                                            PG2</span>
                                                        <td>
                                                            --
                                                        </td>
                                                    @elseif($permohonan->lulus_sebelum === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG2</span><br><br>
                                                        {{ $permohonan->lulus_sebelum_sebab }}
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
                                                        <span class="badge badge-pill badge-danger">Permohonan
                                                            Ditolak</span>
                                                    </td>
                                            @endif

                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="tolaksokongsebelum{{ $permohonan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-white" id="exampleModalLabel">Tolak
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
                                                    <td> <input
                                                            {{ $permohonan->sokong_selepas || $permohonan->sah_mula_kerja == 0 ? 'disabled' : '' }}
                                                            type="checkbox"
                                                            class="{{ $permohonan->sokong_selepas || $permohonan->sah_mula_kerja == 0 ? '' : 'spa' }}"
                                                            id="{{ $permohonan->id }}"></td>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->nama_pemohon }}<br><br>

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
                                                        <h5> Status : <span
                                                                style="color:rgb(255, 0, 21)">{{ $permohonan->statusdesc }}</span>
                                                        </h5>
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
                                                        @if ($permohonan->sokong_selepas === null)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarMula({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_mula_kerja }}><br><br>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            {{ $permohonan->sebenar_mula_kerja }}<br><br>
                                                        @endif

                                                        @if ($permohonan->sokong_selepas === null)
                                                            {{ $permohonan->sebenar_akhir_kerja }}<br><br>

                                                            <input type="datetime-local"
                                                                onchange="kemaskiniMasaSebenarAkhir({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->sebenar_akhir_kerja }}>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            {{ $permohonan->sebenar_akhir_kerja }}
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            {{ $permohonan->sebenar_akhir_kerja }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $permohonan->pegawaiSokong->name }}
                                                        <br><br>
                                                        {{ $permohonan->pegawaiLulus->name }}
                                                    </td>
                                                    @if ($permohonan->sebenar_mula_kerja !== null)
                                                        @if ($permohonan->sokong_selepas === null)
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Perlu <br><br>
                                                                    Semakan</span><br>

                                                            </td>
                                                            <td>
                                                                @if ($permohonan->sah_mula_kerja)
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
                                                                @else
                                                                    Pemohon Belum Sahkan Masa
                                                                @endif
                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Ditolak Pegawai
                                                                </span><br><br>
                                                                {{ $permohonan->sokong_selepas_sebab }}

                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Permohonan
                                                                    Ditolak</span><br><br>
                                                            </td>
                                                        @elseif($permohonan->sokong_selepas === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Lulus
                                                                </span><br><br>


                                                                @if ($permohonan->lulus_selepas === 1)
                                                                    <span class="badge badge-pill badge-success">Lulus
                                                                    </span>
                                                                @elseif($permohonan->lulus_selepas === 0)
                                                                    <span class="badge badge-pill badge-danger">Ditolak
                                                                        Pegawai </span>
                                                                    {{ $permohonan->lulus_selepas_sebab }}
                                                                @elseif($permohonan->lulus_selepas === null)
                                                                    <span class="badge badge-pill badge-primary">Semakan
                                                                        Pegawai </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                --
                                                            </td>
                                                        @endif
                                                    @elseif($permohonan->sebenar_mula_kerja === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-warning"> Semakan <br><br>
                                                                Kakitangan</span>
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif

                                                </tr>
                                                <!-- Modal tolak sokong selepas -->
                                                <div class="modal fade"
                                                    id="tolaksokongselepas{{ $permohonan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
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
            if (dicheck) {
                if (kelulusan == 1) {
                    alert("Permohonan berjaya dilulus");
                }
                if (kelulusan == 0) {
                    alert("Permohonan berjaya ditolak");
                }
                location.reload();
            } else {
                alert("Sila Pilih Permohonan");
            }
        }

        function SubmitPengesahanAll(kelulusan, childElement) {
            let dicheck = false;
            jQuery.each($(childElement), function(key, val) {
                if ($(val).prop('checked')) {
                    dicheck = true;
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
            if (dicheck) {
                if (kelulusan == 1) {
                    alert("Permohonan berjaya disokong");
                }
                if (kelulusan == 0) {
                    alert("Permohonan berjaya ditolak");
                }
                location.reload();
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
