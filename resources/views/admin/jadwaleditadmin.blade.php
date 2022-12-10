@extends('template.index')

@section('title', 'Jadwal Edit')
@section('content')

<div class="col-12 mx-auto">
    <div class="card mb-4">
        <h5 class="card-header">Daftar</h5>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ url('edit-jadwal-dokterAdmin/'.$dokter->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" value="{{$dokter->tanggal}}">
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Jam</label>
                        <select class="form-select" name="jam">
                            <option selected="">Pilih Waktu</option>
                            <option value="08:00 - 12:00" {{($dokter->jam === '08:00 - 12:00') ? 'Selected' : ''}}>08:00 - 12:00</option>
                            <option value="13:30 - 17:00" {{($dokter->jam === '13:30 - 17:00') ? 'Selected' : ''}}>13:30 - 17:00</option>
                            <option value="19:00 - 22:00" {{($dokter->jam === '19:00 - 22:00') ? 'Selected' : ''}}>19:00 - 22:00</option>
                        </select>
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
