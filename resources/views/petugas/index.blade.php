@extends('template.index')


@section('title', 'petugas')
@section('content')
<div class="card">
    <h5 class="card-header">Dokter</h5>

    <div class="table-responsive text-nowrap">
        <a href="{{url('petugas-create')}}" type="button" class="btn btn-primary ms-3">Membuat Akun</a>
      <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($user as $item)
            @if($item->roles == 'petugas')
            <tr>
            <td>{{$item->nama}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->roles}}</td>
            <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('petugas-edit/'.$item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="{{url('petugas-delete/'.$item->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
