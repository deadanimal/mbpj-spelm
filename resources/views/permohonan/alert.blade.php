@if (Session::has('success'))
    <div class="alert alert-success alert-dissamble" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Berjaya !</strong> {{session('success')}}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-success alert-dissamble" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Gagal !</strong> {{session('error')}}
    </div>
@endif