<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success('Berhasil', 'Antrian Berhasil Dibuat');

        return redirect('/');
    }
}
