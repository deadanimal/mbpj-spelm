@extends('base')

@section('content')
@if($errors->any())
        <h4 class="text-red text-center">{{$errors->first()}}</h4>
    @endif
<div>
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Daftar Permohonan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/permohonans"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/permohonans/create">Permohonan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                            href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                            aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i> Daftar Permohonan Individu / Borang
                            A1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                            aria-selected="false"><i class="ni ni-bell-55 mr-2"></i> Daftar Permohonan Berkumpulan / Borang
                            A2</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Daftar Borang Permohonan</h3>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <form method="POST" action="/permohonans">
                                        @csrf
                                        <!-- Input groups with icon -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-select form-select-sm col-8"
                                                        name="jenis_permohonan" aria-label=".form-select-sm example">
                                                        <option value="individu">Permohonan Individu / Borang A1
                                                        </option>
                                                        {{-- <option value="berkumpulan">Permohonan Berkumpulan / Borang
                                                            A2
                                                        </option> --}}
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mohon_mula_kerja">Pilih waktu mula</label>
                                                            <div class="input-group date" id="datetimepicker1">
                                                                <input type="text" class="form-control"
                                                                    name="mohon_mula_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button" id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mohon_akhir_kerja">Pilih waktu akhir</label>
                                                            <div class="input-group date" id="datetimepicker2">

                                                                <input type="text" class="form-control"
                                                                    name="mohon_akhir_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button" id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lokasi">Lokasi kerja lebih masa</label>
                                                            <div class="input-group input-group-merge">
                                                                <input class="form-control" name="lokasi"
                                                                    placeholder="lokasi" type="text">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-map-marker"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Perkara">Sebab kerja lebih masa</label>

                                                            <div class="input-group input-group-merge">
                                                                <input class="form-control" name="tujuan"
                                                                    placeholder="tujuan" type="text">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-eye"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pegawai_sokong_id">Pilih pegawai
                                                                sokong</label>
                                                            <select name="pegawai_sokong_id" class="form-control">
                                                                <option hidden selected> Pilih pegawai sokong
                                                                </option>
                                                                @foreach ($pegawai as $user)
                                                                <option value="{{$user->id}}">
                                                                    {{$user->name}} - {{$user->role}}

                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pegawai_lulus_id">Pilih pegawai
                                                                lulus</label>
                                                            <select name="pegawai_lulus_id" class="form-control">
                                                                <option hidden selected> Pilih pegawai lulus
                                                                </option>
                                                                @foreach ($pegawai as $user)
                                                                <option value="{{$user->id}}">
                                                                    {{$user->name}} - {{$user->role}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm float-right">Hantar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel2" aria-labelledby="tabs-icons-text-2-tab">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-wrapper">
                        <!-- Input groups -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Daftar Borang Permohonan</h3>
                     
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <form method="POST" action="/permohonans/">
                                    @csrf
                                    <!-- Input groups with icon -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-select form-select-sm col-8" name="jenis_permohonan"
                                                    aria-label=".form-select-sm example">
                                                    {{-- <option value="individu">Permohonan Individu / Borang A1
                                                    </option> --}}
                                                    <option value="berkumpulan">Permohonan Berkumpulan / Borang
                                                        A2
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_mula_kerja">Pilih waktu mula</label>
                                                        <div class="input-group date" id="datetimepicker3">
                                                            <input type="text" class="form-control"
                                                                name="mohon_mula_kerja">
                                                            <span class="input-group-addon input-group-append">
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="button-addon2"> <span
                                                                        class="fa fa-calendar"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_akhir_kerja">Pilih waktu akhir</label>
                                                        <div class="input-group date" id="datetimepicker4">
                                                            <input type="text" class="form-control"
                                                                name="mohon_akhir_kerja">
                                                            <span class="input-group-addon input-group-append">
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="button-addon2"> <span
                                                                        class="fa fa-calendar"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi kerja lebih masa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="lokasi"
                                                                placeholder="lokasi" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-map-marker"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Perkara">Sebab kerja lebih masa</label>

                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="tujuan"
                                                                placeholder="tujuan" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_sokong_id">Pilih pegawai
                                                            sokong</label>
                                                        <select name="pegawai_sokong_id" class="form-control">
                                                            <option hidden selected> Pilih pegawai sokong
                                                            </option>
                                                            @foreach ($pegawai as $user)
                                                            <option value="{{$user->id}}">
                                                                {{$user->name}} - {{$user->role}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_lulus_id">Pilih pegawai
                                                            lulus</label>
                                                        <select name="pegawai_lulus_id" class="form-control">
                                                            <option hidden selected> Pilih pegawai lulus
                                                            </option>
                                                            @foreach ($pegawai as $user)
                                                            <option value="{{$user->id}}">
                                                                {{$user->name}} - {{$user->role}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right">Hantar</button>

                                                </div>

                                            </div>
                                        </div>
                                </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script
    src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<script src="/assets/vendor/select2/dist/js/select2.min.js">
</script>
<script
    src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<script src="/assets/vendor/moment.min.js">
</script>
<script src="/assets/vendor/bootstrap-datetimepicker.js">
</script>
<script src="/assets/vendor/nouislider/distribute/nouislider.min.js">
</script>
<script src="/assets/vendor/quill/dist/quill.min.js">
</script>
<script src="/assets/vendor/dropzone/dist/min/dropzone.min.js">
</script>
<script
    src="/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js">
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({

            icons: {
                todayBtn: "linked",
                time: "fa fa-clock",
                date: "fa fa-calendar-day",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }


        });

        $('#datetimepicker2').datetimepicker({
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-day",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    });

</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({

            icons: {
                todayBtn: "linked",
                time: "fa fa-clock",
                date: "fa fa-calendar-day",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }


        });

        $('#datetimepicker4').datetimepicker({
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-day",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    });

    function kirabezajam() {
        alert("test");
        $jam_mula = $("input [name=mohon_mula_kerja").val();
        $jam_akhir = $("input [name=mohon_akhir_kerja").val();
        alert($jam_mula);
    }

</script>
{{-- <script>
        function myFunction() {
            var x = document.getElementById("mySelect").value;
            if (x == "individu") {
                document.getElementById("tambah_ic").style.display = "none";
            } else
                document.getElementById("tambah_ic").style.display = "block";

        }

    </script> --}}
{{-- <script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/demo.min.js"></script> --}}

@endsection
