@extends('base')

@section('content')

@if (session('status_tuntutan'))
    {{session('status_tuntutan')}}
@endif

<div class="header bg-default pb-6">
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
                <a href="/tuntutans" class="btn btn-secondary btn-sm float-right">Kembali</a>
                </li>
            </ul>
        </div>
        @elseif(auth()->user()->role == 'penyelia' or auth()->user()->role == 'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              
                <li class="nav-item">
                    <a href="/tuntutans" class="btn btn-secondary btn-sm float-right">Kembali</a>
                </li>
                <a href="/laporan_tuntutan/{{$tuntutan->id}}" class="btn btn-secondary btn-sm float-right">Jana Laporan</a>


            </ul>
        </div>
        @elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan' )
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              
                <li class="nav-item">
                    <a href="/tuntutans" class="btn btn-secondary btn-sm float-right">Kembali</a>
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
                        <h3 class="mb-0">Makluman Kakitangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama</label>
                                    <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$user->name}}"  disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                    <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$user->user_code}}"  disabled>
                                  </div>
                                </div>
                              </div>  
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">pegawai_lulus</label>
                                  <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$pegawai_lulus}}"  disabled>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-email">pegawai_sokong </label>
                                  <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$pegawai_sokong}}"  disabled>
                                </div>
                              </div>
                            </div>  
                        </div>  
                        </form>
                        {{-- @endforeach      --}}
                    </div>
                </div>
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
                                <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                              
                            </tr>
                        </thead>
                     
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                              
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}<br><br>
                             
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                            
                                <td >  
                                    <input value="{{$permohonan_ygdituntut["jumlah_biasa_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_biasa_malam"]}}" style="width: 70px;" disabled><br><br>
                                </td>
                                <td >
                                    <input value="{{$permohonan_ygdituntut["jumlah_rehat_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_rehat_malam"]}}" style="width: 70px;" disabled><br><br>
                                
                                </td>
                                <td >
                                    <input value="{{$permohonan_ygdituntut["jumlah_am_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_am_malam"]}}" style="width: 70px;" disabled><br><br>  
                                </td>
                           
                            </tr>
                            @endforeach
                        </tbody> 
                        <tfoot >
                            <tr>
                                <td></td>
                                <td></td>
                         
                                <td id="jumlah_jam_biasa">Jumlah:{{$jumlah_jam_keseluruhan_show_biasa}} </td>
                                <td id="jumlah_jam_rehat">Jumlah:{{$jumlah_jam_keseluruhan_show_rehat}}</td>
                                <td id="jumlah_jam_am">Jumlah:{{$jumlah_jam_keseluruhan_show_am}} </td>
                             
    
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
                        <h3 class="mb-0">Makluman Kakitangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama</label>
                                    <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$user->name}}"  disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                    <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$user->user_code}}"  disabled>
                                  </div>
                                </div>
                              </div>  
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">pegawai_lulus</label>
                                  <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$pegawai_lulus}}"  disabled>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-email">pegawai_sokong </label>
                                  <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$pegawai_sokong}}"  disabled>
                                </div>
                              </div>
                            </div>  
                        </div>  
                        </form>
                        {{-- @endforeach      --}}
                    </div>
                </div>
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
                                <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                              
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}<br><br>
                             
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                                <td >  
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_malam"]}}" style="width: 70px;" disabled><br><br>
                                </td>
                                <td >
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_malam"]}}" style="width: 70px;" disabled><br><br>
                                
                                </td>
                                <td >
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_malam"]}}" style="width: 70px;" disabled><br><br>  
                                </td>
                           
                            </tr>
                            @endforeach
                        </tbody> 
                        <tfoot >
                            <tr>
                                <td></td>
                                <td></td>
                         
                                <td id="jumlah_jam_biasa">Jumlah:{{$jumlah_jam_keseluruhan_show_biasa}} </td>
                                <td id="jumlah_jam_rehat">Jumlah:{{$jumlah_jam_keseluruhan_show_rehat}}</td>
                                <td id="jumlah_jam_am">Jumlah:{{$jumlah_jam_keseluruhan_show_am}} </td>
                             
    
                            </tr>
                        </tfoot>     
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
@elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Makluman Kakitangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama</label>
                                    <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$user->name}}"  disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                    <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$user->user_code}}"  disabled>
                                  </div>
                                </div>
                              </div>  
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">pegawai_lulus</label>
                                  <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$pegawai_lulus}}"  disabled>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-email">pegawai_sokong </label>
                                  <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$pegawai_sokong}}"  disabled>
                                </div>
                              </div>
                            </div>  
                        </div>  
                        </form>
                        {{-- @endforeach      --}}
                    </div>
                </div>
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
                                <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                <th> Hari Biasa <br> Siang / Malam</th>
                                <th> Hari Rehat <br> Siang / Malam</th>
                                <th> Pelepasan AM <br> Siang / Malam</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                              
                                <td >
                                    {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}<br><br>
                             
                                    {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                </td>
                                <td >  
                                    <input value="{{$permohonan_ygdituntut["jumlah_biasa_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_biasa_malam"]}}" style="width: 70px;" disabled><br><br>
                                </td>
                                <td >
                                    <input value="{{$permohonan_ygdituntut["jumlah_rehat_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_rehat_malam"]}}" style="width: 70px;" disabled><br><br>
                                
                                </td>
                                <td >
                                    <input value="{{$permohonan_ygdituntut["jumlah_am_siang"]}}" style="width: 70px;" disabled><br><br>
                                    <input value="{{$permohonan_ygdituntut["jumlah_am_malam"]}}" style="width: 70px;" disabled><br><br>  
                                </td>
                           
                            </tr>
                            @endforeach
                        </tbody> 
                        <tfoot >
                            <tr>
                                <td></td>
                                <td></td>
                         
                                <td id="jumlah_jam_biasa">Jumlah:{{$jumlah_jam_keseluruhan_show_biasa}} </td>
                                <td id="jumlah_jam_rehat">Jumlah:{{$jumlah_jam_keseluruhan_show_rehat}}</td>
                                <td id="jumlah_jam_am">Jumlah:{{$jumlah_jam_keseluruhan_show_am}} </td>
                             
    
                            </tr>
                        </tfoot>  
                   
                    </table>
                </div>
            </div>
        </div>
   
    </div>
</div>
@elseif(auth()->user()->role == 'kerani_pemeriksa')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Makluman Kakitangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama</label>
                                    <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$user->name}}"  disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                    <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$user->user_code}}"  disabled>
                                  </div>
                                </div>
                              </div>  
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">pegawai_lulus</label>
                                  <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$pegawai_lulus}}"  disabled>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-email">pegawai_sokong </label>
                                  <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$pegawai_sokong}}"  disabled>
                                </div>
                              </div>
                            </div>  
                        </div>  
                        </form>
                        {{-- @endforeach      --}}
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-3">

                    <div class="col-md-12  ">
                        <div class="row float-right mb-2">
                            <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#hantarperiksa">
                                Hantar Untuk Semakan
                            </button>              
                       
                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#mohon_kemaskini">
                                Mohon Kemaskini
                            </button> 
                        </div>
                    </div>
                </div>
                <!-- hantar periksa ke kerani semakan-->
                <div class="modal fade" id="hantarperiksa">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Makluman</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-red text-center" >
                                Sila pastikan tuntutan DIPERIKSA dan DITANDA .<br><br>  Anda bersetuju dengan tuntutan berikut dihantar ke kerani semakan ?
                            </div>
                               
                            <form method="POST" action="/periksa_tuntutan/{{$tuntutan->id}}/">
                            @csrf
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm "data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary btn-sm ">Hantar</button> 
                            </form>
                            </div>
                                    
                           
                        </div>
                    </div>
                </div>
                <!-- Mohon Kemaskini-->
                <div class="modal fade" id="mohon_kemaskini">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Mohon Kemaskini </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <form method="POST" action="/mohon_kemaskini/{{$tuntutan->id}}">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            
                                                <input type="hidden" value="" name="id">

                                                <div class="input-group input-group-merge">
                                                    <input class="form-control"
                                                        name="mohon_kemaskini1_sebab"
                                                        placeholder="Sebab Mohon Kemaskini" type="text">

                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary btn-sm "
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit"
                                            class="btn btn-success btn-sm float-right ">Hantar</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-12">
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
                                        <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                        <th> Hari Biasa <br> Siang / Malam</th>
                                        <th> Hari Rehat <br> Siang / Malam</th>
                                        <th> Pelepasan AM <br> Siang / Malam</th>
                                        <th> Tindakan <br>Periksa  </th> 
                                        {{-- <th> Tindakan <br>Semakan  <input type="checkbox"></th> --}}
                                        {{-- <th> Tindakan</th> --}}

                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                                    <tr>
                                       
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                    
                                        <td >
                                            {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}<br><br>
                                    
                                            {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                        </td>   
                                        <td >  
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_malam"]}}" style="width: 70px;"><br><br>
                                        </td>
                                        <td >
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_malam"]}}" style="width: 70px;"><br><br>
                                        
                                        </td>
                                        <td >
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_malam"]}}" style="width: 70px;"><br><br>  
                                        </td>
                                        <td>
                                            @if($permohonan_ygdituntut->tindakan_periksa == 1)

                                            <input type="checkbox" checked ="true" onchange="kemaskinitindakanperiksa({{$permohonan_ygdituntut->id}}, this)" value={{$permohonan_ygdituntut->tindakan_periksa}}>

                                            @elseif($permohonan_ygdituntut->tindakan_periksa == 0)

                                            <input type="checkbox" check ="false" onchange="kemaskinitindakanperiksa({{$permohonan_ygdituntut->id}}, this)" value={{$permohonan_ygdituntut->tindakan_periksa}}>

                                            @endif
                                            
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot >
                                    <tr>
                                        <td></td>
                                        <td></td>    
                                        <td id="jumlah_jam_biasa">Jumlah:{{$jumlah_jam_keseluruhan_show_biasa}} </td>
                                        <td id="jumlah_jam_rehat">Jumlah:{{$jumlah_jam_keseluruhan_show_rehat}}</td>
                                        <td id="jumlah_jam_am">Jumlah:{{$jumlah_jam_keseluruhan_show_am}} </td>
                                        <td id ="jumlah_jam_keseluruhan">Jumlah Jam :</td> 
                                    </tr>
                                </tfoot>
                            
                                
                            </table>
                        </div>
                      </div>
                </div>
              
                <div class="row">       
                    <div class="col-12">        
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Kiraan</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body bg-secondary">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- <h5 class="card-title text-uppercase text-muted mb-0">INFO KIRAAN
                                                    </h5><br> --}}
                                                    <h5 class="card-title text-uppercase text-muted mb-0 text-center">
                                                        Gaji Kakitangan = {{$oraclegaji}}<br><br>
                                                        Kadar Bayaran Sejam = {{$oraclegaji}} x 12 / (313 X 8 )<br>
                                                    </h5>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body bg-secondary">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="card-title text-uppercase text-muted mb-0 text-center"> {{$kiraangaji}} / 2504</h4>
                                                    <h5 class="card-title text-uppercase text-muted mb-0 text-center"> Kadar Sejam =
                                                    <span class="h3 font-weight-bold mb-0"> {{$kiraangajijam}}
                                                    </span>
                                                </div>
                                              
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Light table -->
                            <table id="tablecalculate" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th> Lebih Masa</th>
                                        <th> Kadar</th>
                                        <th> Jumlah Jam</th>
                                        <th> Pengiraan</th>
                                        <th> Persamaan Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                        <td>
                                            Hari Biasa Siang
                                            <hr>
                                            Hari Biasa Malam
                                            <hr>
                                            Hari Rehat Siang
                                            <hr>
                                            Hari Rehat Malam
                                            <hr>
                                            Hari Pelepasan Am Siang
                                            <hr>
                                            Hari Pelepasan Am Malam
                                        </td>
                                        <td>
                                            1 1/8
                                            <hr>
                                            1 1/4
                                            <hr>
                                            1 1/4
                                            <hr>
                                            1 1/2
                                            <hr>
                                            1 3/4
                                            <hr>
                                             2
                                        </td>
                                        <td>
                                            {{$biasa_siang_total}} 
                                            <hr>
                                            {{$biasa_malam_total}} 
                                            <hr>
                                            {{$rehat_siang_total}} 
                                            <hr>
                                            {{$rehat_malam_total}} 
                                            <hr>
                                            {{$am_siang_total}} 
                                            <hr>
                                            {{$am_malam_total}}

                                        </td>
                                         <td>
                                            1.125 x {{$biasa_siang_total}} JAM
                                            <hr>
                                            1.250 x {{$biasa_malam_total}} JAM
                                            <hr>
                                            1.250 x {{$rehat_siang_total}} JAM
                                            <hr>
                                            1.500 x {{$rehat_malam_total}}  JAM
                                            <hr>
                                            1.750 x {{$am_siang_total}}  JAM
                                            <hr>
                                            2.000 x  {{$am_malam_total}} JAM
                                        </td>
                                         <td>
                                             {{$pj_biasa_siang}} JAM
                                            <hr>
                                              {{$pj_biasa_malam}} JAM
                                            <hr>
                                              {{$pj_rehat_siang}} JAM
                                            <hr>
                                              {{$pj_rehat_malam}} JAM
                                            <hr>
                                              {{$pj_am_siang}} JAM
                                            <hr>
                                              {{$pj_am_malam}} JAM
                                            <hr>
                                        </td> 
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>JUMLAH : {{$jumlah_jam_kiraan}}</td>
                                        <td>JUMLAH JAM DIPEROLEHI</td>
                                        <td>JUMLAH : {{$jumlah_jam_persamaan}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>JUMLAH RM  : {{$JumlahRM}}</td>
                                    </tr>
                                </tfoot>
                              
        
                            </table>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == 'kerani_semakan')
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Makluman Kakitangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama</label>
                                    <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$user->name}}"  disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                    <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$user->user_code}}"  disabled>
                                  </div>
                                </div>
                              </div>  
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">pegawai_lulus</label>
                                  <input type="text" id="input-username" class="form-control form-control-sm" placeholder="{{$pegawai_lulus}}"  disabled>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-email">pegawai_sokong </label>
                                  <input type="email" id="input-email" class="form-control form-control-sm" placeholder="{{$pegawai_sokong}}"  disabled>
                                </div>
                              </div>
                            </div>  
                        </div>  
                        </form>
                        {{-- @endforeach      --}}
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 mb-3 ">
                        <div class="col-md-12  ">
                            <div class="row float-right mb-2">
                            <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#hantarsemak">
                                 Muktamad Semakan
                            </button> 

                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#mohon_kemaskini2">
                                Mohon Kemaskini
                            </button> 
                            </div>
                        </div>
                    </div>
                    <!-- Hantar Semakan-->
                    <div class="modal fade" id="hantarsemak">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white">Makluman </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-red text-center" >
                                    Sila pastikan tuntutan DISEMAK dan DITANDA .<br><br>  Anda bersetuju dengan tuntutan berikut ?
                                </div>
                                    <form method="POST" action="/semak_tuntutan/{{$tuntutan->id}}/">
                                        @csrf

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm "data-dismiss="modal">Tutup</button>

                                            <button type="submit" class="btn btn-primary btn-sm ">Hantar</button>
                                        </div>
                                    </form>
                                     
                                
                            </div>
                        </div>
                    </div>
                    <!-- Mohan Kemaskini-->
                    <div class="modal fade" id="mohon_kemaskini2">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white">Mohon Kemaskini </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form method="POST" action="/mohon_kemaskini2/{{$tuntutan->id}}">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                
                                                    <input type="hidden" value="" name="id">
    
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control"
                                                            name="mohon_kemaskini2_sebab"
                                                            placeholder="Sebab Mohon Kemaskini" type="text">
    
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary btn-sm "
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit"
                                                class="btn btn-success btn-sm float-right ">Hantar</button>
    
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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
                                        <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                        <th> Hari Biasa <br> Siang / Malam</th>
                                        <th> Hari Rehat <br> Siang / Malam</th>
                                        <th> Pelepasan AM <br> Siang / Malam</th>
                                        <th> Tindakan <br>Periksa </th> 
                                        <th> Tindakan <br>Semakan  <input type="checkbox"></th>
                                        {{-- <th> Tindakan</th> --}}

                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach($permohonan_ygdituntut as $permohonan_ygdituntut)

                                    <tr>
                                       
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                    
                                        <td >
                                            {{$permohonan_ygdituntut["sebenar_mula_kerja"]}}<br><br>
                                    
                                            {{$permohonan_ygdituntut["sebenar_akhir_kerja"]}}
                                        </td>   
                                        <td >  
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_biasa_malam"]}}" style="width: 70px;"><br><br>
                                        </td>
                                        <td >
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_rehat_malam"]}}" style="width: 70px;"><br><br>
                                        
                                        </td>
                                        <td >
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_siang"]}}" style="width: 70px;"><br><br>
                                            <input class="text-center" type="text" value="{{$permohonan_ygdituntut["jumlah_am_malam"]}}" style="width: 70px;"><br><br>  
                                        </td>
                                        <td>
                                            @if($permohonan_ygdituntut->tindakan_periksa == 1)

                                            <input type="checkbox" checked ="true" >

                                            @elseif($permohonan_ygdituntut->tindakan_periksa == 0)

                                            <input type="checkbox" check ="false"  >

                                            @endif

                                        </td>
                                        <td>
                                            @if($permohonan_ygdituntut->tindakan_semakan == 1)

                                            <input type="checkbox" checked ="true" onchange="kemaskinitindakansemakan({{$permohonan_ygdituntut->id}}, this)" value={{$permohonan_ygdituntut->tindakan_semakan}}>

                                            @elseif($permohonan_ygdituntut->tindakan_semakan == 0)

                                            <input type="checkbox" check ="false" onchange="kemaskinitindakansemakan({{$permohonan_ygdituntut->id}}, this)" value={{$permohonan_ygdituntut->tindakan_semakan}}>

                                            @endif

                                        </td>
                                      
                                        {{-- <td >
                                            <a href="" class="btn btn-primary btn-sm "> Mohon Kemaskini</a><br>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot >
                                    <tr>
                                        <td></td>
                                        <td></td>
                                 
                                        <td >Jumlah:{{$jumlah_jam_keseluruhan_show_biasa}} </td>
                                        <td >Jumlah:{{$jumlah_jam_keseluruhan_show_rehat}}</td>
                                        <td >Jumlah:{{$jumlah_jam_keseluruhan_show_am}} </td>
                                        <td >Jumlah Jam :</td>
                                        <td ></td>

                                     
            
                                    </tr>
                                </tfoot>
                            
                                
                            </table>
                        </div>
                      </div>
                    
                </div>
                {{-- <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Kiraan Gaji Kakitangan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="tablecalculate" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Info</th>
                                <th>Kiraan</th>

                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Gaji Kakitangan = {{$oraclegaji}}<br><br>
                                    Kadar Bayaran Sejam = {{$oraclegaji}} x 12 / (313 X 8 )<br><br>
                                                        = {{$kiraangaji}} / 2504

                                </td>
                                <td>
                                    Kadar Sejam = {{$kiraangajijam}}
                                </td>
                            </tr>
                        </tbody>
                    
                        
                    </table>
                </div>  --}}
                <div class="card"> 
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Kiraan</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">INFO KIRAAN
                                            </h5><br> --}}
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-center">
                                                Gaji Kakitangan = {{$oraclegaji}}<br><br>
                                                Kadar Bayaran Sejam = {{$oraclegaji}} x 12 / (313 X 8 )<br>
                                            </h5>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title text-uppercase text-muted mb-0 text-center"> {{$kiraangaji}} / 2504</h4>
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-center"> Kadar Sejam =
                                            <span class="h3 font-weight-bold mb-0"> {{$kiraangajijam}}
                                            </span>
                                        </div>
                                      
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <table id="tablecalculate" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th> Lebih Masa</th>
                                <th> Kadar</th>
                                <th> Jumlah Jam</th>
                                <th> Pengiraan</th>
                                <th> Persamaan Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>
                                    Hari Biasa Siang
                                    <hr>
                                    Hari Biasa Malam
                                    <hr>
                                    Hari Rehat Siang
                                    <hr>
                                    Hari Rehat Malam
                                    <hr>
                                    Hari Pelepasan Am Siang
                                    <hr>
                                    Hari Pelepasan Am Malam
                                </td>
                                <td>
                                    1 1/8
                                    <hr>
                                    1 1/4
                                    <hr>
                                    1 1/4
                                    <hr>
                                    1 1/2
                                    <hr>
                                    1 3/4
                                    <hr>
                                        2
                                </td>
                                <td>
                                    {{$biasa_siang_total}} 
                                    <hr>
                                    {{$biasa_malam_total}} 
                                    <hr>
                                    {{$rehat_siang_total}} 
                                    <hr>
                                    {{$rehat_malam_total}} 
                                    <hr>
                                    {{$am_siang_total}} 
                                    <hr>
                                    {{$am_malam_total}}

                                </td>
                                    <td>
                                    1.125 x {{$biasa_siang_total}} JAM
                                    <hr>
                                    1.250 x {{$biasa_malam_total}} JAM
                                    <hr>
                                    1.250 x {{$rehat_siang_total}} JAM
                                    <hr>
                                    1.500 x {{$rehat_malam_total}}  JAM
                                    <hr>
                                    1.750 x {{$am_siang_total}}  JAM
                                    <hr>
                                    2.000 x  {{$am_malam_total}} JAM
                                </td>
                                    <td>
                                        {{$pj_biasa_siang}} JAM
                                    <hr>
                                        {{$pj_biasa_malam}} JAM
                                    <hr>
                                        {{$pj_rehat_siang}} JAM
                                    <hr>
                                        {{$pj_rehat_malam}} JAM
                                    <hr>
                                        {{$pj_am_siang}} JAM
                                    <hr>
                                        {{$pj_am_malam}} JAM
                                    <hr>
                                </td> 
    

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>JUMLAH : {{$jumlah_jam_kiraan}}</td>
                                <td>JUMLAH JAM DIPEROLEHI</td>
                                <td>JUMLAH : {{$jumlah_jam_persamaan}}</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>JUMLAH RM  : {{$JumlahRM}}</td>
                            </tr>
                        </tfoot>
        
                        
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
var status_kemaskini = <?php echo $tuntutan ?>;
$(document).ready(function() {
    $('#tablecalculate').DataTable();

    check_status_mohon_kemaskini();

    
} );

function check_status_mohon_kemaskini() {
 if (status_kemaskini.mohon_kemaskini_periksa == 1) {
    $("#example :input[type=text]").each(function(index, elem){
        console.log($(elem).attr('type'))
        $(elem).prop('disabled', false);        
    });
 }

 else {
    $("#example :input[type=text]").each(function(index, elem){

        $(elem).prop('disabled', true);     
           
    });
 }

}
    function kemaskinitindakanperiksa(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/kemaskinitindakanperiksa/" + obj,
            type: "POST",
            data: {
                "kemaskinitindakanperiksa": obj2.value
            }
        
        });

    }

    function kemaskinitindakansemakan(obj, obj2) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/kemaskinitindakansemakan/" + obj,
            type: "POST",
            data: {
                "kemaskinitindakansemakan": obj2.value
            }
        
        });

    }


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