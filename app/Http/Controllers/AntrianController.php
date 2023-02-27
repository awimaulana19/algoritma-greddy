<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Http\Requests\AntrianRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function index () {

        $user = User::where('roles','=','petugas')->get();
        $jadwal = Dokter::get();

        return view('home',compact('user'),compact('jadwal'));
    }


    public function store(AntrianRequest $request){
        $tanggal = $request->tgl_periksa;
        $jam = $request->jam_periksa;
        $user = $request->user_id;

        $jadwal = Dokter::where('user_id', $user)
            ->where('tanggal', $tanggal)
            ->where('jam', $jam)
            ->get();

        if($jadwal->isNotEmpty()){
            $antrian = new Antrian();

            $antrian->nama = $request->nama;
            $antrian->wa = $request->wa;
            $antrian->tgl_periksa = $request->tgl_periksa;
            $antrian->jam_periksa = $request->jam_periksa;
            $antrian->user_id = $request->user_id;
            $antrian->deskripsi = $request->deskripsi;

            $antrian->save();

            Alert::success('Berhasil', 'Antrian Berhasil Dibuat, Tunggu konfirmasi di Whatsapp');
        }else{
            Alert::error('Gagal', 'Antrian Gagal Dibuat, Harap Periksa Kembali Inputan Anda');
        }

        return redirect('/');
    }
}
