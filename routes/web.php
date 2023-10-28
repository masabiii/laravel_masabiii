<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataRumahSakitController;
use App\Http\Controllers\DataPasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dataRumahSakit', [DataRumahSakitController::class, 'index'])->name('dataRumahSakit');
Route::get('/tambahRumahSakit', [DataRumahSakitController::class, 'tambahRumahSakit'])->name('tambahRumahSakit');
Route::post('/simpanRumahSakit', [DataRumahSakitController::class, 'simpanRumahSakit'])->name('simpanRumahSakit');
Route::get('/editRumahSakit/{id}', [DataRumahSakitController::class, 'editRumahSakit'])->name('editRumahSakit');
Route::post('/updateRumahSakit/{id}', [DataRumahSakitController::class, 'updateRumahSakit'])->name('updateRumahSakit');
Route::get('/hapusRumahSakit/{id}', [DataRumahSakitController::class, 'hapusRumahSakit'])->name('hapusRumahSakit');


Route::get('/api/rumahsakit/', [DataPasienController::class, 'apiRumahSakit']);
Route::get('/dataPasien', [DataPasienController::class, 'index'])->name('dataPasien');
Route::get('/tambahPasien', [DataPasienController::class, 'tambahPasien'])->name('tambahPasien');
Route::post('/simpanPasien', [DataPasienController::class, 'simpanPasien'])->name('simpanPasien');
Route::get('/editPasien/{id}', [DataPasienController::class, 'editPasien'])->name('editPasien');
Route::post('/updatePasien/{id}', [DataPasienController::class, 'updatePasien'])->name('updatePasien');
Route::get('/hapusPasien/{id}', [DataPasienController::class, 'hapusPasien'])->name('hapusPasien');