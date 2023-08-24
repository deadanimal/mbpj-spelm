@extends('base')


@section('content')
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @switch(auth()->user()->role)
            @case('kakitangan')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                            LEBIH MASA</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                            LULUS</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                            DITOLAK</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                            (RM)</h5>
                                        <span class="h2 font-weight-bold mb-0">0</span>
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
                </div>
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Jana Laporan</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="POST" action="/filter_laporan">
                                @csrf
                                <div class="row">
                                    <div class="card-body">
                                        <form>
                                            {{-- <h6 class="heading-small text-muted mb-4">User information</h6> --}}
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-username">Nama</label>
                                                            <input type="text" id="input-username" class="form-control"
                                                                placeholder="{{ Auth()->user()->name }}" value="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-email">Alamat Email
                                                            </label>
                                                            <input type="email" id="input-email" class="form-control"
                                                                placeholder="{{ Auth()->user()->email }}" value="" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-first-name">No
                                                                Pekerja</label>
                                                            <input type="text" id="input-first-name" class="form-control"
                                                                placeholder="{{ Auth()->user()->user_code }}" value=""
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-username">No. K/P
                                                                Baru</label>
                                                            <input type="text" id="input-username" class="form-control"
                                                                placeholder="{{ Auth()->user()->nric }}" value=""
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row float-right">
                                    <div class="col-sm ">
                                        <br>
                                        <a id="submit" class="btn btn-primary btn-sm"
                                            href="/filter_laporan/{{ auth()->user()->id }}">Jana Laporan</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @break

            @case('datuk_bandar')
            @case('ketua_jabatan')
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Jana Laporan</h3>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form action="/laporan_sebulan_pergaji" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mt-4">
                                        <label class="h4">Jabatan</label>
                                        <select class="form-control" name="jabatan" required id="jabatan">
                                            <option selected disabled hidden>Pilih</option>
                                            @foreach ($jabatan as $j)
                                                <option value="{{ $j->ge_kod_jabatan }}">{{ $j->ge_keterangan_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <label class="h4">Bahagian</label>
                                        <select class="form-control" name="bahagian" required id="bahagian">
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <label class="h4">Bulan</label>
                                        <select class="form-control" name="bulan" required>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <label class="h4">Tahun</label>
                                        <select class="form-control" name="tahun" required>
                                            @for ($i = now()->year - 10; $i <= now()->year; $i++)
                                                <option {{ $i == now()->year ? 'selected' : '' }} value="{{ $i }}">
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col text-right mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Jana Laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    $('#jabatan').change(function(e) {
                        var selected = this.value;
                        var bahagian = @json($bahagian->toArray());
                        $("#bahagian").html('');
                        bahagian.forEach(b => {
                            if (b.ge_kod_jabatan == selected) {
                                $("#bahagian").append(new Option(b.ge_keterangan, b.ge_kod_jabatan + b
                                    .ge_kod_bahagian));
                            }
                        });
                    });
                </script>
            @break

            @case('kerani_semakan')
            @case('kerani_pemeriksa')
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Jana Laporan</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="POST" action="/filter_laporan">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <select id="jana_laporan" onchange="janaLaporan()" name="nama_kakitangan" required
                                            placeholder="{{ Auth()->user()->name }}" class="form-control"
                                            value="{{ Auth()->user()->name }}">
                                            @foreach ($get_user as $get_users)
                                                <option hidden selected> Nama Kakitangan</option>
                                                <option value="{{ $get_users->id }}">
                                                    {{ $get_users->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row float-right">
                                    <div class="col-sm ">
                                        <br>
                                        <a id="submit" class="btn btn-primary btn-sm" href="">Jana Laporan</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Jana Laporan</h3>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form action="/filter_laporan_2" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="h4">Tahun</label>
                                        <input type="text" class="form-control tahun" name="tahun" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="h4">Bulan</label>
                                        <select class="form-control" name="bulan" required>
                                            <option selected disabled hidden value="">Pilih</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <label class="h4">Jabatan</label>
                                        <select class="form-control" multiple multiselect-search="true"
                                            multiselect-select-all="true" name="jabatan[]" required id="jabatan">
                                            @foreach ($jabatan as $j)
                                                <option value="{{ $j->ge_kod_jabatan }}">{{ $j->ge_keterangan_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <label class="h4">Bahagian</label>
                                        <select class="form-control" name="bahagian[]" multiple multiselect-search="true"
                                            multiselect-select-all="true" required id="bahagianM">
                                        </select>
                                    </div>
                                    <div class="col text-right mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Jana Laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Jana Laporan</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="POST" action="/laporan_senarai_nama">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="h4">Tahun</label>
                                        <input type="text" class="form-control tahun" name="tahun" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="h4">Bulan</label>
                                        <select class="form-control" name="bulan" required>
                                            <option selected disabled hidden value="">Pilih</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row float-right">
                                    <div class="col-sm ">
                                        <br>
                                        <button id="submit" class="btn btn-primary btn-sm">Jana Laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    $('#jabatan').change(function(e) {
                        var selected = $(e.target).val();
                        var bahagian = @json($bahagian->toArray());
                        var option = '';
                        bahagian.forEach(b => {
                            selected.forEach(s => {
                                if (b.ge_kod_jabatan == s) {
                                    option += `<option value=` + b.ge_kod_jabatan + b.ge_kod_bahagian + `>` + b
                                        .ge_keterangan + `</option>`;
                                }
                            });
                        });
                        bahagianM.innerHTML = option;
                        bahagianM.loadOptions();
                    });
                </script>
            @break

            @case('ketua_bahagian')
            @case('penyelia')
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Jana Laporan</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="POST" action="/filter_laporan">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <h4>Nama Kakitangan</h4>
                                        <select id="jana_laporan" onchange="janaLaporan()" name="nama_kakitangan" required
                                            placeholder="{{ Auth()->user()->name }}" class="form-control"
                                            value="{{ Auth()->user()->name }}">
                                            @foreach ($get_user as $get_users)
                                                <option hidden selected> Nama Kakitangan</option>
                                                <option value="{{ $get_users->id }}">
                                                    {{ $get_users->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row float-right">
                                    <div class="col-sm ">
                                        <br>
                                        <a id="submit" class="btn btn-primary btn-sm" href="">Jana Laporan</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @break

            @case('pentadbir_sistem')
            @case('pelulus_pindaan')
                NONE
            @break

            @default
        @endswitch


        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan
                            Elaun
                            Lebih
                            Masa
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript">
        function janaLaporan() {
            let selected_id = $("#jana_laporan option:selected").val();
            $("#submit").attr("href", "/filter_laporan/" + selected_id);
        }
    </script>

    <script src="/assets/js/multiselect-dropdowna.js"></script>
@endsection
