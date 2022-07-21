@extends('base')

@section('content')
    @if (session('status_tuntutan'))
        {{ session('status_tuntutan') }}
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
            @if (auth()->user()->role == 'kakitangan')
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                        <li class="nav-item">
                            <a href="/tuntutans" class="btn btn-secondary btn-sm float-right">Kembali</a>
                        </li>
                    </ul>
                </div>
            @elseif(auth()->user()->role == 'penyelia' or
                auth()->user()->role == 'kerani_semakan' or
                auth()->user()->role == 'kerani_pemeriksa')
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                        <li class="nav-item">
                            <a href="/tuntutans" class="btn btn-secondary btn-sm float-right">Kembali</a>
                        </li>
                        <a href="/laporan_tuntutan/{{ $tuntutan->id }}" class="btn btn-secondary btn-sm float-right">Jana
                            Laporan</a>


                    </ul>
                </div>
            @elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan')
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
    @if (auth()->user()->role == 'kakitangan')
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
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">No Pekerja </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->user_code }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-username">pegawai_lulus</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_lulus }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">pegawai_sokong
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_sokong }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                            </div>
                            <!-- Light table -->
                            <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
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
                                    @foreach ($permohonan_ygdituntut as $permohonan_ygdituntut)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                {{ $permohonan_ygdituntut['sebenar_mula_kerja'] }}<br><br>

                                                {{ $permohonan_ygdituntut['sebenar_akhir_kerja'] }}
                                            </td>

                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_biasa_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_biasa_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>
                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_rehat_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_rehat_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>

                                            </td>
                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_am_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_am_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>

                                        <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_keseluruhan_show_biasa }} </td>
                                        <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_keseluruhan_show_rehat }}</td>
                                        <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_keseluruhan_show_am }} </td>


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
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">No Pekerja
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->user_code }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-username">pegawai_lulus</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_lulus }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">pegawai_sokong
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_sokong }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                            </div>
                            <!-- Light table -->
                            <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
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
                                    @foreach ($permohonan_ygdituntut as $permohonan_ygdituntut)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                {{ $permohonan_ygdituntut['sebenar_mula_kerja'] }}<br><br>

                                                {{ $permohonan_ygdituntut['sebenar_akhir_kerja'] }}
                                            </td>
                                            <td>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_biasa_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_biasa_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>
                                            <td>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_rehat_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_rehat_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>

                                            </td>
                                            <td>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_am_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input class="text-center" type="text"
                                                    value="{{ $permohonan_ygdituntut['jumlah_am_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>

                                        <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_keseluruhan_show_biasa }} </td>
                                        <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_keseluruhan_show_rehat }}</td>
                                        <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_keseluruhan_show_am }} </td>


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
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">No Pekerja
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->user_code }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-username">pegawai_lulus</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_lulus }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">pegawai_sokong
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_sokong }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Semakan Tuntutan Kakitangan</h3>
                            </div>
                            <!-- Light table -->
                            <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
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
                                    @foreach ($permohonan_ygdituntut as $permohonan_ygdituntut)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                {{ $permohonan_ygdituntut['sebenar_mula_kerja'] }}<br><br>

                                                {{ $permohonan_ygdituntut['sebenar_akhir_kerja'] }}
                                            </td>
                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_biasa_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_biasa_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>
                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_rehat_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_rehat_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>

                                            </td>
                                            <td>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_am_siang'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                                <input value="{{ $permohonan_ygdituntut['jumlah_am_malam'] }}"
                                                    style="width: 70px;" disabled><br><br>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>

                                        <td id="jumlah_jam_biasa">Jumlah:{{ $jumlah_jam_keseluruhan_show_biasa }} </td>
                                        <td id="jumlah_jam_rehat">Jumlah:{{ $jumlah_jam_keseluruhan_show_rehat }}</td>
                                        <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_keseluruhan_show_am }} </td>


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
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">No Pekerja
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->user_code }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-username">pegawai_lulus</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_lulus }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">pegawai_sokong
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_sokong }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <div class="col-md-12  ">
                                    <div class="row float-right mb-2">
                                        <button type="button" class="btn btn-success btn-sm " data-toggle="modal"
                                            data-target="#hantarperiksa">
                                            Hantar Untuk Semakan
                                        </button>
                                        @if ($tuntutan->mohon_kemaskini_periksa === null)
                                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                                                data-target="#mohon_kemaskini">
                                                Mohon Kemaskini
                                            </button>
                                        @endif
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
                                        <div class="modal-body text-red text-center">
                                            Sila pastikan tuntutan DIPERIKSA dan DITANDA .<br><br> Anda bersetuju dengan
                                            tuntutan berikut dihantar ke kerani semakan ?
                                        </div>

                                        <form method="GET" action="/periksa_tuntutan/{{ $tuntutan->id }}/">
                                            @csrf
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm "
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm periksa_tuntutan_lulus">Hantar</button>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form method="POST" action="/mohon_kemaskini/{{ $tuntutan->id }}">
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <input type="hidden" value="" name="id">

                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="mohon_kemaskini1_sebab"
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

                                <table id="example" class="display table table-striped table-bordered nowrap">
                                    <thead class="thead-light">
                                        <th>No</th>
                                        <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                        <th> Rekod E-Kedatangan</th>
                                        <th> Hari Biasa <br> Siang / Malam</th>
                                        <th> Hari Rehat <br> Siang / Malam</th>
                                        <th> Pelepasan AM <br> Siang / Malam</th>
                                        <th> Tindakan <br>Periksa </th>
                                    </thead>
                                    <tbody>

                                        @foreach ($permohonan_ygdituntut as $permohonan)
                                            <tr>
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>

                                                <td>
                                                    @if ($tuntutan->mohon_kemaskini_periksa)
                                                        <div class="text-center mb-4">
                                                            {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}
                                                            <br>
                                                            {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                                                            <br>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal" data-target="#kemaskini_tuntutan">
                                                                Kemaskini
                                                            </button>
                                                        </div>
                                                    @else
                                                        {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}
                                                        <br>
                                                        {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                                                        <br><br>
                                                    @endif

                                                    <div class="modal fade" id="kemaskini_tuntutan" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Tuntutan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="/update-waktu-tuntutan/{{ $permohonan->id }}"
                                                                    method="post">
                                                                    @csrf

                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <label for="">Tarikh</label>
                                                                                <input type="date" class="form-control"
                                                                                    name="tarikh"
                                                                                    value="{{ date('Y-m-d', strtotime($permohonan->sebenar_mula_kerja)) }}">
                                                                            </div>
                                                                            <div class="col-6 mb-3">
                                                                                <label for="">Masa Mula</label>
                                                                                <input class="form-control" type="time"
                                                                                    name="masa_mula"
                                                                                    value="{{ date('H:i', strtotime($permohonan->sebenar_mula_kerja)) }}">
                                                                            </div>
                                                                            <div class="col-6 mb-3">
                                                                                <label for="">Masa
                                                                                    Tamat</label>
                                                                                <input class="form-control" type="time"
                                                                                    name="masa_tamat"
                                                                                    value="{{ date('H:i', strtotime($permohonan->sebenar_akhir_kerja)) }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                    </div>

                                                                </form>


                                                            </div>

                                                        </div>
                                                    </div>

                                                    @if ($permohonan->jenis_masa)
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <div class="form-group">
                                                                    <label for="jenis_masa">Jenis Masa</label>
                                                                    <select name="jenis_masa[]" class="form-control"
                                                                        onchange="tukarJenisMasa(this,{{ $permohonan->id }})">
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Hari Biasa Siang' ? 'selected' : '' }}
                                                                            value="Hari Biasa Siang">Hari Biasa Siang
                                                                        </option>
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Hari Biasa Malam' ? 'selected' : '' }}
                                                                            value="Hari Biasa Malam">Hari Biasa Malam
                                                                        </option>
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Hari Rehat Siang' ? 'selected' : '' }}
                                                                            value="Hari Rehat Siang">Hari Rehat Siang
                                                                        </option>
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Hari Rehat Malam' ? 'selected' : '' }}
                                                                            value="Hari Rehat Malam">Hari Rehat Malam
                                                                        </option>
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Pelepasan Am Siang' ? 'selected' : '' }}
                                                                            value="Pelepasan Am Siang">Pelepasan Am
                                                                            Siang</option>
                                                                        <option
                                                                            {{ $permohonan->jenis_masa == 'Pelepasan Am Malam' ? 'selected' : '' }}
                                                                            value="Pelepasan Am Malam">Pelepasan Am
                                                                            Malam</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <h5> Tarikh : <span
                                                            class="text-danger">{{ $permohonan->tarikh }}</span>
                                                    </h5>
                                                    <h5> Mula : <span class="text-danger">
                                                            {{ $permohonan->clockintime }}</span> </h5>
                                                    <h5> Akhir : <span
                                                            class="text-danger">{{ $permohonan->clockouttime }}</span>
                                                    </h5>
                                                    <h5> Status : <span
                                                            class="text-danger">{{ $permohonan->statusdesc }}</span>
                                                    </h5>
                                                    <h5> Waktu Anjal : <span
                                                            class="text-danger">{{ $permohonan->waktuanjal }}</span>
                                                    </h5>

                                                </td>
                                                <td>
                                                    <input class="text-center" type="text" name="jumlah_biasa_siang[]"
                                                        value="{{ $permohonan['jumlah_biasa_siang'] }}"
                                                        style="width: 70px;" disabled><br><br>
                                                    <input class="text-center" type="text" name="jumlah_biasa_malam[]"
                                                        value="{{ $permohonan['jumlah_biasa_malam'] }}"
                                                        style="width: 70px;" disabled><br><br>
                                                </td>
                                                <td>
                                                    <input class="text-center" type="text" name="jumlah_rehat_siang[]"
                                                        value="{{ $permohonan['jumlah_rehat_siang'] }}"
                                                        style="width: 70px;" disabled><br><br>
                                                    <input class="text-center" type="text" name="jumlah_rehat_malam[]"
                                                        value="{{ $permohonan['jumlah_rehat_malam'] }}"
                                                        style="width: 70px;" disabled><br><br>

                                                </td>
                                                <td>
                                                    <input class="text-center" type="text" name="jumlah_am_siang[]"
                                                        value="{{ $permohonan['jumlah_am_siang'] }}" style="width: 70px;"
                                                        disabled><br><br>
                                                    <input class="text-center" type="text" name="jumlah_am_malam[]"
                                                        value="{{ $permohonan['jumlah_am_malam'] }}" style="width: 70px;"
                                                        disabled><br><br>
                                                </td>
                                                <input type="hidden" name="permohonan_id[]"
                                                    value="{{ $permohonan->id }}">
                                                <td>
                                                    @if ($permohonan->tindakan_periksa == 1)
                                                        <input type="checkbox" checked="true" class="periksa_checkbox"
                                                            onchange="kemaskinitindakanperiksa({{ $permohonan->id }}, this)"
                                                            value={{ $permohonan->tindakan_periksa }}>
                                                    @elseif($permohonan->tindakan_periksa == 0)
                                                        <input type="checkbox" check="false" class="periksa_checkbox"
                                                            onchange="kemaskinitindakanperiksa({{ $permohonan->id }}, this)"
                                                            value={{ $permohonan->tindakan_periksa }}>
                                                    @endif
                                                    <h5 class="d-inline">Disahkan</h5>
                                                    <br>
                                                    <button type="button"
                                                        onclick="buangPermohonanPemeriksa({{ $permohonan->id }})"
                                                        class="btn btn-sm btn-danger mt-3">Buang</button>
                                                    <br>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td id="jumlah_jam_biasa">
                                                Jumlah:{{ $jumlah_jam_keseluruhan_show_biasa }}
                                            </td>
                                            <td id="jumlah_jam_rehat">
                                                Jumlah:{{ $jumlah_jam_keseluruhan_show_rehat }}
                                            </td>
                                            <td id="jumlah_jam_am">Jumlah:{{ $jumlah_jam_keseluruhan_show_am }}
                                            </td>
                                            <td id="jumlah_jam_keseluruhan">Jumlah Jam :
                                                {{ $jumlah_jam_keseluruhan_show_biasa + $jumlah_jam_keseluruhan_show_rehat + $jumlah_jam_keseluruhan_show_am }}
                                            </td>
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
                                                            Gaji Kakitangan = {{ $oraclegaji }}<br><br>
                                                            Kadar Bayaran Sejam = {{ $oraclegaji }} x 12 / (313 X 8
                                                            )<br>
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
                                                        <h4 class="card-title text-uppercase text-muted mb-0 text-center">
                                                            {{ $kiraangaji }} / 2504</h4>
                                                        <h5 class="card-title text-uppercase text-muted mb-0 text-center">
                                                            Kadar Sejam =
                                                            <span class="h3 font-weight-bold mb-0">
                                                                {{ $kiraangajijam }}
                                                            </span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Light table -->
                                <table id="tablecalculate"
                                    class="display table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
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
                                                {{ $biasa_siang_total }}
                                                <hr>
                                                {{ $biasa_malam_total }}
                                                <hr>
                                                {{ $rehat_siang_total }}
                                                <hr>
                                                {{ $rehat_malam_total }}
                                                <hr>
                                                {{ $am_siang_total }}
                                                <hr>
                                                {{ $am_malam_total }}

                                            </td>
                                            <td>
                                                1.125 x {{ $biasa_siang_total }} JAM
                                                <hr>
                                                1.250 x {{ $biasa_malam_total }} JAM
                                                <hr>
                                                1.250 x {{ $rehat_siang_total }} JAM
                                                <hr>
                                                1.500 x {{ $rehat_malam_total }} JAM
                                                <hr>
                                                1.750 x {{ $am_siang_total }} JAM
                                                <hr>
                                                2.000 x {{ $am_malam_total }} JAM
                                            </td>
                                            <td>
                                                {{ $pj_biasa_siang }} JAM
                                                <hr>
                                                {{ $pj_biasa_malam }} JAM
                                                <hr>
                                                {{ $pj_rehat_siang }} JAM
                                                <hr>
                                                {{ $pj_rehat_malam }} JAM
                                                <hr>
                                                {{ $pj_am_siang }} JAM
                                                <hr>
                                                {{ $pj_am_malam }} JAM
                                                <hr>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>JUMLAH : {{ $jumlah_jam_kiraan }}</td>
                                            <td>JUMLAH JAM DIPEROLEHI</td>
                                            <td>JUMLAH : {{ $jumlah_jam_persamaan }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>JUMLAH RM : {{ $JumlahRM }}</td>
                                        </tr>
                                    </tfoot>


                                </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Tuntutan Kakitangan Yang Dibuang</h3>
                                </div>
                                <!-- Light table -->
                                <table id="example" class="display table table-striped table-bordered nowrap">
                                    <thead class="thead-light">
                                        <th>No</th>
                                        <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                        <th> Rekod E-Kedatangan</th>
                                        <th> Hari Biasa <br> Siang / Malam</th>
                                        <th> Hari Rehat <br> Siang / Malam</th>
                                        <th> Pelepasan AM <br> Siang / Malam</th>
                                        <th> Tindakan <br>Periksa </th>
                                    </thead>

                                    <tbody>
                                        @foreach ($permohonan_dibuang as $permohonan)
                                            <tr>
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>

                                                <td>
                                                    {{ $permohonan->sebenar_mula_kerja }}<br>
                                                    {{ $permohonan->sebenar_akhir_kerja }} <br> <br>
                                                    {{ $permohonan->jenis_masa ?? '' }}
                                                </td>
                                                <td>
                                                    <h5> Tarikh : <span
                                                            class="text-danger">{{ $permohonan->tarikh }}</span>
                                                    </h5>
                                                    <h5> Mula : <span class="text-danger">
                                                            {{ $permohonan->clockintime }}</span> </h5>
                                                    <h5> Akhir : <span
                                                            class="text-danger">{{ $permohonan->clockouttime }}</span>
                                                    </h5>
                                                    <h5> Status : <span
                                                            class="text-danger">{{ $permohonan->statusdesc }}</span>
                                                    </h5>
                                                    <h5> Waktu Anjal : <span
                                                            class="text-danger">{{ $permohonan->waktuanjal }}</span>
                                                    </h5>
                                                </td>
                                                <td>

                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_biasa_siang'] }}"
                                                        style="width: 70px;" readonly><br><br>
                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_biasa_malam'] }}"
                                                        style="width: 70px;" readonly><br><br>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_rehat_siang'] }}"
                                                        style="width: 70px;" readonly><br><br>
                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_rehat_malam'] }}"
                                                        style="width: 70px;" readonly><br><br>

                                                </td>
                                                <td>
                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_am_siang'] }}"
                                                        style="width: 70px;" readonly><br><br>
                                                    <input class="form-control" type="text"
                                                        value="{{ $permohonan['jumlah_am_malam'] }}"
                                                        style="width: 70px;" readonly><br><br>
                                                </td>
                                                <td>

                                                    <form action="/kembali_permohonan_pemeriksa" method="post">
                                                        @csrf
                                                        <input type="hidden" name="permohonan_id"
                                                            value="{{ $permohonan->id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary mt-3">Kembalikan</button>
                                                    </form>
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
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->name ?? '' }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">No Pekerja
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $user->user_code ?? '' }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-username">pegawai_lulus</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_lulus ?? '' }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">pegawai_sokong
                                                    </label>
                                                    <input type="email" id="input-email"
                                                        class="form-control form-control-sm"
                                                        placeholder="{{ $pegawai_sokong ?? '' }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 mb-3 ">
                                <div class="col-md-12  ">
                                    <div class="row float-right mb-2">
                                        <button type="button" class="btn btn-success btn-sm " data-toggle="modal"
                                            data-target="#hantarsemak">
                                            Muktamad Semakan
                                        </button>
                                        @if ($tuntutan->mohon_kemaskini_semak === null)
                                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                                                data-target="#mohon_kemaskini2">
                                                Mohon Kemaskini
                                            </button>
                                        @endif
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
                                        <div class="modal-body text-red text-center">
                                            Sila pastikan tuntutan DISEMAK dan DITANDA .<br><br> Anda bersetuju dengan
                                            tuntutan berikut ?
                                        </div>
                                        <form method="POST" action="/semak_tuntutan/{{ $tuntutan->id }}/"
                                            id="form_selesai_semak">
                                            @csrf

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm "
                                                    data-dismiss="modal">Tutup</button>

                                                <button type="submit"
                                                    class="btn btn-primary btn-sm periksa_tuntutan_lulus">Hantar</button>
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
                                                <form method="POST" action="/mohon_kemaskini2/{{ $tuntutan->id }}">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <input type="hidden" value="" name="id">

                                                            <div class="input-group input-group-merge">
                                                                <input class="form-control" name="mohon_kemaskini2_sebab"
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

                                    <table id="example"
                                        class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                                <th> Hari Biasa <br> Siang / Malam</th>
                                                <th> Hari Rehat <br> Siang / Malam</th>
                                                <th> Pelepasan AM <br> Siang / Malam</th>
                                                <th> Tindakan <br>Periksa </th>
                                                <th> Tindakan <br>Semakan </th>
                                                {{-- <th> Tindakan</th> --}}

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($permohonan_ygdituntut as $permohonan)
                                                <tr>

                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        @if ($tuntutan->mohon_kemaskini_semak)
                                                            <div class="text-center mb-4">
                                                                {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}
                                                                <br>
                                                                {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                                                                <br>
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#kemaskini_tuntutan2">
                                                                    Kemaskini
                                                                </button>
                                                            </div>
                                                        @else
                                                            {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}
                                                            <br>
                                                            {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                                                            <br><br>
                                                        @endif

                                                        <div class="modal fade" id="kemaskini_tuntutan2" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Tuntutan</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/update-waktu-tuntutan/{{ $permohonan->id }}"
                                                                        method="post">
                                                                        @csrf

                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="">Tarikh</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        name="tarikh"
                                                                                        value="{{ date('Y-m-d', strtotime($permohonan->sebenar_mula_kerja)) }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="">Masa
                                                                                        Mula</label>
                                                                                    <input class="form-control"
                                                                                        type="time" name="masa_mula"
                                                                                        value="{{ date('H:i', strtotime($permohonan->sebenar_mula_kerja)) }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <label for="">Masa
                                                                                        Tamat</label>
                                                                                    <input class="form-control"
                                                                                        type="time" name="masa_tamat"
                                                                                        value="{{ date('H:i', strtotime($permohonan->sebenar_akhir_kerja)) }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        </div>

                                                                    </form>


                                                                </div>

                                                            </div>
                                                        </div>
                                                        @if ($permohonan->jenis_masa)
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <div class="form-group">
                                                                        <label for="jenis_masa">Jenis Masa</label>
                                                                        <select name="jenis_masa[]" class="form-control"
                                                                            onchange="tukarJenisMasa(this,{{ $permohonan->id }})">
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Hari Biasa Siang' ? 'selected' : '' }}
                                                                                value="Hari Biasa Siang">Hari Biasa
                                                                                Siang
                                                                            </option>
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Hari Biasa Malam' ? 'selected' : '' }}
                                                                                value="Hari Biasa Malam">Hari Biasa
                                                                                Malam
                                                                            </option>
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Hari Rehat Siang' ? 'selected' : '' }}
                                                                                value="Hari Rehat Siang">Hari Rehat
                                                                                Siang
                                                                            </option>
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Hari Rehat Malam' ? 'selected' : '' }}
                                                                                value="Hari Rehat Malam">Hari Rehat
                                                                                Malam
                                                                            </option>
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Pelepasan Am Siang' ? 'selected' : '' }}
                                                                                value="Pelepasan Am Siang">Pelepasan Am
                                                                                Siang</option>
                                                                            <option
                                                                                {{ $permohonan->jenis_masa == 'Pelepasan Am Malam' ? 'selected' : '' }}
                                                                                value="Pelepasan Am Malam">Pelepasan Am
                                                                                Malam</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_biasa_siang[]"
                                                            value="{{ $permohonan['jumlah_biasa_siang'] }}"
                                                            style="width: 70px;" disabled><br><br>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_biasa_malam[]"
                                                            value="{{ $permohonan['jumlah_biasa_malam'] }}"
                                                            style="width: 70px;" disabled><br><br>
                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_rehat_siang[]"
                                                            value="{{ $permohonan['jumlah_rehat_siang'] }}"
                                                            style="width: 70px;" disabled><br><br>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_rehat_malam[]"
                                                            value="{{ $permohonan['jumlah_rehat_malam'] }}"
                                                            style="width: 70px;" disabled><br><br>

                                                    </td>
                                                    <td>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_am_siang[]"
                                                            value="{{ $permohonan['jumlah_am_siang'] }}"
                                                            style="width: 70px;" disabled><br><br>
                                                        <input class="text-center" type="text"
                                                            name="jumlah_am_malam[]"
                                                            value="{{ $permohonan['jumlah_am_malam'] }}"
                                                            style="width: 70px;" disabled><br><br>
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->tindakan_periksa == 1)
                                                            <input type="checkbox" checked="true">
                                                        @elseif($permohonan->tindakan_periksa == 0)
                                                            <input type="checkbox" check="false">
                                                        @endif
                                                        <h5 class="d-inline">Disahkan</h5>

                                                    </td>
                                                    <input type="hidden" name="permohonan_id[]"
                                                        value="{{ $permohonan->id }}">
                                                    <td>
                                                        @if ($permohonan->tindakan_semakan == 1)
                                                            <input type="checkbox" checked="true"
                                                                class="periksa_checkbox"
                                                                onchange="kemaskinitindakansemakan({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->tindakan_semakan }}>
                                                        @elseif($permohonan->tindakan_semakan == 0)
                                                            <input type="checkbox" check="false"
                                                                class="periksa_checkbox"
                                                                onchange="kemaskinitindakansemakan({{ $permohonan->id }}, this)"
                                                                value={{ $permohonan->tindakan_semakan }}>
                                                        @endif
                                                        <h5 class="d-inline">Disahkan</h5>
                                                        <br>
                                                        <button type="button"
                                                            onclick="buangPermohonanPemeriksa({{ $permohonan->id }})"
                                                            class="btn btn-sm btn-danger mt-3">Buang</button>
                                                        <br>
                                                    </td>

                                                    {{-- <td >
                                                <a href="" class="btn btn-primary btn-sm "> Mohon Kemaskini</a><br>
                                            </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Jumlah:{{ $jumlah_jam_keseluruhan_show_biasa }} </td>
                                                <td>Jumlah:{{ $jumlah_jam_keseluruhan_show_rehat }}</td>
                                                <td>Jumlah:{{ $jumlah_jam_keseluruhan_show_am }} </td>
                                                <td></td>

                                                <td>Jumlah Jam :
                                                    {{ $jumlah_jam_keseluruhan_show_biasa + $jumlah_jam_keseluruhan_show_rehat + $jumlah_jam_keseluruhan_show_am }}
                                                </td>



                                            </tr>
                                        </tfoot>


                                    </table>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" id="btn_update_semakan"
                                                class="btn btn-success mr-3 my-3">Simpan</button>
                                        </div>
                                    </div>


                                </div>


                            </div>

                        </div>

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
                                                        Gaji Kakitangan = {{ $oraclegaji }}<br><br>
                                                        Kadar Bayaran Sejam = {{ $oraclegaji }} x 12 / (313 X 8 )<br>
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
                                                    <h4 class="card-title text-uppercase text-muted mb-0 text-center">
                                                        {{ $kiraangaji }} / 2504</h4>
                                                    <h5 class="card-title text-uppercase text-muted mb-0 text-center">
                                                        Kadar Sejam =
                                                        <span class="h3 font-weight-bold mb-0"> {{ $kiraangajijam }}
                                                        </span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Light table -->
                            <table id="tablecalculate"
                                class="display table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
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
                                            {{ $biasa_siang_total }}
                                            <hr>
                                            {{ $biasa_malam_total }}
                                            <hr>
                                            {{ $rehat_siang_total }}
                                            <hr>
                                            {{ $rehat_malam_total }}
                                            <hr>
                                            {{ $am_siang_total }}
                                            <hr>
                                            {{ $am_malam_total }}

                                        </td>
                                        <td>
                                            1.125 x {{ $biasa_siang_total }} JAM
                                            <hr>
                                            1.250 x {{ $biasa_malam_total }} JAM
                                            <hr>
                                            1.250 x {{ $rehat_siang_total }} JAM
                                            <hr>
                                            1.500 x {{ $rehat_malam_total }} JAM
                                            <hr>
                                            1.750 x {{ $am_siang_total }} JAM
                                            <hr>
                                            2.000 x {{ $am_malam_total }} JAM
                                        </td>
                                        <td>
                                            {{ $pj_biasa_siang }} JAM
                                            <hr>
                                            {{ $pj_biasa_malam }} JAM
                                            <hr>
                                            {{ $pj_rehat_siang }} JAM
                                            <hr>
                                            {{ $pj_rehat_malam }} JAM
                                            <hr>
                                            {{ $pj_am_siang }} JAM
                                            <hr>
                                            {{ $pj_am_malam }} JAM
                                            <hr>
                                        </td>


                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>JUMLAH : {{ $jumlah_jam_kiraan }}</td>
                                        <td>JUMLAH JAM DIPEROLEHI</td>
                                        <td>JUMLAH : {{ $jumlah_jam_persamaan }}</td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>JUMLAH RM : {{ $JumlahRM }}</td>
                                    </tr>
                                </tfoot>


                            </table>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">Tuntutan Kakitangan Yang Dibuang</h3>
                                    </div>
                                    <!-- Light table -->
                                    <table class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <th>No</th>
                                            <th> Waktu Mula Sebenar <br><br> Waktu Akhir Sebenar</th>
                                            <th> Rekod E-Kedatangan</th>
                                            <th> Hari Biasa <br> Siang / Malam</th>
                                            <th> Hari Rehat <br> Siang / Malam</th>
                                            <th> Pelepasan AM <br> Siang / Malam</th>
                                            <th> Tindakan <br>Periksa </th>
                                            <th> Tindakan <br>Semakan </th>
                                        </thead>

                                        <tbody>
                                            @foreach ($permohonan_dibuang as $permohonan)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        {{ $permohonan->sebenar_mula_kerja }}<br>
                                                        {{ $permohonan->sebenar_akhir_kerja }} <br> <br>
                                                        {{ $permohonan->jenis_masa ?? '' }}
                                                    </td>
                                                    <td>
                                                        <h5> Tarikh : <span
                                                                class="text-danger">{{ $permohonan->tarikh }}</span>
                                                        </h5>
                                                        <h5> Mula : <span class="text-danger">
                                                                {{ $permohonan->clockintime }}</span> </h5>
                                                        <h5> Akhir : <span
                                                                class="text-danger">{{ $permohonan->clockouttime }}</span>
                                                        </h5>
                                                        <h5> Status : <span
                                                                class="text-danger">{{ $permohonan->statusdesc }}</span>
                                                        </h5>
                                                        <h5> Waktu Anjal : <span
                                                                class="text-danger">{{ $permohonan->waktuanjal }}</span>
                                                        </h5>
                                                    </td>
                                                    <td>

                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_biasa_siang'] }}"
                                                            style="width: 70px;" readonly><br><br>
                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_biasa_malam'] }}"
                                                            style="width: 70px;" readonly><br><br>
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_rehat_siang'] }}"
                                                            style="width: 70px;" readonly><br><br>
                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_rehat_malam'] }}"
                                                            style="width: 70px;" readonly><br><br>

                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_am_siang'] }}"
                                                            style="width: 70px;" readonly><br><br>
                                                        <input type="text"
                                                            value="{{ $permohonan['jumlah_am_malam'] }}"
                                                            style="width: 70px;" readonly><br><br>
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->tindakan_periksa == 1)
                                                            <input type="checkbox" checked="true">
                                                        @elseif($permohonan->tindakan_periksa == 0)
                                                            <input type="checkbox" check="false">
                                                        @endif
                                                        <h5 class="d-inline">Disahkan</h5>
                                                    </td>
                                                    <td>
                                                        <form action="/kembali_permohonan_pemeriksa" method="post">
                                                            @csrf
                                                            <input type="hidden" name="permohonan_id"
                                                                value="{{ $permohonan->id }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary mt-3">Kembalikan</button>
                                                        </form>
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
@section('script')
    <script>
        $(".periksa_tuntutan_lulus").click(function(e) {
            e.preventDefault();
            let disahkan = true;
            jQuery.each($(".periksa_checkbox"), function(key, val) {
                if (!val.checked) {
                    disahkan = false;
                }
            });
            if (disahkan) {
                $("#form_selesai_semak").submit();
            } else {
                alert("Anda masih belum sahkan semua permohonan")
            }
        });


        function buangPermohonanPemeriksa(permohonan_id) {
            $.ajax({
                method: "DELETE",
                url: "/buang_permohonan_pemeriksa/" + permohonan_id,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
            }).done(function() {
                location.reload();
            });
        }

        function tukarJenisMasa(element, permohonan_id) {
            $.ajax({
                method: "POST",
                url: "/update_jenis_masa_di_tuntutan",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "jenis_masa": element.value,
                    "id": permohonan_id
                },
            }).done(function(response) {
                alert("Jenis masa berjaya dikemaskini.");

                location.reload();
            });

        }

        var status_kemaskini = @json($tuntutan->toArray());
        $(document).ready(function() {
            $('#tablecalculate').DataTable();

            // check_status_mohon_kemaskini();


        });

        function check_status_mohon_kemaskini() {
            if (status_kemaskini.mohon_kemaskini_periksa == 1) {
                $("#example :input[type=text]").each(function(index, elem) {
                    console.log($(elem).attr('type'))
                    $(elem).prop('disabled', false);
                });
                $("#btn_update_semakan").show();

            } else {
                $("#example :input[type=text]").each(function(index, elem) {

                    $(elem).prop('disabled', true);

                });
                $("#btn_update_semakan").hide();


            }

        }

        function kemaskinitindakanperiksa(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskinitindakanperiksa/" + obj,
                type: "POST",
                data: {
                    "kemaskinitindakanperiksa": obj2.value
                }

            });

        }

        function kemaskinitindakansemakan(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskinitindakansemakan/" + obj,
                type: "POST",
                data: {
                    "kemaskinitindakansemakan": obj2.value
                }

            });

        }

        function KemaskiniJamTuntutan(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_jam_tuntutan/" + obj,
                type: "POST",
                data: {
                    "kemaskini_jam_tuntutan": obj2.value
                }

            });
        }

        function KemaskiniTotalTuntutan(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_total_tuntutan/" + obj,
                type: "POST",
                data: {
                    "kemaskini_total_tuntutan": obj2.value
                }

            });
        }

        function KemaskiniStatus2(obj, obj2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/kemaskini_status2/" + obj,
                type: "POST",
                data: {
                    "kemaskini_status2": obj2.value
                }

            });
        }
    </script>
@endsection
