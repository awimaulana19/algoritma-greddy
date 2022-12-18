<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function index () {

        $user = User::where('roles','=','petugas')->get();
        $jadwal = Dokter::get();
        
        return view('home',compact('user'),compact('jadwal'));
    }


    public function store(Request $request){
        $tanggal = $request->tgl_periksa;
        $jam = $request->jam_periksa;
        $user = $request->user_id;

        $jadwal = Dokter::where('user_id', $user)
            ->where('tanggal', $tanggal)
            ->where('jam', $jam)
            ->get();
        
        if($jadwal->isNotEmpty()){
            $hasil = $request->validate([
                'nama' => 'required|max:255',
                'wa' => 'required',
                'tgl_periksa' => 'required',
                'jam_periksa' => 'required',
                'user_id' => 'required',
                'deskripsi' => 'required'
            ]);

            Antrian::create($hasil);

            Alert::success('Berhasil', 'Antrian Berhasil Dibuat, Tunggu konfirmasi di Whatsapp');
        }else{
            Alert::error('Gagal', 'Antrian Gagal Dibuat, Harap Periksa Kembali Inputan Anda');
        }

        return redirect('/');
    }
}
