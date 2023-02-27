@extends('template.index')


@section('title', 'petugas')
@section('content')
<div class="card">
  <div class="d-flex">
    <div>
      <h5 class="card-header align-self-center">Halaman Dokter</h5>
    </div>
    <div class="ms-auto p-4">
      <a href="{{url('petugas-create')}}" type="button" class="btn btn-primary ms-3">Membuat Akun</a>
    </div>
  </div>

    <div class="table-responsive text-nowrap ps-3">
      <table class="table table-hover mt-4">
        @include('sweetalert::alert')
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>Whatsapp</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0 table-responsive">
            @foreach ($user as $item)
            @if($item->roles == 'petugas')
            <tr>
                <td>
                  <img src="{{ asset('images/'.$item->gambar) }}" alt="" width="auto" height="100px">
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
    <div class="d-flex justify-content-end align-items-center me-3 my-3">
        <a href="{{url('admin-dokter-pdf')}}" target="_blank" class="btn btn-success"><i class="bi bi-file-pdf"></i> PDF</a>
    </div>
  </div>
@endsection
