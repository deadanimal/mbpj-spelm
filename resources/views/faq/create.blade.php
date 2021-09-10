@extends('base')

@section('content')

<head>
</head>

<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Soalan Lazim</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/permohonans"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/permohonans/create">Soalan Lazim</a></li>
                                <li class="breadcrumb-item active" aria-current="page">tambah</li>
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
                            <h3 class="mb-0">Kemaskini Soalan Lazim (FAQ)</h3>
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
                                                <input class="form-control" name="tajuk_aduan" placeholder="tajuk"
                                                    type="text">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class=""></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lokasi">Soalan Lazim</label>
                                            <div class="form-group">
                                                <textarea class="ckeditor form-control" name="maklumat"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#exampleModal">
                            Simpan
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kemaskini Soalan Lazim
                                            (FAQ)</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Simpan Soalan Lazim (FAQ)
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
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

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>
@endsection
