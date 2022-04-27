@extends('base')
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    am4core.ready(function() {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        var jabatan = @json($listJabatan->toArray());
        let jabatans = [];
        jabatan.forEach(e => {
            datajabatan = {
                jabatans: e.GE_KETERANGAN_JABATAN,
                users: e.bil,
            };
            jabatans.push(datajabatan);
        });
        // Add data
        chart.data = jabatans;
        // chart.padding(0, 300, 0, 300);
        chart.legend = new am4charts.Legend();

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "users";
        pieSeries.dataFields.category = "jabatans";


        // design
        chart.innerRadius = am4core.percent(40);
        pieSeries.slices.template.stroke = am4core.color("#4a2abb");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;

    });
</script>
@section('content')
    <div>
        <div class="header bg-default pb-6">
            <div class="container-fluid">

                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h1 class="h1 text-white "> Selamat Datang ke Sistem Pengurusan Elaun Lebih Masa</h1>
                        <h1 class="h2 text-white "> Modul Datuk Bandar </h1>
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
                                <div id="chartdiv" style="width: 100%; height:1200px;"></div>
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
                            &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Pengurusan Elaun
                                Lebih Masa
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    @endsection
