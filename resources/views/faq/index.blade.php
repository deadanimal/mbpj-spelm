@extends('base')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="header bg-primary pb-6">
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
    'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa' )
    <!-- Page content -->
    @foreach ($faqs as $faq)
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <button class="accordion"> {{$faq->tajuk_aduan}}</button>
                        <div class="panel">
                            <p>{{$faq->maklumat}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container-fluid mt--12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 mb-3">Manual Pengguna</h5>
                        <button type="submit" onclick="window.open('file.pdf')" class="btn btn-primary">Manual
                            Pengguna!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- user Lain --}}
    @elseif(auth()->user()->role == 'pentadbir_sistem')
    <div class="container-fluid mt--6">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Soalan Lazim</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive py-4">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tajuk</th>
                                    <th>Butiran</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($faqs as $faq)
                                <tr>
                                    <td >
                                        {{$loop->index+1}}
                                    </td>
                                    <td >
                                        {{$faq->tajuk_aduan}}
                                    </td>
                                    <td >
                                        {{$faq->maklumat}}
                                    </td>

                                    <td class="kemaskini">
                                        <a href="/faqs/{{$faq->id}}/edit" class="btn btn-success btn-sm">Kemaskini</a>
                                        <button onclick="buang({{ $faq->id }})"
                                            class="btn btn-danger btn-sm">Buang</button> </td>

                                </tr>
                                <script>
                                    function buang(id) {
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
                                @empty
                                Tiada rekod
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- user Lain --}}
    @elseif(auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'ketua_bahagian' or
    auth()->user()->role == 'pelulus_pindaan')
    <!-- Page content -->
    @foreach ($faqs as $faq)
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h5 class="h3 mb-3">Soalan Lazim </h5> --}}
                        <button class="accordion"> {{$faq->tajuk_aduan}}</button>
                        <div class="panel">
                            <p>{{$faq->maklumat}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
@endsection
