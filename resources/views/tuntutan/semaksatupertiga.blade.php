@extends('base')

@section('content')


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
            @if(auth()->user()->role == 'ketua_jabatan')
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
</div>
{{-- user first --}}
@if(auth()->user()->role == 'ketua_jabatan')
<!-- Card stats -->
<div class="container-fluid mt--6">
    <div class="tab-content" id="myTabContent">
        <div class="row ">  
            <div class="col-md-12">
           
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Makluman Tuntutan Kakitangan</h3>
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
                                <th> Lokasi <br>Tujuan</th>                              
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach($permohonans_pertiga as $mohon)
                            <tr>      
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td>
                                    {{$mohon->sebenar_mula_kerja}}<br>                                   
                                    {{$mohon->sebenar_akhir_kerja}}

                                </td>
                                <td>
                                    {{$mohon->jumlah_biasa_siang}}<br>
                                    {{$mohon->jumlah_biasa_malam}}
                                </td>
                                <td>
                                    {{$mohon->jumlah_rehat_siang}}<br>
                                    {{$mohon->jumlah_rehat_malam}}
                                </td>
                                <td>
                                    {{$mohon->jumlah_am_siang}}<br>
                                    {{$mohon->jumlah_am_malam}}
                                </td>
                                <td>
                                    {{$mohon->lokasi}}<br>
                                    {{$mohon->tujuan}}
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
