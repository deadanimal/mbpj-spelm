@extends('base')

@section('content')
<div class="header bg-primary pb-6">
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
        @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or
        auth()->user()->role == 'kerani_pemeriksa')
        <div class="col-lg-12 col-5 text-right mb-4">
            <a href="/permohonans/create" class="btn btn-sm btn-neutral"> + Tambah Permohonan</a>
        </div>
        @elseif(auth()->user()->role == 'penyelia')
        <div class="col-lg-12 col-5 text-right mb-4">
            <a href="/permohonans/create" class="btn btn-sm btn-neutral"> + Tambah Permohonan</a>
        </div>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                        aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Permohonan Kerja Lebih Masa
                        Penyelia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Permohonan Kerja
                        Lebih Masa Kakitangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Pengesahan Kerja
                        Lebih Masa Kakitangan</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'ketua_bahagian')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                        aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Sokong Permohonan Kerja Lebih
                        Masa kakitangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Sah Permohonan
                        Kerja
                        Lebih Masa kakitangan</a>
                </li>
            </ul>
        </div>
        @else
        @endif
    </div>
</div>
<!-- user kakitangan -->
@if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or auth()->user()->role
== 'kerani_pemeriksa')
{{-- kakitangan Mohon --}}
<!-- Card stats -->
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
                            <span class="h2 font-weight-bold mb-0">{{$mohon}}</span>
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
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH MASA LULUS
                                DITOLAK
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
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA
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
</div>
<div class="container-fluid mt--12">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Permohonan Kerja Lebih Masa</h3>
                </div>
                <!-- Light table -->

                {{-- <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

                            <script>
                            $(function() {
                            $('input[name="daterange"]').daterangepicker({
                                opens: 'left'
                            }, function(start, end, label) {
                                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                            });
                            });
                            </script>
                         --}}
                {{--  --}}
                <div class="table-responsive py-4">


                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-light">

                            <tr>
                                <th scope="col" class="sort" data-sort="no">No</th>
                                {{-- <th scope="col" class="sort" data-sort="no">ID permohonan</th> --}}
                                <th scope="col" class="sort" data-sort="tarikh">Tarikh Mohon</th>
                                <th scope="col" class="sort" data-sort="waktu">Waktu Kerja</th>
                                {{-- <th scope="col" class="sort" data-sort="lokasi">Lokasi</th>
                                <th scope="col" class="sort" data-sort="tujuan">Tujuan</th> --}}
                                <th scope="col" class="sort" data-sort="pelulus1">Pegawai Sokong</th>
                                <th scope="col" class="sort" data-sort="pelulus2">Pegawai Lulus</th>
                                <th scope="col" class="sort" data-sort="jenis_permohonan">Jenis Permohonan</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="kemaskini">Kemaskini</th>


                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($permohonans as $permohonan)

                            <tr>
                                <th>
                                    {{$loop->index+1}}
                                </th>
                                <td class="tarikh">
                                    {{-- {!! date('d.m.Y H:i:s', strtotime($permohonan->mohon_akhir_kerja)) !!} --}}

                                    {{$permohonan->mohon_mula_kerja}}
                                </td>
                                <td class="waktu">
                                    {{$permohonan->mohon_akhir_kerja}}
                                </td>
                                {{-- <td class="lokasi">
                                    {{$permohonan->lokasi}}
                                </td> --}}
                                {{-- <td class="tujuan">
                                    {{$permohonan->tujuan}}
                                </td> --}}
                                <td class="pelulus1">
                                    @foreach ($pengguna as $user)
                                        @if ($permohonan->pegawai_sokong_id == $user->id)
                                            <option>
                                            {{$user->name}} </option>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="pelulus2">
                                    {{-- {{$permohonan->pegawai_lulus_id}} --}}
                                    @foreach ($pengguna as $user)
                                    {{-- <option value="{{$user->id}}">
                                        {{$user->name}} </option> --}}
                                        @if ($permohonan->pegawai_lulus_id == $user->id)
                                            <option>
                                            {{$user->name}} </option>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="jenis_permohonan">
                                    @if($permohonan->jenis_permohonan =='individu')
                                 
                                        <span class="badge badge-pill badge-success">INDIVIDU</span>
                                        <td class="status">
                                            {{$permohonan->tarikh_sokong}}
                                            <a>Dalam Proses</a>
                                        </td>
                                        <td class="kemaskini">
                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                class="btn btn-success btn-sm">Kemaskini</a>
                                                <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                    class="btn btn-danger btn-sm">Buang</button> 
                                        </td>
                                    
                                    @elseif($permohonan->jenis_permohonan =='berkumpulan')
                                        <span class="badge badge-pill badge-danger">BERKUMPULAN</span>
                                        <td class="status">
                                            {{$permohonan->tarikh_sokong}}
                                            <a>Dalam Proses</a>
                                        </td>
                                        <td class="kemaskini">
                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                class="btn btn-success btn-sm">Kemaskini</a>
                                             <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                class="btn btn-danger btn-sm">Buang</button> 
                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                            class="btn btn-success btn-sm">Tambah Kakitangan</a>
                                        </td>
                                    @endif
                                </td>
                   
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
                                                success: function (data) {
                                                    location.reload();
                                                },
                                            });

                                        } else if (result.dismiss == "cancel") {
                                            console.log("dismiss");
                                        }
                                    })
                                }

                            </script>

                            @empty

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- user penyelia -->
@elseif(auth()->user()->role == 'penyelia')
{{-- Penyelia Mohon --}}
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
                                        <span class="h2 font-weight-bold mb-0">{{$mohon}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH
                                            MASA DITOLAK
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH
                                            MASA
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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Permohonan Kerja Lebih Masa Penyelia</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class=" display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="no">No</th>
                                            <th scope="col" class="sort" data-sort="no">ID permohonan</th>
                                            <th scope="col" class="sort" data-sort="tarikh">Tarikh Mohon
                                            </th>
                                            <th scope="col" class="sort" data-sort="waktu">Waktu Kerja
                                            </th>
                                            <th scope="col" class="sort" data-sort="lokasi">Lokasi</th>
                                            <th scope="col" class="sort" data-sort="tujuan">Tujuan</th>
                                            <th scope="col" class="sort" data-sort="pelulus1">Pegawai
                                                Sokong
                                            </th>
                                            <th scope="col" class="sort" data-sort="pelulus2">Pegawai
                                                Lulus</th>
                                            <th scope="col" class="sort" data-sort="status">Jenis
                                                Permohonan
                                            </th>
                                            <th scope="col" class="sort" data-sort="status">Status</th>
                                            <th scope="col" class="sort" data-sort="kemaskini">Kemaskini
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonans as $permohonan)

                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">
                                                            <a> {{$permohonan->id}}</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="tarikh">
                                                {{$permohonan->mohon_mula_kerja }}
                                            </td>

                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->lokasi}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->tujuan}}
                                            </td>
                                            <td class="pelulus1">
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_sokong_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2">
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}
                                            </td>
                                            <td class="status">
                                                {{$permohonan->tarikh_sokong}}
                                                <span class="badge badge-pill badge-success">Dalam Proses</span>
                                            </td>
                                            <td class="kemaskini">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-success btn-sm">Kemaskini</a>

                                                <button onclick="buang({{ $permohonan->id  }})"
                                                    class="btn btn-danger btn-sm">Buang <i
                                                        class="ni ni-basket"></i></button> 
                                            </td>
                                        </tr>
                                        <script>
                                            function buang(id) {
                                                swal({
                                                    title: 'Makluman?',
                                                    text: "Buang Permohonan?!",
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
                                                            success: function (data) {
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LEBIH MASA KAKITANGAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH MASA DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form>
                                <div class="row">
                                    <div class="col mb-4">
                                        <h4>Jenis Permohonan</h4>
                                        <input type="text" class="form-control" placeholder="Jenis Permohonan">
                                    </div>
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <input type="text" class="form-control" placeholder="Nama Kakitangan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Tarikh Mula Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                    <div class="col-sm">
                                        <h4>Tarikh Akhir Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row float-right">
                            <div class="col-sm ">
                                <button id="clearFilter" class="btn btn-sm btn-danger">Clear Filter</button>
                                <button class="btn btn-sm btn-primary " id="filter">Filter</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>

                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class=" display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>ID permohonan</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th>Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>kemaskini</th>
                                            <th>tindakan</th>

                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonan_disokongs as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">
                                                            <a> {{$permohonan->id}}</a>

                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="tarikh">
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>

                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->lokasi}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->tujuan}}
                                            </td>
                                            <td class="pelulus1">
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_sokong_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2">
                                                {{-- {{$permohonan->pegawai_lulus_id}} --}}
                                                @foreach ($pengguna as $user)
                                                {{-- <option value="{{$user->id}}">
                                                    {{$user->name}} </option> --}}
                                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}

                                            <td class="status">
                                                {{$permohonan->tarikh_sokong}}

                                                <span class="badge badge-pill badge-success">Dalam Proses</span>
                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="kemaskini">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm">kemaskini</a>
                                            </td>
                                            <td class="kemaskini">
                                                <a href="" class="btn btn-success btn-sm">Sokong</a>
                                                <button onclick="buang({{ $permohonan->id }})"
                                                    class="btn btn-danger btn-sm">Buang <i
                                                        class="ni ni-basket"></i></button> 
                                            </td>

                                        </tr>
                                        <script>
                                            function buang(id) {
                                                swal({
                                                    title: 'Makluman?',
                                                    text: "Buang Permohonan?!",
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
                                                            success: function (data) {
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
    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
        <div>
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LEBIH MASA KAKITANGAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN KERJA LEBIH MASA DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form>
                                <div class="row">
                                    <div class="col mb-4">
                                        <h4>Jenis Permohonan</h4>
                                        <input type="text" class="form-control" placeholder="Jenis Permohonan">
                                    </div>
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <input type="text" class="form-control" placeholder="Nama Kakitangan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Tarikh Mula Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                    <div class="col-sm">
                                        <h4>Tarikh Akhir Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row float-right">
                            <div class="col-sm ">
                                <button id="clearFilter" class="btn btn-sm btn-danger">Clear Filter</button>
                                <button class="btn btn-sm btn-primary " id="filter">Filter</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>

                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>ID permohonan</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th>Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>kemaskini</th>
                                            <th>tindakan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                       
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
<!-- user ketua_bahagian/jabatan-->
@elseif(auth()->user()->role == 'ketua_bahagian'or auth()->user()->role == 'ketua_jabatan')
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
        aria-labelledby="tabs-icons-text-1-tab">
        <div>
            <div class="container-fluid mt--6">
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form>
                                <div class="row">
                                    <div class="col mb-4">
                                        <h4>Jenis Permohonan</h4>
                                        <input type="text" class="form-control" placeholder="Jenis Permohonan">
                                    </div>
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <input type="text" class="form-control" placeholder="Nama Kakitangan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Tarikh Mula Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                    <div class="col-sm">
                                        <h4>Tarikh Akhir Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row float-right">
                            <div class="col-sm ">
                                <button id="clearFilter" class="btn btn-sm btn-danger">Clear Filter</button>
                                <button class="btn btn-sm btn-primary " id="filter">Filter</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row ">
                    <div class="col-md-12">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sokong Permohonan Kerja Lebih Masa Kakitangan</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th>Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>kemaskini</th>
                                            <th>tindakan</th>


                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($permohonan_dilulus as $permohonan)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">
                                                            <a> {{$permohonan->id}}</a>

                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="tarikh">
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>

                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->n}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->lokasi}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->tujuan}}
                                            </td>
                                            <td class="pelulus1">
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_sokong_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2">
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                                        <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}

                                            <td class="status">
                                                {{$permohonan->tarikh_sokong}}

                                                <a>Dalam Proses</a>
                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="status">
                                                {{$permohonan->n}}

                                            </td>
                                            <td class="kemaskini">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary">kemaskini</a>
                                            </td>
                                            <td class="kemaskini">
                                                <a href="" class="btn btn-success">Sokong</a>
                                            </td>

                                        </tr>
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
    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
        <div>
            <div class="container-fluid mt--6">
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form>
                                <div class="row">
                                    <div class="col mb-4">
                                        <h4>Jenis Permohonan</h4>
                                        <input type="text" class="form-control" placeholder="Jenis Permohonan">
                                    </div>
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <input type="text" class="form-control" placeholder="Nama Kakitangan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Tarikh Mula Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                    <div class="col-sm">
                                        <h4>Tarikh Akhir Mohon</h4>
                                        <input id="start" type="date" /><br />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row float-right">
                            <div class="col-sm ">
                                <button id="clearFilter" class="btn btn-sm btn-danger">Clear Filter</button>
                                <button class="btn btn-sm btn-primary " id="filter">Filter</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sah Permohonan Kerja Lebih Masa Kakitangan</h3>

                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th>Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>kemaskini</th>
                                            <th>tindakan</th>

                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($permohonans as $permohonan)

                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">
                                                            <a> {{$permohonan->id}}</a>

                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="tarikh">
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>

                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td class="lokasi">
                                                {{$permohonan->lokasi}}
                                            </td>
                                            <td class="tujuan">
                                                {{$permohonan->tujuan}}
                                            </td>
                                            <td class="pelulus1">
                                                {{$permohonan->pegawai_sokong_id}}
                                            </td>
                                            <td class="pelulus2">
                                                {{$permohonan->pegawai_lulus_id}}
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}

                                            <td class="status">
                                                {{$permohonan->tarikh_sokong}}

                                                <a>Dalam Proses</a>
                                            </td>
                                            <td class="kemaskini">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-success">Kemaskini</a>
                                            </td>
                                        </tr>


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
@else
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Modul ini tidak dapat dijalankan di laman web ini.
                    Sila hubungi
                    pentadbir sistem anda.</h3>
            </div>

        </div>
    </div>
</div>
@endif

@endsection
@section ('script')
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>

@endsection
