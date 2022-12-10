<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function adminJadwalDokter()
    {
        $dokter = Dokter::get();
        $user = Auth::user();

        return view('admin.jadwalpetugas', compact('dokter'), compact('user'));
    }
    public function dashboard()
    {
        $dokter = Dokter::get();
        $user = Auth::user();

        return view('petugas.dashboard', compact('dokter'), compact('user'));
    }

    public function store(Request $request)
    {
        $dokter = new Dokter();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;
        $dokter->user_id = Auth::user()->id;

        $dokter->save();

        return redirect('jadwal-dokter');
    }

    public function jadwalDoter()
    {
        $user = Auth::user();
        return view('petugas.jadwalDokter.index', compact('user'));
    }
    public function antrianDoter()
    {
        $user = Auth::user();
        return view('petugas.antrian.index', compact('user'));
    }


    public function edit($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        return view('petugas.jadwalDokter.jadwal-edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::where('id', $id)->first();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;
        $dokter->user_id = Auth::user()->id;

        $dokter->update();

        return redirect('jadwal-dokter');
    }

    public function delete($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        $dokter->delete();
        return redirect('jadwal-dokter');
    }

    public function delete_antrian($id)
    {
        $antrian = Antrian::where('id', $id)->first();
        $antrian->delete();
        return redirect('antrian-dokter');
    }
}
