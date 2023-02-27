<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DataPdfController extends Controller
{
    // untuk admin
    public function pdf_history_antrian()
    {
        $tanggapan = Tanggapan::orderBy('tgl_periksa', 'asc')->get();

        $pdf = PDF::loadView('admin.pdf.history-antrian-pdf', compact('tanggapan'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->render();
        $waktu = date("d-F-Y");
        return $pdf->stream("data_history_antrian_{$waktu} .pdf");
    }

    public function pdf_jadwal_dokter()
    {
        $dokter = Dokter::get();
        $user = User::where('roles', '=', 'petugas')->get();

        $pdf = PDF::loadView('admin.pdf.jadwal-dokter-pdf', compact('user','dokter'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->render();
        $waktu = date("d-F-Y");
        return $pdf->stream("data_jadwal_dokter_{$waktu} .pdf");
    }

    public function pdf_dokter()
    {
        $user = User::where('roles', '=', 'petugas')->get();

        $pdf = PDF::loadView('admin.pdf.dokter-pdf', compact('user'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->render();
        $waktu = date("d-F-Y");
        return $pdf->stream("data_dokter_{$waktu} .pdf");
    }

    // untuk petugas
    public function petugas_pdf_jadwal_dokter()
    {
        $dokter = Dokter::get();
        $user = User::where('roles', '=', 'petugas')->get();

        $pdf = PDF::loadView('petugas.pdf.jadwal-dokter-pdf', compact('user','dokter'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->render();
        $waktu = date("d-F-Y");
        return $pdf->stream("data_jadwal_dokter_{$waktu} .pdf");
    }


    public function petugas_pdf_history_antrian()
    {
        $tanggapan = Tanggapan::orderBy('tgl_periksa', 'asc')->get();

        $pdf = PDF::loadView('petugas.pdf.history-antrian-pdf', compact('tanggapan'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->render();
        $waktu = date("d-F-Y");
        return $pdf->stream("data_history_antrian_{$waktu} .pdf");
    }
}
