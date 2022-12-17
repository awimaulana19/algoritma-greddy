<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik</title>
    {{-- bootsrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    {{-- link font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>

<body>
    @include('sweetalert::alert')
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Klinik Greedy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Contact</a>
                    </li>
                </ul>
                <button class="btn-daftar" data-bs-toggle="modal" data-bs-target="#exampleModal">Daftar Antrian</button>
            </div>
        </div>
    </nav>

    <!-- Modal daftar antrian navbar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Antrian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Data Diri</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="nama">Nama</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Nomor WA</label>
                                    <div class="col-9">
                                        <input type="text" id="wa" name="wa"
                                            class="form-control phone-mask" placeholder="Nomor" aria-label="Nomor"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Tanggal</label>
                                    <div class="col-9">
                                        <input type="date" id="tgl_periksa" onchange="updateDokterList()"
                                            name="tgl_periksa" class="form-control phone-mask"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="jam_periksa">Jam</label>
                                    <div class="col-9">
                                        <select class="form-select" id="jam_periksa" onchange="updateDokterList()"
                                            name="jam_periksa">
                                            <option value="">Pilih Jam</option>
                                            <option value="1">08:00 - 12:00</option>
                                            <option value="2">13:00 - 17:00</option>
                                            <option value="3">19:00 - 22:00</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="dokter">Dokter</label>
                                    <div class="col-9">
                                        <select class="form-select" id="dokter" name="user_id" disabled>
                                            <option value="">Pilih Dokter</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="auto" rows="5"
                                            placeholder="masukkan deskripsi penyakit"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
               
                {{-- <form method="post" action="/">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Antrian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Data Diri</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="nama">Nama</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Nomor WA</label>
                                    <div class="col-9">
                                        <input type="text" id="wa" name="wa"
                                            class="form-control phone-mask" placeholder="Nomor" aria-label="Nomor"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Tanggal</label>
                                    <div class="col-9">
                                        <input type="date" id="tgl_periksa" onchange="cetak()" name="tgl_periksa"
                                            class="form-control phone-mask"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="jam_periksa">Jam</label>
                                    <div class="col-9">
                                        <select class="form-select" id="jam_periksa" onchange="cetak()" name="jam_periksa">
                                            <option value="">Pilih Jam</option>
                                            <option value="1">08:00 - 12:00</option>
                                            <option value="2">13:00 - 17:00</option>
                                            <option value="3">19:00 - 22:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <script>
                                        function cetak() {
                                            var tanggal = document.getElementById("tgl_periksa").value ;
                                            document.getElementById("tgl").innerHTML = tanggal;

                                            var jam = document.getElementById("jam_periksa").value;
                                            document.getElementById("jam").innerHTML = jam;
                                        }
                                    </script>
                                    <p id="tgl"></p>
                                    <p id="jam"></p>

                                    <label for="dokter" class="col-3 col-form-label">Pilihan Dokter</label>
                                    <div class="col-9">

                                        <select class="form-select" id="dokter" name="user_id"
                                            @foreach ($jadwal as $item)
                                                {{$item->tanggal == "<script>cetak().tanggal</script"  &&  $item->jam == "<script>cetak().jam</scrip>"  ? '' :'disabled' }}
                                            @endforeach
                                        >
                                            <option value="">Pilih Dokter</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="auto" rows="5" placeholder="masukkan deskripsi penyakit"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>


    {{-- hero --}}
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center order-lg-0 order-2">
                    <h1>Always Connected, <br>
                        Always Secure.
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequatur enim iusto non
                        libero velit.</p>
                    <a class="btn-hub" target="_blank"
                        href="https://api.whatsapp.com/send/?phone=6282236831592&text=Apakah+anda+bisa+membantu+Saya?&type=phone_number&app_absent=0">Hubungi
                        Klinik</a>
                </div>
                <div class="col-md-6 image">
                    <img src="{{ asset('assets/image/hero.png') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>


    {{-- about --}}
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="title">About</p>
                    <p class="subtitle">Pilihan dokter spesialis</p>
                </div>
            </div>

            <div class="row mt-2">
                @foreach ($user as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $item->gambar != null ? asset('storage/' . $item->gambar) : asset('assets/img/avatars/1.png') }}"
                                alt="foto" width="100%" height="360px" class="gambar" />
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#dokter{{ $item->id }}">
                                Detail Dokter
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="dokter{{ $item->id }}" tabindex="-1"
                                aria-labelledby="dokter1Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{ $item->gambar != null ? asset('storage/' . $item->gambar) : asset('assets/img/avatars/1.png') }}"
                                                        alt="foto" width="100%" />
                                                </div>
                                                <div class="col-md-7 align-self-center">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>Nama</p>
                                                            <p>Spesialis</p>
                                                            <p>Nomor Telp</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p> : {{ $item->nama }}</p>
                                                            <p> : {{ $item->spesialis }}</p>
                                                            <p> : {{ $item->nomor_hp }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Hari</th>
                                                                <th scope="col">Tanggal</th>
                                                                <th scope="col">Jam</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($item->dokter as $dok)
                                                                <tr>
                                                                    <td>{{ \Carbon\Carbon::parse($dok->tanggal)->isoFormat('dddd') }}
                                                                    </td>
                                                                    <td>{{ $dok->tanggal }}</td>
                                                                    <td>{{ $dok->jam }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div class="cards mb-4">
                                                <form method="post" action="/">
                                                    @csrf
                                                    <div
                                                        class="card-header d-flex align-items-center justify-content-between">
                                                        <h5 class="mb-0">Daftar Antrian</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label" for="nama">Nama</label>
                                                            <div class="col-9">
                                                                <input type="text" class="form-control" name="nama" id="nama"
                                                                    placeholder="Nama Lengkap" />
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label" for="wa">Nomor WA</label>
                                                            <div class="col-9">
                                                                <input type="text" id="wa" name="wa"
                                                                    class="form-control phone-mask" placeholder="Nomor" aria-label="Nomor"
                                                                    aria-describedby="basic-default-phone" />
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label" for="wa">Tanggal</label>
                                                            <div class="col-9">
                                                                <select class="form-select" id="tgl_periksa"
                                                                    name="tgl_periksa">
                                                                        <option value="">Pilih Tanggal</option>
                                                                    @foreach ($item->dokter as $dok)
                                                                        <option value="{{ $dok->tanggal }}">{{ \Carbon\Carbon::parse($dok->tanggal)->isoFormat('dddd') }}, {{ $dok->tanggal }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label" for="jam_periksa">Jam</label>
                                                            <div class="col-9">
                                                                <select class="form-select" id="jam_periksa"
                                                                    name="jam_periksa">
                                                                        <option value="">Pilih Jam</option>
                                                                    @foreach ($item->dokter as $dok)
                                                                        <option value="{{ $dok->jam }}">
                                                                            @if ($dok->jam == 1)
                                                                                08:00 - 12:00
                                                                            @elseif($dok->jam == 2)
                                                                                13:00 - 17:00
                                                                            @else
                                                                                19:00 - 22:00
                                                                            @endif

                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-3">
                                                                <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="auto" rows="5"
                                                                    placeholder="masukkan deskripsi penyakit"></textarea>
                                                            </div>
                                                        </div>
                                                        <input id="dokter" type="hidden" name="user_id"
                                                            value="{{ $item->id }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" 
                                                        
                                                    >Daftar</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- contact --}}
    <section id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="lokasi mb-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63579.47262630796!2d119.41836823023026!3d-5.149172589020435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee2e6bbd6ca03%3A0x91e4ad5093ca55d4!2sHermina%20Makassar%20Hospital!5e0!3m2!1sen!2sid!4v1670468423393!5m2!1sen!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <p class="title fs-5">
                            Tentang Klinik
                        </p>
                        <p class="subtitle mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ea sunt quibusdam nihil?
                            Maxime tempore quibusdam sapiente? Repellat, iste totam.
                        </p>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <p class="title fs-5 mb-0">
                            Ikuti Kami
                        </p>
                        <p class="subtitle mt-3">
                        <div class="mb-3">
                            <i class="bi bi-facebook"> klink.ind</i>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-instagram"> Klinik_Indonesia</i>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-twitter"> Klinik.klik</i>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 py-2 text-center">
                    <i>Copyright @ Klinik 2022</i>
                </div>
            </div>
        </div>
    </footer>


    <script>
        async function updateDokterList() {
            const tanggal = document.getElementById('tgl_periksa').value;
            const jam = document.getElementById('jam_periksa').value;

            // Mengosongkan opsi yang ada pada elemen select dokter
            document.getElementById('dokter').innerHTML = '';

            // Menonaktifkan elemen select dokter
            document.getElementById('dokter').disabled = true;

            try {
                // Mengirim request HTTP GET ke endpoint /jadwal dengan query parameter tanggal dan jam
                const response = await fetch(`/jadwal?tanggal=${tanggal}&jam=${jam}`);
                const data = await response.json();

                // Menambahkan opsi baru sesuai dengan data jadwal yang didapatkan dari server
                data.forEach(jadwal => {
                    const option = document.createElement('option');
                    option.value = jadwal.user_id;
                    option.text = jadwal.nama;
                    document.getElementById('dokter').appendChild(option);
                });

                // Mengaktifkan elemen select dokter
                document.getElementById('dokter').disabled = false;
            } catch (error) {
                console.error(error);
            }
        }
    </script>

    {{-- bootsrap cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
