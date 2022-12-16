@extends('template.index')

@section('title', 'Jadwal Dokter')
@section('content')
    <div class="card p-4">
        <div class="d-flex">
            <h5>Jadwal Dokter</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Jadwal
            </button>
        </div>

        @include('petugas.jadwalDokter.jadwal-create')
        @include('sweetalert::alert')

        <div class="table-responsive text-nowrap mt-4">

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($user->dokter as $item)
                    <tr>
                        <td>{{$item->tanggal}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd')}}</td>
                        <td>{{$item->jam}} WIB</td>
                        <td>
                            <div class="d-flex">
                                  <a class="btn btn-primary me-3" href="{{url('/edit-jadwal-dokter/'.$item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="btn btn-danger" href="{{url('/delete-jadwal-dokter/'.$item->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
