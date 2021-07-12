@extends('base')

@section('content')

<div>
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Permohonan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Permohonan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="/permohonans/create" class="btn btn-sm btn-neutral">Tambah Permohonan</a>
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
            <h3 class="mb-0">Permohonan</h3>
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
              <tbody class="list">
                @forelse ($permohonans as $permohonan)
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <a href="#" class="avatar rounded-circle mr-3">
                        <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                      </a>
                      <div class="media-body">
                        <span class="name mb-0 text-sm">Argon Design System</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $2500 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">pending</span>
                    </span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">60%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/permohonans/{{$permohonan->id}}">Lihat lanjut</a>
                        <a class="dropdown-item" href="/permohonans/{{$permohonan->id}}/edit">Edit...</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @empty
                ---
                @endforelse
      
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

{{-- @elseif() --}}
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Semak Permohonan</h3>
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
                      {{-- <th scope="col" class="sort" data-sort="name">No</th>
                      <th scope="col" class="sort" data-sort="budget">Tarikh Mohon</th>
                      <th scope="col" class="sort" data-sort="status">Waktu Kerja</th> 
                      <th scope="col" class="sort" data-sort="budget">Perkara</th>
                      <th scope="col" class="sort" data-sort="budget">Status</th>
                      <th scope="col" class="sort" data-sort="status">Jenis Permohonan</th> --}}
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