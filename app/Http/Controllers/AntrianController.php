<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index () {
        return view('home');
    }

    public function store(Request $request){
        $hasil = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns',
            'wa' => 'required',
            'dokter' => 'required'
        ]);

        Antrian::create($hasil);

        return redirect('/')->with('success', 'Antrian Berhasil Dibuat');
    }
}
