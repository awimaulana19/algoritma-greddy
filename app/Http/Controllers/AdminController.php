<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'storage/images/';
            $profileImage = $user->nama."-".time() . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        $input->save();

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
        $user->gambar = $request->gambar;
        $user->password = Hash::make($request->password);
        $user->roles = 'petugas';

        $input = $user;

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'storage/images/';
            $profileImage = $user->nama."-".time() . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        $input->update();

        return redirect('petugas');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('petugas');
    }

    public function dashboard()
    {
        $user = User::get();
        $dokter = Dokter::get();
        return view('admin.dashboard',compact('user','dokter'));
    }
}
