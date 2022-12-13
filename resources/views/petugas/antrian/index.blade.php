@extends('template.index')
<<<<<<< Updated upstream

@section('title', 'Antrian Pasien')

@section('content')
{{-- antrain sebelum verifikasi --}}
<div class="card">
    <h5 class="card-header">Antrian</h5>

    <div class="table-responsive text-nowrap">
        <!-- Button trigger modal -->
        @include('petugas.jadwalDokter.jadwal-create')

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Email</th>
                    <th>Whatsapp</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($user->antrian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->wa}}</td>
                    <td>
                        <a href="{{url('/whatsapp/'.$item->id)}}" class="btn btn-success">Accept</a>
                        {{-- <a href="{{url('/delete-antrian/'.$item->id)}}" class="btn btn-success">Accept</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- end antrain sebelum verifikasi --}}

@endsection
