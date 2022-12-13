<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;




class WhatsappController extends Controller
{
    public function index($id) 
    {
        $item = Antrian::find($id);

        $data = $item->nama;
        $data_user = $item->wa;


        $isi_pesan = "Halo ".$data.
        " Terima Kasih Telah Mendaftar Antrian. Beradasarkan dengan antrian prioritas kami maka antrian anda berada di antrian *data* pada hari *data* tanggal *data* jam *data* ";
        
        $api_key   = '469d065c8788ab986e8486312fe68b8f9d21155b'; // API KEY Anda
        $id_device = '2077'; // ID DEVICE yang di SCAN (Sebagai pengirim)
        $url   = 'https://api.watsap.id/send-message'; // URL API
        $no_hp = $data_user; // No.HP yang dikirim (No.HP Penerima)
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

        if($testing['kode'] == 200)
        {
            Alert::success('Berhasil', 'Tanggapan Berhasil Dikirim di Whatsapp');
        }
        else if($testing['kode'] == 402)
        {
            Alert::error('Gagal', 'Nomor pengguna tidak terdaftar di Whatsapp');
        }
        else if($testing['kode'] == 403)
        {
            Alert::error('Warning', 'Harap SCAN QRCODE sebelum menggunakan API');
        }
        else if($testing['kode'] == 500)
        {
            Alert::error('Gagal', 'Gagal di kirim');
        }
        else if($testing['kode'] == 300)
        {
            Alert::error('Gagal', 'Gagal Kirim / Tidak ada hasil');
        }else{
            Alert::error('Gagal', 'Gagal Kirim, Kesalahan Pada Wa Gateway');
        }

        $antrian = Antrian::where('id', $id)->first();
        $antrian->delete();

        
        if(Auth::user()->roles == 'petugas'){
            return redirect('antrian-dokter');
        }
        if(Auth::user()->roles == 'admin'){
            return redirect('admin-antrian-pasien');
        }
    }
}
