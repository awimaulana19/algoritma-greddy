<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AntrianController::class, 'index']);
Route::post('/', [AntrianController::class, 'store']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login_action']);
Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['auth', 'OnlyAdmin']], function () {

    Route::get('dashboard-admin',[AdminController::class,'dashboard']);

    Route::get('petugas', [AdminController::class, 'index']);
    Route::get('petugas-create', [AdminController::class, 'create']);
    Route::post('petugas-create', [AdminController::class, 'store']);
    Route::get('petugas-edit/{id}', [AdminController::class, 'edit']);
    Route::post('petugas-update/{id}', [AdminController::class, 'update']);
    Route::get('petugas-delete/{id}', [AdminController::class, 'delete']);
});

Route::group(['middleware' => ['auth', 'OnlyPetugas']], function () {
    Route::get('dashboard-petugas',[DokterController::class,'dashboard']);

    Route::get('jadwal-dokter',[DokterController::class,'jadwalDoter']);
    Route::post('create-jadwal-dokter',[DokterController::class,'store']);
    Route::get('edit-jadwal-dokter/{id}',[DokterController::class,'edit']);
});
