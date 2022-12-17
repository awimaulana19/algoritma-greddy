  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Membuat Jadwal</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form enctype="multipart/form-data" action="{{ url('create-jadwal-dokterAdmin') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label for="nama" class="form-label">Tanggal</label>
                          <input class="form-control" type="date" name="tanggal">
                      </div>
                      <div class="mb-3">
                          <div class="input-group">
                              <label class="input-group-text">Jam</label>
                              <select class="form-select" name="jam">
                                  <option selected="">Pilih Waktu</option>
                                  <option value="1">08:00 - 12:00</option>
                                  <option value="2">13:00 - 17:00</option>
                                  <option value="3">19:00 - 22:00</option>
                              </select>
                          </div>
                      </div>
                      <div class="row mb-3">
                        <div class="input-group">
                        <label for="dokter" class="input-group-text">Pilihan Dokter</label>
                            <select class="form-select" id="dokter" name="user_id">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                    </div>
                    </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
          </div>
      </div>
  </div>
