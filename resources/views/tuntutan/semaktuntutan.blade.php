@extends('base')

@section('content')

@if (session('status_tuntutan'))
    {{session('status_tuntutan')}}
@endif

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tuntutan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Tuntutan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuntutan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(auth()->user()->role == 'kakitangan')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              
                <li class="nav-item">
                <a href="/tuntutans" class="btn btn-secondary float-right">Kembali</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'penyelia')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              
                <li class="nav-item">
                    <a href="/tuntutans" class="btn btn-secondary float-right">Kembali</a>

                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'ketua_bahagian')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              
                <li class="nav-item">
                    <a href="/tuntutans" class="btn btn-secondary float-right">Kembali</a>
                </li>
            </ul>
        </div>
        @else
        @endif
    </div>
</div>
{{-- user first --}}
@if(auth()->user()->role == 'kakitangan')
<!-- Card stats -->
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th> Permohonan ID</th>
                                <th> Waktu Mula Sebenar</th>
                                <th> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                                <th> Jumlah Jam Tuntutan</th>
                                <th> Jumlah Tuntutan</th>
                                <th> Status</th>
                                <th> Pegawai Sokong / Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["id"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["jam_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["total_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["status2"]}}
                                </td>
                               
                                <td >
                                    {{$permohonan_ygdituntut["pegawai_sokong"]}}<br>
                                    {{$permohonan_ygdituntut["pegawai_lulus"]}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> <input value="{{$tuntutan->jumlah_jam_tuntutan}}" disabled ></th>
                                <th> <input value="{{$tuntutan->jumlah_tuntutan}}" disabled></th>
                                <th> <input value="{{$tuntutan->status}}" disabled></th>
                                <th></th>
                            </tr>
                            

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
   
    </div>
  
   
</div>
@elseif(auth()->user()->role == 'penyelia')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th> Permohonan ID</th>
                                <th> Waktu Mula Sebenar</th>
                                <th> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                                <th> Jumlah Jam Tuntutan</th>
                                <th> Jumlah Tuntutan</th>
                                <th> Status</th>
                                <th> Pegawai Sokong / Lulus</th>
                                <th> Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["id"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["jam_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["total_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["status2"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["pegawai_sokong"]}}<br>
                                    {{$permohonan_ygdituntut["pegawai_lulus"]}}
                                </td>
                                <td >
                                    <a href="" class="btn btn-primary">Kemaskini</a>
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
@elseif(auth()->user()->role == 'ketua_bahagian')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th> Permohonan ID</th>
                                <th> Waktu Mula Sebenar</th>
                                <th> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                                <th> Jumlah Jam Tuntutan</th>
                                <th> Jumlah Tuntutan</th>
                                <th> Status</th>
                                <th> Pegawai Sokong / Lulus</th>
                                <th> Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["id"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    shift
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["jam_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["total_tuntutan"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["status2"]}}
                                </td>
                                <td >
                                    {{$permohonan_ygdituntut["pegawai_sokong"]}}<br>
                                    {{$permohonan_ygdituntut["pegawai_lulus"]}}
                                </td>
                                <td >
                                    <a href="" class="btn btn-primary">Kemaskini</a>
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
@section ('script')
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>

<script>
    // Kemaskini jam tuntutan

    function KemaskiniJamTuntutan(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/kemaskini_jam_tuntutan/" + obj,
            type: "POST",
            data: {
                "kemaskini_jam_tuntutan": obj2.value
            }
        
        });
    }
    function KemaskiniTotalTuntutan(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/kemaskini_total_tuntutan/" + obj,
            type: "POST",
            data: {
                "kemaskini_total_tuntutan": obj2.value
            }
        
        });
    }
    function KemaskiniStatus2(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/kemaskini_status2/" + obj,
            type: "POST",
            data: {
                "kemaskini_status2": obj2.value
            }
        
        });
    }
  
</script>

@endsection