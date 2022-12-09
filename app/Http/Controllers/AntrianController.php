<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index () {

        $user = User::where('roles','=','petugas')->get();
        $jadwal = Dokter::get();
        
        return view('home',compact('user'),compact('jadwal'));
    }

    public function store(Request $request){
        $hasil = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns',
            'wa' => 'required',
            'user_id' => 'required'
        ]);

        Antrian::create($hasil);

        return redirect('/')->with('success', 'Antrian Berhasil Dibuat');
    }
}
