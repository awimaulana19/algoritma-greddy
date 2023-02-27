@extends('template.index')

@section('title', 'Antrian Pasien')

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
                            <th>#</th>
                            <th>Nama Pasien</th>
                            <th>Dokter Pasien</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($antrian as $no => $item)
                        @if ($item->verifikasi_pesan != 1)
                        <tr>
                            <td>{{$no+=1}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->user->nama}}</td>
                            <td>{{$item->tgl_periksa}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tgl_periksa)->isoFormat('dddd')}}</td>
                            <td>@if ($item->jam_periksa == '1')
                                08:00 - 12:00
                                @elseif($item->jam_periksa == '2')
                                13:00 - 17:00
                                @elseif($item->jam_periksa == '3')
                                19:00 - 22:00
                            @endif</td>
                            <td>
                                @if ($item->verifikasi_pasien != 1)
                                <a href="{{ url('/admin-validasi-pasien/'.$item->id) }}" class="btn btn-success">
                                        Lihat
                                </a>
                                @endif
                                @if($item->verifikasi_pasien != 0)
                                <input type="hidden" name="verifikasi_pesan" value="1">
                                <a href="{{ url('/whatsapp-admin/' . $item->id) }}" class="btn btn-success">
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
