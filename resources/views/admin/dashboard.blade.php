@extends('template.index')

@section('title', 'dashboard Admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">

        <div class="row">
            {{-- jadwal --}}
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card border border-primary border-2">
                    <div class="card-header d-flex ms-auto me-auto">
                        <h5>Jumlah Jadwal</h5>
                        <i class="bi bi-folder-fill"></i>
                    </div>

                    <div class="row pb-3">
                        <div class="col-6 text-end mb-2">
                            <img src="{{ asset('assets/image/calendar.png') }}" alt="" width="50%">
                        </div>
                        <div class="col-1 align-self-center">
                            <h1>=</h1>
                        </div>
                        <div class="col-5 align-self-center">
                           <h1>{{$dokter->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end jadwal --}}

            {{-- dokter --}}
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card border border-primary border-2">
                    <div class="card-header d-flex ms-auto me-auto">
                        <h4>Jumlah Dokter</h4>
                        <i class="bi bi-person-check-fill"></i>
                    </div>

                    <div class="row pb-3">
                        <div class="col-6 text-end mb-2">
                            <img src="{{ asset('assets/image/user.jpg') }}" alt="" width="50%">
                        </div>
                        <div class="col-1 align-self-center">
                            <h1>=</h1>
                        </div>
                        <div class="col-5 align-self-center">
                            <h1>{{ $user->where('roles', '=', 'petugas')->count()  }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end dokter --}}

            {{-- pasien --}}
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card border border-primary border-2">
                    <div class="card-header d-flex ms-auto me-auto">
                        <h4>Jumlah Pasien</h4>
                        <i class="bi bi-folder-fill"></i>
                    </div>

                    <div class="row pb-3">
                        <div class="col-6 text-end mb-2">
                            <img src="{{ asset('assets/image/pembukuan.jpg') }}" alt="" width="30%">
                        </div>
                        <div class="col-1 align-self-center">
                            <h1>=</h1>
                        </div>
                        <div class="col-5 align-self-center">
                            <h1>{{ $antrian->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end pasien --}}
        </div>
    </div>
</div>
@endsection
