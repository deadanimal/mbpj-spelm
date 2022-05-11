@extends('base')


@section('content')
    <div style="position: absolute;top:20px; left:20px">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="header bg-default pb-6">
        <div class="container">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Utiliti</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--4">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Hari Hantar Tuntutan</h3>
                        {{-- <div class="text-right">
                            <button class="btn btn-success" data-toggle="notify" data-placement="top" data-align="right"
                                data-type="default" data-icon="ni ni-bell-55">Top Right</button>

                        </div> --}}

                    </div>

                    <form action="{{ route('utiliti.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="">Januari </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(1)->daysInMonth; $i++)
                                            <option {{ $utiliti[0]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Februari </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(2)->daysInMonth; $i++)
                                            <option {{ $utiliti[1]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4 ">
                                    <label for="">Mac </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(3)->daysInMonth; $i++)
                                            <option {{ $utiliti[2]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">April </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(4)->daysInMonth; $i++)
                                            <option {{ $utiliti[3]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Mei </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(5)->daysInMonth; $i++)
                                            <option {{ $utiliti[4]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Jun </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(6)->daysInMonth; $i++)
                                            <option {{ $utiliti[5]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Julai </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(7)->daysInMonth; $i++)
                                            <option {{ $utiliti[6]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Ogos </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(8)->daysInMonth; $i++)
                                            <option {{ $utiliti[7]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">September </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(9)->daysInMonth; $i++)
                                            <option {{ $utiliti[8]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Oktober </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(10)->daysInMonth; $i++)
                                            <option {{ $utiliti[9]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">November </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(11)->daysInMonth; $i++)
                                            <option {{ $utiliti[10]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Disember </label>
                                    <select name="tarikh[]" class="form-control">
                                        @for ($i = 1; $i <= now()->month(12)->daysInMonth; $i++)
                                            <option {{ $utiliti[11]->tarikh == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div class="text-right col-12">
                                    <button type="submit" class="btn btn-primary mt-3">Hantar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
