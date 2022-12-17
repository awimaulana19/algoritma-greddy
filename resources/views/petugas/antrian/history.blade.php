@extends('template.index')

@section('title', 'Antrian Pasien')

@section('content')
{{-- antrain sebelum verifikasi --}}
<div class="card">
    <h5 class="card-header">History Antrian</h5>

    <div class="table-responsive text-nowrap">
        <!-- Button trigger modal -->
        @include('sweetalert::alert')

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tanggapan as $item)
                @if ($item->antrian->verifikasi_pesan == 1)
                <tr>
                    <td>{{$item->antrian->nama}}</td>
                    <td>{{$item->user->nama}}</td>
                    <td>{{$item->tgl_periksa}}</td>
                    <td>{{\Carbon\Carbon::parse($item->tgl_periksa)->isoFormat('dddd')}}</td>
                    <td>{{$item->jam_mulai}}:00 - {{$item->perkiraan}}:00</td>
                    {{-- <td>@if ($item->jam_periksa == '1')
                        08:00 - 12:00
                        @elseif($item->jam_periksa == '2')
                        13:00 - 17:00
                        @elseif($item->jam_periksa == '3')
                        19:00 - 22:00
                    @endif</td> --}}
                    <td class="text-success">
                        Telah Di Verifikasi
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- end antrain sebelum verifikasi --}}
@endsection
