@extends('base')

@section('content')


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Aduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Aduan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                        </ol>
                    </nav>
                </div>

                @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'penyelia'or auth()->user()->role == 'kerani_semakan'
                or auth()->user()->role == 'kerani_pemeriksa' )
                {{-- <div class="col-lg-6 col-5 text-right">
                    <a href="/aduans/create" class="btn btn-sm btn-neutral">Bantuan Helpdesk</a>
                </div> --}}
                @elseif(auth()->user()->role == 'pentadbir_sistem')
                 <div class="col-lg-6 col-5 text-right">
                    <a href="/aduans/create" class="btn btn-sm btn-neutral">Kemaskini</a>
                </div>

                @else
                @endif
            </div>
        </div>
    </div>
</div>
{{-- @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'penyelia'or auth()->user()->role == 'kerani_semakan'
or auth()->user()->role == 'kerani_pemeriksa' ) --}}
<div class="container-fluid mt--6">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Senarai Aduan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive py-4">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No</th>
                                <th scope="col" class="sort" data-sort="tajuk_aduan">Berkaitan</th>
                                <th scope="col" class="sort" data-sort="maklumat">Aduan</th>

                                <th scope="col" class="sort">Jawapan</th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @forelse($aduans as $aduan)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">
                                                <a> {{$aduan->id}}</a>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <td class="tajuk_aduan">
                                    {{$aduan->jenis_aduan}}
                                </td>
                                <td class="maklumat">
                                    {{$aduan->aduan}}
                                </td>
                                @if($aduan->jawab_aduan =='')
                                <td>
                                    <span class="badge badge-pill badge-info ">Dalam Proses</span>
           
                                </td>
                                @else
                            

                                <td>{{$aduan->jawab_aduan}}</td>
                                @endif

                        
                            </tr>
                            @empty
                            <div style="text-align:center;">
                                <td  >
                                    <h5>  Tiada rekod </h5>
                                  </td>   
                            </div> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @elseif(auth()->user()->role == 'pentadbir_sistem')
<div class="container-fluid mt--6">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Senarai Aduan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive py-4">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th >No</th>
                                <th >nama pengguna</th>
                                <th >Aduan Berkaitan</th>
                                <th >Aduan</th>
                                <th >Jawapan</th>
                                <th scope="col" class="sort">Tindakan</th>
                            </tr>
                        </thead>

                        <tbody >
                            @forelse($aduans as $aduan)
                            <tr>
                                <td >{{$aduan->id}}</td>
                                <td ></td>
                                <td >{{$aduan->jenis_aduan}}</td>
                                <td >{{$aduan->aduan}}</td>
                                @if($aduan->jawab_aduan =='')
                                <td>
                                    <span class="badge badge-pill badge-danger">Belum dijawab</span>
                                </td>
                                @else
                               

                                <td>{{$aduan->jawab_aduan}}</td>
                                @endif
                            
                                <td class="kemaskini">
                                    <a href="/aduans/{{$aduan->id}}/edit" class="btn btn-success">Kemaskini</a>
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
</div> --}}
{{-- @else
<div class="container-fluid mt--12">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Modul ini tidak dibekalkan kepada anda. Sila hubungi
                        pentadbir
                        sistem anda.</h3>
                </div>

            </div>
        </div>
    </div>
    @endif --}}

    {{--  --}}
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem
                        Pengurusan Elaun Lebih
                        Masa</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<div>



    @endsection
