<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
return view('welcome');
});
 */

Route::get('/welcome', function () {
    return '<h1>Semangat Belajar Laravel Framework</h1>';
});

Route::get('/salam', function () {
    return view('halaman_salam');
});

Route::get('/barang/{nama}/{jenis}', function ($nama, $jenis) {
    return '<ul>
                <li>Nama Barang: ' . $nama . '</li>
                <li>Jenis Barang: ' . $jenis . '</li>
            </ul>';
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'dataMahasiswa']);
Route::get('/nilaimahasiswa', [MahasiswaController::class, 'nilaiMahasiswa']);

//---------------routing landing page--------------
Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home1', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/contact', function () {
    return view('landingpage.kontak');
});

Route::get('/login', function () {
    return view('landingpage.login_form');
});

//---------------routing admin page--------------
Route::get('/administrator', function () {
    return view('admin.home');
});

Route::resource('gaji', GajiController::class)->middleware('peran:manager');

Route::middleware(['peran:manager-staff'])->group(function () {
    Route::resource('staff', StaffController::class);
    Route::resource('divisi', DivisiController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('pegawai', PegawaiController::class);
    //Route::delete('pegawai/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');
    Route::get('generate-pdf', [PegawaiController::class, 'generatePDF']);
    Route::get('pegawai-pdf', [PegawaiController::class, 'pegawaiPDF']);
    Route::get('pegawai-excel', [PegawaiController::class, 'pegawaiExcel']);
});
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/after_register', function () {
    return view('landingpage.afterRegister');
});

Route::get('/access_denied', function () {
    return view('admin.access_denied');
});

Route::get('/kelola_user', function () {
    return view('admin.home')->middleware('auth');
});

//  belajar api

Route::get('/api-pegawai', [PegawaiController::class, 'apiPegawai']);
Route::get('/api-pegawai/{id}', [PegawaiController::class, 'apiPegawaiDetail']);
