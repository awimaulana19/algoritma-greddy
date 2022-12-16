@extends('template.index')

@section('title', 'Antrian Pasien | Admin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card p-4">
            <h5>Antrian Seluruh Pasien</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Dokter Pasien</th>
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
                            <td>{{$item->wa}}</td>
                            <td>
                                @if ($item->verifikasi_pasien != 1)
                                <a href="{{ url('/admin-validasi-pasien/'.$item->id) }}" class="btn btn-success">
                                        Lihat
                                </a>
                                @endif
                                @if($item->verifikasi_pasien != 0)
                                <input type="hidden" name="verifikasi_pesan" value="1">
                                <a href="{{ url('/whatsapp-admin/' . $item->id) }}" class="btn btn-success" onclick="confirm('Apakah ingin di verifikasi?')">
                                    Kirim Pesan
                                </a>
                                @endif
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
