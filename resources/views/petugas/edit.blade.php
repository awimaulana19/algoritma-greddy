@extends('template.index')

@section('title', 'petugas-edit')
@section('content')
<div class="col-12 mx-auto">
    <div class="card mb-4">
        <h5 class="card-header">Edit</h5>
        <div class="card-body">
            <form action="{{url('/petugas-update/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ $user->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Spesialis</label>
                            <input class="form-control" type="text" name="spesialis" placeholder="Masukan Spesialis" value="{{$user->spesialis}}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nomor HP</label>
                            <input class="form-control" type="text" name="nomor_hp" placeholder="Masukan Nomor HP" value="{{$user->nomor_hp}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Masukan Username" value="{{$user->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gambar Lama</label> <br>
                            <img src="/storage/images/{{ $user->gambar }}" alt="" width="auto" height="122px">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
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
