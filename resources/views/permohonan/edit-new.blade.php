@extends('base')

@section('content')
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Kemaskini Permohonan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/permohonans"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Permohonan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">kemaskini</li>
                            </ol>
                        </nav>
                    </div>
                    @if (auth()->user()->role == 'kakitangan' or auth()->user()->role == 'penyelia' or auth()->user()->role == 'kerani_semakan' or auth()->user()->role == 'kerani_pemeriksa')
                        @if ($permohonan->jenis_permohonan == 'berkumpulan')
                            <div class="col-lg-12 col text-right">
                                <a type="button" class="btn btn-neutral btn-sm" data-toggle="modal"
                                    data-target="#tambahkakitangan"> +
                                    Tambah Kakitangan</a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    @switch(auth()->user()->role)
        @case('kakitangan')
        @case('penyelia')

        @case('kerani_semakan')
        @case('kerani_pemeriksa')
            @if ($permohonan->jenis_permohonan == 'individu')
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-wrapper">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h3 class="mb-0">Kemaskini Borang Permohonan Individu / Borang A1</h3>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <form method="POST" action="/permohonans/{{ $permohonan->id }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Input groups with icon -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Waktu Mula Semasa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control "
                                                                value="{{ $permohonan->mohon_mula_kerja }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_akhir_kerja">Waktu akhir Semasa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control"
                                                                value="{{ $permohonan->mohon_akhir_kerja }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_mula_kerja">Kemaskini waktu mula</label>
                                                        <div class="form-group">
                                                            <div class="input-group date" id="datetimepicker1">
                                                                <input type="text" class="form-control" name="mohon_mula_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary" type="button"
                                                                        id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_akhir_kerja">Kemaskini waktu akhir</label>
                                                        <div class="form-group">
                                                            <div class="input-group date" id="datetimepicker2">
                                                                <input type="text" class="form-control" name="mohon_akhir_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary" type="button"
                                                                        id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi kerja lebih masa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="lokasi"
                                                                value="{{ $permohonan->lokasi }}" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-map-marker"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Perkara">Sebab kerja lebih masa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="tujuan"
                                                                value="{{ $permohonan->tujuan }}" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_sokong_id"> Pegawai sokong</label>
                                                        <select name="pegawai_sokong_id" class="form-control">
                                                            {{-- <option hidden selected>{{$permohonan->pegawai_sokong_id}}</option> --}}
                                                            <option hidden value="{{ $permohonan->pegawai_sokong_id }}" selected>
                                                                {{ $permohonan->pegawai_sokong_name }}</option>

                                                            @foreach ($users as $user1)
                                                                <option value="{{ $user1->id }}">
                                                                    {{ $user1->name }} - {{ $user1->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_lulus_id"> Pegawai lulus</label>

                                                        <select name="pegawai_lulus_id" class="form-control">
                                                            <option hidden value="{{ $permohonan->pegawai_lulus_id }}" selected>
                                                                {{ $permohonan->pegawai_lulus_name }}</option>
                                                            @foreach ($users as $user2)
                                                                <option value="{{ $user2->id }}">
                                                                    {{ $user2->name }} - {{ $user2->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right">Kemaskini</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($permohonan->jenis_permohonan == 'berkumpulan')
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-wrapper">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h3 class="mb-0">Kemaskini Borang Permohonan Berkumpulan / Borang A2</h3>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <form method="POST" action="/permohonans/{{ $permohonan->id }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Input groups with icon -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Waktu Mula Semasa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control "
                                                                value="{{ $permohonan->mohon_mula_kerja }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_akhir_kerja">Waktu akhir Semasa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control"
                                                                value="{{ $permohonan->mohon_akhir_kerja }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_mula_kerja">Kemaskini waktu mula</label>
                                                        <div class="form-group">
                                                            <div class="input-group date" id="datetimepicker1">
                                                                <input type="text" class="form-control" name="mohon_mula_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary" type="button"
                                                                        id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mohon_akhir_kerja">Kemaskini waktu akhir</label>
                                                        <div class="form-group">
                                                            <div class="input-group date" id="datetimepicker2">
                                                                <input type="text" class="form-control" name="mohon_akhir_kerja">
                                                                <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-outline-primary" type="button"
                                                                        id="button-addon2"> <span
                                                                            class="fa fa-calendar"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi kerja lebih masa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="lokasi"
                                                                value="{{ $permohonan->lokasi }}" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-map-marker"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Perkara">Sebab kerja lebih masa</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" name="tujuan"
                                                                value="{{ $permohonan->tujuan }}" type="text">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_sokong_id"> Pegawai sokong</label>
                                                        <select name="pegawai_sokong_id" class="form-control">
                                                            <option hidden value="{{ $permohonan->pegawai_sokong_id }}" selected>
                                                                {{ $permohonan->pegawai_sokong_name }}</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">
                                                                    {{ $user->name }} - {{ $user->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pegawai_lulus_id"> Pegawai lulus</label>

                                                        <select name="pegawai_lulus_id" class="form-control">
                                                            <option hidden value="{{ $permohonan->pegawai_lulus_id }}" selected>
                                                                {{ $permohonan->pegawai_lulus_name }}</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">
                                                                    {{ $user->name }} - {{ $user->role }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm float-right">Kemaskini</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt--12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Nama Kakitangan</h3>

                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table id="example" class="display table table-striped table-bordered dt-responsive nowrap"
                                        style="width:100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nric</th>
                                                <th>Email</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{$userrollcalls}} --}}
                                            @foreach ($kakitanganpermohonans as $userpermohonan)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $userpermohonan->nama }}</td>
                                                    <td>{{ $userpermohonan->nric }}</td>
                                                    <td>{{ $userpermohonan->email }}</td>


                                                    <td> <button onclick="buang({{ $userpermohonan->id }})"
                                                            class="btn btn-danger btn-sm"><i class="ni ni-basket"></i></button>
                                                    </td>

                                                </tr>

                                                <script>
                                                    function buang(id) {
                                                        swal({
                                                            title: 'Makluman?',
                                                            text: "Buang Kakitangan !",
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Buang',
                                                            cancelButtonText: 'Tutup',

                                                        }).then(result => {
                                                            console.log("result", result);
                                                            if (result.value == true) {
                                                                console.log("id", id);
                                                                $.ajax({
                                                                    url: "/user_permohonans/" + id,
                                                                    type: "POST",
                                                                    data: {
                                                                        "id": id,
                                                                        "_token": "{{ csrf_token() }}",
                                                                        "_method": 'delete'
                                                                    },
                                                                    success: function(data) {
                                                                        location.reload();
                                                                    },
                                                                });

                                                            } else if (result.dismiss == "cancel") {
                                                                console.log("dismiss");
                                                            }
                                                        })
                                                    }
                                                </script>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="tambahkakitangan" tabindex="-1" role="dialog" {{-- <div class="modal fade" id="tambahkakitangan" tabindex="-1" role="dialog" aria-labelledby="tambahkakitanganLabel" --}}
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="text-white modal-title" id="tambahkakitanganLabel"> Tambah Kakitangan </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-wrapper">
                                            <form method="POST" action="/user_permohonans">
                                                @csrf
                                                @if ($errors->any())
                                                    <div class="alert alert-danger" role="alert">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success text-center">
                                                        <p>{{ Session::get('success') }}</p>
                                                    </div>
                                                @endif

                                                <table class="table table-bordered" id="dynamicAddRemove">

                                                    <tr>

                                                        <th>No Kakitangan</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select name="user_id[]" required placeholder="Enter user_id"
                                                                class="form-control">
                                                                @foreach ($kakitangan as $user)
                                                                    <option hidden selected> Pilih Kakitangan
                                                                    </option>
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }} - {{ $user->role }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="hidden" name="permohonan_id" class="form-control"
                                                                value="{{ $permohonan->id }}" />


                                                            <button type="button" name="add" id="dynamic-ar"
                                                                class="btn btn-outline-primary btn-sm float-right">Tambah
                                                                Kakitangan</button>
                                                        </td>

                                                    </tr>

                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Tutup</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

                                                </div>


                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @break

        @case('penyelia')
        @case('kerani_semakan')

        @case('kerani_pemeriksa')
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Kemaskini Borang Permohonan</h3>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <form method="POST" action="/permohonans/{{ $permohonan->id }}">
                                        @csrf
                                        @method('PUT')
                                        <!-- Input groups with icon -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Waktu Mula Semasa</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control "
                                                            value="{{ $permohonan->mohon_mula_kerja }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mohon_akhir_kerja">Waktu akhir Semasa</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control"
                                                            value="{{ $permohonan->mohon_akhir_kerja }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mohon_mula_kerja">Kemaskini waktu mula</label>
                                                    <div class="form-group">
                                                        <div class="input-group date" id="datetimepicker1">
                                                            <input type="text" class="form-control" name="mohon_mula_kerja">
                                                            <span class="input-group-addon input-group-append">
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="button-addon2"> <span
                                                                        class="fa fa-calendar"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mohon_akhir_kerja">Kemaskini waktu akhir</label>
                                                    <div class="form-group">
                                                        <div class="input-group date" id="datetimepicker2">
                                                            <input type="text" class="form-control" name="mohon_akhir_kerja">
                                                            <span class="input-group-addon input-group-append">
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="button-addon2"> <span
                                                                        class="fa fa-calendar"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lokasi">Lokasi kerja lebih masa</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" name="lokasi"
                                                            value="{{ $permohonan->lokasi }}" type="text">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marker"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Perkara">Sebab kerja lebih masa</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" name="tujuan"
                                                            value="{{ $permohonan->tujuan }}" type="text">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pegawai_sokong_id">Pilih pegawai sokong</label>
                                                    <select name="pegawai_sokong_id" class="form-control">
                                                        <option hidden value="{{ $permohonan->pegawai_sokong_id }}" selected>
                                                            {{ $permohonan->pegawai_sokong_name }} </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pegawai_lulus_id">Pilih pegawai lulus</label>
                                                    <select name="pegawai_lulus_id" class="form-control">
                                                        <option hidden value="{{ $permohonan->pegawai_lulus_id }}" selected>
                                                            {{ $permohonan->pegawai_lulus_name }}</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm float-right">Kemaskini</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('ketua_jabatan')
        @case('ketua_bahagian')
        @break

    @endswitch
@endsection
