<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\validasiRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{
    public function index(validasiRequest $request)
    {

        $buat = new Tanggapan();

        $buat->antrian_id = $request->antrian_id;
        $buat->user_id = $request->user_id;
        $buat->tgl_periksa = $request->tgl_periksa;
        $buat->jam_id = $request->jam_id;
        $buat->jam_mulai = $request->jam_mulai;
        $buat->jam_akhir = $request->jam_akhir;
        $buat->lama = $request->lama;
        $buat->perkiraan = $request->jam_mulai + $request->lama;

        $buat->save();

        $antrian = Antrian::where('id',$buat->antrian_id)->first();
        $antrian->verifikasi_pasien = $request->verifikasi_pasien;
        $antrian->update();

        $user = $request->user_id;
        $tanggal = $request->tgl_periksa;
        $jam = $request->jam_id;
        $pasien = Tanggapan::where('user_id', $user)
            ->where('tgl_periksa', $tanggal)
            ->where('jam_id', $jam)
            ->get();
        $max_selesai = 0;

        foreach ($pasien as $p) {
            if ($p->jam_mulai < $max_selesai) {
                $p->jam_mulai = $max_selesai;
                $p->perkiraan = $p->jam_mulai + $p->lama;
                $p->update();
            }

            if ($p->perkiraan > $p->jam_akhir) {
                $wa = $p->antrian->wa;
                $nama = $p->antrian->nama;
                $jam = $p->antrian->jam_periksa;
                $hari = \Carbon\Carbon::parse($p->antrian->tgl_periksa)->isoFormat('dddd');
                $tanggal = $p->antrian->tgl_periksa;

                if ($jam = "1") {
                    $jam = "08:00 - 12:00";
                }
                else if ($jam = "2") {
                    $jam = "13:00 - 17:00";
                }
                else if ($jam = "3") {
                    $jam = "19:00 - 22:00";
                }

                $isi_pesan = "Halo " . $nama .
                    " Kami Meminta Maaf, Jadwal yang anda pilih pada tanggal ".$tanggal.", hari ".$hari." di jam ".$jam." sudah penuh. Silahkan daftar antrian kembali di jadwal yang berbeda, Terima Kasih";

                $api_key   = '469d065c8788ab986e8486312fe68b8f9d21155b'; // API KEY Anda
                $id_device = '2077'; // ID DEVICE yang di SCAN (Sebagai pengirim)
                $url   = 'https://api.watsap.id/send-message'; // URL API
                $no_hp = $wa; // No.HP yang dikirim (No.HP Penerima)
                $pesan = $isi_pesan; // Pesan yang dikirim

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
                curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_POST, 1);

                $data_post = [
                    'id_device' => $id_device,
                    'api-key' => $api_key,
                    'no_hp'   => $no_hp,
                    'pesan'   => $pesan
                ];

                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                $response = curl_exec($curl);
                curl_close($curl);

                $testing = json_decode($response, true);

                // dd($data_post, $testing);

                if ($testing['kode'] == 200) {
                    Alert::success('Antrian Penuh', 'Tanggapan Berhasil Dikirim di Whatsapp');
                } else if ($testing['kode'] == 402) {
                    Alert::error('Antrian Penuh', 'Nomor pengguna juga tidak terdaftar di Whatsapp');
                } else if ($testing['kode'] == 403) {
                    Alert::error('Antrian Penuh', 'Harap SCAN QRCODE sebelum menggunakan API');
                } else if ($testing['kode'] == 500) {
                    Alert::error('Antrian Penuh', 'Pesan Gagal di kirim');
                } else if ($testing['kode'] == 300) {
                    Alert::error('Antrian Penuh', 'Pesan Gagal Kirim / Tidak ada hasil');
                } else {
                    Alert::error('Antrian Penuh', 'Pesan Gagal Kirim, Kesalahan Pada Wa Gateway');
                }

                $p->delete();
                $antrian->delete();
                continue;
            }

            $max_selesai = $p->perkiraan;
        }

        if (Auth::user()->roles == 'petugas') {
            return redirect('antrian-dokter');
        }
        if (Auth::user()->roles == 'admin') {
            return redirect('admin-antrian-pasien');
        }
    }
}
