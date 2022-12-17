<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function adminJadwalDokter()
    {
        $dokter = Dokter::get();
        $user = User::where('roles','=','petugas')->get();

        return view('admin.jadwalpetugas', compact('dokter','user'));
    }

    public function adminAntrianlPasien()
    {
        $antrian = Antrian::get();
        $user = Auth::user();

        return view('admin.antrianpasien',compact('antrian'),compact('user'));
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

        Alert::success('Berhasil', 'Jadwal Berhasil Dibuat');

        return redirect('jadwal-dokter');
    }

    public function storeAdmin(Request $request)
    {
        $dokter = new Dokter();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;
        $dokter->user_id = $request->user_id;

        $dokter->save();

        $dokter->nama = $dokter->user->nama;
        $dokter->update();

        Alert::success('Berhasil', 'Jadwal Berhasil Dibuat');

        return redirect('admin-jadwal-dokter');
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

    public function editAdmin($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        return view('admin.jadwaleditadmin', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::where('id', $id)->first();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;

        $dokter->update();

        Alert::success('Berhasil', 'Jadwal Berhasil DiUpdate');
        return redirect('jadwal-dokter');
    }

    public function updateAdmin(Request $request, $id)
    {
        $dokter = Dokter::where('id', $id)->first();

        $dokter->tanggal = $request->tanggal;
        $dokter->jam = $request->jam;

        $dokter->update();
        Alert::success('Berhasil', 'Jadwal Berhasil DiUpdate');

        return redirect('admin-jadwal-dokter');
    }

    public function delete($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        $dokter->delete();

        Alert::success('Berhasil', 'Jadwal Berhasil Dihapus');
        return redirect('jadwal-dokter');
    }

    public function deleteAdmin($id)
    {
        $dokter = Dokter::where('id', $id)->first();
        $dokter->delete();

        Alert::success('Berhasil', 'Jadwal Berhasil Dihapus');
        return redirect('admin-jadwal-dokter');
    }

    public function delete_antrian($id)
    {
        $antrian = Antrian::where('id', $id)->first();
        $antrian->delete();
        return redirect('antrian-dokter');
    }

    public function delete_antrianAdmin($id)
    {
        $antrian = Antrian::where('id',$id)->first();
        $antrian->delete();
        return redirect('admin-antrian-pasien');
    }

    public function validasiAntrianPasien($id)
    {
        $antrian = Antrian::where('id',$id)->first();
        return view('petugas.antrian.validasiantrian',compact('antrian'));
    }

    public function validasiAntrianPasienAdmin($id)
    {
        $antrian = Antrian::where('id',$id)->first();
        return view('admin.validasiantrian',compact('antrian'));
    }

}
