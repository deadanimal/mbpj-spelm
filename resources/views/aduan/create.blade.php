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
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
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
            <div class="card-header">
                <h5 class="h3 mb-3">Bantuan Helpdesk</h5>
                <div class="card-body">
                    <form method="POST" action="/aduans">
                      @csrf
                      <!-- Input groups with icon -->        
                  
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <select class="form-select form-select-sm col-8" name="jenis_aduan" aria-label=".form-select-sm example">
                              <option value="Permohonan">Permohonan Kerja Lebih Masa</option>
                              <option value="Pengesahan">Pengesahan Kerja Lebih Masa</option>
                              <option value="Tuntutan">Tuntutan Elaun  Lebih Masa</option>
                              <option value="Sistem">Sistem Pengurusan Elaun Lebih Masa</option>
                              <option value="lain-lain">Lain-Lain aduan</option>
                            </select>
                            </div> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="lokasi">Aduan</label>
                            <div class="input-group input-group-merge">
                              <input class="form-control"name="aduan"  placeholder="butiran soalan" type="text">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class=""></i></span>
                              </div>
                            </div>
                          </div>
                        </div>      
                        <button  type="submit" class="btn btn-primary float-right">Hantar Aduan</button>
         
                        </div>  
                      </div>                      
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection