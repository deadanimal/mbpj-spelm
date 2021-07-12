@extends('base')

@section('content')

<div>
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tuntutan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tuntutan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tuntutan</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">Hantar Tuntutan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid">
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-8">
      </div>
    </div>
{{-- @if($user->role == 'kakitangan' or $user-role) --}}
<div class="row ">
  <div class="col-md-12">
      <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Tuntutan</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">No</th>
                  <th scope="col" class="sort" data-sort="budget">Tarikh Mohon</th>
                  <th scope="col" class="sort" data-sort="status">Waktu Kerja</th>
                  <th scope="col" class="sort" data-sort="budget">Perkara</th>
                  <th scope="col" class="sort" data-sort="budget">Status</th>
                  <th scope="col" class="sort" data-sort="status">Jenis Permohonan</th>
                </tr>
              </thead>

            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
      </div>        
  </div>
</div>

{{-- @elseif() --}}
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Semak Tuntutan</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">                
                  <tr>
                      <th scope="col" class="sort" data-sort="name">No</th>
                      <th scope="col" class="sort" data-sort="budget">Tarikh Mohon</th>
                      <th scope="col" class="sort" data-sort="status">Waktu Kerja</th>
                      <th scope="col" class="sort" data-sort="budget">Perkara</th>
                      <th scope="col" class="sort" data-sort="budget">Status</th>
                      <th scope="col" class="sort" data-sort="status">Jenis Permohonan</th>
                         <!-- eKedatangan -->
                      <th scope="col" class="sort" data-sort="budget">clockintime</th>
                      <th scope="col" class="sort" data-sort="status">clockouttime</th> 
                      <th scope="col" class="sort" data-sort="budget">totalworkinghour</th>
                      <th scope="col" class="sort" data-sort="budget">otstarttime1</th>
                      <th scope="col" class="sort" data-sort="status">otendtime1</th>
                      <th scope="col" class="sort" data-sort="status">otdurationt1</th>
                    </tr>        
              </thead>
              <tbody class="list">

              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
      </div>
  </div>
</div>
{{-- 
@else 
@endif --}}
    <!-- Footer -->
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Pengurusan Elaun Lebih Masa</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
<div>

@endsection