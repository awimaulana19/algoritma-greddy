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
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/image/logo.png') }}" alt="" width="205px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftardokter">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
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
                <form method="post" action="/" style="height: 90vh; overflow:auto;">
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
                                        <input required type="text" class="form-control" name="nama"
                                            id="nama" placeholder="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Nomor WA</label>
                                    <div class="col-9">
                                        <input required type="text" id="wa" name="wa"
                                            class="form-control phone-mask " placeholder="Nomor" aria-label="Nomor"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="wa">Tanggal</label>
                                    <div class="col-9">
                                        <input required type="date" id="tgl_periksa" onchange="updateDokterList()"
                                            name="tgl_periksa" class="form-control phone-mask"
                                            aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label" for="jam_periksa">Jam</label>
                                    <div class="col-9">
                                        <select required class="form-select" id="jam_periksa"
                                            onchange="updateDokterList()" name="jam_periksa">
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
                                        <select required class="form-select" id="dokter" name="user_id" disabled>
                                            <option value="">Pilih Dokter</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea required class="form-control" name="deskripsi" id="deskripsi" cols="auto" rows="5"
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
            </div>
        </div>
    </div>


    {{-- hero --}}
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center order-lg-0 order-2">
                    <h1 class="mb-3"><span>Jaga</span> Kesehatan, <br>
                        dan <span>Keluarga Anda</span>
                    </h1>
                    <p class="mb-5">Dengan Klinik Rafi Fisioterapi anda dapat mendaftarkan diri anda pada website
                        sehingga memudahkan dalam menunggu antrian dan melakukan pemeriksaan </p>
                    <a class="btn-hub" target="_blank"
                        href="https://api.whatsapp.com/send/?phone=6282226841562&text=Apakah+anda+bisa+membantu+Saya?&type=phone_number&app_absent=0">Hubungi
                        Klinik <i class="ms-1 bi bi-whatsapp"></i></a>
                </div>
                <div class="col-md-6 image">
                    <img src="{{ asset('assets/image/bghero.png') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>

    {{-- layanan --}}
    <section id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="d-flex">
                            <img src="{{ asset('assets/image/jadwal.png') }}" alt="" width="40px"
                                height="40px">
                            <p>Pendaftaran yang cepat tanpa perlu keluar rumah</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="d-flex">
                            <img src="{{ asset('assets/image/perlindungan.png') }}" alt="" width="40px"
                                height="40px">
                            <p>Pelayanan yang nyaman dan baik
                                sesuai pilihan keluarga</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="d-flex">
                            <img src="{{ asset('assets/image/fasilitas.png') }}" alt="" width="40px"
                                height="40px">
                            <p>Layanan kesehatan berkualitas sesuai kebutuhan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- dokter --}}
    <section id="daftardokter">
        <hr style="visibility: hidden;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="title">Pilihan Dokter</p>
                    <p class="subtitle">Dokter dengan pengalaman terbaik</p>
                </div>
            </div>

            <div class="row mt-2">
                @foreach ($user as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $item->gambar != null ? asset('storage/' . $item->gambar) : asset('assets/img/avatars/1.png') }}"
                                alt="foto" width="100%" height="320px" class="gambar"
                                style="object-fit: cover" />

                            <!-- Button trigger modal -->
                            <div class="isicard">
                                <p class="nama-dokter">{{ $item->nama }}</p>
                                <p class="no-telp"><i class="bi bi-whatsapp"></i> {{ $item->nomor_hp }}</p>
                                <button type="button" class="btn-daftar" data-bs-toggle="modal"
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
                                                    <div class="col-12 text-center">
                                                        <p class="nama-dokter">{{ $item->nama }}</p>
                                                        <p>Spesialis {{ $item->spesialis }}</p>
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
                                                                        <td>
                                                                            @if ($dok->jam == '1')
                                                                                08:00 - 12:00
                                                                            @elseif($dok->jam == '2')
                                                                                13:00 - 17:00
                                                                            @elseif($dok->jam == '3')
                                                                                19:00 - 22:00
                                                                            @endif
                                                                        </td>
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
                                                                <label class="col-3 col-form-label"
                                                                    for="nama">Nama</label>
                                                                <div class="col-9">
                                                                    <input required type="text"
                                                                        class="form-control" name="nama"
                                                                        id="nama" placeholder="Nama Lengkap" />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-3 col-form-label"
                                                                    for="wa">Nomor WA</label>
                                                                <div class="col-9">
                                                                    <input required type="text" id="wa"
                                                                        name="wa" class="form-control phone-mask"
                                                                        placeholder="Nomor" aria-label="Nomor"
                                                                        aria-describedby="basic-default-phone" />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-3 col-form-label"
                                                                    for="wa">Tanggal</label>
                                                                <div class="col-9">
                                                                    <select required class="form-select"
                                                                        id="tgl_periksa" name="tgl_periksa">
                                                                        @php
                                                                            $unik = $item->dokter->unique(function ($item) {
                                                                                return $item['tanggal'];
                                                                            });
                                                                        @endphp
                                                                        <option>Pilih Tanggal</option>
                                                                        @foreach ($unik as $dok)
                                                                            <option value="{{ $dok->tanggal }}">
                                                                                {{ \Carbon\Carbon::parse($dok->tanggal)->isoFormat('dddd') }},
                                                                                {{ $dok->tanggal }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-3 col-form-label"
                                                                    for="jam_periksa">Jam</label>
                                                                <div class="col-9">
                                                                    <select required class="form-select"
                                                                        id="jam_periksa" name="jam_periksa">
                                                                        @php
                                                                            $unikjam = $item->dokter->unique(function ($item) {
                                                                                return $item['jam'];
                                                                            });
                                                                        @endphp
                                                                        <option value="">Pilih Jam</option>
                                                                        @foreach ($unikjam as $dok)
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
                                                                    <label for="deskripsi"
                                                                        class="col-form-label">Deskripsi</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <textarea required class="form-control" name="deskripsi" id="deskripsi" cols="auto" rows="5"
                                                                        placeholder="masukkan deskripsi penyakit"></textarea>
                                                                </div>
                                                            </div>
                                                            <input id="dokter" type="hidden" name="user_id"
                                                                value="{{ $item->id }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Daftar</button>
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    

    {{-- contact --}}
    <section id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="title">Klinik Rafi Fisioterapi</div>
                        <p>Klinik Rafi Fisioterapi merupakan klinik Fisioterapi yang terletak di Tamarunang, Somba Opu, Kabupaten Gowa, Sulawesi Selatan 92112</p>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-house"></i>
                            <p class="mb-0 align-self-center">Beranda</p>
                        </a>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-person"></i>
                            <p class="mb-0 align-self-center">Dokter</p>
                        </a>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-person-rolodex"></i>
                            <p class="mb-0 align-self-center">Kontak</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="title">Sosial Media</div>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-instagram"></i>
                            <p class="mb-0 align-self-center">rafi_klinik</p>
                        </a>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-facebook"></i>
                            <p class="mb-0 align-self-center">Klinik Rafi</p>
                        </a>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-whatsapp"></i>
                            <p class="mb-0 align-self-center">+62834569087</p>
                        </a>
                        <a href="#" class="d-flex mb-2">
                            <i class="me-2 bi bi-envelope"></i>
                            <p class="mb-0 align-self-center">rafiklinik@gmail.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="title">Lokasi Klinik</div>
                        <div class="lokasi mb-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.3249648129358!2d119.4676156291645!3d-5.215498364210867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee10f15b21579%3A0xbac88bac6fd53de6!2sRafi%20Klinik!5e0!3m2!1sen!2sid!4v1671610466630!5m2!1sen!2sid"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <hr>
            <p class="text-center my-5">Klinik Rafi | Desember 2022</p>
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
