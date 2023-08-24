<div class="header bg-default pb-6">
    <div class="container-fluid ">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{ $mainName }}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ $mainUrl }}"><i class="fas fa-home"></i></a>
                            </li>

                            @isset($subName)
                                <li class="breadcrumb-item"><a href="{{ $subUrl }}">{{ $subName }}</a></li>
                            @endisset
                            @isset($sub2Name)
                                <li class="breadcrumb-item"><a href="{{ $sub2Url }}">{{ $sub2Name }}</a></li>
                            @endisset
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @isset($btnTambah)
            <div class="col-lg-12 col-5 text-right mb-5">
                <a href="/permohonans/create" class="btn btn-sm btn-neutral"> + Tambah Permohonan</a>
            </div>
        @endisset

    </div>
</div>
