@extends('base')

@section('content')
<div class="container-fluid mt-6">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Permohonan</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          {{-- <a href="/permohonans/create" class="btn btn-lg btn-neutral">Cipta</a> --}}
          {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid">
    <div class="col-lg-6">
        <div class="card-wrapper">
          <!-- Input groups -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Input groups</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form method="POST" action="/permohonans/">
                @csrf
                <!-- Input groups with icon -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
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
                      <div class="input-group input-group-merge">
                        <input class="form-control" name="Perkara" placeholder="Perkara" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge">
                        <input class="form-control" name="tujuan" placeholder="Tujuan" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                      </div>
                    </div>
                   </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <input class="form-control" name="jenis_permohonan" placeholder="jenis_permohonan" type="password">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>          
                   </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <input class="form-control" name="pegawai_sokong_id"  placeholder="pegawai_sokong_id" type="password">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>      
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <input class="form-control" name="pegawai_lulus_id" placeholder="pegawai_lulus_id" type="password">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>                 
                  </div>  
                  <button type="submit">Submit</button>
                </div>                
                </div>              
            </div>
          </div>
        </div>
      </div>
</div>
@endsection



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