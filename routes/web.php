<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Models\ObatModel;
use App\Http\Controllers\KategoriController;
use App\Models\KategoriModel;
use App\Http\Controllers\UnitController;
use App\Models\UnitModel;
use App\Http\Controllers\PenyimpananController;
use App\Models\PenyimpananModel;
use App\Http\Controllers\PemasokController;
use App\Models\PemasokModel;
use App\Http\Controllers\PenjualanController;
use App\Models\PenjualanModel;
use App\Http\Controllers\PembelianController;
use App\Models\PembelianModel;
use App\Http\Controllers\GuestController;
use App\Models\GuestModel;
use App\Http\Controllers\LaporanController;
use App\Models\LaporanModel;


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
//Home
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class,'index']);
Route::get('/kelompok',[HomeController::class,'kelompok']);

//Obat
//View Obat
Route::get('/obat',[ObatController::class,'index'])->name('obat');
//Detail Obat
Route::get('/obat/detail/{id_obat}',[ObatController::class,'detail']);
//Add Obat
Route::get('/obat/add',[ObatController::class,'add']);
Route::post('/obat/insert',[ObatController::class,'insert']);
//Edit Obat
Route::get('/obat/edit/{id_obat}',[ObatController::class,'edit']);
Route::post('/obat/update/{id_obat}',[ObatController::class,'update']);
//Jual Obat
Route::get('/obat/jual/{id_obat}',[ObatController::class,'jual']);
//Jual Obat Online
Route::get('/obat/jual_online/{id_obat}',[ObatController::class,'jual_online']);
//Beli Obat
Route::get('/obat/beli/{id_obat}',[ObatController::class,'beli']);
//Hapus Obat
Route::get('/obat/delete/{id_obat}',[ObatController::class,'delete']);
//Print Obat
Route::get('/obat/print',[ObatController::class,'print']);

//Kategori
//View Kategori
Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
//Detail Kategori
Route::get('/kategori/detail/{id_kategori}',[KategoriController::class,'detail']);
//Add Kategori
Route::get('/kategori/add',[KategoriController::class,'add']);
Route::post('/kategori/insert',[KategoriController::class,'insert']);
//Edit Kategori
Route::get('/kategori/edit/{id_kategori}',[KategoriController::class,'edit']);
Route::post('/kategori/update/{id_kategori}',[KategoriController::class,'update']);
//Hapus Kategori
Route::get('/kategori/delete/{id_kategori}',[KategoriController::class,'delete']);
//Print Kategori
Route::get('/kategori/print',[KategoriController::class,'print']);

//Unit
//View Unit
Route::get('/unit',[UnitController::class,'index'])->name('unit');
//Detail Unit
Route::get('/unit/detail/{id_unit}',[UnitController::class,'detail']);
//Add Unit
Route::get('/unit/add',[UnitController::class,'add']);
Route::post('/unit/insert',[UnitController::class,'insert']);
//Edit Unit
Route::get('/unit/edit/{id_unit}',[UnitController::class,'edit']);
Route::post('/unit/update/{id_unit}',[UnitController::class,'update']);
//Hapus Unit
Route::get('/unit/delete/{id_unit}',[UnitController::class,'delete']);
//Print Unit
Route::get('/unit/print',[UnitController::class,'print']);

//penyimpanan
//View penyimpanan
Route::get('/penyimpanan',[PenyimpananController::class,'index'])->name('penyimpanan');
//Detail penyimpanan
Route::get('/penyimpanan/detail/{id_penyimpanan}',[PenyimpananController::class,'detail']);
//Add penyimpanan
Route::get('/penyimpanan/add',[PenyimpananController::class,'add']);
Route::post('/penyimpanan/insert',[PenyimpananController::class,'insert']);
//Edit penyimpanan
Route::get('/penyimpanan/edit/{id_penyimpanan}',[PenyimpananController::class,'edit']);
Route::post('/penyimpanan/update/{id_penyimpanan}',[PenyimpananController::class,'update']);
//Hapus penyimpanan
Route::get('/penyimpanan/delete/{id_penyimpanan}',[PenyimpananController::class,'delete']);
//Print penyimpanan
Route::get('/penyimpanan/print',[PenyimpananController::class,'print']);

//Pemasok
//View Pemasok
Route::get('/pemasok',[PemasokController::class,'index'])->name('pemasok');
//Detail Pemasok
Route::get('/pemasok/detail/{id_pemasok}',[PemasokController::class,'detail']);
//Add Pemasok
Route::get('/pemasok/add',[PemasokController::class,'add']);
Route::post('/pemasok/insert',[PemasokController::class,'insert']);
//Edit Pemasok
Route::get('/pemasok/edit/{id_pemasok}',[PemasokController::class,'edit']);
Route::post('/pemasok/update/{id_pemasok}',[PemasokController::class,'update']);
//Hapus Pemasok
Route::get('/pemasok/delete/{id_pemasok}',[PemasokController::class,'delete']);
//Print Pemasok
Route::get('/pemasok/print',[PemasokController::class,'print']);

//Penjualan
//View Penjualan
Route::get('/penjualan',[PenjualanController::class,'index'])->name('penjualan');
//Detail Penjualan
Route::get('/penjualan/detail/{id_penjualan}',[PenjualanController::class,'detail']);
//Add Penjualan
Route::get('/penjualan/add',[PenjualanController::class,'add']);
Route::post('/penjualan/insert',[PenjualanController::class,'insert']);
//Add Penjualan Online
Route::post('/penjualan/insert_online',[PenjualanController::class,'insert_online']);
//Edit Penjualan
Route::get('/penjualan/edit/{id_penjualan}',[PenjualanController::class,'edit']);
Route::post('/penjualan/update/{id_penjualan}',[PenjualanController::class,'update']);
//Hapus Penjualan
Route::get('/penjualan/delete/{id_penjualan}',[PenjualanController::class,'delete']);
//Hapus Penjualan Online
Route::get('/penjualan/delete_online/{id_penjualan}',[PenjualanController::class,'delete_online']);
//Print Penjualan
Route::get('/penjualan/print',[PenjualanController::class,'print']);
//Print Penjualan Online
Route::get('/penjualan/print_online',[PenjualanController::class,'print_online']);
//Invoice Penjualan
Route::get('/penjualan/invoice/{id_penjualan}',[PenjualanController::class,'invoice']);
//Verifikasi Penjualan
Route::get('/penjualan/verifikasi',[PenjualanController::class,'verifikasi'])->name('verifikasi');
Route::post('/penjualan/verifikasi_pembayaran/{id_penjualan}',[PenjualanController::class,'verifikasi_pembayaran']);

//Pembelian
//View Pembelian
Route::get('/pembelian',[PembelianController::class,'index'])->name('pembelian');
//Detail Pembelian
Route::get('/pembelian/detail/{id_pembelian}',[PembelianController::class,'detail']);
//Add Pembelian
Route::get('/pembelian/add',[PembelianController::class,'add']);
Route::post('/pembelian/insert',[PembelianController::class,'insert']);
//Edit Pembelian
Route::get('/pembelian/edit/{id_pembelian}',[PembelianController::class,'edit']);
Route::post('/pembelian/update/{id_pembelian}',[PembelianController::class,'update']);
//Hapus Pembelian
Route::get('/pembelian/delete/{id_pembelian}',[PembelianController::class,'delete']);
//Print Pembelian
Route::get('/pembelian/print',[PembelianController::class,'print']);
//Print Pembelian
Route::get('/pembelian/printpertgl',[PembelianController::class,'printpertgl']);
Route::get('/pembelian/invoice/{id_pembelian}',[PembelianController::class,'invoice']);

//Guest
//View Guest
Route::get('/guest/{id_guest}',[GuestController::class,'index'])->name('guest');
//Invoice Guest
Route::get('/guest/invoice/{id_penjualan}',[GuestController::class,'invoice']);

//Laporan
Route::get('/laporan',[LaporanController::class,'index'])->name('laporan');
//Laporan Obat
Route::get('/laporan/obat',[LaporanController::class,'laporan_obat']);
Route::get('/laporan/print_obat/{tgl_awal_obat}/{tgl_akhir_obat}',[LaporanController::class,'print_laporan_obat']);
//Laporan Penjualan
Route::get('/laporan/penjualan',[LaporanController::class,'laporan_penjualan']);
Route::get('/laporan/print_penjualan/{tgl_awal_penjualan}/{tgl_akhir_penjualan}',[LaporanController::class,'print_laporan_penjualan']);
//Laporan Penjualan Online
Route::get('/laporan/penjualan_online',[LaporanController::class,'laporan_penjualan_online']);
Route::get('/laporan/print_penjualan_online/{tgl_awal_penjualan}/{tgl_akhir_penjualan}',[LaporanController::class,'print_laporan_penjualan_online']);
//Laporan Pembelian
Route::get('/laporan/pembelian',[LaporanController::class,'laporan_pembelian']);
Route::get('/laporan/print_pembelian/{tgl_awal_pembelian}/{tgl_akhir_pembelian}',[LaporanController::class,'print_laporan_pembelian']);

//Contoh Hak Akses Admin
//Route::group(['middleware' => 'admin'],function () { //admin adalah middleware
//});
