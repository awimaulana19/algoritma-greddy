@extends('admin.pdf.layout')

@section('title','Dokter')
@section('content')
<section id="history-antrian">
    <div class="row">
        <div class="col">
            <h1 style="text-align: center;">Data Dokter</h1>
            <table border="" width="100%">
                @include('sweetalert::alert')
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Whatsapp</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($user as $no => $item)
                    @if($item->roles == 'petugas')
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->spesialis}}</td>
                        <td>{{$item->nomor_hp}}</td>
                        <td>{{$item->roles}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
   </section>
@endsection
