<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
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
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->roles = 'petugas';

        $user->save();

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
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->roles = 'petugas';

        $user->update();

        return redirect('petugas');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('petugas');
    }
}
