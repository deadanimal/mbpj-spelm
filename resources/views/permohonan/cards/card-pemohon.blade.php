    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PERMOHONAN LEBIH MASA
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPermohonan['jumlah'] ?? '0' }}</span>
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
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA LULUS
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPermohonan['lulus'] ?? '0' }}</span>
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
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">PERMOHONAN KERJA LEBIH MASA LULUS
                                    DITOLAK
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPermohonan['ditolak'] ?? '0' }}</span>
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
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0"> PERMOHONAN KERJA LEBIH MASA DALAM
                                    SEMAKAN
                                </h5>
                                <span
                                    class="h2 font-weight-bold mb-0">{{ $cardPermohonan['dalamSemakan'] ?? '0' }}</span>
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
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">JUMLAH PENGESAHAN LEBIH MASA
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPengesahan['jumlah'] ?? '0' }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA
                                    LULUS
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPengesahan['lulus'] ?? '0' }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0">PENGESAHAN KERJA LEBIH MASA LULUS
                                    DITOLAK
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $cardPengesahan['ditolak'] ?? '0' }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
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
                                <h5 class="card-title text-uppercase text-muted mb-0"> PENGESAHAN KERJA LEBIH MASA
                                    DALAM SEMAKAN
                                </h5>
                                <span
                                    class="h2 font-weight-bold mb-0">{{ $cardPengesahan['dalamSemakan'] ?? '0' }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                    <i class="ni ni-chart-bar-32"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
