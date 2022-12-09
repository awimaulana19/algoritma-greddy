@extends('template.index')

@section('title', 'Jadwal Dokter')
@section('content')
    <div class="card p-4">
        <div class="d-flex">
            <h4>Jadwal</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Jadwal
            </button>
        </div>

        @include('petugas.jadwalDokter.jadwal-create')

        <div class="table-responsive text-nowrap">

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>hari</th>
                        <th>jam</th>
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
                                  <a class="btn btn-danger" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
