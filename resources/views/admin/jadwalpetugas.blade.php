@extends('template.index')

@section('title', 'Jadwal Petugas | Admin')

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card p-4">
                <div class="card p-4">
                    <div class="d-flex">
                        <h5>Jadwal Seluruh Dokter</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Jadwal
                        </button>
                    </div>

                    @include('admin.jadwal-create')
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover mt-4">
                            <thead>
                                <tr>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($dokter as $item)
                                    <tr>
                                        <td>{{ $item->user->nama }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd') }}</td>
                                        <td>@if ($item->jam == '1')
                                            08:00 - 12:00
                                            @elseif($item->jam == '2')
                                            13:00 - 17:00
                                            @elseif($item->jam == '3')
                                            19:00 - 22:00
                                        @endif</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary me-3"
                                                    href="{{ url('/edit-jadwal-dokterAdmin/' . $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="btn btn-danger"
                                                    href="{{ url('/delete-jadwal-dokterAdmin/' . $item->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection
