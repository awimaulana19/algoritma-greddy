<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;




class WhatsappController extends Controller
{
    public function index($id)
    {
        $item = Tanggapan::where('antrian_id', $id)->first();
        // $item = Antrian::find($id);

        $wa = $item->antrian->wa;
        $nama = $item->antrian->nama;
        $mulai = $item->jam_mulai;
        $akhir = $item->perkiraan;
        $hari = \Carbon\Carbon::parse($item->antrian->tgl_periksa)->isoFormat('dddd');
        $tanggal = $item->antrian->tgl_periksa;

        $isi_pesan = "Halo " . $nama .
            " Terima Kasih Telah Mendaftar Antrian. Beradasarkan dengan antrian prioritas kami maka antrian anda berada di jam ".$mulai.".00 sampai ".$akhir.".00 pada hari ".$hari." tanggal ".$tanggal." ";

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
            Alert::success('Berhasil', 'Tanggapan Berhasil Dikirim di Whatsapp');
        } else if ($testing['kode'] == 402) {
            $item->delete();
            Alert::error('Gagal', 'Nomor pengguna tidak terdaftar di Whatsapp');
        } else if ($testing['kode'] == 403) {
            $item->delete();
            Alert::error('Warning', 'Harap SCAN QRCODE sebelum menggunakan API');
        } else if ($testing['kode'] == 500) {
            $item->delete();
            Alert::error('Gagal', 'Gagal di kirim');
        } else if ($testing['kode'] == 300) {
            $item->delete();
            Alert::error('Gagal', 'Gagal Kirim / Tidak ada hasil');
        } else {
            $item->delete();
            Alert::error('Gagal', 'Gagal Kirim, Kesalahan Pada Wa Gateway');
        }


        $antrian = Antrian::where('id', $id)->first();
        // $antrian->delete();
        $antrian->update([
            "verifikasi_pesan" => 1
        ]);


        if (Auth::user()->roles == 'petugas') {
            return redirect('antrian-dokter');
        }
        if (Auth::user()->roles == 'admin') {
            return redirect('admin-antrian-pasien');
        }
    }

    public function history_antrian()
    {
        $tanggapan = Tanggapan::orderBy('tgl_periksa', 'asc')->get();
        return view('petugas.antrian.history', compact('tanggapan'));
    }
}
