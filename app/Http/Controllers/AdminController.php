<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Antrian;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('petugas.index', compact('user'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(AdminRequest $request)
    {
        $user = new User();

        $user->nama = $request->nama;
        $user->spesialis = $request->spesialis;
        $user->nomor_hp = $request->nomor_hp;
        $user->username = $request->username;
        $user->gambar = $request->gambar;
        $user->password = Hash::make($request->password);
        $user->roles = 'petugas';

        $input = $user;

        if ($request->file('gambar')) {
            $input->gambar = $request->file('gambar')->store('');
        }

        $input->save();

        Alert::success('Berhasil', 'Petugas Berhasil Dibuat');

        return redirect('petugas');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('petugas.edit', compact('user'));
    }

    public function update(AdminUpdateRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->nama = $request->nama;
        $user->spesialis = $request->spesialis;
        $user->nomor_hp = $request->nomor_hp;
        $user->username = $request->username;
        $user->gambar = $request->gambar;
        $user->roles = 'petugas';

        $input = $user;

        if ($request->file('gambar')) {
            if ($request->gambarLama) {
                File::delete('images/'. $request->gambarLama);
            }
        }

        if ($request->file('gambar')) {
            $input->gambar = $request->file('gambar')->store('');
        }

        $input->update();

        Alert::success('Berhasil', 'Petugas Berhasil Diedit');

        return redirect('petugas');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $dokter = Dokter::where('user_id', $user->id)->get();
        $antrian = Antrian::where('user_id', $user->id)->get();
        $tanggapan = Tanggapan::where('user_id', $user->id)->get();


        if ($user->gambar) {
            File::delete('images/'. $user->gambar);
        }
        Dokter::destroy($dokter);
        Antrian::destroy($antrian);
        Tanggapan::destroy($tanggapan);
        $user->delete();

        Alert::success('Berhasil', 'Petugas Berhasil Dihapus');
        return redirect('petugas');
    }

    public function dashboard()
    {
        $user = User::get();
        $dokter = Dokter::get();
        $antrian = Antrian::get();
        return view('admin.dashboard', compact('user', 'dokter', 'antrian'));
    }
}
