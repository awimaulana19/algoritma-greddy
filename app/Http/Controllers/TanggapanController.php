<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index(Request $request)
    {
        $buat = new Tanggapan();

        $buat->antrian_id = $request->antrian_id;
        $buat->user_id = $request->user_id;
        $buat->jam_id = $request->jam_id;
        $buat->jam_mulai = $request->jam_mulai;
        $buat->jam_akhir = $request->jam_akhir;
        $buat->lama = $request->lama;
        $buat->perkiraan = $request->jam_mulai + $request->lama;
        
        $buat->save();

        $jam = $request->jam_id;
        $pasien = Tanggapan::where('jam_id','=', $jam)->get();
        $max_selesai = 0;
        // $result = [];

        foreach ($pasien as $p) {
            if ($p->jam_mulai < $max_selesai) {
                $p->jam_mulai = $max_selesai;
                $p->perkiraan = $p->jam_mulai + $p->lama;
                $p->update();
            }

            if ($p->perkiraan > $p->jam_akhir) {
                $p->delete();
                continue;
            }

            $max_selesai = $p->perkiraan;
            // $result[] = $p->antrian->nama;
        }

        // return $result;

        if (Auth::user()->roles == 'petugas') {
            return redirect('antrian-dokter');
        }
        if (Auth::user()->roles == 'admin') {
            return redirect('admin-antrian-pasien');
        }
    }
}
