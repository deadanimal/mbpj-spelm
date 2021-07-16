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
                    @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or auth()->user()->role == 'kerani_pemeriksa')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/permohonans/create" class="btn btn-sm btn-neutral">Tambah Permohonan</a>
                    </div>
                    @elseif(auth()->user()->role == 'penyelia')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/permohonans/create" class="btn btn-sm btn-neutral">Tambah Permohonan</a>
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
            @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'kerani_semakan'or auth()->user()->role == 'kerani_pemeriksa')
            {{-- kakitangan Mohon --}}
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Permohonan Kerja Lebih Masa</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
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
                                    <!-- <td class="text-right">
                                                    <div class="dropdown">

                                                    <a href="/permohonans/{{ $permohonan->id }}" class="btn btn-primary " role="button" aria-disabled="true">Kemaskini butiran</a>

                                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item"
                                                                href="/permohonans/{{ $permohonan->id }}">Kemaskini butiran</a>
                                                            <a class="dropdown-item"
                                                                href="/permohonans/{{ $permohonan->id }}/edit">Edit...</a>
                                                        </div>
                                                    </div>
                                                </td> -->

                                    @empty
                                    ---
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user penyelia -->
            @elseif(auth()->user()->role == 'penyelia')
            {{-- Penyelia Mohon --}}
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Mohon Kerja Lebih Masa</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
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
                                    ---
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Penyelia Semak --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Semak Permohonan Kerja Lebih Masa Kakitangan</h3>
                            
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="no">No</th>
                                        <th scope="col" class="sort" data-sort="tarikh">Tarikh Mohon</th>
                                        <th scope="col" class="sort" data-sort="waktu">Waktu Kerja</th>

                                        <th scope="col" class="sort" data-sort="budget">otstarttime1</th>
                                        <th scope="col" class="sort" data-sort="status">otendtime1</th>
                                        <th scope="col" class="sort" data-sort="status">otdurationt1</th>

                                        <th scope="col" class="sort" data-sort="lokasi">Lokasi</th>
                                        <th scope="col" class="sort" data-sort="tujuan">Tujuan</th>
                                        <th scope="col" class="sort" data-sort="pelulus1">Pegawai Sokong</th>
                                        <th scope="col" class="sort" data-sort="pelulus2">Pegawai Lulus</th>
                                        <th scope="col" class="sort" data-sort="status">Jenis Permohonan</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <!-- eKedatangan -->
                                        <th scope="col" class="sort" data-sort="budget">clockintime</th>
                                        <th scope="col" class="sort" data-sort="status">clockouttime</th>
                                        <th scope="col" class="sort" data-sort="budget">totalworkinghour</th>
                                        <th scope="col" class="sort" data-sort="budget">kemaskini</th>
                                        <th scope="col" class="sort" data-sort="budget">tindakan</th>


 
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
                                            <a href=""
                                            class="btn btn-success">Sokong</a>
                                        </td>
                                     
                                    </tr>
                                    @empty
                                    ---
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user ketua_bahagian-->
            @elseif(auth()->user()->role == 'ketua_bahagian')
            {{-- Ketua_Bahagian Semak --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Semak Permohonan</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
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
                                        <!-- eKedatangan -->
                                        <th scope="col" class="sort" data-sort="budget">clockintime</th>
                                        <th scope="col" class="sort" data-sort="status">clockouttime</th>
                                        <th scope="col" class="sort" data-sort="budget">totalworkinghour</th>
                                        <th scope="col" class="sort" data-sort="budget">otstarttime1</th>
                                        <th scope="col" class="sort" data-sort="status">otendtime1</th>
                                        <th scope="col" class="sort" data-sort="status">otdurationt1</th>
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
                                     
                                    </tr>
                                    @empty
                                    ---
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user ketua_jabatan -->
            @elseif(auth()->user()->role == 'ketua_jabatan')
            {{-- Ketua_Jabatan Semak --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Semak Permohonan</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
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
                                        <!-- eKedatangan -->
                                        <th scope="col" class="sort" data-sort="budget">clockintime</th>
                                        <th scope="col" class="sort" data-sort="status">clockouttime</th>
                                        <th scope="col" class="sort" data-sort="budget">totalworkinghour</th>
                                        <th scope="col" class="sort" data-sort="budget">otstarttime1</th>
                                        <th scope="col" class="sort" data-sort="status">otendtime1</th>
                                        <th scope="col" class="sort" data-sort="status">otdurationt1</th>
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
                                     
                                    </tr>
                                    @empty
                                    ---
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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
    <div>
    </div>
    @endsection
