<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\Backend\LelangController;
use App\Http\Controllers\Backend\MasyarakatController;
use App\Http\Controllers\Backend\PenawaranController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//     return view('index');
// });
Route::get('/', [DashboardController::class, 'index'], function () {
    return view('welcome');
}); 
// Login
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login/masyarakat', [LoginController::class, 'MasyarakatLogin'])->name('masyarakat/login');
Route::post('processlogin', [LoginController::class, 'processLogin'])->name('processlogin');

Route::post('register', [LoginController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth:masyarakat', 'isActive']], function() {
    Route::get('tawar/{id}', [HomeController::class, 'tawar'])->name('tawar/{id}');
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::put('edit/akun/{id}', [HomeController::class, 'edit'])->name('edit.akun');
    Route::put('edit/password/{id}', [HomeController::class, 'editpass'])->name('edit.password');
    Route::get('barang/penawaran/{id}', [HomeController::class, 'penawaran'])->name('barang.penawaran');
    Route::get('penawaran', [HomeController::class, 'penawaran'])->name('penawaran');
    Route::get('data/lelang', [HomeController::class, 'datalelang'])->name('data.lelang');
    // Route::get('riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
    Route::get('detailriwayat', [HomeController::class, 'detail'])->name('detailriwayat');
    // Route::get('riwayatpemenang', [HomeController::class, 'pemenang'])->name('riwayatpemenang');
    Route::get('riwayatpemenang', [HomeController::class, 'pemenang'])->name('riwayatpemenang');
    Route::post('gotawar', [PenawaranController::class, 'gotawar'])->name('gotawar');
    // 
    Route::get('search', [HomeController::class, 'search'])->name('search.barang');
});

// 
Route::group(['middleware' => ['auth:web', 'checkLevel:admin,petugas', 'isActive']], function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::put('edit/akun/{id}', [DashboardController::class, 'editacc'])->name('edit.acc');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
// 
Route::group(['middleware' => ['auth:web', 'checkLevel:admin', 'isActive']], function() {
    Route::get('masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
    Route::get('/block/{id}', [MasyarakatController::class, 'nonaktif']);
    // 
    Route::resource('user', UserController::class);
    Route::get('change/password/{id}', [UserController::class, 'change'])->name('change.password.user');
    Route::put('change/password/{id}', [UserController::class, 'dochange'])->name('dochange.password.user');
    Route::get('/nonaktif/{id}', [UserController::class, 'nonaktif']);
    Route::get('/aktif/{id}', [UserController::class, 'aktif']);
});
// 
Route::group(['middleware' => ['auth:web', 'checkLevel:petugas', 'isActive']], function() {
    Route::resource('barang', BarangController::class);
    Route::delete('/delete/{id}', [BarangController::class, 'delete'])->name('gambar.delete');
    Route::get('/image/{id}', [BarangController::class, 'image'])->name('barang.image');
    Route::post('postimage/{id}', [BarangController::class, 'postimage'])->name('postimage');
    //  
    Route::resource('lelang', LelangController::class);
    Route::get('/open/{id}', [LelangController::class, 'open'])->name('open');
    Route::get('/cancel/{id}', [LelangController::class, 'cancel'])->name('cancel');
    Route::get('/closed/{id}', [LelangController::class, 'closed'])->name('closed');
    // 
    Route::resource('penawaran', PenawaranController::class);
    Route::get('pemenanglelang', [PenawaranController::class, 'pemenang'])->name('pemenanglelang');
    Route::get('riwayatpenawaran', [PenawaranController::class, 'riwayat'])->name('riwayatpenawaran');
    Route::get('/confirm/{id}', [PenawaranController::class, 'confirm'])->name('confirm');
});