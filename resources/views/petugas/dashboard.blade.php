@extends('template.index')

@section('title', 'Dashboard Dokter')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <h5 class="fw-bold">Dokter {{ auth()->user()->nama }}</h5>
                </div>

                <form action="">
                    <div class="row px-4 mb-4">
                        <div class="col-lg-4 col-md-12 mb-3">
                            <img src="{{Auth::user()->gambar != null ? asset('images/'.Auth::user()->gambar) : asset('assets/img/avatars/1.png') }}" alt class="h-auto rounded" width="100%" />
                        </div>

                        <div class="col-lg-4 col-md-12 align-self-center">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->nama }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->username }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 align-self-center">
                            <div class="mb-3">
                                <label for="name" class="form-label">Spesialis</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->spesialis }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nomor HP</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->nomor_hp }}
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card border border-primary border-2">
                        <div class="card-header d-flex ms-auto me-auto">
                            <h4>Jumlah Jadwal</h4>
                        </div>

                        <div class="row pb-3">
                            <div class="col-6 text-end mb-2">
                                <img src="{{ asset('assets/image/calendar.png') }}" alt="" width="50%">
                            </div>
                            <div class="col-1 align-self-center">
                                <h1>=</h1>
                            </div>
                            <div class="col-5 align-self-center">
                                <h1>{{ $user->dokter->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
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
                                <h1>{{ $user->antrian->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
