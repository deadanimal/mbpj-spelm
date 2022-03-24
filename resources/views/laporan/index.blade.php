@extends('base')

<!-- Styles -->
<style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }
  
  </style>
  
  <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
  
  <!-- Chart code -->
  <script>
  am4core.ready(function() {
  
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  var chart = am4core.create("chartdiv", am4charts.XYChart);
  chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

  // Title

  var title = chart.titles.create();
  title.text = "Laporan Permohonan Kerja Lebih Masa dan Tuntutan Elaun lebih Masa";
  title.fontSize = 20;
  title.marginBottom = 20;
  
  chart.data = [
    {
      category: "2018",
      value1: 1,
      value2: 5,
      value3: 3
    },
    {
      category: "2019",
      value1: 2,
      value2: 5,
      value3: 3
    },
    {
      category: "2020",
      value1: 3,
      value2: 5,
      value3: 4
    },
    {
      category: "2021",
      value1: 4,
      value2: 5,
      value3: 6
    },
    {
      category: "2022",
      value1: 3,
      value2: 5,
      value3: 4
    },
    {
      category: "2023",
      value1: 2,
      value2: 13,
      value3: 1
    }
  ];
  
  chart.colors.step = 2;
  chart.padding(30, 30, 10, 30);
  chart.legend = new am4charts.Legend();

  
// Print Chart

  chart.exporting.menu = new am4core.ExportMenu();
  chart.exporting.menu.align = "right";
  chart.exporting.menu.verticalAlign = "top";
  
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "category";
  categoryAxis.renderer.grid.template.location = 0;
  
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.min = 0;
  valueAxis.max = 100;
  valueAxis.strictMinMax = true;
  valueAxis.calculateTotals = true;
  valueAxis.renderer.minWidth = 50;
  
  
  var series1 = chart.series.push(new am4charts.ColumnSeries());
  series1.columns.template.width = am4core.percent(80);
  series1.columns.template.tooltipText =
    "{name}: {valueY.totalPercent.formatNumber('#.00')}%";
  series1.name = "Permohonan Kerja Lebih Masa";
  series1.dataFields.categoryX = "category";
  series1.dataFields.valueY = "value1";
  series1.dataFields.valueYShow = "totalPercent";
  series1.dataItems.template.locations.categoryX = 0.5;
  series1.stacked = true;
  series1.tooltip.pointerOrientation = "vertical";
  
  var bullet1 = series1.bullets.push(new am4charts.LabelBullet());
  bullet1.interactionsEnabled = false;
  bullet1.label.text = "{valueY.totalPercent.formatNumber('#.00')}%";
  bullet1.label.fill = am4core.color("#ffffff");
  bullet1.locationY = 0.5;
  
  var series2 = chart.series.push(new am4charts.ColumnSeries());
  series2.columns.template.width = am4core.percent(80);
  series2.columns.template.tooltipText =
    "{name}: {valueY.totalPercent.formatNumber('#.00')}%";
  series2.name = "Pengesahan Kerja Lebih Masa";
  series2.dataFields.categoryX = "category";
  series2.dataFields.valueY = "value2";
  series2.dataFields.valueYShow = "totalPercent";
  series2.dataItems.template.locations.categoryX = 0.5;
  series2.stacked = true;
  series2.tooltip.pointerOrientation = "vertical";
  
  var bullet2 = series2.bullets.push(new am4charts.LabelBullet());
  bullet2.interactionsEnabled = false;
  bullet2.label.text = "{valueY.totalPercent.formatNumber('#.00')}%";
  bullet2.locationY = 0.5;
  bullet2.label.fill = am4core.color("#ffffff");
  
  var series3 = chart.series.push(new am4charts.ColumnSeries());
  series3.columns.template.width = am4core.percent(80);
  series3.columns.template.tooltipText =
    "{name}: {valueY.totalPercent.formatNumber('#.00')}%";
  series3.name = "Tuntutan Elaun Lebih Masa";
  series3.dataFields.categoryX = "category";
  series3.dataFields.valueY = "value3";
  series3.dataFields.valueYShow = "totalPercent";
  series3.dataItems.template.locations.categoryX = 0.5;
  series3.stacked = true;
  series3.tooltip.pointerOrientation = "vertical";
  
  var bullet3 = series3.bullets.push(new am4charts.LabelBullet());
  bullet3.interactionsEnabled = false;
  bullet3.label.text = "{valueY.totalPercent.formatNumber('#.00')}%";
  bullet3.locationY = 0.5;
  bullet3.label.fill = am4core.color("#ffffff");
  
  chart.scrollbarX = new am4core.Scrollbar();
  
  }); // end am4core.ready()
  </script>
@section('content')
<div>
  <div class="header bg-default pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
                      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                          </ol>
                      </nav>
                  </div>

              </div>
            
          </div>
      </div>
  </div>
  <!-- Page content -->
  @if(auth()->user()->role == 'kakitangan')
  <div class="container-fluid mt--6">
        <!-- Card stats -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH TUNTUTAN ELAUN
                                    LEBIH MASA</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                    LULUS</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                    DITOLAK</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA
                                    (RM)</h5>
                                <span class="h2 font-weight-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      <div class="card">
          <div class="card-header bg-primary">
              <h3 class="text-white mb-0">Jana Laporan</h3>
          </div>
          <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="/filter_laporan">
                      @csrf
                      <div class="row">
                          <div class="card-body">
                              <form>
                                  {{-- <h6 class="heading-small text-muted mb-4">User information</h6> --}}
                                  <div class="pl-lg-4">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-control-label" for="input-username">Nama</label>
                                                  <input type="text" id="input-username" class="form-control"
                                                      placeholder="{{Auth()->user()->name}}" value="" disabled>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-control-label" for="input-email">Alamat Email </label>
                                                  <input type="email" id="input-email" class="form-control"
                                                      placeholder="{{Auth()->user()->email}}" value="" disabled>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-control-label" for="input-first-name">No Pekerja</label>
                                                  <input type="text" id="input-first-name" class="form-control"
                                                      placeholder="{{Auth()->user()->user_code}}" value="" disabled>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-control-label" for="input-username">No. K/P Baru</label>
                                                  <input type="text" id="input-username" class="form-control"
                                                      placeholder="{{Auth()->user()->nric}}" value="" disabled>
                                              </div>
                                          </div>
                                      </div>         
                                  </div>
                          </div>
                      </div>
                      <div class="row float-right">
                          <div class="col-sm ">
                              <br>
                              <a id="submit" class="btn btn-primary btn-sm" href="/filter_laporan/{{auth()->user()->id}}">Jana Laporan</a>
                          </div>
                      </div>

                  </form>
              </div>
          </div>
      </div>


      <!-- Footer -->
      <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6">
                  <div class="copyright text-center  text-lg-left  text-muted">
                      &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun Lebih
                          Masa
                      </a>
                  </div>
              </div>
          </div>
      </footer>
  </div>
  @elseif(auth()->user()->role == 'ketua_bahagian' or auth()->user()->role == 'ketua_jabatan' or auth()->user()->role == 'penyelia' 
  or auth()->user()->role == 'penyelia' or auth()->user()->role == 'pentadbir_sistem' 
  or auth()->user()->role == 'datuk_bandar' or auth()->user()->role == 'kerani_semakan' 
  or auth()->user()->role == 'kerani_pemeriksa' or auth()->user()->role == 'pelulus_pindaan')
  <div class="container-fluid mt--6">
      <div class="card">
          <div class="card-header bg-primary">
              <h3 class="mb-0 text-white">Jana Laporan</h3>
          </div>
          <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="/filter_laporan">
                      @csrf
                      <div class="row">
                          <div class="col">
                              <h4>Nama Kakitangan</h4>
                              <select id="jana_laporan" onchange="janaLaporan()" name="nama_kakitangan" required
                                  placeholder="{{ Auth()->user()->name }}" class="form-control"
                                  value="{{ Auth()->user()->name }}">
                                  @foreach ($get_user as $get_users)
                                      <option hidden selected> Nama Kakitangan</option>
                                      <option value="{{ $get_users->id }}">
                                          {{ $get_users->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="row float-right">
                          <div class="col-sm ">
                              <br>
                              <a id="submit" class="btn btn-primary btn-sm" href="">Jana Laporan</a>
                          </div>
                      </div>

                  </form>
              </div>
          </div>
      </div>

  </div>
  <div class="container-fluid mt-12">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="mb-0 text-white">Jana Laporan</h3>
        </div>
        {{-- <div class="card-body">
            <div class="col-md-12">
                <form method="POST" action="/filter_laporan">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h4>Nama Kakitangan</h4>
                            <select id="jana_laporan" onchange="janaLaporan()" name="nama_kakitangan" required
                                placeholder="{{ Auth()->user()->name }}" class="form-control"
                                value="{{ Auth()->user()->name }}">
                                @foreach ($get_user as $get_users)
                                    <option hidden selected> Nama Kakitangan</option>
                                    <option value="{{ $get_users->id }}">
                                        {{ $get_users->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-sm ">
                            <br>
                            <a id="submit" class="btn btn-primary btn-sm" href="">Jana Laporan</a>
                        </div>
                    </div>

                </form>
            </div>
        </div> --}}
    </div>


    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun Lebih
                        Masa
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>
  @else
  --
  @endif

</div>

<script type="text/javascript">
  function janaLaporan() {
      let selected_id = $("#jana_laporan option:selected").val();
      $("#submit").attr("href", "/filter_laporan/" + selected_id);

  }
</script>
@endsection