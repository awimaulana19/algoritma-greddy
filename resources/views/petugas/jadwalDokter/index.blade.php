@extends('template.index')

@section('title', 'Jadwal Dokter')
@section('content')
    <div class="card">
        <h5 class="card-header">Jadwal</h5>

        <div class="table-responsive text-nowrap">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Membuat Jadwal
            </button>

            @include('petugas.jadwalDokter.jadwal-create')

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>Nama Dokter</th>
                        <th>hari</th>
                        <th>jam</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($dokter as $item)
                    <tr>
                        <td>{{$item->user->nama}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd')}}</td>
                        <td>{{$item->jam}} WIB</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{url('/edit-jadwal-dokter/'.$item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
