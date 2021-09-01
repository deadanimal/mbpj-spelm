@extends('base')

@section('content')
{{-- css --}}
<link rel="stylesheet"
    href="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

@if(auth()->user()->role == 'pentadbir_sistem' )

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengurusan Pengguna</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengurusan Pengguna</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">BILANGAN STAF
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">350,897</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
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
                                    <h5 class="card-title text-uppercase text-muted mb-0"> BILANGAN STAF SEMENTARA
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">2,356</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0"> BILANGAN STAF TETAP
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">924</span>
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
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Pengurusan Penguna</h3>
                    <div class="card-body px-0">
                        <div class="table-responsive py-4">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Kad Pengenalan</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Peranan</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->nric}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        {{-- <td>{{$user->status}} </td> --}}
                                        @if($user->status =='aktif')
                                            <td>
                                                <span class="badge badge-pill badge-success">Aktif</span>
                                            </td>
                                            @else
                                            <td>
                                                <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                            </td>
                                            @endif

                                        <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Lihat</a>
                        </div>
                        </td>
                        </tr>
                        @empty
                        <div style="text-align:center;">
                            <td>
                                <h5> Tiada rekod </h5>
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
</div>
</div>
@elseif(auth()->user()->role == '#')
@else
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
</div>
@endif
@endsection
