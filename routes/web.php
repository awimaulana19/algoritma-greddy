<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;

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

Route::get('/', [AntrianController::class,'index']);
Route::post('/', [AntrianController::class,'store']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'login_action']);


Route::get('petugas',[PetugasController::class,'index']);
Route::get('petugas-create',[PetugasController::class,'create']);
Route::post('petugas-create',[PetugasController::class,'store']);
Route::get('petugas-edit/{id}',[PetugasController::class,'edit']);
Route::post('petugas-update/{id}',[PetugasController::class,'update']);
Route::get('petugas-delete/{id}',[PetugasController::class,'delete']);
