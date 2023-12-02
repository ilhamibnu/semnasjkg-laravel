<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SemnasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataGroupController;
use App\Http\Controllers\DataJenisPesertaController;
use App\Http\Controllers\DataKampusController;
use App\Http\Controllers\DataLombaController;
use App\Http\Controllers\DataPresensiController;
use App\Http\Controllers\DataSemnasController;
use App\Http\Controllers\DataSertifikatController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DataDetailPresensiController;
use App\Http\Controllers\DataDetailLombaController;
use App\Http\Controllers\DataPendaftaranController;

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

Route::get('/', [IndexController::class, 'index']);

# Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/resetpassword', [AuthController::class, 'resetpassword']);

Route::get('/resetpassword/{code}', [AuthController::class, 'indexresetpassword']);

Route::post('/changepassword', [AuthController::class, 'changepassword']);

# Landing
Route::get('/seminar', [SemnasController::class, 'index'])->middleware('IsLogin', 'IsUser');
Route::post('/pendaftaran', [IndexController::class, 'pendafaran'])->middleware('IsLogin', 'IsUser');
Route::post('/presensi', [SemnasController::class, 'presensi'])->middleware('IsLogin', 'IsUser');
Route::post('/pengumpulan-lomba', [SemnasController::class, 'pengumpulanlomba'])->middleware('IsLogin', 'IsUser');
Route::post('/pengumpulan-ktm-lomba', [SemnasController::class, 'pengumpulanktmlomba'])->middleware('IsLogin', 'IsUser');
Route::post('/unduh-sertifikat-lomba', [SemnasController::class, 'unduhsertifikatlomba'])->middleware('IsLogin', 'IsUser');
Route::get('/lomba', [SemnasController::class, 'indexlomba'])->middleware('IsLogin', 'IsUser');
Route::post('/unduh-sertifikat', [SemnasController::class, 'unduhsertifikat'])->middleware('IsLogin', 'IsUser');
Route::delete('/hapus-seminar/{id}', [SemnasController::class, 'destroy'])->middleware('IsLogin', 'IsUser');
Route::get('/profil', [AuthController::class, 'indexprofil'])->middleware('IsLogin', 'IsUser');
Route::post('/updateprofil', [AuthController::class, 'updateprofil'])->middleware('IsLogin', 'IsUser');
Route::put('/bayar/{id}', [SemnasController::class, 'bayar'])->middleware('IsLogin', 'IsUser');



# Admin

# Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Group
Route::get('/group', [DataGroupController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/group', [DataGroupController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/group/{id}', [DataGroupController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/group/{id}', [DataGroupController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Jenis Peserta
Route::get('/jenispeserta', [DataJenisPesertaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/jenispeserta', [DataJenisPesertaController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/jenispeserta/{id}', [DataJenisPesertaController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/jenispeserta/{id}', [DataJenisPesertaController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Kampus
Route::get('/kampus', [DataKampusController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/kampus', [DataKampusController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/kampus/{id}', [DataKampusController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/kampus/{id}', [DataKampusController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Lomba
Route::get('/datalomba', [DataLombaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/datalomba', [DataLombaController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/datalomba/{id}', [DataLombaController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/datalomba/{id}', [DataLombaController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Presensi
Route::get('/presensi2', [DataPresensiController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/presensi2', [DataPresensiController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/presensi2/{id}', [DataPresensiController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/presensi2/{id}', [DataPresensiController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Semnas
Route::get('/semnas', [DataSemnasController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/semnas', [DataSemnasController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/semnas/{id}', [DataSemnasController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/semnas/{id}', [DataSemnasController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Seritifikat
Route::get('/sertifikat', [DataSertifikatController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/sertifikat', [DataSertifikatController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/sertifikat/{id}', [DataSertifikatController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/sertifikat/{id}', [DataSertifikatController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# User
Route::get('/usersby', [DataUserController::class, 'indexjkgsby'])->middleware('IsLogin', 'IsAdmin');
Route::get('/usernonsby', [DataUserController::class, 'indexjkgnonsby'])->middleware('IsLogin', 'IsAdmin');


# Detail Presensi
Route::get('/detailpresensisby', [DataDetailPresensiController::class, 'indexjkgsby'])->middleware('IsLogin', 'IsAdmin');
Route::get('/detailpresensinonsby', [DataDetailPresensiController::class, 'indexjkgnonsby'])->middleware('IsLogin', 'IsAdmin');

# Detail Lomba
Route::get('/detaillombasby', [DataDetailLombaController::class, 'indexsby'])->middleware('IsLogin', 'IsAdmin');
Route::get('/detaillombanonsby', [DataDetailLombaController::class, 'indexnonsby'])->middleware('IsLogin', 'IsAdmin');

# Detail Pendaftaran
Route::get('/detailpendaftaransby', [DataPendaftaranController::class, 'indexjkgsby'])->middleware('IsLogin', 'IsAdmin');
Route::get('/detailpendaftaranonsby', [DataPendaftaranController::class, 'indexjkgnonsby'])->middleware('IsLogin', 'IsAdmin');

# Pendaftaran User JKG
Route::post('/pendaftaranuserjkg', [DataPendaftaranController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/pendaftaranuserjkg/{id}', [DataPendaftaranController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/pendaftaranuserjkg/{id}', [DataPendaftaranController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');


# User JKG
Route::post('/userjkg', [DataUserController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/userjkg/{id}', [DataUserController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/userjkg/{id}', [DataUserController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

Route::post('/importexcel', [DataUserController::class, 'importexcel'])->middleware('IsLogin', 'IsAdmin');


# ADMIN LOGIN
Route::get('/adminlogin', [AuthController::class, 'indexadminlogin']);
Route::post('/adminlogin', [AuthController::class, 'loginadmin']);
Route::get('/adminlogout', [AuthController::class, 'logoutadmin']);
