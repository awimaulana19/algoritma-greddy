@extends('template.index')

@section('title', 'Antrian Pasien | Admin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card p-4">
            <h4>Antrian Seluruh Pasien</h4>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Dokter Pasien</th>
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($antrian as $item)
                        @if ($item->verifikasi_pesan != 1)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->user->nama}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->wa}}</td>
                            <td>
                                <input type="hidden" name="verifikasi_pesan" value="1">
                                <a href="{{ url('/whatsapp-admin/' . $item->id) }}" class="btn btn-success" onclick="confirm('Apakah ingin di verifikasi?')">
                                        Accept
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
