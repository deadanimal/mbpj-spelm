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

 // Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = [{
  "year": 2005,
  "Permohonan": 23.5,
  "Tuntutan": 18.1
},{
  "year": 2006,
  "Permohonan": 26.2,
  "Tuntutan": 22.8
},{
  "year": 2007,
  "Permohonan": 30.1,
  "Tuntutan": 23.9
},{
  "year": 2008,
  "Permohonan": 29.5,
  "Tuntutan": 25.1
},{
  "year": 2009,
  "Permohonan": 24.6,
  "Tuntutan": 25
}];

// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.numberFormatter.numberFormat = "#";
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.cellStartLocation = 0.1;
categoryAxis.renderer.cellEndLocation = 0.9;

var  valueAxis = chart.xAxes.push(new am4charts.ValueAxis()); 
valueAxis.renderer.opposite = true;

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = field;
  series.dataFields.categoryY = "year";
  series.name = name;
  series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
  series.columns.template.height = am4core.percent(100);
  series.sequencedInterpolation = true;

// // Title

//   var title = chart.titles.create();
//   title.text = "";
//   title.fontSize = 20;
//   title.marginBottom = 20;

// Print Chart

  chart.exporting.menu = new am4core.ExportMenu();
  chart.exporting.menu.align = "right";
  chart.exporting.menu.verticalAlign = "top";

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueX}";
  valueLabel.label.horizontalCenter = "left";
  valueLabel.label.dx = 10;
  valueLabel.label.hideOversized = false;
  valueLabel.label.truncate = false;

  var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
  categoryLabel.label.text = "{name}";
  categoryLabel.label.horizontalCenter = "right";
  categoryLabel.label.dx = -10;
  categoryLabel.label.fill = am4core.color("#fff");
  categoryLabel.label.hideOversized = false;
  categoryLabel.label.truncate = false;
}

createSeries("Permohonan", "Permohonan");
createSeries("Tuntutan", "Tuntutan");

}); // end am4core.ready()
</script>



@section('content')


<div>

  <div class="header bg-primary pb-6">
    <div class="container-fluid">

    <div class="row align-items-center py-4">
      <div class="col-lg-12 col-7">
    <h1 class="h1 text-white "> Selamat Datang {{Auth()->user()->name}} ke Sistem Pengurusan Elaun Lebih Masa </h1>

      </div>
    </div>
    </div>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN KERJA LEBIH MASA
                    </h5>
                    <span class="h2 font-weight-bold mb-0">{{$mohon}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
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
                    <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA LULUS
                    </h5>
                    <span class="h2 font-weight-bold mb-0">0</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
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
                    </h5>
                    <span class="h2 font-weight-bold mb-0">0</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
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
                    <h5 class="card-title text-uppercase text-muted mb-0"> TUNTUTAN ELAUN LEBIH MASA (RM)
                    </h5>
                    <span class="h2 font-weight-bold mb-0">0</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
                    </div>
                  </div>
                </div>
       
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid">
      <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-default">
            <div class="card-header ">
              <div class="row align-items-center">
                <div class="col">


              </div>
            </div>
            <div class="card-body">
              <div id="chartdiv"></div>

            </div>
          </div>
        </div>
        </div>
      </div>

{{-- edog --}}

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
Makluman / Notice </button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <h2 style="color:red"><b> Makluman / Notice </b></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <h3> Kaunter Unit Kawalan Pest akan beroperasi seperti biasa <b>bermula 26 Julai 2021 .<br>Pembayaran untuk Lesen </b> Anjing DBKL 2021 hanya boleh dilakukan <b>di kaunter kami</b> yang beralamat : <h3>

        <h3>DBKL Pest Control Unit Counter will resume its operation <b> starting 26th July 2021 .<br> Payments for DBKL Dog License </b> 2021 can only be made at <b>our office located :</b><h3><br>

        <h3><b>Lot 24, Jalan Loke Yew,<br> Seksyen 91 Cheras Kuala Lumpur <h3>

        <h3>Waze : DBKL SPCA Klinik Kembiri <br>(Dalam kedai kereta Emaslink / Inside Emaslink car dealer)</b><h3>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup / Close</button>
      </div>
    </div>
  </div>
</div> --}}
{{--  --}}
<div class="modal hide fade" id="myModal">
  <div class="modal-header">
      <a class="close" data-dismiss="modal">×</a>
      <h3>Modal header</h3>
  </div>
  <div class="modal-body">
      <p>One fine body…</p>
  </div>
  <div class="modal-footer">
      <a href="#" class="btn">Close</a>
      <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>

      <!-- Footer -->
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
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function() {
      $('#exampleModal').modal('show');
  });
</script> --}}