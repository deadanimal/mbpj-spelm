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
              <form method="POST" action="/permohonans/">
                @csrf
                <!-- Input groups with icon -->
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="form-select form-select-sm col-8" name="jenis_permohonan" aria-label=".form-select-sm example">
                    <option value="individu">Permohonan Individu / Borang A1</option>
                    <option value="berkumpulan">Permohonan Berkumpulan / Borang A2</option></select>
                  </div>          
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="mohon_mula_kerja">Pilih waktu mula</label>

                        <div class="input-group date" id="datetimepicker1">
                          <input type="text" class="form-control" name="mohon_mula_kerja">
                          <span class="input-group-addon input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="mohon_akhir_kerja">Pilih waktu akhir</label>

                        <div class="input-group date" id="datetimepicker2">
                          <input type="text" class="form-control" name="mohon_akhir_kerja">
                          <span class="input-group-addon input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                          </span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lokasi">Lokasi kerja lebih masa</label>
                      <div class="input-group input-group-merge">
                        <input class="form-control"name="lokasi"  placeholder="lokasi" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Perkara">Sebab kerja lebih masa</label>

                      <div class="input-group input-group-merge">
                        <input class="form-control" name="tujuan" placeholder="tujuan" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="pegawai_sokong_id">Pilih pegawai sokong</label>

                    <div class="input-group input-group-merge">
                      <input class="form-control" name="pegawai_sokong_id"  placeholder="pegawai_sokong_id" >
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                      </div>
                    </div>
                  </div>      
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="pegawai_lulus_id">Pilih pegawai lulus</label>

                    <div class="input-group input-group-merge">
                      <input class="form-control" name="pegawai_lulus_id" placeholder="pegawai_lulus_id" >
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                      </div>
                    </div>                 
                  </div>  
                  <button  type="submit" class="btn btn-primary float-right">Submit</button>
                </div>                
                </div>              
            </div>
          </div>
        </div>

        <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
              <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Pengurusan Elaun Lebih Masa</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    <div>

@endsection


{{-- Script --}}
@section('script')
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/moment.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/bootstrap-datetimepicker.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/quill/dist/quill.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      icons: {
        time: "fa fa-clock",
        date: "fa fa-calendar-day",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });
    $('#datetimepicker2').datetimepicker({
      icons: {
        time: "fa fa-clock",
        date: "fa fa-calendar-day",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });
  });
</script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/demo.min.js"></script>
@endsection