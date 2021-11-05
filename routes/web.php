<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanBiayatController;
use App\Http\Controllers\Admin\LaporanOmsetController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PencatatanController;
use App\Http\Controllers\Admin\PencatatanKeluarCOntroller;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\TokoController;
use App\Http\Controllers\Admin\UserTokoController;
use Illuminate\Support\Facades\Log;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('belumlogin');
Route::post('/Login', [LoginController::class, 'prosesLogin'])->name('proses.login');


Route::group(['middleware' => 'sudahlogin'], function(){

    // Home
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/tampil_data_das/{dari}/{sampai}', [LoginController::class, 'isidatatabel']);
    
    // Toko
    Route::get('/data_toko', [TokoController::class, 'index'])->name('data_toko');
    Route::get('/tambah/data_toko', [TokoController::class, 'tambah'])->name('tambah.data_toko');
    Route::post('/simpan/data_toko', [TokoController::class, 'simpan'])->name('simpan.data_toko');
    Route::delete('/hapus/data_toko/{data_toko}',[TokoController::class, 'destroy'])->name('hapus.data_toko');
    Route::get('/edit/data_toko/{data_toko}',[TokoController::class, 'edit'])->name('edit.data_toko');
    Route::put('/update/data_toko/{data_toko}',[TokoController::class, 'update'])->name('update.data_toko');

    //User
    Route::get('/data_user', [RegisterController::class, 'index'])->name('data_user');
    Route::get('/tambah/data_user', [RegisterController::class, 'tambah'])->name('tambah.data_user');
    Route::post('/simpan/data_user', [RegisterController::class, 'simpan'])->name(('simpan.data_user'));
    Route::get('/edit/data_user/{data_user}',[RegisterController::class, 'edit'])->name('edit.data_user');
    Route::put('/update/data_user/{data_user}', [RegisterController::class, 'update'])->name('update.data_user');
    Route::delete('/hapus/data_user/{data_user}',[RegisterController::class, 'destroy'])->name('hapus.data_user');

    //User Toko
    Route::get('/data_user_toko', [UserTokoController::class, 'index'])->name('data_user_toko');
    Route::get('/tambah/data_user_toko', [UserTokoController::class, 'tambah'])->name('tambah.data_user_toko');
    Route::post('/simpan/data_user_toko', [UserTokoController::class, 'simpan'])->name(('simpan.data_user_toko'));
    Route::get('/edit/data_user_toko/{data_user_toko}',[UserTokoController::class, 'edit'])->name('edit.data_user_toko');
    Route::put('/update/data_user_toko/{data_user_toko}', [UserTokoController::class, 'update'])->name('update.data_user_toko');
    Route::delete('/hapus/data_user_toko/{data_user_toko}',[UserTokoController::class, 'destroy'])->name('hapus.data_user_toko');

    //Profile
    Route::get('/profile', [RegisterController::class, 'profile'])->name('profile');

    //Pencatatan Penjualan
    Route::get('/catat_data_omset', [PencatatanController::class, 'index'])->name('catat_data_omset');
    Route::get('/tambah/catat_data_omset', [PencatatanController::class, 'tambah'])->name('tambah.catat_data_omset');
    Route::post('/simpan/catat_data_omset',[PencatatanController::class, 'simpan'])->name('simpan.catat_data_omset');
    Route::get('/edit/catat_data_omset/{data_toko}', [PencatatanController::class, 'edit'])->name('edit.catat_data_omset');
    Route::put('/update/catat_data_omset/{data_toko}', [PencatatanController::class, 'update'])->name('update.catat_data_omset');
    Route::delete('/delete/catat_data_omset/{data_toko}', [PencatatanController::class, 'destroy'])->name('delete.catat_data_omset');

    //Pencatatan Pengeluaran
    Route::get('/catat_biaya_pengeluaran', [PencatatanKeluarController::class, 'index'])->name('catat_biaya_pengeluaran');
    Route::get('/tambah/catat_biaya_pengeluaran', [PencatatanKeluarController::class, 'index'])->name('tambah.catat_biaya_pengeluaran');
    Route::post('/simpan/catat_biaya_pengeluaran', [PencatatanKeluarController::class, 'simpan'])->name('simpan.catat_biaya_pengeluaran');
    Route::get('/edit/catat_biaya_pengeluaran/{data_toko}', [PencatatanKeluarController::class, 'edit'])->name('edit.catat_biaya_pengeluaran');
    Route::put('/update/catat_biaya_pengeluaran/{data_toko}', [PencatatanKeluarController::class, 'update'])->name('update.catat_biaya_pengeluaran');
    Route::delete('/delete/catat_biaya_pengeluaran/{data_toko}', [PencatatanKeluarController::class, 'destroy'])->name('delete.catat_biaya_pengeluaran');


    //Laporan Omset Masuk
    Route::get('/laporan_data_omset', [LaporanOmsetController::class, 'index'])->name('laporan_data_omset');
    Route::get('/laporan_data_omset/{cabang}/{dari}/{sampai}', [LaporanOmsetController::class, 'isidatatabel'])->name('laporan_data_parameter');
    Route::get('/tampil_cetak_pdf/{cabang}/{dari}/{sampai}', [LaporanOmsetController::class, 'tampilCetak']);;

    //Laporan Biaya Keluar
    Route::get('/laporan_biaya_keluar', [LaporanBiayatController::class, 'index'])->name('laporan_biaya_keluar');
    Route::get('/laporan_biaya_keluar/{cabang}/{dari}/{sampai}', [LaporanBiayatController::class, 'isidatatabel']);
    Route::get('/tampil_cetakbiaya_pdf/{cabang}/{dari}/{sampai}', [LaporanBiayatController::class, 'tampilCetak']);;
});

