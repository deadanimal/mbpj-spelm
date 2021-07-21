@extends('base')

@section('content')

<div>
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Permohonan</h6>
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
    </div>
  </div>
    <div class="container-fluid mt--6">
      <div class="row">
    <div class="col-lg-12">
        <div class="card-wrapper">
          <!-- Input groups -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Kemaskini Borang Permohonan</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form method="POST" action="/faqs">
                @csrf
                <!-- Input groups with icon -->        
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="lokasi">Tajuk Soalan</label>
                          <div class="input-group input-group-merge">
                            <input class="form-control"name="tajuk_aduan"  placeholder="tajuk" type="text">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class=""></i></span>
                            </div>
                          </div>
                        </div>
                      </div> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="lokasi">Soalan Lazim</label>
                      <div class="input-group input-group-merge">
                        <input class="form-control"name="maklumat"  placeholder="butiran soalan" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                      </div>
                    </div>
                  </div>               
                  </div>  
                  <button  type="submit" class="btn btn-primary float-right">Kemaskini</button>
                </div>                
                </div>            
            </div>
          </div>
        </div>

        <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
              <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Pengurusan Elaun Lebih Masa
</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    <div>

@endsection

