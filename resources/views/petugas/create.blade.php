@extends('template.index')

@section('title', 'petugas-create')
@section('content')
    <div class="col-12 mx-auto">
        <div class="card mb-4">
            <h5 class="card-header">Daftar</h5>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ url('/petugas-create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" placeholder="Masukan Nama">
                                @error('nama')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Spesialis</label>
                                <input class="form-control @error('spesialis') is-invalid @enderror" type="text" name="spesialis" placeholder="Masukan Spesialis">
                                @error('spesialis')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nomor HP</label>
                                <input class="form-control  @error('nomor_hp') is-invalid @enderror" type="text" name="nomor_hp" placeholder="Masukan Nomor HP">
                                @error('nomor_hp')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control  @error('username') is-invalid @enderror" type="text" name="username" placeholder="Masukan Username">
                                @error('username')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Masukan Password">
                                @error('password')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Gambar</label>
                                <input class="form-control  @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
                                @error('gambar')
                                <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="/petugas" class="btn btn-danger me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
