@extends('base')

@section('content')

<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Aduan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="maklumans"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Aduan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-white h3 mb-3">Bantuan Helpdesk</h5>
            </div>
                <div class="card-body">
                    <form method="POST" action="/maklumans">
                      @csrf
                      <!-- Input groups with icon -->        
                  
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            {{-- <label for="lokasi">Aduan</label> --}}
                            <div class="form-group">
                                <textarea class="ckeditor form-control"
                                    name="maklumat"></textarea>
                            </div>
                          </div>
                        </div>    
                      </div>  
                      <button  type="submit" class="btn btn-primary btn-sm float-right">Tambah Makluman</button>
                    
                </div>
       
        </div>
    </div>
</div>
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