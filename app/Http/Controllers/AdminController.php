<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Antrian;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('petugas.index',compact('user'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
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
            $input->gambar = $request->file('gambar')->store('images');
        }

        $input->save();

        Alert::success('Berhasil', 'Petugas Berhasil Dibuat');

        return redirect('petugas');
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('petugas.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();

        $user->nama = $request->nama;
        $user->spesialis = $request->spesialis;
        $user->nomor_hp = $request->nomor_hp;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->roles = 'petugas';

        $input = $user;

        if ($request->file('gambar')) {
            if ($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $input->gambar = $request->file('gambar')->store('images');
        }

        $input->update();

        Alert::success('Berhasil', 'Petugas Berhasil Diedit');

        return redirect('petugas');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $dokter = Dokter::where('user_id', $user->id)->get();
        $antrian = Antrian::where('user_id',$user->id)->get();


        if ($user->gambar){
            Storage::delete($user->gambar);
        }
        Dokter::destroy($dokter);
        Antrian::destroy($antrian);
        $user->delete();

        Alert::success('Berhasil', 'Petugas Berhasil Dihapus');
        return redirect('petugas');
    }

    public function dashboard()
    {
        $user = User::get();
        $dokter = Dokter::get();
        $antrian = Antrian::get();
        return view('admin.dashboard',compact('user','dokter','antrian'));
    }
}
