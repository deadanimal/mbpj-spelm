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
                    <h3 class="mb-0">Hantar Tuntutan Elaun Lebih Masa</h3>
                </div>

                <!-- Light table -->
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead class="thead-light">

                        <tr>
                            <th>No</th>
                            <th> Nama Pemohon</th>
                            <th> Tarikh Mohon Tuntutan</th>
                            <th> Waktu Mula Sebenar</th>
                            <th> Waktu Akhir Sebenar</th>
                           
                            <th> Ekedatangan</th>
                            <th> Ekedatangan</th>
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
                            <th></th>
                            <th></th>

                            <th> <input value="" ></th>
                            <th> <input value="" ></th>
                            <th></th>
                            <th></th>
                            <th> <input value="" ></th>
                            <th><input value="" ></th>

                            {{-- <th><input value="{{$tuntutan->jumlah_tuntutan}}"></th> --}}
                            <th><input value="" ></th>

                            <th></th>
                            <th></th>
                            <th>
                                <button type="submit" class="btn btn-primary ">Hantar</button>

                            </th>



                        </tr>
                    </tfoot>
                    
                    <tbody class="list">
                        @foreach($tuntutan_k as $tuntutan_k)
                        <tr>
                            <td>
                                {{$loop->index+1}}
                            </td>
                            <td>
                                {{Auth()->user()->name}}
                            </td>
                            <td>
                                {{$tuntutan_k->created_by}}
                            </td>
                            <form method="POST" action="/tuntutans/">
                                @csrf
                                    <td >
                                        <input type="text" id="sebenar_mula_kerja_tuntutan" name="sebenar_mula_kerja_tuntutan" value="{{$tuntutan_k->sebenar_mula_kerja}}">

                                    </td>
                                    <td >
                                        <input type="text" id="sebenar_akhir_kerja_tuntutan" name="sebenar_akhir_kerja_tuntutan" value="{{$tuntutan_k->sebenar_akhir_kerja}}">
                                    </td>
                            
                                    <td >   
                                        <span class="badge badge-pill badge-danger"> Integration </span><br><br>

                                    </td>
                                    <td >
                                        <span class="badge bagde-pill badge-danger"> Integration</span>
                                    </td>

                                    <td >   
                                        <input type="text" id="jumlah_jam_tuntutan" name="jumlah_jam_tuntutan" value="">

                                    </td>
                                    <td >
                                        <input type="text" id="jumlah_tuntutan" name="jumlah_tuntutan" value="">
                                    </td>
                                    <td >
                                        <input type="text" id="status" name="status" value="">
                                    </td>
                                    <td >
                                        <select name="pegawai_sokong_id" class="form-control">
                                            <option hidden value="{{$tuntutan_k->pegawai_sokong_id}}" selected>{{$tuntutan_k->pegawai_sokong_id}} </option>
                                         
                                        </select>
                                    </td>
                                    <td >
                                        <select name="pegawai_lulus_id" class="form-control">
                                            <option hidden value="{{$tuntutan_k->pegawai_lulus_id}}" selected>{{$tuntutan_k->pegawai_lulus_id}} </option>
                                         
                                        </select>                                
                                     </td>


                                    <td>
                                     
                                        {{-- <button type="submit"
                                        class="btn btn-primary btn-sm ">Hantar</button> --}}

                                    </td>   

                           

                            </form>
                                
                        </tr>
                       
                        @endforeach

                    </tbody>
                    
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
                    <h3 class="mb-0">Tuntutan diluluskan</h3>
                </div>
                <!-- Light table -->
                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th> Nama Pemohon</th>
                            <th> Tarikh Mohon</th>
                            <th> Waktu Kerja</th>
                            <th> Ekedatangan</th>
                            <th> Ekedatangan</th>
                            <th> Jumlah Jam Tuntutan</th>
                            <th> Jumlah Tuntutan</th>
                            <th> Status</th>
                            <th> Waktu Mula Sebenar</th>
                            <th> Waktu Akhir Sebenar</th>
                            <th> Status</th>
                            <th> Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        {{-- @foreach($tuntutan_k as $permohonan)
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
                                1
                            </td>
                            <td >
                                2
                            </td>
                            <td >
                                {{$permohonan->sebenar_mula_kerja}}

                            </td>
                            <td >
                                {{$permohonan->sebenar_akhir_kerja}}

                            </td>
                            <td style="background-color:#dcdcdc">
                            </td>   
                            <td>
                            </td>
                          
                               
                        </tr>
                       
                        @endforeach --}}

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
                                <h3 class="mb-0">Tuntutan </h3>
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
                                    <th> Waktu Mula Sebenar</th>
                                    <th> Waktu Akhir Sebenar</th>
                                    <th> Status</th>
                                    <th> Tindakan</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($tuntutan_k as $permohonan)
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
                                        1
                                    </td>
                                    <td >
                                        2
                                    </td>
                                    <td >
                                        {{$permohonan->sebenar_mula_kerja}}

                                    </td>
                                    <td >
                                        {{$permohonan->sebenar_akhir_kerja}}

                                    </td>
                                    <td style="background-color:#dcdcdc">
                                    </td>   
                                    <td>
                                    </td>
                                  
                                        
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
                                <h3 class="mb-0">Tuntutan Yang diluluskan </h3>
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
                                    <th> Waktu Mula Sebenar</th>
                                    <th> Waktu Akhir Sebenar</th>
                                    <th> Status</th>
                                    <th> Tindakan</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($tuntutan_k as $permohonan)
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
                                        1
                                    </td>
                                    <td >
                                        2
                                    </td>
                                    <td >
                                        {{$permohonan->sebenar_mula_kerja}}

                                    </td>
                                    <td >
                                        {{$permohonan->sebenar_akhir_kerja}}

                                    </td>
                                    <td style="background-color:#dcdcdc">
                                    </td>   
                                    <td>
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
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th> Tarikh Mohon</th>
                                            <th> Waktu Kerja</th>
                                            <th> Perkara</th>
                                            <th> Status</th>
                                            <th> Jenis Permohonan</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>
                                        </tr>
                                    </thead>
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
                                <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th> Tarikh Mohon</th>
                                            <th> Waktu Kerja</th>
                                            <th> Perkara</th>
                                            <th> Status</th>
                                            <th> Jenis Permohonan</th>
                                            <!-- eKedatangan -->
                                            <th>clockintime</th>
                                            <th>clockouttime</th>
                                            <th>totalworkinghour</th>
                                            <th>otstarttime1</th>
                                            <th>otendtime1</th>
                                            <th>otdurationt1</th>
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
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
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
                                    <tbody class="list">
                                        @foreach($sokong_tuntutan as $tuntutan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td class="tarikh">
        
                                                {{$tuntutan->jumlah_jam_tuntutan}}
                                            </td>
                                            <td class="waktu">
                                                {{$tuntutan->jumlah_tuntutan}}
                                            </td>
                                            <td >   
                                                1
                                            </td>
                                            <td >
                                                2
                                            </td>
                                            <td >
                                                {{$tuntutan->sebenar_mula_kerja}}
        
                                            </td>
                                            <td >
                                                {{$tuntutan->sebenar_akhir_kerja}}
        
                                            </td>
                                            <td style="background-color:#dcdcdc">
                                            </td>   
                                            <td>
                                            </td>
                                          
                                                
                                        </tr>
                                        
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
                                <h3 class="mb-0">Lulus Tuntutan hh</h3>
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
                                    <tbody class="list">
                                        @foreach($sokong_tuntutan as $tuntutan)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>
        
                                                {{$tuntutan->jumlah_jam_tuntutan}}
                                            </td>
                                            <td>
                                                {{$tuntutan->jumlah_tuntutan}}
                                            </td>
                                            <td >   
                                                1
                                            </td>
                                            <td >
                                                2
                                            </td>
                                            <td >
        
                                            </td>
                                            <td >
        
                                            </td>
                                            <td style="background-color:#dcdcdc">
                                            </td>   
                                            <td>
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
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
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
                                    <tbody class="list">
                                        @foreach($sokong_tuntutan as $permohonan)
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
                                                1
                                            </td>
                                            <td >
                                                2
                                            </td>
                                            <td >
                                                {{$permohonan->sebenar_mula_kerja}}
        
                                            </td>
                                            <td >
                                                {{$permohonan->sebenar_akhir_kerja}}
        
                                            </td>
                                            <td style="background-color:#dcdcdc">
                                            </td>   
                                            <td>
                                            </td>
                                          
                                                
                                        </tr>
                                        
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
                                <h3 class="mb-0">Lulus Tuntutan</h3>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Semak Tuntutan</h3>
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

@endsection