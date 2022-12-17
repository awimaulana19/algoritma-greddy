@extends('template.index')

@section('title', 'Jadwal Edit | Admin')
@section('content')

<div class="col-12 mx-auto">
    <div class="card mb-4">
        <h5 class="card-header">Daftar</h5>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ url('edit-jadwal-dokterAdmin/'.$dokter->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Tanggal</label>
                    <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" value="{{$dokter->tanggal}}">
                    @error('tanggal')
                    <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Jam</label>
                        <select class="form-select @error('jam') is-invalid @enderror" name="jam">
                            <option selected value="0">Pilih Waktu</option>
                            <option value="1" {{($dokter->jam === '1') ? 'Selected' : ''}}>08:00 - 12:00</option>
                            <option value="2" {{($dokter->jam === '2') ? 'Selected' : ''}}>13:30 - 17:00</option>
                            <option value="3" {{($dokter->jam === '3') ? 'Selected' : ''}}>19:00 - 22:00</option>
                        </select>
                        @error('jam')
                        <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection
