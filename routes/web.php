<?php

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\TanggapanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

Route::get('/', [AntrianController::class, 'index']);
Route::post('/', [AntrianController::class, 'store']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login_action']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('/jadwal', function (Request $request) {
    $tanggal = $request->input('tanggal');
    $jam = $request->input('jam');

    $jadwals = Dokter::where('tanggal', '=', $tanggal)
      ->where('jam', '=', $jam)
      ->get();

    return response()->json($jadwals);
  });



Route::group(['middleware' => ['auth', 'OnlyAdmin']], function () {

    Route::get('dashboard-admin',[AdminController::class,'dashboard']);

    Route::get('petugas', [AdminController::class, 'index']);
    Route::get('petugas-create', [AdminController::class, 'create']);
    Route::post('petugas-create', [AdminController::class, 'store']);
    Route::get('petugas-edit/{id}', [AdminController::class, 'edit']);
    Route::post('petugas-update/{id}', [AdminController::class, 'update']);
    Route::get('petugas-delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin-jadwal-dokter', [DokterController::class, 'adminJadwalDokter']);
    Route::post('create-jadwal-dokterAdmin',[DokterController::class,'storeAdmin']);
    Route::get('edit-jadwal-dokterAdmin/{id}',[DokterController::class,'editAdmin']);
    Route::post('edit-jadwal-dokterAdmin/{id}',[DokterController::class,'updateAdmin']);
    Route::get('delete-jadwal-dokterAdmin/{id}',[DokterController::class,'deleteAdmin']);
    Route::get('admin-antrian-pasien', [DokterController::class, 'adminAntrianlPasien']);
    Route::get('admin-validasi-pasien/{id}',[DokterController::class,'validasiAntrianPasienAdmin']);
    Route::get('/whatsapp-admin/{id}', [WhatsappController::class, 'index']);
    Route::get('delete-antrian-admin/{id}',[DokterController::class,'delete_antrianAdmin']);
    Route::get('admin-history-antrian',[WhatsappController::class,'history_antrian']);
    Route::post('buat-tanggapan-admin',[TanggapanController::class,'index']);

});

Route::group(['middleware' => ['auth', 'OnlyPetugas']], function () {
    Route::get('dashboard-petugas',[DokterController::class,'dashboard']);

    // jadwal
    Route::get('jadwal-dokter',[DokterController::class,'jadwalDoter']);
    Route::post('create-jadwal-dokter',[DokterController::class,'store']);
    Route::get('edit-jadwal-dokter/{id}',[DokterController::class,'edit']);
    Route::post('edit-jadwal-dokter/{id}',[DokterController::class,'update']);
    Route::get('delete-jadwal-dokter/{id}',[DokterController::class,'delete']);

    // atrian
    Route::get('antrian-dokter',[DokterController::class,'antrianDoter']);
    route::get('validasi-pasien/{id}',[DokterController::class,'validasiAntrianPasien']);
    Route::get('/whatsapp/{id}', [WhatsappController::class, 'index']);
    Route::get('delete-antrian/{id}',[DokterController::class,'delete_antrian']);
    Route::get('history-antrian',[WhatsappController::class,'history_antrian']);
    Route::post('buat-tanggapan',[TanggapanController::class,'index']);
});
