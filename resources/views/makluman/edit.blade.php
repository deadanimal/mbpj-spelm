@extends('base')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Jawab Aduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/maklumans"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/maklumans">Aduan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@if(auth()->user()->role == 'kakitangan'or auth()->user()->role == 'penyelia'or auth()->user()->role == 'kerani_semakan'
or auth()->user()->role == 'kerani_pemeriksa' )
<div class="container-fluid mt--6">
    {{-- <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Senarai Aduan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No</th>
                                <th scope="col" class="sort" data-sort="tajuk_aduan">Berkaitan</th>
                                <th scope="col" class="sort" data-sort="maklumat">Aduan</th>
                                <th scope="col" class="sort">Jawapan</th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @forelse($aduans as $aduan)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">
                                                <a> {{$aduan->id}}</a>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <td class="tajuk_aduan">
                                    {{$aduan->jenis_aduan}}
                                </td>
                                <td class="maklumat">
                                    {{$aduan->aduan}}
                                </td>
                                <td class="maklumat">
                                    {{$aduan->jawab_aduan}}
                                </td>

                            </tr>
                            @empty
                            <div style="text-align:center;">
                                <td  >
                                    <h5>  Tiada rekod </h5>
                                  </td>   
                            </div> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@elseif(auth()->user()->role == 'pentadbir_sistem')
<div class="container-fluid mt--6">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Kemaskini Helpdesk</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" action="/maklumans/{{$makluman->id}}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
    
                                        <div class="form-group">
                                            <textarea class="form-control"
                                            id="maklumat" name="maklumat" value="{{$makluman->maklumat}}"></textarea>
                                        </div>
                                
                                </div>
                            <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection

@section('script')

{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
<script type="text/javascript">

$(window).on('load', function(){
    // $('ckeditor').ckeditor();
    var lol = CKEDITOR.replace('maklumat');
    lol.setData({!! json_encode($makluman->maklumat)!!});
})

</script>
@endsection