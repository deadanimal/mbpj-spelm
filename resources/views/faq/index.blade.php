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
    @if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'penyelia'or auth()->user()->role == 'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa' )
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
        <div class="container-fluid mt--12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="h3 mb-3">Manual Pengguna</h5>
                            <button type="button" class="btn btn-primary">Manual Pengguna</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="h3 mb-3">Bantuan Helpdesk</h5>

                            <div class="media align-items-center">
                                <div class="media-body">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle  " type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Jenis Aduan
                                        </button><br><br>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Sistem</a>
                                            <a class="dropdown-item" href="#">Permohonan Kerja Lebih Masa</a>
                                            <a class="dropdown-item" href="#">Tuntutan Elaun Lebih Masa</a>
                                        </div>
                                    </div>
                                    <form>
                                        <textarea class="form-control" placeholder="Write your comment"
                                            rows="3"></textarea><br>

                                        <button type="submit" class="btn btn-primary float-right">Hantar Aduan</button>

                                    </form>
                                </div>
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
                            <h3 class="mb-0">Permohonan Kerja Lebih Masa</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="no">No</th>
                                        <th scope="col" class="sort" data-sort="tajuk_aduan">Tajuk</th>
                                        <th scope="col" class="sort" data-sort="maklumat">Butiran</th>

                                        <th scope="col" class="sort">Kemaskini</th>

                                    </tr>
                                </thead>

                                <tbody class="list">
                                    @forelse($faqs as $faq)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">
                                                        <a> {{$faq->id}}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="tajuk_aduan">
                                            {{$faq->tajuk_aduan}}
                                        </td>
                                        <td class="maklumat">
                                            {{$faq->maklumat}}
                                        </td>     
                                         
                                        <td class="kemaskini">
                                            <a href="/faq/{{$faq->id}}/edit"class="btn btn-success">Kemaskini</a>
                                        </td>
                                    </tr>
                                    @empty
                                    Tiada rekod
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
        </div>
        <div class="container-fluid mt--12">
            <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Bantuan</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="no">No</th>
                                            <th scope="col" class="sort" data-sort="tajuk_aduan">Jenis aduan</th>
                                            <th scope="col" class="sort" data-sort="aduan">Aduan</th>
                                            <th scope="col" class="sort" data-sort="email">Email</th>
                                            <th scope="col" class="sort" data-sort="nama">Nama</th>
    
                                            <th scope="col" class="sort">Kemaskini</th>
    
                                        </tr>
                                    </thead>
    
                                    <tbody class="list">
                                        {{-- @forelse($faqs as $faq) --}}
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">
                                                            {{-- <a> {{$faq->id}}</a> --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="tajuk_aduan">
                                                {{-- {{$faqs->tajuk_aduan}} --}}
                                            </td>
                                            <td class="maklumat">
                                                {{-- {{$faqs->maklumat}} --}}
                                            </td>     
                                            <td class="status">
                                                {{-- {{$faqs->maklumat}} --}}
                                            </td>   
                                            <td class="status">
                                                {{-- {{$faqs->maklumat}} --}}
                                            </td>            
                                            <td class="kemaskini">
                                                <a href="#"class="btn btn-success">Jawab</a>
                                            </td>
                                        </tr>
                                        {{-- @empty
                                        Tiada rekod
                                        @endforelse --}}
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
            {{-- user Lain --}}
    @elseif(auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'pelulus_pindaan')
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
              
                <div class="container-fluid mt--12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h3 mb-3">Bantuan Helpdesk</h5>

                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Jenis Aduan
                                                </button><br><br>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Sistem</a>
                                                    <a class="dropdown-item" href="#">Permohonan Kerja Lebih Masa</a>
                                                    <a class="dropdown-item" href="#">Tuntutan Elaun Lebih Masa</a>
                                                </div>
                                            </div>
                                            <form>
                                                <textarea class="form-control" placeholder="Write your comment"
                                                    rows="3"></textarea>

                                                <button type="submit" class="btn btn-primary float-right">Hantar
                                                    Aduan</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- user Lain --}}

                            {{-- Error --}}
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
                            <div>
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
