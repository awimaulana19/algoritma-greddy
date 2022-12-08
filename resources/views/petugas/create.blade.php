@extends('template.index')

@section('title', 'petugas-create')
@section('content')
    <div class="col-md-10 mx-auto">
        <div class="card mb-4">
            <h5 class="card-header">Daftar</h5>
            <div class="card-body">
                <form action="{{url('/petugas-create')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukan Password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
