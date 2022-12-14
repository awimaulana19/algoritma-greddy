@extends('template.index')


@section('title', 'petugas')
@section('content')
<div class="card">
    <h5 class="card-header">Dokter</h5>

    <div class="table-responsive text-nowrap">
        <a href="{{url('petugas-create')}}" type="button" class="btn btn-primary ms-3">Membuat Akun</a>
      <table class="table table-hover mt-4">
        @include('sweetalert::alert')
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>Nomor Handphone</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0 table-responsive">
            @foreach ($user as $item)
            @if($item->roles == 'petugas')
            <tr>
                <td>
                  <img src="{{ asset('storage/'.$item->gambar) }}" alt="" width="auto" height="100px">
                </td>
                <td>{{$item->nama}}</td>
                <td>{{$item->spesialis}}</td>
                <td>{{$item->nomor_hp}}</td>
                <td>{{$item->roles}}</td>
              <td>
                    <div class="d-flex">
                      <a class="btn btn-primary me-2" href="{{url('petugas-edit/'.$item->id)}}">
                        <i class="bx bx-edit-alt"></i> Edit
                      </a>
                      <a class="btn btn-danger" href="{{url('petugas-delete/'.$item->id)}}">
                        <i class="bx bx-trash me-1"></i> Hapus
                      </a>
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
