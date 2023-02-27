@extends('petugas.pdf.layout')
@section('title', 'Jadwal Dokter')
@section('content')
<section id="jadwal-dokter">
    <div class="row">
        <div class="col">
            <h1 style="text-align: center;">Data Jadwal Dokter</h1>
            <table border="" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($dokter as $no => $item)
                        <tr>
                            <td>{{$no+=1}}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   </section>
@endsection
