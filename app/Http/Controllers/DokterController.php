<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function dashboard()
    {
        $dokter = Dokter::get();
        return view('petugas.dashboard',compact('dokter'));
    }

    public function store(Request $request)
    {
        $dokter = new Dokter();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;
        $dokter->dokter_id = Auth::user()->id;
        // dd($input);
        $dokter->save();

        return redirect('jadwal-dokter');
    }

    public function jadwalDoter()
    {
        $dokter = Dokter::get();
        return view('petugas.jadwalDokter.index',compact('dokter'));
    }

    public function edit($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        return view('petugas.jadwalDokter.jadwal-edit',compact('dokter'));
    }

}
