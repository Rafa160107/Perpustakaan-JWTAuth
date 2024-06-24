<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\transaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getSiswa',[siswaController::class,'getSiswa']);
Route::post('/addSiswa',[siswaController::class,'addSiswa']);
Route::put('/updateSiswa/{id}',[siswaController::class,'updateSiswa']);
Route::delete('/deleteSiswa/{id}',[siswaController::class,'deleteSiswa']);
Route::get('/getSiswaId/{id}',[siswaController::class,'getSiswaId']);

Route::get('/getKelas',[kelasController::class,'getKelas']);
Route::post('/addKelas',[kelasController::class,'addKelas']);
Route::put('/updateKelas/{id}',[kelasController::class,'updateKelas']);
Route::delete('/deleteKelas/{id}',[kelasController::class,'deleteKelas']);
Route::get('/getKelasId/{id}',[kelasController::class,'getKelasId']);

Route::get('/getBuku',[bukuController::class,'getBuku']);
Route::post('/addBuku',[bukuController::class,'addBuku']);
Route::put('/updateBuku/{id}',[bukuController::class,'updateBuku']);
Route::delete('/deleteBuku/{id}',[bukuController::class,'deleteBuku']);
Route::get('/getBukuId/{id}',[bukuController::class,'getBukuId']);

Route::post('/pinjamBuku', [transaksiController::class, 'pinjamBuku']);
Route::post('/tambahItem/{id}', [transaksiController::class,'tambahItem']);
Route::post('/mengembalikanBuku', [transaksiController::class,'mengembalikanBuku']);



Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});