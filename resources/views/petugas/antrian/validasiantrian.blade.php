@extends('template.index')

@section('title', 'Validasi Antrian')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex">
                    <h5 class="fw-bold">Pasien {{ $antrian->nama }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{url('/buat-tanggapan')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Penyakit</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly style="background-color:#fff;overflow:auto;resize:none">{{ $antrian->deskripsi }}</textarea>
                        </div>
                        <div>
                            <label for="nama" class="form-label">Lama Kerja(Jam)</label>
                            <input class="form-control" type="number" name="lama" placeholder="masukan waktu lama kerja">
                        </div>

                        <div class="px-4 mb-4 d-flex justify-content-end">
                            @if ($antrian->jam_periksa == '1')
                                <input type="hidden" name="jam_mulai" value="8">
                                <input type="hidden" name="jam_akhir" value="12">
                                <input type="hidden" name="jam_id" value="{{ $antrian->jam_periksa }}">
                                <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">
                                <input type="hidden" name="user_id" value="{{ $antrian->user_id }}">
                                <input type="hidden" name="tgl_periksa" value="{{ $antrian->tgl_periksa }}">
                            @endif
                            @if ($antrian->jam_periksa == '2')
                                <input type="hidden" name="jam_mulai" value="13">
                                <input type="hidden" name="jam_akhir" value="17">
                                <input type="hidden" name="jam_id" value="{{ $antrian->jam_periksa }}">
                                <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">
                                <input type="hidden" name="user_id" value="{{ $antrian->user_id }}">
                                <input type="hidden" name="tgl_periksa" value="{{ $antrian->tgl_periksa }}">
                            @endif
                            @if ($antrian->jam_periksa == '3')
                                <input type="hidden" name="jam_mulai" value="19">
                                <input type="hidden" name="jam_akhir" value="22">
                                <input type="hidden" name="jam_id" value="{{ $antrian->jam_periksa }}">
                                <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">
                                <input type="hidden" name="user_id" value="{{ $antrian->user_id }}">
                                <input type="hidden" name="tgl_periksa" value="{{ $antrian->tgl_periksa }}">
                            @endif

                            <input type="hidden" name="verifikasi_pasien" value="1">
                            <button type="submit" class="btn btn-success" onclick="confirm('Apakah ingin di terima?')">
                                Accept
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
