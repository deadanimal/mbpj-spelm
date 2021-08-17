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
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end



        var chart = am4core.create('chartdiv', am4charts.XYChart)
        chart.colors.step = 2;

        chart.legend = new am4charts.Legend()
        chart.legend.position = 'top'
        chart.legend.paddingBottom = 20
        chart.legend.labels.template.maxWidth = 95

        var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
        xAxis.dataFields.category = 'category'
        xAxis.renderer.cellStartLocation = 0.1
        xAxis.renderer.cellEndLocation = 0.9
        xAxis.renderer.grid.template.location = 0;

        var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
        yAxis.min = 0;

        function createSeries(value, name) {
            var series = chart.series.push(new am4charts.ColumnSeries())
            series.dataFields.valueY = value
            series.dataFields.categoryX = 'category'
            series.name = name

            series.events.on("hidden", arrangeColumns);
            series.events.on("shown", arrangeColumns);

            var bullet = series.bullets.push(new am4charts.LabelBullet())
            bullet.interactionsEnabled = false
            bullet.dy = 30;
            bullet.label.text = '{valueY}'
            bullet.label.fill = am4core.color('#ffffff')

            return series;
        }

        chart.data = [{
                category: 'Place #1',
                first: 40,
                second: 55,
                third: 60
            },
            {
                category: 'Place #2',
                first: 30,
                second: 78,
                third: 69
            },
            {
                category: 'Place #3',
                first: 27,
                second: 40,
                third: 45
            },
            {
                category: 'Place #4',
                first: 50,
                second: 33,
                third: 22
            }
        ]


        createSeries('first', 'Create');
        createSeries('second', 'Update');
        createSeries('third', 'Delete');

        function arrangeColumns() {

            var series = chart.series.getIndex(0);

            var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
            if (series.dataItems.length > 1) {
                var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                var delta = ((x1 - x0) / chart.series.length) * w;
                if (am4core.isNumber(delta)) {
                    var middle = chart.series.length / 2;

                    var newIndex = 0;
                    chart.series.each(function (series) {
                        if (!series.isHidden && !series.isHiding) {
                            series.dummyData = newIndex;
                            newIndex++;
                        } else {
                            series.dummyData = chart.series.indexOf(series);
                        }
                    })
                    var visibleCount = newIndex;
                    var newMiddle = visibleCount / 2;

                    chart.series.each(function (series) {
                        var trueIndex = chart.series.indexOf(series);
                        var newIndex = series.dummyData;

                        var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                        series.animate({
                            property: "dx",
                            to: dx
                        }, series.interpolationDuration, series.interpolationEasing);
                        series.bulletsContainer.animate({
                            property: "dx",
                            to: dx
                        }, series.interpolationDuration, series.interpolationEasing);
                    })
                }
            }
        }

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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tarikh</th>
                                    <th>Status</th>
                                  
                                  </tr>
                              </thead>
                              <tbody >
                                  
                                  <tr>
                                      <td >{{Auth()->user()->name}}</td>
                                      <td >{{Auth()->user()->email}}</td>
                                      <td >{{Auth()->user()->updated_at}}</td>
                                      <td >{{Auth()->user()->status}}</td>

                                  </tr>
                                  
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
        @endsection
