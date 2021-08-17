@extends('base')

@section('content')

<div class="header bg-primary pb-6">
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
        @if(auth()->user()->role == 'kakitangan')
        @elseif(auth()->user()->role == 'penyelia')
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-bell-55 mr-2"></i>Tuntutan Elaun Lebih Masa
                        {{Auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-calendar-grid-58 mr-2"></i>Semak Tuntutan Elaun Lebih Masa</a>
                </li>
            </ul>
        </div>
        @else
        @endif
    </div>
</div>
<div class="container-fluid">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
            </div>
        </div>
        {{-- user first --}}
        @if(auth()->user()->role == 'kakitangan')
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Tuntutan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example"
                    class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th >No</th>
                                    <th> Tarikh Mohon</th>
                                    <th> Waktu Kerja</th>
                                    <th> Perkara</th>
                                    <th> Status</th>
                                    <th> Jenis Permohonan</th>
                                     <!-- eKedatangan -->
                                     <th >clockintime</th>
                                     <th >clockouttime</th>
                                     <th >totalworkinghour</th>
                                     <th >otstarttime1</th>
                                     <th >otendtime1</th>
                                     <th >otdurationt1</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- user Lain --}}
        @elseif(auth()->user()->role == 'penyelia')
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
                                            <h3 class="mb-0">Tuntutan</h3>
                                        </div>
                                        <!-- Light table -->
                                        <table id="example"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            style="width:100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th >No</th>
                                                    <th> Tarikh Mohon</th>
                                                    <th> Waktu Kerja</th>
                                                    <th> Perkara</th>
                                                    <th> Status</th>
                                                    <th> Jenis Permohonan</th>
                                                     <!-- eKedatangan -->
                                                    <th >clockintime</th>
                                                    <th >clockouttime</th>
                                                    <th >totalworkinghour</th>
                                                    <th >otstarttime1</th>
                                                    <th >otendtime1</th>
                                                    <th >otdurationt1</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
                    <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel"
                        aria-labelledby="tabs-icons-text-2-tab">
                        <div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Card header -->
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Semak Tuntutan</h3>
                                        </div>
                                        <!-- Light table -->
                                        <table id="example"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            style="width:100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th >No</th>
                                                    <th> Tarikh Mohon</th>
                                                    <th> Waktu Kerja</th>
                                                    <th> Perkara</th>
                                                    <th> Status</th>
                                                    <th> Jenis Permohonan</th>
                                                     <!-- eKedatangan -->
                                                    <th >clockintime</th>
                                                    <th >clockouttime</th>
                                                    <th >totalworkinghour</th>
                                                    <th >otstarttime1</th>
                                                    <th >otendtime1</th>
                                                    <th >otdurationt1</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @elseif(auth()->user()->role == 'ketua_bahagian'or auth()->user()->role =='ketua_jabatan')
        {{-- user Lain --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semak Tuntutan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example"
                    class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                 
                                        <th >No</th>
                                        <th> Tarikh Mohon</th>
                                        <th> Waktu Kerja</th>
                                        <th> Perkara</th>
                                        <th> Status</th>
                                        <th> Jenis Permohonan
                                        </th>
                                    <!-- eKedatangan -->
                                        <th >clockintime</th>
                                        <th >clockouttime</th>
                                        <th >totalworkinghour</th>
                                        <th >otstarttime1</th>
                                        <th >otendtime1</th>
                                        <th >otdurationt1</th>
                                </tr>
                            </thead>
                            <tbody class="list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @elseif(auth()->user()->role == 'datuk_bandar')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semak Tuntutan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example"
                    class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th >No</th>
                                    <th> Tarikh Mohon</th>
                                    <th> Waktu Kerja</th>
                                    <th> Perkara</th>
                                    <th> Status</th>
                                    <th> Jenis Permohonan
                                    </th>
                                <!-- eKedatangan -->
                                    <th >clockintime</th>
                                    <th >clockouttime</th>
                                    <th >totalworkinghour</th>
                                    <th >otstarttime1</th>
                                    <th >otendtime1</th>
                                    <th >otdurationt1</th>
                            </tr>
                            </thead>
                            <tbody class="list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @elseif(auth()->user()->role == 'kerani_semakan'or auth()->user()->role ==
        'kerani_pemeriksa')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Semak Tuntutan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example"
                    class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                            <thead class="thead-light">
                                <tr> 
                                    <th >No</th>
                                    <th> Tarikh Mohon</th>
                                    <th> Waktu Kerja</th>
                                    <th> Perkara</th>
                                    <th> Status</th>
                                    <th> Jenis Permohonan
                                    </th>
                                <!-- eKedatangan -->
                                    <th >clockintime</th>
                                    <th >clockouttime</th>
                                    <th >totalworkinghour</th>
                                    <th >otstarttime1</th>
                                    <th >otendtime1</th>
                                    <th >otdurationt1</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @elseif(auth()->user()->role == 'pelulus_pindaan')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Kelulusan Kemaskini Pindaan Tuntutan</h3>
                    </div>
                    <!-- Light table -->
                    <table id="example"
                    class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th >No</th>
                                    <th> Tarikh Mohon</th>
                                    <th> Waktu Kerja</th>
                                    <th> Perkara</th>
                                    <th> Status</th>
                                    <th> Jenis Permohonan
                                    </th>
                                <!-- eKedatangan -->
                                    <th >clockintime</th>
                                    <th >clockouttime</th>
                                    <th >totalworkinghour</th>
                                    <th >otstarttime1</th>
                                    <th >otendtime1</th>
                                    <th >otdurationt1</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            </tbody>
                        </table>
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
                        <h3 class="mb-0">Modul ini tidak dapat dijalankan pada peranan anda.
                            Sila hubungi pentadbir sistem anda.</h3>
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
                        &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem
                            Pengurusan Elaun Lebih
                            Masa</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<div>
@endsection
