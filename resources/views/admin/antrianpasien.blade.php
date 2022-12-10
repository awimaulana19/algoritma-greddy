@extends('template.index')

@section('title', 'Antrian Pasien | Admin')

@section('content')
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
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->user->nama}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->wa}}</td>
                            <td>
                                <a href="{{url('/delete-antrian-admin/'.$item->id)}}" class="btn btn-success">Accept</a>
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
