<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sistem Pengurusan Elaun Lebih Masa
    </title>

    <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}//css/argon.min.css?v=1.2.1" type="text/css">
    <!-- End Google Tag Manager -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- multiple select --}}
    <link rel="stylesheet" href="/assets/virtual-select-master/dist/virtual-select.min.css" />
    <script src="/assets/virtual-select-master/dist/virtual-select.min.js"></script>

</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center  ">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{ asset('argon') }}/img/mbpj.png" style="padding:20px 0px 0px 45px;">
                </a>
                <div class=" ml-auto ">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items pentadbir -->
                    @if (auth()->user()->role == 'pentadbir_sistem')
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">
                                    <i class="ni ni-archive-2 text-green"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/users">
                                    <i class="ni ni-archive-2 text-green"></i>
                                    <span class="nav-link-text">Pengurusan Pengguna</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faqs">
                                    <i class="ni ni-chat-round text-green"></i>
                                    <span class="nav-link-text">Bantuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/maklumans">
                                    <i class="ni ni-calendar-grid-58 text-green"></i>
                                    <span class="nav-link-text">Aduan Sistem</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/utiliti">
                                    <i class="fas fa-tools text-green"></i>
                                    <span class="nav-link-text">Utiliti</span>
                                </a>
                            </li>
                        </ul>
                    @elseif(auth()->user()->role == 'datuk_bandar' or auth()->user()->role == 'pelulus_pindaan')
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">
                                    <i class="ni ni-archive-2 text-red"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tuntutans">
                                    <i class="ni ni-calendar-grid-58 text-red"></i>
                                    <span class="nav-link-text">Semakan Tuntutan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faqs">
                                    <i class="ni ni-chat-round text-red"></i>
                                    <span class="nav-link-text">Bantuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/laporans">
                                    <i class="ni ni-chart-bar-32 text-red"></i>
                                    <span class="nav-link-text">Laporan</span>
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">
                                    <i class="ni ni-archive-2 text-info"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/permohonans">
                                    <i class="ni ni-chart-pie-35 text-info"></i>
                                    <span class="nav-link-text">Semakan Permohonan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tuntutans">
                                    <i class="ni ni-calendar-grid-58 text-info"></i>
                                    <span class="nav-link-text">Semakan Tuntutan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faqs">
                                    <i class="ni ni-chat-round text-info"></i>
                                    <span class="nav-link-text">Bantuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/maklumans">
                                    <i class="ni ni-calendar-grid-58 text-info"></i>
                                    <span class="nav-link-text">Aduan Sistem</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/laporans">
                                    <i class="ni ni-chart-bar-32 text-info"></i>
                                    <span class="nav-link-text">Laporan</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/person.png">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ Auth()->user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Selamat Datang !</h6>
                                </div>
                                <a href="/profiles" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profil</span>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="/logout" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Log Keluar</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Argon Scripts -->
    <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="/assets/vendor/moment/min/moment.min.js"></script>
    <script src="/assets/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Argon JS -->
    <script src="/assets/js/argon.min.js?v=17"></script>
    {{-- <script src="/assets/js/demo.min.js"></script> --}}

    <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/pagination/select.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({});
        });
    </script>

    @yield('script')

    {{-- datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>

    <script src="/assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}

</body>

</html>
