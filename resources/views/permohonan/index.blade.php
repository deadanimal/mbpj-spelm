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
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-bell-55 mr-2"></i>Permohonan Kerja Lebih Masa
                        Penyelia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Permohonan Kerja
                        Lebih Masa Kakitangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Pengesahan Kerja
                        Lebih Masa Kakitangan</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'ketua_bahagian')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-bell-55 mr-2"></i>Sokong Permohonan Kerja Lebih
                        Masa kakitangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Sah Permohonan
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
                            <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA DALAM SEMAKAN
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
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LEBIH MASA
                            </h5>
                            <span class="h2 font-weight-bold mb-0">{{$mohon}}</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA LULUS
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
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN KERJA LEBIH MASA LULUS
                                DITOLAK
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
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA DALAM SEMAKAN
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
</div>
<!-- Permohonan as Kakitangan -->
<div class="container-fluid mt--12">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Permohonan Kerja Lebih Masa {{Auth()->user()->name}}
                    </h3>
                </div>

                <div class="table-responsive py-4">


                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-light">

                            <tr>
                                <th>No</th>
                                <th>Tarikh Mohon</th>
                                <th>Waktu Kerja</th>
                                <th>Lokasi</th>
                                <th>Tujuan</th>
                                
                                <th>Pegawai </th>
                                {{-- <th>Pegawai Lulus</th> --}}
                                <th>Jenis Permohonan</th>
                                <th>Status</th>
                                <th>Kemaskini</th>

                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($permohonans as $permohonan)
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                              
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
                                <td class="pelulus">
                                    @foreach ($pengguna as $user)
                                    @if ($permohonan->pegawai_sokong_id == $user->id)
                                    <option class="badge badge-pill badge-primary">
                                        SOKONG :
                                        {{$user->name}} </option><br>
                                    @endif
                                    @endforeach
                                 
                                    @foreach ($pengguna as $user)
                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                    <option class="badge badge-pill badge-primary">
                                        LULUS:
                                        {{$user->name}} </option>
                                    @endif
                                    @endforeach
                                </td>
                                <td class="jenis_permohonan">
                                    @if($permohonan->jenis_permohonan =='individu')

                                    <span class="badge badge-pill badge-warning">INDIVIDU</span>

                                <td class="status">
                                @if($permohonan->sokong_sebelum === null)
                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>

                                        <td class="kemaskini">
                                            <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                class="btn btn-success btn-sm">Kemaskini</a>
                                            <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                class="btn btn-danger btn-sm">Buang</button>
                                        </td>

                                @elseif($permohonan->sokong_sebelum === 1)
                                    <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>

                                            @if($permohonan->lulus_sebelum === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                            </td>
                                            @elseif($permohonan->lulus_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                            </td>
                                          
                                            @elseif($permohonan->lulus_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG2</span><br><br>
                                                    {{ $permohonan->lulus_sebelum_sebab }}

                                            </td>
                                            @endif

                                @elseif($permohonan->sokong_sebelum === 0)
                                <span class="badge badge-pill badge-danger">Ditolak Permohonan PG1</span><br><br>
                                {{ $permohonan->sokong_sebelum_sebab }}
                                <td>
                                    <span class="badge badge-pill badge-danger">Permohonan Ditolak</span><br><br>
                                </td>
                                @endif
                                </td>

                                @elseif($permohonan->jenis_permohonan =='berkumpulan')
                                <span class="badge badge-pill badge-primary">BERKUMPULAN</span>

                                <td class="status">
                                    @if($permohonan->sokong_sebelum === null)
                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>

                                    <td class="kemaskini">
                                        <a href="/permohonans/{{ $permohonan->id }}/edit"
                                            class="btn btn-success btn-sm">Kemaskini</a>
                                        <button onclick="buangpermohonan({{ $permohonan->id }})"
                                            class="btn btn-danger btn-sm">Buang</button>
                                        <a href="/permohonans/{{ $permohonan->id }}/edit"
                                            class="btn btn-primary btn-sm">Tambah Kakitangan</a>
                                    </td>

                                @elseif($permohonan->sokong_sebelum === 1)
                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>

                                        @if($permohonan->lulus_sebelum === null)
                                        <td>
                                            <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                        </td>
                                        @elseif($permohonan->lulus_sebelum === 1)
                                        <td>
                                            <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                        </td>
                                    
                                        @elseif($permohonan->lulus_sebelum === 0)
                                        <td>
                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                PG2</span><br><br>
                                                {{ $permohonan->lulus_sebelum_sebab }}

                                        </td>
                                        @endif
      
                                @elseif($permohonan->sokong_sebelum === 0)
                                <span class="badge badge-pill badge-danger">Ditolak Permohonan PG1</span><br><br>
                                {{$permohonan->sokong_sebelum_sebab}}
                                <td>
                                 <span class="badge badge-pill badge-danger">Permohonan Ditolak</span><br><br>
                                </td>
                                @endif

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
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Pengesahan Kerja Lebih Masa {{Auth()->user()->name}}
                    </h3>
                </div>
                <div class="table-responsive py-4">
                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Waktu Mula Kerja lulus</th>
                                <th>Waktu Akhir Kerja lulus</th>
                                <th>Mula Kerja</th>
                                <th>Akhir Kerja</th>
                                <th>Jumlah OT</th>
                                <th>Status Datang</th>
                                <th>Jumlah OT</th>
                                <th>Waktu Anjal</th>
                                <th>Waktu Mula Sebenar</th>
                                <th>Waktu Akhir Sebenar</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($pengesahans as $permohonan)
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                
                                <td class="tarikh">

                                    {{$permohonan->mohon_mula_kerja}}
                                </td>
                                <td class="waktu">
                                    {{$permohonan->mohon_akhir_kerja}}
                                </td>
                            
                                <td >  
                                    <input class="form-control" value="Clockintime" disabled>
                                </td>
                                <td >
                                    <input class="form-control" value="clockouttime" disabled>

                                </td>
                                <td >
                                    <input class="form-control" value="totalworkinghour" disabled>

                                </td>
                                <td >
                                    <input class="form-control" value="status" disabled>

                                </td>
                                <td >
                                    <input class="form-control" value="Jumlah OT" disabled>

                                </td>
                                <td >
                                    <input class="form-control" value="Waktu Anjal" disabled>

                                </td>


                                <td >
                                    {{$permohonan->sebenar_mula_kerja}}<br>

                                    @if($permohonan->sokong_selepas === null)

                                    <input type="datetime-local" onchange="kemaskiniMasaSebenarMulaSaya({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>
                                    
                                    @elseif($permohonan->sokong_selepas === 1)
                                    @elseif($permohonan->sokong_selepas === 0)

                                    @endif

                                    {{-- <input class="form-control" value="{{$permohonan->mohon_mula_kerja}}"
                                    disabled> --}}
                                </td>
                                <td >
                                    {{$permohonan->sebenar_akhir_kerja}}<br>

                                    @if($permohonan->sokong_selepas === null)

                                    <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhirSaya({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>

                                    @elseif($permohonan->sokong_selepas === 1)
                                    @elseif($permohonan->sokong_selepas === 0)
                                    @endif

                                    {{-- <input class="form-control" value="{{$permohonan->mohon_akhir_kerja}}"
                                    disabled> --}}
                                </td>
                                @if($permohonan->lulus_sebelum === 1)
                                <td >
                                    <span class="badge badge-pill badge-success">Sokong</span> :  
                                    @foreach ($pengguna as $user)
                                        @if ($permohonan->pegawai_sokong_id == $user->id)
                                            {{$user->name}} 
                                        @endif
                                    @endforeach <br><br>
                                    <span class="badge badge-pill badge-success">Lulus </span> :
                                    @foreach ($pengguna as $user)
                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                        {{$user->name}} 
                                    @endif
                                    @endforeach 

                                </td>
                                
                                    @if($permohonan->sokong_selepas=== 1)

                                    <td>
                                        <span class="badge badge-pill badge-success">Lulus Pengesahan pegawai PG1</span><br><br>

                                            @if($permohonan->lulus_selepas === 1)
                                            <span class="badge badge-pill badge-success">Lulus Pengesahan pegawai PG2</span><br><br>
                                            @elseif($permohonan->lulus_selepas === 0)
                                            <span class="badge badge-pill badge-danger">Ditolak Pengesahan pegawai PG2</span><br><br>
                                            {{$permohonan->lulus_selepas_sebab}}
                                            @elseif($permohonan->lulus_selepas === null)
                                            <span class="badge badge-pill badge-primary">Dalam semakan  pegawai PG2</span><br>
                                            @endif

                                    </td>
                            
                                    @elseif($permohonan->sokong_selepas=== 0)

                                    <td>
                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan pegawai PG1</span><br><br>
                                        {{$permohonan->sokong_selepas_sebab}}

                                    </td>

                                    @elseif($permohonan->sokong_selepas=== null)

                                        @if($permohonan->sebenar_akhir_kerja == null)

                                            <td class="kemaskini">
                                                <a href=""
                                                    class="btn btn-success btn-sm">Kemaskini</a>
                                                    <a href="/sebenar_mula_akhir_kerja/{{ $permohonan->id }}/"
                                                        class="btn btn-success btn-sm">Hantar</a>
                                                <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                    class="btn btn-danger btn-sm">Buang</button>
                                            </td>

                                        @elseif($permohonan->sebenar_akhir_kerja != null)

                                            <td>
                                                <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                            </td>

                                        @endif

                                    @endif
                           
                                @elseif($permohonan->lulus_sebelum === 0 )
                                
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
                                        <span class="h2 font-weight-bold mb-0">{{$mohon_p}}</span>
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
                                        <span class="h2 font-weight-bold mb-0">{{$mohon_t}}</span>
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
                                        <span class="h2 font-weight-bold mb-0">{{$mohon_dp}}</span>
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
                                <h3 class="mb-0">Permohonan Kerja Lebih Masa Penyelia {{Auth()->user()->name}}
                                </h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example"
                                    class=" display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>
                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai </th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <th>Kemaskini</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonans as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
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
                                            <td class="pelulus">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option class="badge badge-pill badge-primary">
                                                    SOKONG :
                                                    {{$user->name}} </option><br>
                                                @endif
                                                @endforeach
                                             
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option class="badge badge-pill badge-primary">
                                                    LULUS:
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis_permohonan">
                                                @if($permohonan->jenis_permohonan =='individu')
            
                                                <span class="badge badge-pill badge-warning">INDIVIDU</span>
            
                                            <td class="status">
                                            @if($permohonan->sokong_sebelum === null)
                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>
            
                                                    <td class="kemaskini">
                                                        <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                            class="btn btn-success btn-sm">Kemaskini</a>
                                                        <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                            class="btn btn-danger btn-sm">Buang</button>
                                                    </td>
            
                                            @elseif($permohonan->sokong_sebelum === 1)
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
            
                                                        @if($permohonan->lulus_sebelum === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                                        </td>
                                                        @elseif($permohonan->lulus_sebelum === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                                        </td>
                                                      
                                                        @elseif($permohonan->lulus_sebelum === 0)
                                                        <td>
                                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                                PG2</span><br><br>
                                                                {{ $permohonan->lulus_sebelum_sebab }}
            
                                                        </td>
                                                        @endif
            
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan PG1</span><br><br>
                                            {{ $permohonan->sokong_sebelum_sebab }}
                                            <td>
                                                <span class="badge badge-pill badge-danger">Permohonan Ditolak</span><br><br>
                                            </td>
                                            @endif
                                            </td>
            
                                            @elseif($permohonan->jenis_permohonan =='berkumpulan')
                                            <span class="badge badge-pill badge-primary">BERKUMPULAN</span>
            
                                            <td class="status">
                                                @if($permohonan->sokong_sebelum === null)
                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>
            
                                                <td class="kemaskini">
                                                    <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                        class="btn btn-success btn-sm">Kemaskini</a>
                                                    <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                        class="btn btn-danger btn-sm">Buang</button>
                                                    <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                        class="btn btn-primary btn-sm">Tambah Kakitangan</a>
                                                </td>
            
                                            @elseif($permohonan->sokong_sebelum === 1)
                                            <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
            
                                                    @if($permohonan->lulus_sebelum === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                                    </td>
                                                    @elseif($permohonan->lulus_sebelum === 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                                    </td>
                                                
                                                    @elseif($permohonan->lulus_sebelum === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                            PG2</span><br><br>
                                                            {{ $permohonan->lulus_sebelum_sebab }}
            
                                                    </td>
                                                    @endif
                  
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <span class="badge badge-pill badge-danger">Ditolak Permohonan PG1</span><br><br>
                                            {{$permohonan->sokong_sebelum_sebab}}
                                            <td>
                                             <span class="badge badge-pill badge-danger">Permohonan Ditolak</span>
                                            </td>
                                            @endif
            
                                            @endif

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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Pengesahan Kerja Lebih Masa Penyelia</h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu Mula Kerja lulus</th>
                                            <th>Waktu Akhir Kerja lulus</th>
                                            <th>Mula Kerja</th>
                                            <th>Akhir Kerja</th>
                                            <th>Jumlah OT</th>
                                            <th>Status Datang</th>
                                            <th>Jumlah OT</th>
                                            <th>Waktu Anjal</th>
                                            <th>Waktu Mula Sebenar</th>
                                            <th>Waktu Akhir Sebenar</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($pengesahans as $permohonan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            
                                            <td class="tarikh">
            
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                        
                                            <td >  
                                                <input class="form-control" value="Clockintime" disabled>
                                            </td>
                                            <td >
                                                <input class="form-control" value="clockouttime" disabled>
            
                                            </td>
                                            <td >
                                                <input class="form-control" value="totalworkinghour" disabled>
            
                                            </td>
                                            <td >
                                                <input class="form-control" value="status" disabled>
            
                                            </td>
                                            <td >
                                                <input class="form-control" value="Jumlah OT" disabled>
            
                                            </td>
                                            <td >
                                                <input class="form-control" value="Waktu Anjal" disabled>
            
                                            </td>
            
            
                                            <td >
                                                {{$permohonan->sebenar_mula_kerja}}<br>
            
                                                @if($permohonan->sokong_selepas === null)
            
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarMulaSaya({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>
                                                
                                                @elseif($permohonan->sokong_selepas === 1)
                                                @elseif($permohonan->sokong_selepas === 0)
            
                                                @endif
            
                                                {{-- <input class="form-control" value="{{$permohonan->mohon_mula_kerja}}"
                                                disabled> --}}
                                            </td>
                                            <td >
                                                {{$permohonan->sebenar_akhir_kerja}}<br>
            
                                                @if($permohonan->sokong_selepas === null)
            
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhirSaya({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>
            
                                                @elseif($permohonan->sokong_selepas === 1)
                                                @elseif($permohonan->sokong_selepas === 0)
                                                @endif
            
                                                {{-- <input class="form-control" value="{{$permohonan->mohon_akhir_kerja}}"
                                                disabled> --}}
                                            </td>
                                            @if($permohonan->lulus_sebelum === 1)
                                            <td >
                                                <span class="badge badge-pill badge-success">Sokong</span> :  
                                                @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_sokong_id == $user->id)
                                                        {{$user->name}} 
                                                    @endif
                                                @endforeach <br><br>
                                                <span class="badge badge-pill badge-success">Lulus </span> :
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                    {{$user->name}} 
                                                @endif
                                                @endforeach 
            
                                            </td>
                                            
                                                @if($permohonan->sokong_selepas=== 1)
            
                                                <td>
                                                    <span class="badge badge-pill badge-success">Lulus Pengesahan pegawai PG1</span><br><br>
            
                                                        @if($permohonan->lulus_selepas === 1)
                                                        <span class="badge badge-pill badge-success">Lulus Pengesahan pegawai PG2</span><br><br>
                                                        @elseif($permohonan->lulus_selepas === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan pegawai PG2</span><br><br>
                                                        {{$permohonan->lulus_selepas_sebab}}
                                                        @elseif($permohonan->lulus_selepas === null)
                                                        <span class="badge badge-pill badge-primary">Dalam semakan  pegawai PG2</span><br>
                                                        @endif
            
                                                </td>
                                        
                                                @elseif($permohonan->sokong_selepas=== 0)
            
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan pegawai PG1</span><br><br>
                                                    {{$permohonan->sokong_selepas_sebab}}
            
                                                </td>
            
                                                @elseif($permohonan->sokong_selepas=== null)
            
                                                    @if($permohonan->sebenar_akhir_kerja == null)
            
                                                        <td class="kemaskini">
                                                            <a href=""
                                                                class="btn btn-success btn-sm">Kemaskini</a>
                                                                <a href="/sebenar_mula_akhir_kerja/{{ $permohonan->id }}/"
                                                                    class="btn btn-success btn-sm">Hantar</a>
                                                            <button onclick="buangpermohonan({{ $permohonan->id }})"
                                                                class="btn btn-danger btn-sm">Buang</button>
                                                        </td>
            
                                                    @elseif($permohonan->sebenar_akhir_kerja != null)
            
                                                        <td>
                                                            <span class="badge badge-pill badge-primary"> Dalam Semakan</span>
                                                        </td>
            
                                                    @endif
            
                                                @endif
                                       
                                            @elseif($permohonan->lulus_sebelum === 0 )
                                            
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN SOKONG PERMOHONAN 
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_all}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN DISOKONG
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN SOKONG DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_sokong}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN SOKONG PERLU SEMAKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_proses}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN LULUS PERMOHONAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_all}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LULUS DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_lulus}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LULUS PERLU DISEMAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_proses}}</span>
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
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sokong Permohonan Kerja Lebih Masa Kakitangan</h3>

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
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>
                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th style="background-color:#00FF00">Pegawai Sokong / Lulus </th>
                                            {{-- <th>Pegawai Lulus</th> --}}
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <th>tindakan</th>
                                            <th><input type="checkbox" id="chkAll" /></th>

                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonan_disokongs as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <td class="nama pemohon">
                                                {{$permohonan->nama_pemohon}}
                                            </td>
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
                                            <td class="pelulus">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option class="badge badge-pill badge-primary">
                                                    SOKONG : {{$user->name}} </option><br><br>
                                                @endif
                                                @endforeach
                                            
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option class="badge badge-pill badge-primary">
                                                    LULUS : {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}
                                            </td>
                                            @if($permohonan->sokong_sebelum === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Perlu Semakan</span>
                                            </td>
                                           
                                            <td class="tindakan">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm">kemaskini</a>
                                                <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                    class="btn btn-success btn-sm">Sokong</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#tolaksokongsebelum{{ $permohonan->id }}">
                                                    Tolak
                                                </button>
                                            </td>

                                            @elseif($permohonan->sokong_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
                                            </td>
                                            @if($permohonan->lulus_sebelum === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai</span>
                                            </td>
                                            @elseif($permohonan->lulus_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                            </td>
                                           
                                            @elseif($permohonan->lulus_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan PG2</span><br><br>
                                                {{$permohonan->lulus_sebelum_sebab}}
                                            </td>
                                            @endif
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan PG1</span><br><br>
                                                {{$permohonan->sokong_sebelum_sebab}}
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-danger">Permohonan Ditolak</span>
                                            </td>
                                            
                                            @endif
                                            <td>
                                                <input type="checkbox"/>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tolaksokongsebelum{{ $permohonan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Lulus Permohonan Kerja Lebih Masa Kakitangan</h3>
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
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th style="background-color:#00FF00">Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>

                                            <th>tindakan</th>


                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($permohonan_dilulus as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <th>
                                                {{$permohonan->nama_pemohon}}
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
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2" style="background-color:#c5c5c5">
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
                                            @if($permohonan->sokong_sebelum === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-primary">Semakan Pegawai</span>
                                            </td>
                                    
                                            @elseif($permohonan->sokong_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
                                            </td>

                                            @if($permohonan->lulus_sebelum === null)
                                            
                                            <td class="tindakan">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm">kemaskini</a>
                                                <a href="/lulus_sebelum/{{ $permohonan->id }}/"
                                                    class="btn btn-success btn-sm">Sokong</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#tolaklulussebelum{{ $permohonan->id }}">
                                                    Tolak
                                                </button>
                                            </td>

                                            @elseif($permohonan->lulus_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                            </td>
                                           
                                            @elseif($permohonan->lulus_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG2</span><br><br>
                                                    {{$permohonan->lulus_sebelum_sebab}}
                                            </td>      
                                            @endif
                                            </td>
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG1</span><br><br>
                                                    {{$permohonan->sokong_sebelum_sebab}}

                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-danger">Permohonan Ditolak 
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN SOKONG LEBIH
                                            MASA KAKITANGAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN SOKONG KERJA LEBIH
                                            MASA DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN SOKONG KERJA LEBIH
                                            MASA DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LULUS KERJA LEBIH
                                            MASA KAKITANGAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN LULUS KERJA LEBIH
                                            MASA DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN LULUS KERJA LEBIH
                                            MASA DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sokong Pengesahan LULUS Kerja Lebih Masa Kakitangan</h3>

                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
            
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Waktu Mula Kerja lulus</th>
                                            <th>Waktu Akhir Kerja lulus</th>
                                            <th>Ekedatangan Mula Kerja</th>
                                            <th>Ekedatangan Akhir Kerja</th>
                                            <th>Waktu Mula Sebenar</th>
                                            <th>Waktu Akhir Sebenar</th>
                                            <th style="background-color:#00FF00">Pegawai Sokong</th>
                                            <th >Pegawai Lulus</th>

                                            <th>Status</th>
                                            <th>Tindakan</th>
            
            
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($pengesahan_disokongs as $permohonan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$permohonan->nama_pemohon}}
                                            </td>
                                            <td class="tarikh">
            
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td >   
                                                <span class="badge badge-pill badge-danger">Integration</span><br>
                                            </td>
                                            <td >
                                                <span class="badge badge-pill badge-danger">Integration</span><br>
                                             </td>
                                            <td >
                                                @if($permohonan->sokong_selepas === null)

                                                {{$permohonan->sebenar_mula_kerja}}<br><br>
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarMula({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>

                                                @elseif($permohonan->sokong_selepas === 1)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @elseif($permohonan->sokong_selepas === 0)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @endif

                                            </td>
                                            <td >
                                                @if($permohonan->sokong_selepas === null)

                                                {{$permohonan->sebenar_akhir_kerja}}<br><br>

                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhir({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>
                                               
                                                @elseif($permohonan->sokong_selepas === 1)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @elseif($permohonan->sokong_selepas === 0)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @endif
                                            </td>
                                            <td style="background-color:#c5c5c5">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                              
                                            </td>
                                            <td>
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach   
                                            </td>
                                            

                                            @if($permohonan->sebenar_mula_kerja != null)

                                                @if($permohonan->sokong_selepas === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Perlu Semakan</span><br>

                                                    </td>  
                                                    <td >
                                                            <a href=""
                                                            class="btn btn-success btn-sm">Kemaskini</a>
                                                           
                                                            <a href="/sokong_selepas/{{ $permohonan->id }}/"
                                                                class="btn btn-primary btn-sm">Sokong</a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#tolaksokongselepas{{ $permohonan->id }}">
                                                                Tolak
                                                            </button>
                                                    </td>
                                                @elseif($permohonan->sokong_selepas === 0)
                                                    <td >
                                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG1</span><br><br>
                                                        {{$permohonan->sokong_selepas_sebab}}

                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Permohonan Ditolak</span><br><br>
                                                    </td>
                                                @elseif($permohonan->sokong_selepas === 1)
                                                    <td >
                                                        <span class="badge badge-pill badge-success">Lulus Pengesahan PG1</span><br>
                                                     
                                                    </td>
                                                    <td>
                                                        @if($permohonan->lulus_selepas === 1)
                                                        <span class="badge badge-pill badge-success">Lulus Pengesahan PG2</span><br>
                                                        @elseif($permohonan->lulus_selepas === 0)
                                                        <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG2</span><br><br>
                                                        {{$permohonan->lulus_selepas_sebab}}
                                                        @elseif($permohonan->lulus_selepas === null)
                                                        <span class="badge badge-pill badge-primary">Dalam semakan  PG2</span><br>
                                                        @endif
                                                    </td>
                                                @endif  

                                            @elseif($permohonan->sebenar_mula_kerja == null )
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan Kakitangan</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan Kakitangan</span>
                                            </td>
                                            @endif
                                    
                                        </tr>
                                         <!-- Modal tolak sokong selepas -->
                                         <div class="modal fade" id="tolaksokongselepas{{ $permohonan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                            value="{{ $permohonan->id }}" name="id">

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
                                     
            
                                        @empty
            
                                        @endforelse
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Lulus Pengesahan Kerja Lebih Masa Kakitangan </h3>

                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
            
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Waktu Mula Kerja lulus</th>
                                            <th>Waktu Akhir Kerja lulus</th>
                                            <th>Ekedatangan Mula Kerja</th>
                                            <th>Ekedatangan Akhir Kerja</th>
                                            <th>Waktu Mula Sebenar</th>
                                            <th>Waktu Akhir Sebenar</th>
                                            <th>Pegawai sokong</th>
                                            <th style="background-color:#00FF00">Pegawai lulus</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($pengesahan_dilulus as $permohonan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$permohonan->nama_pemohon}}
                                            </td>
                                            <td class="tarikh">
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td >   
                                                <span class="badge badge-pill badge-danger">Integration</span><br>

                                            </td>
                                            <td >
                                                <span class="badge badge-pill badge-danger">Integration</span><br>

                                            </td>
                                            <td >
                                                @if($permohonan->lulus_selepas === null)

                                                {{$permohonan->sebenar_mula_kerja}}<br><br>
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarMula({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>

                                                @elseif($permohonan->lulus_selepas === 1)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @elseif($permohonan->lulus_selepas === 0)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @endif

                                            </td>
                                            <td >
                                                @if($permohonan->lulus_selepas === null)

                                                {{$permohonan->sebenar_akhir_kerja}}<br><br>

                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhir({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>
                                               
                                                @elseif($permohonan->lulus_selepas === 1)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @elseif($permohonan->lulus_selepas === 0)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                             </td>
                                            <td style="background-color:#c5c5c5">
                                                   
                                                    @foreach ($pengguna as $user)
                                                    @if ($permohonan->pegawai_lulus_id == $user->id)
                                                    <option>
                                                        {{$user->name}} </option>
                                                    @endif
                                                    @endforeach   
    
                                            </td>

                                                @if($permohonan->sokong_selepas === 1)
                                                    <td>
                                                          <span class="badge badge-pill badge-success">Lulus Pengesahan PG1</span>
                                                    </td>

                                                    @if($permohonan->lulus_selepas === null)

                                                            <td class="kemaskini">
                                                                <a href=""
                                                                    class="btn btn-success btn-sm">Kemaskini</a>
                                                                    <a href="/lulus_selepas/{{ $permohonan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lulus</a>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                        data-target="#tolaklulusselepas{{ $permohonan->id }}">
                                                                        Tolak
                                                                    </button>
                                                            </td>

                                                    @elseif($permohonan->lulus_selepas === 1)
                                                    <td>
                                                    <span class="badge badge-pill badge-success">Lulus Pengesahan PG2</span>
                                                    </td>
                                                    @elseif($permohonan->lulus_selepas === 0)
                                                    <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG2</span><br><br>
                                                    {{$permohonan->lulus_selepas_sebab}}
                                                    </td>
                                                    @endif

                                                @elseif($permohonan->sokong_selepas === 0)
                                                <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG1</span><br><br>
                                                  {{$permohonan->sokong_selepas_sebab}}
                                                </td>
                                                         
                                                <td >
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan</span><br>                        
                                                </td>

                                                @elseif($permohonan->sokong_selepas === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Pengesahan PG1</span>
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>   
                                                </td>
                                                @endif
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

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN SOKONG PERMOHONAN 
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_all}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN DISOKONG
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN SOKONG DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_sokong}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN SOKONG PERLU SEMAKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_proses}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN LULUS PERMOHONAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_all}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LULUS DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_lulus}}</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LULUS PERLU DISEMAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_proses}}</span>
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
                                <h3 class="mb-0">Sokong Permohonan Kerja Lebih Masa Kakitangan</h3>
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
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th style="background-color:#00FF00">Pegawai Sokong</th>
                                            <th>Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>

                                            <th>Tindakan</th>

                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonan_disokongs as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <td>
                                                {{$permohonan->nama_pemohon }}
                                            </td>
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
                                            <td class="pelulus1" style="background-color:#c5c5c5">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2" >
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

                                            @if($permohonan->sokong_sebelum === null)
                                            <td >
                                                <span class="badge badge-pill badge-primary">Perlu Semakan</span>
                                            </td>
                                            <td>
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm">kemaskini</a>
                                                <a href="/sokong_sebelum/{{ $permohonan->id }}/"
                                                    class="btn btn-success btn-sm">Sokong</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#tolaksokongansebelum{{ $permohonan->id }}">
                                                    Tolak
                                                </button>
                                            </td>
                                               
                                            @elseif($permohonan->sokong_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
                                         
                                                @if($permohonan->lulus_sebelum === null)
                                                
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan PG2</span>
                                                </td>
                                           
                                                @elseif($permohonan->lulus_sebelum === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                                </td>
                                             
                                                @elseif($permohonan->lulus_sebelum === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                        PG2</span><br><br>
                                                        {{$permohonan->lulus_sebelum_sebab}}
                                                </td>
                                               
                                                @endif
                                            </td>
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG1</span><br><br>
                                                    {{$permohonan->sokong_sebelum_sebab}}

                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-danger">Permohonan Ditolak </span>
                                            </td>
                                     
                                            @endif

                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tolaksokongansebelum{{ $permohonan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Lulus Permohonan Kerja Lebih Masa Kakitangan</h3>
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
                                            <th>Tarikh Mohon</th>
                                            <th>Waktu Kerja</th>

                                            <th>Lokasi</th>
                                            <th>Tujuan</th>
                                            <th>Pegawai Sokong</th>
                                            <th style="background-color:#00FF00">Pegawai Lulus</th>
                                            <th>Jenis Permohonan</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>


                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($permohonan_dilulus as $permohonan)
                                        <tr>
                                            <th>
                                                {{$loop->index+1}}
                                            </th>
                                            <td>
                                                {{$permohonan->nama_pemohon }}
                                            </td>
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
                                            <td class="pelulus1" >
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="pelulus2" style="background-color:#c5c5c5">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="jenis">
                                                {{$permohonan->jenis_permohonan}}

                                                @if($permohonan->sokong_sebelum === null)
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Proses Semakan</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-primary">Pegawai Bertugas</span>
                                            </td>
                                      
                                            @elseif($permohonan->sokong_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG1</span>
                                            </td>

                                            @if($permohonan->lulus_sebelum === null)
                                            
                                            <td class="tindakan">
                                                <a href="/permohonans/{{ $permohonan->id }}/edit"
                                                    class="btn btn-primary btn-sm">kemaskini</a>
                                                <a href="/lulus_sebelum/{{ $permohonan->id }}/"
                                                    class="btn btn-success btn-sm">Sokong</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#tolaklulussebelum{{ $permohonan->id }}">
                                                    Tolak
                                                </button>
                                            </td>

                                            @elseif($permohonan->lulus_sebelum === 1)
                                            <td>
                                                <span class="badge badge-pill badge-success">Lulus Permohonan PG2</span>
                                            </td>
                                          
                                            @elseif($permohonan->lulus_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG2</span><br><br>
                                                    {{$permohonan->lulus_sebelum_sebab}}

                                            </td>
                                          
                                            @endif
                                            </td>
                                            @elseif($permohonan->sokong_sebelum === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Permohonan
                                                    PG1</span><br><br>
                                                    {{$permohonan->sokong_sebelum_sebab}}

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
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN SOKONG PENGESAHAN 
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_selepas_all}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGESAHAN DISOKONG
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_selepas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN SOKONG DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_sokong_selepas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN SOKONG PERLU SEMAKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_sokong_selepas_proses}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH KEPERLUAN LULUS PENGESAHAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_selepas_all}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGESAHAN DILULUSKAN
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_selepas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LULUS DITOLAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_tolak_lulus_selepas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LULUS PERLU DISEMAK
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$p_lulus_selepas_proses}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sokong Pengesahan Kerja Lebih Masa Kakitangan</h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
            
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Waktu Mula Kerja lulus</th>
                                            <th>Waktu Akhir Kerja lulus</th>
                                            <th>Ekedatangan Mula Kerja</th>
                                            <th>Ekedatangan Akhir Kerja</th>
                                            <th>Waktu Mula Sebenar</th>
                                            <th>Waktu Akhir Sebenar</th>
                                            <th style="background-color:#00FF00">Pegawai Sokong</th>
                                            <th >Pegawai Lulus</th>

                                            <th>Status</th>
                                            <th>TIndakan</th>

            
            
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($pengesahan_disokongs as $permohonan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$permohonan->nama_pemohon}}
                                            </td>
                                            <td class="tarikh">
            
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td >   
                                                <span class="badge badge-pill badge-danger">Integration</span><br>

                                            </td>
                                            <td >
                                                <span class="badge badge-pill badge-danger">Integration</span><br>

                                            </td>
                                            <td >
                                                @if($permohonan->sokong_selepas === null)

                                                {{$permohonan->sebenar_mula_kerja}}<br><br>
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarMula({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>

                                                @elseif($permohonan->sokong_selepas === 1)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @elseif($permohonan->sokong_selepas === 0)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @endif

                                            </td>
                                            <td >
                                                @if($permohonan->sokong_selepas === null)

                                                {{$permohonan->sebenar_akhir_kerja}}<br><br>

                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhir({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>
                                               
                                                @elseif($permohonan->sokong_selepas === 1)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @elseif($permohonan->sokong_selepas === 0)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @endif
                                            </td>
                                            <td style="background-color:#dcdcdc">
                                          
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                      
                                            </td>
                                            <td>
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach   
                                            </td>

                                            @if($permohonan->sebenar_mula_kerja != null)

                                                @if($permohonan->sokong_selepas === null)
                                                     <td>
                                                        <span class="badge badge-pill badge-primary">Perlu Semakan</span><br>
                                                     </td>
                                                
                                                    <td class="kemaskini">
                                                        <a href=""
                                                            class="btn btn-success btn-sm">Kemaskini</a>
                                                            <a href="/sokong_selepas/{{ $permohonan->id }}/"
                                                                class="btn btn-primary btn-sm">Sokong</a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#tolaksokongselepas{{ $permohonan->id }}">
                                                                Tolak
                                                            </button>
                                                    </td>

                                                @elseif($permohonan->sokong_selepas === 0)
                                               
                                                <td >
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG1</span><br><br>
                                                    {{$permohonan->sokong_selepas_sebab}}

                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-danger"> Pengesahan Ditolak</span><br><br>
                                                </td>

                                                @elseif($permohonan->sokong_selepas === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success">Lulus Pengesahan PG1</span><br>
                                                </td>
                                                <td >
                                                    @if($permohonan->lulus_selepas === 1)
                                                    <span class="badge badge-pill badge-success">Lulus Pengesahan PG2</span><br>
                                                    @elseif($permohonan->lulus_selepas === 0)
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG2</span><br><br>
                                                    {{$permohonan->lulus_selepas_sebab}}
                                                    @elseif($permohonan->lulus_selepas === null)
                                                    <span class="badge badge-pill badge-primary">Dalam semakan PG2</span><br>
                                                    @endif
                                                </td>

                                                @endif
                                               
                                            @elseif($permohonan->sebenar_mula_kerja == null )
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan Kakitangan</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-primary">Dalam Semakan Kakitangan</span>
                                            </td>

                                            @endif
                                        </tr>
                                           
                                        @endforeach

                                        <!-- Modal tolak lulus selepas -->
                                        <div class="modal fade" id="tolaksokongselepas{{ $permohonan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                            value="{{ $permohonan->id }}" name="id">

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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Lulus Pengesahan Kerja Lebih Masa Kakitangan</h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
            
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Waktu Mula Kerja lulus</th>
                                            <th>Waktu Akhir Kerja lulus</th>
                                            <th>Ekedatangan Mula Kerja</th>
                                            <th>Ekedatangan Akhir Kerja</th>
                                            <th>Waktu Mula Sebenar</th>
                                            <th>Waktu Akhir Sebenar</th>
                                            <th >Pegawai Sokong</th>
                                            <th style="background-color:#00FF00">Pegawai Lulus </th>
                                            <th>Status</th>
                                            <th>Kemaskini</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($pengesahan_dilulus as $permohonan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$permohonan->nama_pemohon}}
                                            </td>
                                            <td class="tarikh">
            
                                                {{$permohonan->mohon_mula_kerja}}
                                            </td>
                                            <td class="waktu">
                                                {{$permohonan->mohon_akhir_kerja}}
                                            </td>
                                            <td >   
                                                <span class="badge badge-pill badge-danger">Integration</span><br>
                                            </td>
                                            <td >
                                                <span class="badge badge-pill badge-danger">Integration</span><br>
                                            </td>
                                            <td >
                                                @if($permohonan->lulus_selepas === null)

                                                {{$permohonan->sebenar_mula_kerja}}<br><br>

                                                     <input type="datetime-local" onchange="kemaskiniMasaSebenarMula({{$permohonan->id}}, this)" value={{$permohonan->sebenar_mula_kerja}}>
                                                   
                                                @elseif($permohonan->lulus_selepas === 1)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @elseif($permohonan->lulus_selepas === 0)
                                                {{$permohonan->sebenar_mula_kerja}}

                                                @endif

                                            </td>
                                            <td >
                                                @if($permohonan->lulus_selepas === null)

                                                {{$permohonan->sebenar_akhir_kerja}}<br><br>
                                                   
                                                <input type="datetime-local" onchange="kemaskiniMasaSebenarAkhir({{$permohonan->id}}, this)" value={{$permohonan->sebenar_akhir_kerja}}>
                                              
                                                @elseif($permohonan->lulus_selepas === 1)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @elseif($permohonan->lulus_selepas === 0)
                                                {{$permohonan->sebenar_akhir_kerja}}

                                                @endif
                                            </td>
                                            <td >
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_sokong_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td style="background-color:#dcdcdc">
                                                @foreach ($pengguna as $user)
                                                @if ($permohonan->pegawai_lulus_id == $user->id)
                                                <option>
                                                    {{$user->name}} </option>
                                                @endif
                                                @endforeach  
                                            </td>
                                                @if($permohonan->sokong_selepas === 1)
                                                <td>
                                                 <span class="badge badge-pill badge-success">Lulus Pengesahan PG1</span>
                                                </td>
                                                    @if($permohonan->lulus_selepas === null)
                                                          
                                                            <td class="kemaskini">
                                                                <a href=""
                                                                    class="btn btn-success btn-sm">Kemaskini</a>
                                                                    <a href="/lulus_selepas/{{ $permohonan->id }}/"
                                                                        class="btn btn-primary btn-sm">Lulus</a>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                        data-target="#tolaklulusselepas{{ $permohonan->id }}">
                                                                        Tolak
                                                                    </button>
                                                            </td>
                                                           

                                                    @elseif($permohonan->lulus_selepas === 1)
                                                        <td>
                                                            <span class="badge badge-pill badge-success">Lulus Pengesahan PG2</span>
                                                        </td>
                                                   
                                                    @elseif($permohonan->lulus_selepas === 0)
                                                        <td>
                                                            <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG2</span><br><br>
                                                            {{$permohonan->lulus_selepas_sebab}}
                                                        </td>
                                                     
        
                                                    @endif

                                                @elseif($permohonan->sokong_selepas === 0)
                                                <td>
                                                <span class="badge badge-pill badge-danger">Ditolak Pengesahan PG1</span><br><br>
                                                {{$permohonan->sokong_selepas_sebab}}
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Ditolak Pengesahan</span>
                                                </td>
                                               
                                                @elseif($permohonan->sokong_selepas === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Pengesahan PG1</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Proses</span>
                                                </td>
                                               
                                                @endif
                                            </td>
                                        
                                               
                                        </tr>
                                        @endforeach

                                         <!-- Modal tolak lulus selepas -->
                                         <div class="modal fade" id="tolaklulusselepas{{ $permohonan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
{{-- Tak ada modul permohonan --}}
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
    $(document).ready(function () {
      var table =  $('table.display').DataTable();
    });

    //   var table = $("#example2").DataTable({
    //         "orderCellsTop": true,
    //         "ordering": false,
    //         "responsive": false,
    //         "autoWidth": true,
    //         "oLanguage": {
    //             "sInfo": "Paparan TOTAL rekod (START hingga END)",
    //             "sEmptyTable": "Tiada rekod ditemui",
    //             "sZeroRecords": "Tiada rekod ditemui",
    //             "sLengthMenu": "Papar MENU rekod",
    //             "sLoadingRecords": "Sila tunggu...",
    //             "sSearch": "Carian:",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sLast": "Terakhir",
    //                 "sNext": ">",
    //                 "sPrevious": "<",
    //             }
    //         },
    //     });

       // Setup - add a text input to each footer cell
    //    $('#example2 head tr').clone(true).appendTo('#example2 thead');
    //     $('#example2 thead tr:eq(1) th').each( function (i) {
    //         var title = $(this).text();
    //         $(this).html('<input type="text" placeholder="Search '+title+'" class="form-control"/>');
    //         $('input',this).on('keyup change', function(){
    //             if(table.column(i).search() !== this.value){
    //                 table.column(i).search(this.value).draw();
    //             }
    //         });
    //     });

    // });


   
    // $(function () {
    //     $("#chkAll").click(function () {
    //         $("input[name='id']").attr("checked", this.checked);
    //     });
    //     $('table.display').DataTable({
    //     });
    // });

    
    // Sokong pengesahan
    function kemaskiniMasaSebenarMula(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/permohonans-ubah-masa_mula/" + obj,
            type: "POST",
            data: {
                "masa_sebenar_baru_mula": obj2.value
            }
        
        });
    }
    function kemaskiniMasaSebenarAkhir(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/permohonans-ubah-masa_akhir/" + obj,
            type: "POST",
            data: {
                "masa_sebenar_baru_akhir": obj2.value
            }
        
        });
    }
    // Kemaskini pengesahan
    function kemaskiniMasaSebenarMulaSaya(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/permohonans-ubah-masa_mula_saya/" + obj,
            type: "POST",
            data: {
                "masa_sebenar_baru_mula_saya": obj2.value
            }
        
        });
    }
    function kemaskiniMasaSebenarAkhirSaya(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/permohonans-ubah-masa_akhir_saya/" + obj,
            type: "POST",
            data: {
                "masa_sebenar_baru_akhir_saya": obj2.value
            }
        
        });
    // // Lulus pengesahan
    // function kemaskiniMasaLatestMula(obj, obj2) {
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: "/permohonans-tukar-masa_mula/" + obj,
    //         type: "POST",
    //         data: {
    //             "masa_sebenar_latest_mula": obj2.value
    //         }
        
    //     });
    // }
    // function kemaskiniMasaLatestAkhir(obj, obj2) {
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: "/permohonans-tukar-masa_akhir/" + obj,
    //         type: "POST",
    //         data: {
    //             "masa_sebenar_latest_akhir": obj2.value
    //         }
        
    //     });
    }

</script>

@endsection
