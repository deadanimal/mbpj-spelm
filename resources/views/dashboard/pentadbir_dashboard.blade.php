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
    
    var data = [];
    var value = 50;
    for(var i = 0; i < 300; i++){
      var date = new Date();
      date.setHours(0,0,0,0);
      date.setDate(i);
      value -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
      data.push({date:date, value: value});
    }
    
    chart.data = data;
    
    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 60;
    
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    
    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.tooltipText = "{value}"
    
    series.tooltip.pointerOrientation = "vertical";
    
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.snapToSeries = series;
    chart.cursor.xAxis = dateAxis;
    
    //chart.scrollbarY = new am4core.Scrollbar();
    chart.scrollbarX = new am4core.Scrollbar();
    
    }); // end am4core.ready()

    
</script>
@section('content')
<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-7">
                    <h1 class="h1 text-white "> Selamat Datang {{Auth()->user()->email}} ke Modul Pentadbir Sistem </h1>
                    <h1 class="h2 text-white "> Sistem Pengurusan Elaun Lebih Masa
                    </h1>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-default">
                        <div class="card-header ">
                            <div class="table-responsive py-4">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Id</th> --}}
                                            <th>Nama</th>
                                            <th>Peranan</th>

                                            {{-- <th>Model</th> --}}
                                            <th>Tarikh</th>
                                            <th>Makluman</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($audits as $audit)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                {{-- <td>{{ $audit->id }}</td> --}}
                                                <td>{{ $audit->name}}</td>
                                                <td>{{ $audit->peranan}}</td>
                                                {{-- <td>{{ $audit->model_name }}</td> --}}
                                                <td>{{ $audit->created_at }}</td>
                                                {{-- <td>{{ $audit->description }}</td> --}}

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
