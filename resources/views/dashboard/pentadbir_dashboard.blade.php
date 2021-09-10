@extends('base')

@section('content')
<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-7">
                    <h1 class="h1 text-white "> Selamat Datang {{Auth()->user()->name}} ke Modul Pentadbir Sistem </h1>
                    <h1 class="h2 text-white "> Sistem Pengurusan Elaun Lebih Masa
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid mt--6">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGGUNA SISTEM
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">{{$staffjumlah}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-single-02"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGGUNA AKTIF
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">{{$staffaktif}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-single-02"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> JUMLAH PENGGUNA TIDAK AKTIF
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">{{$staffxaktif}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-single-02"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-default">
                        <div class="card-header ">
                                <h3 class="mb-0">Laporan Audit Trail Sistem Pengurusan Elaun Lebih Masa</h3>
                                <div class="card-body px-0">
                            <div class="table-responsive py-4">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Peranan</th>
                                            <th>Tarikh</th>
                                            <th>Makluman</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($audits as $audit)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $audit->name}}</td>
                                            <td>{{ $audit->peranan}}</td>
                                            <td>{{ $audit->created_at }}</td>

                                            @if($audit->description =='Log Masuk')
                                            <td>
                                                <span class="badge badge-pill badge-success">Log Masuk</span>
                                            </td>
                                            @elseif($audit->description =='Log Keluar')
                                            <td>
                                                <span class="badge badge-pill badge-danger">Log Keluar</span>
                                            </td>
                                            @else
                                            <td>
                                                {{$audit->description}}
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Pengurusan
                                Elaun Lebih Masa
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} ); 
</script>     --}}
@endsection
