@extends('base')

@section('content')
<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Soalan Lazim</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Soalan Lazim</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kemaskini</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Kemaskini Soalan Lazim</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="/faqs/{{$faq->id}}">
                            @csrf
                            @method('PUT')
                            <!-- Input groups with icon -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lokasi">Tajuk FAQ </label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" name="tajuk_aduan"
                                                value="{{$faq->tajuk_aduan}}" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                        class=""></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Perkara">Jawapan Soalan Lazim</label>

                                                <div class="form-group">
                                                    <textarea class="form-control"
                                                    id="maklumat" name="maklumat" value="{{$faq->maklumat}}"></textarea>
                                                </div>
                                        
                                        </div>
                                    </div>
                                </div>      
                                <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
  
                        </form>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">

$(window).on('load', function(){
    // $('ckeditor').ckeditor();
    var lol = CKEDITOR.replace('maklumat');
    lol.setData({!! json_encode($faq->maklumat) !!});
})
      
</script>
@endsection