@extends('base')

<head>

    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            /* background-color: #ccc; */
        }

        .panel {
            padding: 0 18px;
            /* background-color: white; */
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

    </style>
</head>
@section('content')
<div>
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Bantuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Bantuan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                            </ol>
                        </nav>
                    </div>

                    @if(auth()->user()->role == 'pentadbir_sistem')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/faqs/create" class="btn btn-sm btn-neutral">Tambah FAQ</a>
                    </div>
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true"></i>Makluman Soalan Lazim (FAQ) Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                    href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                    aria-selected="false"></i>Kemaskini Soalan Lazim (FAQ)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                    href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                    aria-selected="false"></i>Kemaskini Panduan Pengguna</a>
                            </li>
                        </ul>
                    </div>
                    @elseif(auth()->user()->role == 'penyelia')
                    {{-- <div class="col-lg-6 col-5 text-right">
                        <a href="/faqs/create" class="btn btn-sm btn-neutral">Tambah FAQ</a>
                    </div> --}}
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- user first --}}
    @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'penyelia'or auth()->user()->role ==
    'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa' or auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'ketua_bahagian' or
    auth()->user()->role == 'pelulus_pindaan'or auth()->user()->role == 'datuk_bandar' )
    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-header bg-primary border-0">
                    <h3 class="mb-0 text-white">Soalan Lazim (FAQ)</h3>
                </div>
                <div class="card">
                    @foreach ($faqs as $faq)
                    <button class="accordion"> {{$faq->tajuk_aduan}}</button>
                    <div class="panel">
                        <p>{!!$faq->maklumat!!}</p>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid mt--2">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-header bg-primary border-0">
                    <h3 class="mb-0 text-white">Panduan Pengguna (User Manual)</h3>
                </div>
                <div class="card">
                    @foreach ($manuals as $manual)
                    <button class="accordion"> Muat Turun Panduan Pengguna </button>
                    <div class="panel">
                        <p>{!!$manual->notis!!} 
                        <button class="btn btn-primary btn-lg fa fa-download ">
                            <a class="text-white" href="/storage/uploads/{{$manual->name}}" target="_blank ">Muat Turun Panduan Pengguna
                            </a>
                        </button>
                    </p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    {{-- user Lain --}}
    @elseif(auth()->user()->role == 'pentadbir_sistem')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card-header bg-primary border-0">
                                <h3 class="text-white mb-0">Soalan Lazim (FAQ)</h3>
                            </div>
                            <div class="card">
                                @foreach ($faqs as $faq)
                                <button class="accordion"> {{$faq->tajuk_aduan}}</button>
                                <div class="panel"  >
                                    <p>{!!$faq->maklumat!!}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt--2">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card-header bg-primary border-0">
                                <h3 class="text-white mb-0">Panduan Pengguna (User Manual)</h3>
                            </div>
                            <div class="card">
                                @foreach ($manuals as $manual)
                                <button class="accordion"> Muat Turun Panduan Pengguna </button>
                                <div class="panel">
                                <p>{!!$manual->notis!!}
                                    <button class="btn btn-info btn-lg fa fa-download" >
                                        <a href="/storage/uploads/{{$manual->name}}" target="_blank">Muat Turun
                                            Panduan Pengguna </a>
                                    </button>
                                </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header bg-primary border-0">
                                    <h3 class="text-white mb-0">Kemaskini Soalan Lazim (FAQ)</h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Tajuk</th>
                                                <th>Butiran</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($faqs as $faq)
                                            <tr>
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                                <td>
                                                    {{$faq->tajuk_aduan}}
                                                </td>
                                                <td>
                                                    {!!$faq->maklumat!!}
                                                </td>

                                                <td class="kemaskini">
                                                    <a href="/faqs/{{$faq->id}}/edit"
                                                        class="btn btn-success btn-sm">Kemaskini</a><br>
                                                    <button onclick="buangfaq({{ $faq->id }})"
                                                        class="btn btn-danger btn-sm">Buang</button> 
                                                </td>

                                            </tr>
                                            <script>
                                                function buangfaq(id) {
                                                    swal({
                                                        title: 'Makluman?',
                                                        text: "Buang butiran Faq?!",
                                                        type: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Buang',
                                                        cancelButtonText: 'Tutup',

                                                    }).then(result => {
                                                        console.log("result", result);
                                                        if (result.value == true) {
                                                            console.log("id", id);
                                                            $.ajax({
                                                                url: "faqs/" + id,
                                                                type: "POST",
                                                                data: {
                                                                    "id": id,
                                                                    "_token": "{{ csrf_token() }}",
                                                                    "_method": 'delete'
                                                                },
                                                                success: function (data) {
                                                                    location.reload();
                                                                },
                                                            });

                                                        } else if (result.dismiss == "cancel") {
                                                            console.log("dismiss");
                                                        }
                                                    })
                                                }

                                            </script>
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
        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary mb-5">
                                    <h3 class="text-white text-left ">Kemaskini Panduan Pengguna</h3>
                                </div>

                                <body>
                    
                                        <form action="{{route('fileUpload')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @endif

                                            @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group">
                                             
                                                        <label for="file">Tajuk Panduan Pengguna</label>
                                                    <textarea class="ckeditor form-control" name="notis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="file"> Muat Naik Lampiran</label>
                                                    <div class="input-group input-group-merge">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input"
                                                                id="chooseFile">
                                                            <label class="custom-file-label" for="chooseFile">Select
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pegawai_sokong_id">Pilih Pengguna Manual</label>
                                                    <select name="role_user" class="form-control">
                                                        <option hidden selected> Pilih Pengguna Manual
                                                        </option>
                                                        <option value="kakitangan">kakitangan</option>
                                                        <option value="ketua_bahagian">ketua_bahagian</option>
                                                        <option value="ketua_jabatan">ketua_jabatan</option>
                                                        <option value="pentadbir_sistem">pentadbir_sistem</option>
                                                        <option value="kerani_semakan">kerani_semakan</option>
                                                        <option value="kerani_pemeriksa">kerani_pemeriksa</option>
                                                        <option value="penyelia">penyelia</option>
                                                        <option value="datuk_bandar">datuk_bandar</option>
                                                        <option value="pelulus_pindaan">pelulus_pindaan</option>


                                                    </select>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm mt-4 float-right">
                                                    Tambah
                                                </button>
                                            </div>
                                          
                                        </form>
                             
                                </body>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-2">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header bg-primary border-0">
                                    <h3 class="text-white mb-0">Panduan Pengguna</h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Makluman</th>
                                                <th>Nama</th>
                                                <th>Lampiran</th>
                                                <th>Pengguna</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($manuals as $manual)
                                            <tr>
                                                <td>
                                                    {{$loop->index+1}}
                                                </td>
                                                <td>
                                                    {!!$manual->notis!!}
                                                </td>
                                                <td>
                                                    {!!$manual->name!!}
                                                </td>
                                                <td>
                                                    {!!$manual->file_path!!}
                                                </td>
                                                <td>
                                                    {{$manual->role_user}}
                                                </td>

                                                <td class="kemaskini">
                                              
                                                    <button onclick="buangmanual({{ $manual->id }})"
                                                        class="btn btn-danger btn-sm">Buang</button>
                                                </td>

                                            </tr>
                                            <script>
                                                function buangmanual(id) {
                                                    swal({
                                                        title: 'Makluman !!',
                                                        text: "Buang Panduan Penguna ?",
                                                        type: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Buang',
                                                        cancelButtonText: 'Tutup',

                                                    }).then(result => {
                                                        console.log("result", result);
                                                        if (result.value == true) {
                                                            console.log("id", id);
                                                            $.ajax({
                                                                url: "manuals/" + id,
                                                                type: "POST",
                                                                data: {
                                                                    "id": id,
                                                                    "_token": "{{ csrf_token() }}",
                                                                    "_method": 'delete'
                                                                },
                                                                success: function (data) {
                                                                    location.reload();
                                                                },
                                                            });

                                                        } else if (result.dismiss == "cancel") {
                                                            console.log("dismiss");
                                                        }
                                                    })
                                                }

                                            </script>

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

    @else
    <div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                              <i class="ni ni-lock-circle-open"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h1 class="card-title  text-muted mb-0">Modul ini tidak dibekalkan kepada anda. Sila hubungi
                                pentadbir sistem pengurusan elaun lebih masa.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    @endif
</div>

<!-- Accordion Script -->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

</script>
<script>
    $(document).ready(function () {
        var table = $('table.display').DataTable();
    });
</script>



@endsection
