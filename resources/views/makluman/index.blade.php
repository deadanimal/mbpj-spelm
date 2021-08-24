@extends('base')

@section('content')


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Aduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/maklumans"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/maklumans">Aduan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                        </ol>
                    </nav>
                </div>

                @if(auth()->user()->role == 'pentadbir_sistem')
                <div class="col-lg-6 col-5 text-right">
                    <a href="/maklumans/create" class="btn btn-sm btn-neutral">Tambah Makluman Helpdesk</a>
                </div>
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"></i>Makluman Aduan Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false"></i>Kemaskini Helpdesk</a>
                        </li>
                   
                    </ul>
                </div>
                @elseif(auth()->user()->role == 'penyelia')
        
                @else
                @endif

               
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
            aria-labelledby="tabs-icons-text-1-tab">
            <div>
                <div class="container-fluid mt--6">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Bantuan Helpesk</h3>
                                        @foreach ($maklumans as $makluman)
                                        <div class="card-header">
                                            <div class="panel">
                                                <p>{!!$makluman->maklumat!!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Penyelia Semak --}}
        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
            aria-labelledby="tabs-icons-text-2-tab">
            <div>
                <div class="container-fluid mt--6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Kemaskini Makluman Helpdesk</h3>

                            </div>
                            <div class="table-responsive py-4">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Butiran</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        @forelse($maklumans as $makluman)
                                        <tr>
                                            <td >
                                                {{$loop->index+1}}
                                            </td>
                                            <td >
                                                {!!$makluman->maklumat!!}
                                            </td>
                        
                                            <td class="kemaskini">
                                                <a href="/maklumans/{{$makluman->id}}/edit" class="btn btn-success btn-sm">Kemaskini</a>
                                                <button onclick="buang({{ $makluman->id }})"class="btn btn-danger btn-sm">Buang</button> </td>
                                        </tr>   
                                        
                                        <script>
                                            function buang(id) {
                                                swal({
                                                    title: 'Makluman?',
                                                    text: "Buang butiran Roll Call?!",
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
                                                            url: "maklumans/"+id,
                                                            type: "POST",
                                                            data: {
                                                                "id": id,
                                                                "_token": "{{ csrf_token() }}",
                                                                "_method": 'delete'
                                                            },
                                                            success: function(data) {
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
            </div>
        </div>
    </div>
</div>


 

    {{--  --}}
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
