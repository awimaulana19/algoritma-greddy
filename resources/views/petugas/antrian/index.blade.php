@extends('template.index')

@section('title', 'Antrian Pasien')

@section('content')
    {{-- antrain sebelum verifikasi --}}
    <div class="card">
        <h5 class="card-header">Antrian</h5>

        <div class="table-responsive text-nowrap">
            <!-- Button trigger modal -->
            @include('petugas.jadwalDokter.jadwal-create')
            @include('sweetalert::alert')

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>No Antrian</th>
                        <th>Nama Pasien</th>
                        <th>Whatsapp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($user->antrian as $item)
                        @if ($item->verifikasi_pesan != 1)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->wa }}</td>
                                <td>
                                    @if ($item->verifikasi_pasien != 1)
                                    <a href="{{ url('/validasi-pasien/'.$item->id) }}" class="btn btn-success">
                                            Lihat
                                    </a>
                                    @endif

                                    @if($item->verifikasi_pasien != 0)
                                    <input type="hidden" name="verifikasi_pesan" value="1">
                                    <a href="{{ url('/whatsapp/' . $item->id) }}" class="btn btn-success" onclick="confirm('Apakah ingin di verifikasi?')">
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
    {{-- end antrain sebelum verifikasi --}}

@endsection
