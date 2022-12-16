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
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($antrian as $item)
                @if ($item->verifikasi_pesan == 1)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->wa}}</td>
                    <td>
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
