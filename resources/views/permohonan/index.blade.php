@extends('base')
@section('content')
<div>
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
                    @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or
                    auth()->user()->role == 'kerani_pemeriksa')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/permohonans/create" class="btn btn-sm btn-neutral">Tambah Permohonan</a>
                    </div>
                    @elseif(auth()->user()->role == 'penyelia')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/permohonans/create" class="btn btn-sm btn-neutral">Tambah Permohonan</a>
                    </div>
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Permohonan Kerja Lebih Masa Penyelia</a>
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
                                    aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Sah Permohonan Kerja Lebih
                                    Masa kakitangan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                    href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                    aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Sokong Permohonan
                                    Kerja
                                    Lebih Masa kakitangan</a>
                            </li>
                        </ul>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-8">
                </div>
            </div>
            <!-- user kakitangan -->
            @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or auth()->user()->role
            == 'kerani_pemeriksa')
            {{-- kakitangan Mohon --}}
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Permohonan Kerja Lebih Masa</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive py-4">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="no">No</th>
                                        <th scope="col" class="sort" data-sort="tarikh">Tarikh Mohon</th>
                                        <th scope="col" class="sort" data-sort="waktu">Waktu Kerja</th>
                                        <th scope="col" class="sort" data-sort="lokasi">Lokasi</th>
                                        <th scope="col" class="sort" data-sort="tujuan">Tujuan</th>
                                        <th scope="col" class="sort" data-sort="pelulus1">Pegawai Sokong</th>
                                        <th scope="col" class="sort" data-sort="pelulus2">Pegawai Lulus</th>
                                        <th scope="col" class="sort" data-sort="status">Jenis Permohonan</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>

                                        <th scope="col" class="sort" data-sort="kemaskini">Kemaskini</th>


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
            <!-- user penyelia -->
            @elseif(auth()->user()->role == 'penyelia')
            {{-- Penyelia Mohon --}}
            <div class="card shadow">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                        aria-labelledby="tabs-icons-text-1-tab">
                        <div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Mohon Kerja Lebih Masa Penyelia</h3>
                                        </div>
                                        <!-- Light table -->
                                        <div class="table-responsive py-4">
                                            <table id="example"
                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                style="width:100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="no">No</th>
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
                                                    ---
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Penyelia Semak --}}
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                        aria-labelledby="tabs-icons-text-2-tab">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>

                                        </div>
                                        <!-- Light table -->
                                        <div class="table-responsive py-4">
                                            <table id="example"
                                                class="table table-striped table-bordered dt-responsive nowrap"
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
                                                    @forelse($permohonan_disokongs as $permohonan)
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
                                                    ---
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                        aria-labelledby="tabs-icons-text-3-tab">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>

                                        </div>
                                        <!-- Light table -->
                                        <div class="table-responsive py-4">
                                            <table id="example"
                                                class="table table-striped table-bordered dt-responsive nowrap"
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
                                                    @forelse($permohonan_disokongs as $permohonan)
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
                                                    ---
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
            <!-- user ketua_bahagian/jabatan-->
            @elseif(auth()->user()->role == 'ketua_bahagian'or auth()->user()->role == 'ketua_jabatan')
            <div class="card shadow">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                        aria-labelledby="tabs-icons-text-1-tab">
                        <div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>
                                        </div>
                                        <!-- Light table -->
                                        <div class="table-responsive py-4">
                                            <table id="example"
                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                style="width:100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="no">No</th>
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
                    {{-- Penyelia Semak --}}
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                        aria-labelledby="tabs-icons-text-2-tab">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Sah Permohonan Kerja Lebih Masa Kakitangan</h3>

                                        </div>
                                        <!-- Light table -->
                                        <div class="table-responsive py-4">
                                            <table id="example"
                                                class="table table-striped table-bordered dt-responsive nowrap"
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
                                                    @forelse($permohonan_disokongs as $permohonan)
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
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan
                                Elaun Lebih Masa</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
 @endsection
