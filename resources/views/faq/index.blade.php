@extends('base')
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
  }
  
  .active, .accordion:hover {
    /* background-color: #ccc; */
  }
  
  .panel {
    padding: 0 18px;
    /* background-color: white; */
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
  </style>
  </head>
@section('content')
<div>
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Bantuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Bantuan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h5 class="h3 mb-3">Soalan Lazim            </h5>
            
            <button class="accordion"> Permohonan Kerja Lebih Masa</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            
            <button class="accordion">Tuntutan Elaun Lebih Masa</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button class="accordion">Tuntutan Elaun Lebih Masa</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button class="accordion">Tuntutan Elaun Lebih Masa</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            
         </div>
          </div>
        </div>
      </div>
</div>
<div class="container-fluid mt--12">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h5 class="h3 mb-3">Bantuan Helpdesk</h5>
          
            <div class="media align-items-center">
              <div class="media-body">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Jenis Aduan
                  </button><br><br>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Sistem</a>
                    <a class="dropdown-item" href="#">Permohonan Kerja Lebih Masa</a>
                    <a class="dropdown-item" href="#">Tuntutan Elaun Lebih Masa</a>
                  </div>
                </div>
                <form>
                  <textarea class="form-control" placeholder="Write your comment" rows="3"></textarea>
               
                    <button  type="submit" class="btn btn-primary float-right">Hantar Aduan</button>

                </form>
              </div>
            </div>
          </div>
        </div>
  
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
    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;
      
      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          } 
        });
      }
      </script>

@endsection

