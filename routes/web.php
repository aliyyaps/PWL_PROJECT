<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Sewa2Controller;
use App\Http\Controllers\PengembalianController;



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

Route::get('/login', [LoginController::class, 'index']);

Route::post('/LoginPost', [LoginController::class, 'login']);

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/RegisterPost', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::resource('admin', AdminController::class);
        Route::resource('label', LabelController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('inventaris', InventarisController::class);
        Route::resource('role', RoleController::class);
        Route::get('/barangkeluar', [InventarisController::class,'index2'])->name('inventaris.index2');
        Route::get('/inputbarangkeluar/{id}/{labelid}', [InventarisController::class,'create2'])->name('inventaris.create2');
        Route::get('/inputbarangmasuk/{id}/{labelid}', [InventarisController::class,'create']);
        Route::get('/gantirole', [AdminController::class,'gantirole'])->name('admin.gantirole');
        Route::get('/pemesananmasuk', [TransaksiController::class,'pesanan'])->name('transaksi.pesanan');
        Route::get('/perubahan/{id}', [TransaksiController::class,'update2'])->name('transaksi.update2');
        Route::post('/updaterole/{id}', [AdminController::class,'updaterole'])->name('admin.updaterole');
        Route::get('/editrole/{id}', [AdminController::class,'editrole'])->name('admin.editrole');
        Route::post('/barangkeluarstore', [InventarisController::class,'store2'])->name('inventaris.store2');
        Route::get('/cetakbarangmasuk', [InventarisController::class,'cetakmasuk'])->name('inventaris.cetakmasuk');
        Route::get('/cetakbarangkeluar', [InventarisController::class,'cetakkeluar'])->name('inventaris.cetakkeluar');
        Route::get('/pengembalian2', [AdminController::class, 'pengembalian']);
        Route::get('editdb/{id}/{sewaid}', [AdminController::class, 'ganti'])->name('admin.ganti');
        Route::resource('sewa2', Sewa2Controller::class);
        Route::get('/cetakpengembalian', [AdminController::class, 'cetakpengembalian']);
    });

    Route::middleware(['pengguna'])->group(function () {
        Route::resource('pengguna', PenggunaController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('/pemesanan', [TransaksiController::class,'pesanan2'])->name('transaksi.pesanan2');
        Route::resource('sewa', SewaController::class);
        Route::resource('pengembalian', PengembalianController::class);
        Route::get('/sewa/pay/{id}', [SewaController::class, 'payment'])->name('sewa.payment');
        Route::put('/sewa/pay/{id}', [SewaController::class, 'pay'])->name('sewa.pay');
    });

    Route::get('cetak', CetakController::class)->name('cetak');


    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
});