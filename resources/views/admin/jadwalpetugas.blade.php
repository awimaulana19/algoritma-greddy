@extends('template.index')

@section('title', 'Jadwal Petugas | Admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card p-4">
            <h4>Jadwal Seluruh Dokter</h4>
            <div class="table-responsive text-nowrap">
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
    </div>

</div>
@endsection