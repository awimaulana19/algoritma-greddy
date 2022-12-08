@extends('template.index')

@section('title', 'petugas-edit')
@section('content')
<div class="col-md-10 mx-auto">
    <div class="card mb-4">
        <h5 class="card-header">Edit</h5>
        <div class="card-body">
            <form action="{{url('/petugas-update/'.$user->id)}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{$user->nama}}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" value="{{$user->username}}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" value="{{$user->password}}">
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
