@extends('base')

@section('content')


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
        @elseif(auth()->user()->role == 'penyelia')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-bell-55 mr-2"></i>Tuntutan Elaun Lebih Masa
                        {{Auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Semak Tuntutan Elaun Lebih Masa Kakitangan</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'kerani_semakan'or auth()->user()->role == 'kerani_pemeriksa')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-bell-55 mr-2"></i>Tuntutan Elaun Lebih Masa
                        {{Auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Semak Tuntutan Elaun Lebih Masa Kakitangan</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan' )
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Tuntutan Elaun Lebih Masa Kakitangan</a>
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
    {{-- Card tuntutan--}}
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
    {{-- Tuntutan Kakitangan--}}
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Hantar Tuntutan Elaun Lebih Masa {{Auth()->user()->name}}</h3> 
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
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                    <thead class="thead-light">

                        <tr>
                            <div class="col-md-12 mb-3">

                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PastiTuntutan">
                                Launch demo modal --}}

                                    <a  type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#PastiTuntutan"href="/bulktuntutan" class="btn btn-primary float-right">Hantar Tuntutan</a>
                              </button>
                            </div> 

                          

                            <th>No</th>
                            {{-- <th> Tarikh Mohon Tuntutan</th> --}}
                            <th> Waktu Mula Sebenar</th>
                            <th> Waktu Akhir Sebenar</th>
                            <th>Hari Biasa <br> Siang / Malam</th>
                            {{-- <th>Hari Biasa <br> Malam </th> --}}
                            <th>Hari Rehat <br> Siang / Malam</th>
                            {{-- <th>Hari Rehat <br> Malam </th> --}}
                            <th>Pelepasan AM <br> Siang / Malam</th>
                            {{-- <th>Pelepasan AM <br> Malam </th> --}}

                            <th> Jumlah Jam Tuntutan</th>
                            <th> Sebab Lebih Masa</th>
                     
                            <th> Pegawai </th>
                            <th> Tindakan</th>
                        </tr>
                    </thead>	
                    <tfoot >
                        <tr>
                            <th></th>
                            {{-- <th></th> --}}

                            <th> </th>
                            <th> </th>
                            <th> <input value="" ></th>
                            <th> <input value="" ></th>
                            <th> <input value="" ></th>
                            <th> <input value="" ></th>
                            {{-- <th> <input value="" ></th>
                            <th> <input value="" ></th>
                            <th> <input value="" ></th> --}}
                            <th></th>
                            <th></th>
                            <th></th>


                        </tr>
                    </tfoot>
                    
                    <tbody class="list">
                        @foreach($tuntutan_k as $tuntutan_k)
                        <tr>
                            <td>
                                {{$loop->index+1}}
                            </td>
                           
                            {{-- <td>
                                {{$tuntutan_k->created_by}}
                            </td> --}}
                            {{-- <form method="POST" action="/tuntutans/"> --}}
                                {{-- @csrf --}}
                            <td >
                                <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$tuntutan_k->sebenar_mula_kerja}}" disabled>

                            </td>
                            <td >
                                <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$tuntutan_k->sebenar_akhir_kerja}}" disabled>
                            </td>
                            <td >
                                macam mana nak kira woi
                                </td>
                            <td >
                                macam mana nak kira woi
                            </td>
                            <td >
                                macam mana nak kira woi
                            </td>
                                                        
                            <td >   
                                <input type="text" onchange="KemaskiniJamTuntutan({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->jam_tuntutan}}>
                                <input type="text" onchange="KemaskiniTotalTuntutan({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->total_tuntutan}}>
                                <input type="text" onchange="KemaskiniStatus2({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->status2}}>


                                {{-- <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="" required>

                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="" required>

                                <input type="text" id="status" name="status" value="" required> --}}
                            </td>
                            <td>
                                {{$tuntutan_k->tujuan}}
                            </td>
                        
                            <td >
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
                                </td>
                            <td>     
                                    {{-- <button type="submit"
                                class="btn btn-primary btn-sm ">Hantar</button> --}}
                                {{-- <button onclick="Sahkan()">Sahkan</button> --}}
                                <a href="">Sahkan</a>


                            </td>   
                            {{-- </form> --}}
                                
                        </tr>
                       
                        @endforeach

                    </tbody>

                    <!-- Modal -->
                    <div class="modal fade" id="PastiTuntutan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Makluman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body text-red" >
                             Sila pastikan Tuntutan yang akan dihantar disemak dan anda bersetuju dengan jumlah tuntutan berikut
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="/bulktuntutan" class="btn btn-primary float-right">Hantar Tuntutan</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </table>

            </div>
        </div>
    </div>
    {{-- Tuntutan Kakitangan diluluskan--}}
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Tuntutan Dalam Proses Semakan</h3>
                </div>
                <!-- Light table -->
                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th> Tuntutan ID</th>
                        
                            <th> Jumlah Jam Tuntutan</th>
                            <th> Jumlah Tuntutan</th>
                            <th> Status</th>
                            <th> Status Dalaman</th>
                            <th> Status Perbendaharaan</th>
                            <th> Tindakan </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tuntutan_lulus as $tuntutan_lulus)
                        <tr>
                            <td>
                                {{$loop->index+1}}
                            </td>
                            <td >
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
                             </td>

                                @if($tuntutan_lulus->sokong_tuntutan === null)
                                     <td >
                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_sokong}}<br><br>

                                            @if($tuntutan_lulus->lulus_tuntutan === null)

                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
            
                                            @elseif($tuntutan_lulus->lulus_tuntutan === 1)

                                                <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>

                                            @elseif($tuntutan_lulus->lulus_tuntutan === 0)

                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                            
                                            @endif 

                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                    </td>
           
                                @elseif($tuntutan_lulus->sokong_tuntutan === 1)

                                    <td >
                                        <span class="badge badge-pill badge-success">Tuntutan disokong</span>: {{$tuntutan_lulus->pegawai_sokong}}<br><br>

                                        @if($tuntutan_lulus->lulus_tuntutan === null)

                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
    
                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)

                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>

                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)

                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                        
                                        @endif 
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                    </td>
                                        
                                @elseif($tuntutan_lulus->sokong_tuntutan === 0)

                                    <td >
                                        <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> : {{$tuntutan_lulus->pegawai_sokong}}<br><br>

                                        @if($tuntutan_lulus->lulus_tuntutan === null)

                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
    
                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)

                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span><br><br>

                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)

                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> : {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                        
                                        @endif 
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                    </td>
                                
                                @endif
                                <td>
                                    <a href="/tuntutans/{{$tuntutan_lulus->id}}/"
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
                {{-- Card tuntutan--}}
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
                {{-- Tuntutan sebegai kakitangan--}}
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Hantar Tuntutan Elaun Lebih Masa {{Auth()->user()->name}}</h3> 
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
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                <thead class="thead-light">
            
                                    <tr>
                                        <div class="col-md-12 mb-3">
            
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PastiTuntutan">
                                            Launch demo modal --}}
            
                                                <a  type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#PastiTuntutan"href="/bulktuntutan" class="btn btn-primary float-right">Hantar Tuntutan</a>
                                          </button>
                                        </div> 
            
                                      
            
                                        <th>No</th>
                                        {{-- <th> Tarikh Mohon Tuntutan</th> --}}
                                        <th> Waktu Mula Sebenar</th>
                                        <th> Waktu Akhir Sebenar</th>
                                        <th>Hari Biasa <br> Siang / Malam</th>
                                        {{-- <th>Hari Biasa <br> Malam </th> --}}
                                        <th>Hari Rehat <br> Siang / Malam</th>
                                        {{-- <th>Hari Rehat <br> Malam </th> --}}
                                        <th>Pelepasan AM <br> Siang / Malam</th>
                                        {{-- <th>Pelepasan AM <br> Malam </th> --}}
            
                                        <th> Jumlah Jam Tuntutan</th>
                                        <th> Sebab Lebih Masa</th>
                                 
                                        <th> Pegawai </th>
                                        <th> Tindakan</th>
                                    </tr>
                                </thead>	
                                <tfoot >
                                    <tr>
                                        <th></th>
                                        {{-- <th></th> --}}
            
                                        <th> </th>
                                        <th> </th>
                                        <th> <input value="" ></th>
                                        <th> <input value="" ></th>
                                        <th> <input value="" ></th>
                                        <th> <input value="" ></th>
                                        {{-- <th> <input value="" ></th>
                                        <th> <input value="" ></th>
                                        <th> <input value="" ></th> --}}
                                        <th></th>
                                        <th></th>
                                        <th></th>
            
            
                                    </tr>
                                </tfoot>
                                
                                <tbody class="list">
                                    @foreach($tuntutan_k as $tuntutan_k)
                                    <tr>
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                       
                                        {{-- <td>
                                            {{$tuntutan_k->created_by}}
                                        </td> --}}
                                        {{-- <form method="POST" action="/tuntutans/"> --}}
                                            {{-- @csrf --}}
                                        <td >
                                            <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$tuntutan_k->sebenar_mula_kerja}}" disabled>
            
                                        </td>
                                        <td >
                                            <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$tuntutan_k->sebenar_akhir_kerja}}" disabled>
                                        </td>
                                        <td >
                                            macam mana nak kira woi
                                            </td>
                                        <td >
                                            macam mana nak kira woi
                                        </td>
                                        <td >
                                            macam mana nak kira woi
                                        </td>
                                                                    
                                        <td >   
                                            <input type="text" onchange="KemaskiniJamTuntutan({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->jam_tuntutan}}>
                                            <input type="text" onchange="KemaskiniTotalTuntutan({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->total_tuntutan}}>
                                            <input type="text" onchange="KemaskiniStatus2({{$tuntutan_k->id}}, this)" value={{$tuntutan_k->status2}}>
            
            
                                            {{-- <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="" required>
            
                                            <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="" required>
            
                                            <input type="text" id="status" name="status" value="" required> --}}
                                        </td>
                                        <td>
                                            {{$tuntutan_k->tujuan}}
                                        </td>
                                    
                                        <td >
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
                                            </td>
                                        <td>     
                                                {{-- <button type="submit"
                                            class="btn btn-primary btn-sm ">Hantar</button> --}}
                                            {{-- <button onclick="Sahkan()">Sahkan</button> --}}
                                            <a href="">Sahkan</a>
            
            
                                        </td>   
                                        {{-- </form> --}}
                                            
                                    </tr>
                                   
                                    @endforeach
            
                                </tbody>
            
                                <!-- Modal -->
                                <div class="modal fade" id="PastiTuntutan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Makluman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-red" >
                                         Sila pastikan Tuntutan yang akan dihantar disemak dan anda bersetuju dengan jumlah tuntutan berikut
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <a href="/bulktuntutan" class="btn btn-primary float-right">Hantar Tuntutan</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </table>
            
                        </div>
                    </div>
                </div>
                {{-- Tuntutan sebagai kakitangan diluluskan--}}
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Tuntutan Dalam Proses Semakan</h3>
                            </div>
                            <!-- Light table -->
                            <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th> Tuntutan ID</th>
                                    
                                        <th> Jumlah Jam Tuntutan</th>
                                        <th> Jumlah Tuntutan</th>
                                        <th> Status</th>
                                        <th> Status Dalaman</th>
                                        <th> Status Perbendaharaan</th>
                                        <th> Tindakan </th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tuntutan_lulus as $tuntutan_lulus)
                                    <tr>
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                        <td >
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
                                         </td>
            
                                            @if($tuntutan_lulus->sokong_tuntutan === null)
                                                 <td >
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_sokong}}<br><br>
            
                                                        @if($tuntutan_lulus->lulus_tuntutan === null)
            
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                        
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)
            
                                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
            
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)
            
                                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                                        
                                                        @endif 
            
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                </td>
                       
                                            @elseif($tuntutan_lulus->sokong_tuntutan === 1)
            
                                                <td >
                                                    <span class="badge badge-pill badge-success">Tuntutan disokong</span>: {{$tuntutan_lulus->pegawai_sokong}}<br><br>
            
                                                    @if($tuntutan_lulus->lulus_tuntutan === null)
            
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                
                                                    @elseif($tuntutan_lulus->lulus_tuntutan === 1)
            
                                                        <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
            
                                                    @elseif($tuntutan_lulus->lulus_tuntutan === 0)
            
                                                        <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>: {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                                    
                                                    @endif 
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                </td>
                                                    
                                            @elseif($tuntutan_lulus->sokong_tuntutan === 0)
            
                                                <td >
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> : {{$tuntutan_lulus->pegawai_sokong}}<br><br>
            
                                                    @if($tuntutan_lulus->lulus_tuntutan === null)
            
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
                
                                                    @elseif($tuntutan_lulus->lulus_tuntutan === 1)
            
                                                        <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span><br><br>
            
                                                    @elseif($tuntutan_lulus->lulus_tuntutan === 0)
            
                                                        <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span> : {{$tuntutan_lulus->pegawai_lulus}}<br><br>
                                                    
                                                    @endif 
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                </td>
                                            
                                            @endif
                                            <td>
                                                <a href="/tuntutans/{{$tuntutan_lulus->id}}/"
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
                {{-- Card tuntutan--}}
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  Sokong tuntutan kakitangan--}}
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Sokong Tuntutan</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                    <thead class="thead-light">

                                        <tr>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                            </div>

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
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->id}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->nama_pemohon}}
                                            </td>
                                            <td >   
                                                <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$sokong_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                            
                                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$sokong_tuntutan->jumlah_tuntutan}} "disabled >
                                            
                                                <input type="text" id="status" name="status" value="{{$sokong_tuntutan->status}}" disabled >
                                            </td>
                                     
                                            <td >
                                                    {{$sokong_tuntutan->pegawai_sokong}} <br>
                                            
                                                    {{$sokong_tuntutan->pegawai_lulus}}           
                                            </td>

                                            @if($sokong_tuntutan->sokong_tuntutan === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Perlu Semakan</span>
                                                </td>
                                                <td>
                                                    <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-primary btn-sm">Lihat</a>
                                                    <a href="/sokong_tuntutan/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-success btn-sm">Sokong</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                        Tolak
                                                    </button>
                                                </td>   
                                            @elseif($sokong_tuntutan->sokong_tuntutan === 1)

                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan disokong</span>
                                                    </td>  
                                                    @if($sokong_tuntutan->lulus_tuntutan === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span>
                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>

                                                        <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>

                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Kelulusan Ditolak Pegawai</span>
                                                    </td>
                                                    @endif

                                            @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                            </td>  
                                            <td>
                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>

                                            </td>
                                            @endif

                                        </tr>
                                        <!-- Modal tolak sokong tuntutan-->
                                        <div class="modal fade" id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                            value="{{ $sokong_tuntutan->id }}" name="id">

                                                                        <div class="input-group input-group-merge">
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
                 {{-- Lulus tuntutan kakitangan--}}
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Lulus Tuntutan</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                 <!-- Light table -->
                                 <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                    <thead class="thead-light">

                                        <tr>
                                            {{-- <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                            </div> --}}

                                            <th>No</th>
                                            <th> Tuntutan ID</th>
                                            <th> Waktu Mula Sebenar</th>
                                            <th> Waktu Akhir Sebenar</th>
                                        
                                            <th>Mula Kerja</th>
                                            <th>Akhir Kerja</th>
                                            <th>Jumlah OT</th>
                                            <th>Status Datang</th>
                                            <th>Jumlah OT</th>
                                            <th>Waktu Anjal</th>

                                            <th> Jumlah Jam Tuntutan</th>
                                            <th> Jumlah Tuntutan</th>
                                            <th> Jumlah</th>
                                            <th> Pegawai Sokong</th>
                                            <th> Pegawai Lulus</th>  
                                            <th> Status</th>
                                            <th> Tindakan</th>
                                        </tr>
                                    </thead>	
                                    
                                    <tbody class="list">
                                        @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                        <tr>            
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$lulus_tuntutan->id}}
                                            </td>
                                            <td >
                                                <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$lulus_tuntutan->sebenar_mula_kerja_tuntutan}}">

                                            </td>
                                            <td >
                                                <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$lulus_tuntutan->sebenar_akhir_kerja_tuntutan}}">
                                            </td>
                                            <td >
                                                <span class="badge badge-pill badge-primary">clockintime</span>   
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">clockouttime</span>
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">totalworkinghour</span>         
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">status</span> 
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">Jumlah OT</span>         
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">Waktu Anjal</span> 
                                                </td>

                                                <td >   
                                                    <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$lulus_tuntutan->jumlah_jam_tuntutan}}">
                                                </td>
                                                <td >
                                                    <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$lulus_tuntutan->jumlah_tuntutan}}">
                                                </td>
                                                <td >
                                                    <input type="text" id="status" name="status" value="{{$lulus_tuntutan->status}}">
                                                </td>
                                                <td >
                                                    {{$lulus_tuntutan->pegawai_sokong}}
                                                </td>
                                                <td >
                                                   {{$lulus_tuntutan->pegawai_lulus}} 
                                                                                
                                                </td>


                                                @if($lulus_tuntutan->sokong_tuntutan === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai</span>
                                                </td>
                                            
                                                @elseif($lulus_tuntutan->sokong_tuntutan === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success">Tuntutan disokong </span>
                                                </td>  

                                                   @if($lulus_tuntutan->lulus_tuntutan === null)
                                                    <td>
                                                        <a href="/lulus_tuntutan/{{$lulus_tuntutan->id}}/"
                                                            class="btn btn-success btn-sm">lulus</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#tolaklulustuntutan{{ $lulus_tuntutan->id }}">
                                                            Tolak
                                                        </button>
                                                    </td>
                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success"> Tuntutan Diluluskan </span>
                                                    </td>  

                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Ditolak Pegawai </span>
                                                    </td>  
                                                    @endif

                                                @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                </td>  
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>

                                                </td>
                                                @endif 

                                            </tr>

                                               <!-- Modal tolak sokong tuntutan-->
                                               <div class="modal fade" id="tolaklulustuntutan{{ $lulus_tuntutan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                                Kakitangan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                                value="{{ $lulus_tuntutan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
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
@elseif(auth()->user()->role == 'ketua_bahagian')

<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div>
                {{-- Card tuntutan--}}
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                    <thead class="thead-light">

                                        <tr>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                            </div>

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
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->id}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->nama_pemohon}}
                                            </td>
                                            <td >   
                                                <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$sokong_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                            
                                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$sokong_tuntutan->jumlah_tuntutan}} "disabled >
                                            
                                                <input type="text" id="status" name="status" value="{{$sokong_tuntutan->status}}" disabled >
                                            </td>
                                     
                                            <td >
                                                    {{$sokong_tuntutan->pegawai_sokong}} <br>
                                            
                                                    {{$sokong_tuntutan->pegawai_lulus}}           
                                            </td>

                                            @if($sokong_tuntutan->sokong_tuntutan === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Perlu Semakan</span>
                                                </td>
                                                <td>
                                                    <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-primary btn-sm">Lihat</a>
                                                    <a href="/sokong_tuntutan/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-success btn-sm">Sokong</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                        Tolak
                                                    </button>
                                                </td>   
                                            @elseif($sokong_tuntutan->sokong_tuntutan === 1)

                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan disokong</span>
                                                    </td>  
                                                    @if($sokong_tuntutan->lulus_tuntutan === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span>
                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>

                                                        <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>

                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Kelulusan Ditolak Pegawai</span>
                                                    </td>
                                                    @endif

                                            @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                            </td>  
                                            <td>
                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>

                                            </td>
                                            @endif

                                        </tr>
                                        <!-- Modal tolak sokong tuntutan-->
                                        <div class="modal fade" id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                            value="{{ $sokong_tuntutan->id }}" name="id">

                                                                        <div class="input-group input-group-merge">
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
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">

                                            <tr>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div>

                                                <th> No</th>
                                                <th> Tuntutan ID</th>
                                                <th> Nama Pemohon</th>                                            
                                                <th> Jumlah Jam Tuntutan</th>
                                                <th> Pegawai Lulus / Sokong </th>
                                                <th> Status</th>
                                                <th> Tindakan</th>
                                            </tr>
                                        </thead>	
                                        
                                        <tbody class="list">
                                            @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                            <tr>            
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                                <td>
                                                    {{$lulus_tuntutan->id}}
                                                </td>
                                                <td>
                                                    {{$lulus_tuntutan->nama_pemohon}}
                                                </td>
                                                <td >   
                                                    <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$lulus_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$lulus_tuntutan->jumlah_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="status" name="status" value="{{$lulus_tuntutan->status}}" disabled >
                                                </td>
                                         
                                                <td >
                                                        {{$lulus_tuntutan->pegawai_sokong}} <br>
                                                
                                                        {{$lulus_tuntutan->pegawai_lulus}}           
                                                </td>
    
                                                @if ($lulus_tuntutan->sokong_tuntutan === null)
                                                    
                                                        @if($lulus_tuntutan->lulus_tuntutan === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai Sokong</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai Sokong</span>
                                                        </td>   
                                                        @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Tuntutan disokong</span>
                                                            </td>  
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>

                                                            </td>
                                                        @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                            </td>  
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>
                
                                                            </td>
                                                        @endif

                                                @elseif ($lulus_tuntutan->sokong_tuntutan === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success"> Tuntutan Disokong</span><br>
                                                </td>  
                                                <td>
                                                    @if($lulus_tuntutan->lulus_tuntutan === null)
                                                 
                                                        <a href="/tuntutans/{{$lulus_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>
                                                        <a href="/lulus_tuntutan/{{$lulus_tuntutan->id}}/"
                                                            class="btn btn-success btn-sm">Sokong</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#tolaksokongtuntutan{{ $lulus_tuntutan->id }}">
                                                            Tolak
                                                        </button>
                                                                    
                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                      
                                                        <span class="badge badge-pill badge-success">Lulus Tuntutan </span>                                           
                                                       
                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                      
                                                        <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                                   
                                                    @endif
                                                </td>
                                                @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                </td>  
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>
    
                                                </td>
                                                @endif

    
                                            </tr>

                                               <!-- Modal tolak sokong tuntutan-->
                                               <div class="modal fade" id="tolaklulustuntutan{{ $lulus_tuntutan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                                Kakitangan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                                value="{{ $lulus_tuntutan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
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
@elseif(auth()->user()->role =='ketua_jabatan')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div>
                {{-- Card tuntutan--}}
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
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
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                    <thead class="thead-light">

                                        <tr>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                            </div>

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
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->id}}
                                            </td>
                                            <td>
                                                {{$sokong_tuntutan->nama_pemohon}}
                                            </td>
                                            <td >   
                                                <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$sokong_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                            
                                                <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$sokong_tuntutan->jumlah_tuntutan}} "disabled >
                                            
                                                <input type="text" id="status" name="status" value="{{$sokong_tuntutan->status}}" disabled >
                                            </td>
                                     
                                            <td >
                                                    {{$sokong_tuntutan->pegawai_sokong}} <br>
                                            
                                                    {{$sokong_tuntutan->pegawai_lulus}}           
                                            </td>

                                            @if($sokong_tuntutan->sokong_tuntutan === null)
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Perlu Semakan</span>
                                                </td>
                                                <td>
                                                    <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-primary btn-sm">Lihat</a>
                                                    <a href="/sokong_tuntutan/{{$sokong_tuntutan->id}}/"
                                                        class="btn btn-success btn-sm">Sokong</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#tolaksokongtuntutan{{ $sokong_tuntutan->id }}">
                                                        Tolak
                                                    </button>
                                                </td>   
                                            @elseif($sokong_tuntutan->sokong_tuntutan === 1)

                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan disokong</span>
                                                    </td>  
                                                    @if($sokong_tuntutan->lulus_tuntutan === null)
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span>
                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 1)
                                                    <td>
                                                        <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span>

                                                        <a href="/tuntutans/{{$sokong_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>

                                                    </td>
                                                    @elseif($sokong_tuntutan->lulus_tuntutan === 0)
                                                    <td>
                                                        <span class="badge badge-pill badge-danger">Kelulusan Ditolak Pegawai</span>
                                                    </td>
                                                    @endif

                                            @elseif($sokong_tuntutan->sokong_tuntutan === 0)
                                            <td>
                                                <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                            </td>  
                                            <td>
                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>

                                            </td>
                                            @endif

                                        </tr>
                                        <!-- Modal tolak sokong tuntutan-->
                                        <div class="modal fade" id="tolaksokongtuntutan{{ $sokong_tuntutan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                            Kakitangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                            value="{{ $sokong_tuntutan->id }}" name="id">

                                                                        <div class="input-group input-group-merge">
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
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">

                                            <tr>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div>

                                                <th> No</th>
                                                <th> Tuntutan ID</th>
                                                <th> Nama Pemohon</th>                                            
                                                <th> Jumlah Jam Tuntutan</th>
                                                <th> Pegawai Lulus / Sokong </th>
                                                <th> Status</th>
                                                <th> Tindakan</th>
                                            </tr>
                                        </thead>	
                                        
                                        <tbody class="list">
                                            @foreach ($lulus_tuntutan as $lulus_tuntutan)
                                            <tr>            
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                                <td>
                                                    {{$lulus_tuntutan->id}}
                                                </td>
                                                <td>
                                                    {{$lulus_tuntutan->nama_pemohon}}
                                                </td>
                                                <td >   
                                                    <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="{{$lulus_tuntutan->jumlah_jam_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="{{$lulus_tuntutan->jumlah_tuntutan}} "disabled >
                                                
                                                    <input type="text" id="status" name="status" value="{{$lulus_tuntutan->status}}" disabled >
                                                </td>
                                         
                                                <td >
                                                        {{$lulus_tuntutan->pegawai_sokong}} <br>
                                                
                                                        {{$lulus_tuntutan->pegawai_lulus}}           
                                                </td>
    
                                                @if ($lulus_tuntutan->sokong_tuntutan === null)
                                                    
                                                        @if($lulus_tuntutan->lulus_tuntutan === null)
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai Sokong</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan Pegawai Sokong</span>
                                                        </td>   
                                                        @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">Tuntutan disokong</span>
                                                            </td>  
                                                            <td>
                                                                <span class="badge badge-pill badge-primary">Dalam Semakan</span>

                                                            </td>
                                                        @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                            </td>  
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>
                
                                                            </td>
                                                        @endif

                                                @elseif ($lulus_tuntutan->sokong_tuntutan === 1)
                                                <td>
                                                    <span class="badge badge-pill badge-success"> Tuntutan Disokong</span><br>
                                                </td>  
                                                <td>
                                                    @if($lulus_tuntutan->lulus_tuntutan === null)
                                                 
                                                        <a href="/tuntutans/{{$lulus_tuntutan->id}}/"
                                                            class="btn btn-primary btn-sm">Lihat</a>
                                                        <a href="/lulus_tuntutan/{{$lulus_tuntutan->id}}/"
                                                            class="btn btn-success btn-sm">Sokong</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#tolaksokongtuntutan{{ $lulus_tuntutan->id }}">
                                                            Tolak
                                                        </button>
                                                                    
                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 1)
                                                      
                                                        <span class="badge badge-pill badge-success">Lulus Tuntutan </span>                                           
                                                       
                                                    @elseif($lulus_tuntutan->lulus_tuntutan === 0)
                                                      
                                                        <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                                   
                                                    @endif
                                                </td>
                                                @elseif($lulus_tuntutan->sokong_tuntutan === 0)
                                                <td>
                                                    <span class="badge badge-pill badge-danger"> Tuntutan Ditolak</span>
                                                </td>  
                                                <td>
                                                    <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span>
    
                                                </td>
                                                @endif

    
                                            </tr>

                                               <!-- Modal tolak sokong tuntutan-->
                                               <div class="modal fade" id="tolaklulustuntutan{{ $lulus_tuntutan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Tuntutan
                                                                Kakitangan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                                value="{{ $lulus_tuntutan->id }}" name="id">

                                                                            <div class="input-group input-group-merge">
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
                                <h3 class="mb-0">Sokong Tuntutan Lebih 1/3 gaji</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive py-4">
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th> No</th>
                                            <th> Tarikh Mohon</th>
                                            <th> Waktu Kerja</th>
                                            <th> Perkara</th>
                                            <th> Status</th>
                                            <th> Waktu Mula Sebenar</th>
                                            <th> Waktu Akhir Sebenar</th>
                                            <th> Status</th>
                                            <th> Tindakan</th>
                                        </tr>
                                    </thead>
                                   
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
    {{-- Card tuntutan lebih sebulan gaji--}}
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
                            <div
                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
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
    {{-- Tuntutan lebih sebulan gaji--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Semak Tuntutan Lebih Sebulan Gaji</h3>
                </div>
                <!-- Light table -->
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                </table>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == 'kerani_semakan'or auth()->user()->role ==
'kerani_pemeriksa')

    <div class="container-fluid mt--6">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                aria-labelledby="tabs-icons-text-1-tab">
                <div>
                    {{-- Card tuntutan--}}
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
                    {{-- Tuntutan sebegai kakitangan--}}
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Hantar Tuntutan Elaun Lebih Masa {{Auth()->user()->name}}</h3> 
                                </div>
                
                                  <!-- Light table -->
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">

                                            <tr>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div>

                                                <th>No</th>
                                                {{-- <th> Tarikh Mohon Tuntutan</th> --}}
                                                <th> Waktu Mula Sebenar</th>
                                                <th> Waktu Akhir Sebenar</th>
                                                <th>Hari Biasa <br> Siang / Malam</th>
                                                {{-- <th>Hari Biasa <br> Malam </th> --}}
                                                <th>Hari Rehat <br> Siang / Malam</th>
                                                {{-- <th>Hari Rehat <br> Malam </th> --}}
                                                <th>Pelepasan AM <br> Siang / Malam</th>
                                                {{-- <th>Pelepasan AM <br> Malam </th> --}}

                                                <th> Jumlah Jam Tuntutan</th>
                                                <th> Sebab Lebih Masa</th>
                                        
                                                <th> Pegawai </th>
                                                <th> Tindakan</th>
                                            </tr>
                                        </thead>	
                                        <tfoot >
                                            <tr>
                                                <th></th>
                                                {{-- <th></th> --}}

                                                <th> </th>
                                                <th> </th>
                                                <th> <input value="" ></th>
                                                <th> <input value="" ></th>
                                                <th> <input value="" ></th>
                                                <th> <input value="" ></th>
                                                {{-- <th> <input value="" ></th>
                                                <th> <input value="" ></th>
                                                <th> <input value="" ></th> --}}
                                                <th></th>
                                                <th></th>
                                                <th></th>


                                            </tr>
                                        </tfoot>
                                        
                                        <tbody class="list">
                                            @foreach($tuntutan_k as $tuntutan_k)
                                            <tr>
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                            
                                                {{-- <td>
                                                    {{$tuntutan_k->created_by}}
                                                </td> --}}
                                                <form method="POST" action="/tuntutans/">
                                                    @csrf
                                                        <td >
                                                            <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$tuntutan_k->sebenar_mula_kerja}}">

                                                        </td>
                                                        <td >
                                                            <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$tuntutan_k->sebenar_akhir_kerja}}">
                                                        </td>
                                                        <td >
                                                            macam mana nak kira woi
                                                        </td>
                                                        <td >
                                                            macam mana nak kira woi

                                                        </td>
                                                        <td >
                                                            macam mana nak kira woi


                                                        </td>
                                                                                    
                                                        <td >   
                                                            <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="" required>

                                                            <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="" required>

                                                            <input type="text" id="status" name="status" value="" required>
                                                        </td>
                                                        <td>
                                                            {{$tuntutan_k->tujuan}}
                                                        </td>
                                                
                                                        <td >
                                                            {{-- <select name="pegawai_sokong_id" class="form-control">
                                                                <option hidden value="{{$tuntutan_k->pegawai_sokong_id}}" selected> --}}
                                                                    {{$tuntutan_k->pegawai_sokong}} <br>
                                                                {{-- </option>
                                                            
                                                            </select><br> --}}
                                                        
                                                            {{-- <select name="pegawai_lulus_id" class="form-control">
                                                                <option hidden value="{{$tuntutan_k->pegawai_lulus_id}}" selected> --}}
                                                                    {{$tuntutan_k->pegawai_lulus}} 
                                                                {{-- </option>
                                                            
                                                            </select>                                 --}}
                                                        </td>
                                                        <td>     
                                                            {{-- <button type="submit"
                                                            class="btn btn-primary btn-sm ">Hantar</button> --}}
                                                            <a href="">Kemaskini</button>

                                                        </td>   
                                                </form>
                                                    
                                            </tr>
                                        
                                            @endforeach

                                        </tbody>
                                        
                                    </table>
                
                            </div>
                        </div>
                    </div>
                    {{-- Tuntutan sebagai kakitangan diluluskan--}}
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Tuntutan diluluskan</h3>
                                </div>
                                <!-- Light table -->
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th> Tuntutan ID</th>
                                            <th> Waktu Mula Sebenar</th>
                                            <th> Waktu Akhir Sebenar</th>
                                            <th> Jumlah Jam Tuntutan</th>
                                            <th> Jumlah Tuntutan</th>
                                            <th> Status</th>
                                            <th> Status Dalaman</th>
                                            <th> Status Perbendaharaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tuntutan_lulus as $tuntutan_lulus)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td >
                                                {{$tuntutan_lulus->id}}
                                            </td>
                                            <td >
                                            {{$tuntutan_lulus->sebenar_mula_kerja_tuntutan}}
                                            </td>
                                            <td >
                                            {{$tuntutan_lulus->sebenar_akhir_kerja_tuntutan}}
                                            </td>
                                            <td >
                                                {{$tuntutan_lulus->jumlah_jam_tuntutan}}
                                            </td>
                                            <td >
                                                {{$tuntutan_lulus->jumlah_tuntutan}}
                                            </td>
                                            <td >
                                                {{$tuntutan_lulus->status}}
                                            </td>
                
                                                @if($tuntutan_lulus->sokong_tuntutan === null)
                                                    <td >
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
                
                                                        @if($tuntutan_lulus->lulus_tuntutan === null)
                
                                                            <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
                        
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                
                                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span><br><br>
                
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                
                                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span><br><br>
                                                        
                                                        @endif 
                
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                    </td>
                        
                                                @elseif($tuntutan_lulus->sokong_tuntutan === 1)
                
                                                    <td >
                                                        <span class="badge badge-pill badge-success">Tuntutan disokong</span><br><br>
                
                                                        @if($tuntutan_lulus->lulus_tuntutan === null)
                
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
                    
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                
                                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span><br><br>
                
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                
                                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span><br><br>
                                                        
                                                        @endif 
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                    </td>
                                                        
                                                @elseif($tuntutan_lulus->sokong_tuntutan === 0)
                
                                                    <td >
                                                        <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span><br><br>
                
                                                        @if($tuntutan_lulus->lulus_tuntutan === null)
                
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan</span><br><br>
                    
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 1)
                
                                                            <span class="badge badge-pill badge-success">Tuntutan Diluluskan</span><br><br>
                
                                                        @elseif($tuntutan_lulus->lulus_tuntutan === 0)
                
                                                            <span class="badge badge-pill badge-danger">Tuntutan Ditolak</span><br><br>
                                                        
                                                        @endif 
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">Dalam Semakan Kerani</span><br><br>
                                                    </td>
                                                
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
            <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div>
                     {{-- Card semakan tuntutan--}}
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
                </div>
                {{-- filter semakan tuntutan kakitangan--}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form>
                                <div class="row">
                                    <div class="col mb-4">
                                        <h4>Pilih Jabatan</h4>
                                        <input type="text" class="form-control" placeholder="Pilih Jabatan">
                                    </div>
                                    <div class="col mb-4">
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
                </div>
                    {{-- semakan tuntutan kakitangan--}}
                    @if(auth()->user()->role == 'kerani_semakan')
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Semak Tuntutan Elaun Lebih Masa </h3> 
                                    </div>
                    
                                    <!-- Light table -->
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">
                    
                                            <tr>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div>
                    
                                                <th>No</th>
                                                {{-- <th> Tarikh Mohon Tuntutan</th> --}}
                                                <th> Waktu Mula Sebenar</th>
                                                <th> Waktu Akhir Sebenar</th>
                                            
                                                <th>Mula Kerja</th>
                                                <th>Akhir Kerja</th>
                                                <th>Jumlah OT</th>
                                                <th>Status Datang</th>
                                                <th>Jumlah OT</th>
                                                <th>Waktu Anjal</th>
                    
                                                <th> Jumlah Jam Tuntutan</th>
                                                <th> Jumlah Tuntutan</th>
                                                <th> Jumlah</th>
                                                <th> Pegawai Sokong</th>
                                                <th> Pegawai Lulus</th>       
                                                <th> Tindakan</th>
                                            </tr>
                                        </thead>	
                                        <tfoot >
                                            <tr>
                                                <th></th>
                                                {{-- <th></th> --}}
                    
                                                <th> </th>
                                                <th> </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th> <input value="" ></th>
                                                <th><input value="" ></th>
                                                <th><input value="" ></th>
                    
                                                <th></th>
                                                <th></th>
                                                <th></th>
                    
                    
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody class="list">
                                            @foreach($semak_tuntutan as $semak_tuntutan)
                                            <tr>
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                            
                                                <td >
                                                {{$semak_tuntutan->sebenar_mula_kerja_tuntutan}}
            
                                                </td>
                                                <td >
                                                 {{$semak_tuntutan->sebenar_akhir_kerja_tuntutan}}
                                                </td>
                                                <td >
                                                <span class="badge badge-pill badge-primary">clockintime</span>   
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">clockouttime</span>
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">totalworkinghour</span>         
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">status</span> 
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">Jumlah OT</span>         
                                                </td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">Waktu Anjal</span> 
                                                </td>
            
                                                <td >   
                                                    <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="" required>
                                                </td>
                                                <td >
                                                    <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="" required>
                                                </td>
                                                <td >
                                                    <input type="text" id="status" name="status" value=""required>
                                                </td>
                                                <td >
                                                 {{$semak_tuntutan->pegawai_sokong}}
                                                </td>
                                                <td >
                                             
                                                    {{$semak_tuntutan->pegawai_lulus}} 
                                                </td>
                                                <td>     
                                                    <button type="submit"
                                                    class="btn btn-primary btn-sm ">Hantar</button>
            
                                                </td>   
                                      
                                                    
                                            </tr>
                                        
                                            @endforeach
                    
                                        </tbody>
                                        
                                    </table>
                    
                                </div>
                            </div>
                        </div>
                    {{-- periksa tuntutan kakitangan--}}
                    @elseif(auth()->user()->role == 'kerani_pemeriksa')
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Periksa Tuntutan Elaun Lebih Masa </h3> 
                                    </div>
                    
                                    <!-- Light table -->
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="overflow-x:scroll; width:100%">
                                        <thead class="thead-light">
                    
                                            <tr>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                                                </div>
                    
                                                <th>No</th>
                                                {{-- <th> Tarikh Mohon Tuntutan</th> --}}
                                                <th> Waktu Mula Sebenar</th>
                                                <th> Waktu Akhir Sebenar</th>
                                            
                                                <th>Mula Kerja</th>
                                                <th>Akhir Kerja</th>
                                                <th>Jumlah OT</th>
                                                <th>Status Datang</th>
                                                <th>Jumlah OT</th>
                                                <th>Waktu Anjal</th>
                    
                                                <th> Jumlah Jam Tuntutan</th>
                                                <th> Jumlah Tuntutan</th>
                                                <th> Jumlah</th>
                                                <th> Pegawai Sokong</th>
                                                <th> Pegawai Lulus</th>       
                                                <th> Tindakan</th>
                                            </tr>
                                        </thead>	
                                        <tfoot >
                                            <tr>
                                                <th></th>
                                                {{-- <th></th> --}}
                    
                                                <th> </th>
                                                <th> </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th> <input value="" ></th>
                                                <th><input value="" ></th>
                                                <th><input value="" ></th>
                    
                                                <th></th>
                                                <th></th>
                                                <th></th>
                    
                    
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody class="list">
                                            @foreach($tuntutan_k as $tuntutan_k)
                                            <tr>
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                            
                                                {{-- <td>
                                                    {{$tuntutan_k->created_by}}
                                                </td> --}}
                                                <form method="POST" action="/tuntutans/">
                                                    @csrf
                                                        <td >
                                                            <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$tuntutan_k->sebenar_mula_kerja}}">
                    
                                                        </td>
                                                        <td >
                                                            <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$tuntutan_k->sebenar_akhir_kerja}}">
                                                        </td>
                                                        <td >
                                                        <span class="badge badge-pill badge-primary">clockintime</span>   
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-primary">clockouttime</span>
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-primary">totalworkinghour</span>         
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-primary">status</span> 
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-primary">Jumlah OT</span>         
                                                        </td>
                                                        <td >
                                                            <span class="badge badge-pill badge-primary">Waktu Anjal</span> 
                                                        </td>
                    
                                                        <td >   
                                                            <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="" required>
                                                        </td>
                                                        <td >
                                                            <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="" required>
                                                        </td>
                                                        <td >
                                                            <input type="text" id="status" name="status" value=""required>
                                                        </td>
                                                        <td >
                                                            <select name="pegawai_sokong_id" class="form-control">
                                                                <option hidden value="{{$tuntutan_k->pegawai_sokong_id}}" selected>{{$tuntutan_k->pegawai_sokong}} </option>
                                                            
                                                            </select>
                                                        </td>
                                                        <td >
                                                            <select name="pegawai_lulus_id" class="form-control">
                                                                <option hidden value="{{$tuntutan_k->pegawai_lulus_id}}" selected>{{$tuntutan_k->pegawai_lulus}} </option>
                                                            
                                                            </select>                                
                                                        </td>
                                                        <td>     
                                                            <button type="submit"
                                                            class="btn btn-primary btn-sm ">Hantar</button>
                    
                                                        </td>   
                                                </form>
                                                    
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
    {{-- Card stats pelulus pindaan --}}
    <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN PINDAAN
                      </h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
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
                      <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN PINDAAN DILULUSKAN
                      </h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
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
                      <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PERMOHONAN PINDAAN DITOLAK
                      </h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    {{-- Permohonan pindaan tuntutan--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Kelulusan Kemaskini Pindaan Tuntutan</h3>
                </div>
                <!-- Light table -->
                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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