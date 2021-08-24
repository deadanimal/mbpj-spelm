@extends('base')

@section('content')

<div class="container-fluid py-4">
    <div class="p-3">
        <div>
            <h5>Audit Trails</h5>
        </div>
        <div class="container-fluid mt-4">
            <div class="card-body p-3">
                <div class="row p-3 mb-0">
                    {{-- <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="tarikhmula">No. Kad Pengenalan</label>
                                    <input class="form-control form-control-sm" type="text" name="ic" />
                                </div>
                                <div class="col">
                                    <label for="tarikhmula">Tarikh Mula</label>
                                    <input class="form-control form-control-sm" type="date" name="tarikhmula" />
                                </div>

                                <div class="col">
                                    <label for="tarikhtamat">Tarikh Tamat</label>
                                    <input class="form-control form-control-sm" type="date" name="tarikhtamat" />
                                </div>

                                <div class="col">
                                    <br>
                                    <button class="btn btn-sm bg-gradient-info text-capitalize" type="submit"
                                        name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
                                </div>
                            </div>
                        </form> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="card">
        </div>
    </div>
</div>

@endsection
