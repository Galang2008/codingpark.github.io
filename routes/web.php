<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\ActivityLogController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\AdminDashboardController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\AreaParkirController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\Auth\LoginController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\KendaraanController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\OwnerDashboardController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\ProfileController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\TarifController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\TransactionController;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Route;

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
Route::get('/', function () {
    // Mengembalikan nilai atau hasil dari fungsi ini.
    return view('welcome');
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
});

// Memanggil metode atau mengakses properti objek yang dibutuhkan.
Route::get('/login', [LoginController::class, 'create'])->name('login');
// Memanggil metode atau mengakses properti objek yang dibutuhkan.
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
Route::post('/logout', [LoginController::class, 'destroy'])
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    ->middleware('auth')
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    ->name('logout');

// Memanggil metode atau mengakses properti objek yang dibutuhkan.
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::resource('tarif', TarifController::class)->only(['index', 'store', 'update', 'destroy']);
    // Menetapkan nilai untuk kunci area pada array atau konfigurasi.
    Route::resource('area', AreaParkirController::class)->parameters(['area' => 'area'])->only(['index', 'store', 'update', 'destroy']);
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::resource('kendaraan', KendaraanController::class)->only(['index', 'store']);
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/log-aktivitas', [ActivityLogController::class, 'index'])->name('log-aktivitas');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profil');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::put('/profil', [ProfileController::class, 'update'])->name('profil.update');
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
});

// Memanggil metode atau mengakses properti objek yang dibutuhkan.
Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/transaksi/masuk', [TransactionController::class, 'entry'])->name('transaksi.entry');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transaksi.store');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/transaksi/{transaksi}/tiket-masuk', [TransactionController::class, 'entryReceipt'])->name('transaksi.entry-receipt');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/transaksi/keluar', [TransactionController::class, 'exit'])->name('transaksi.exit');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::post('/transaksi/keluar', [TransactionController::class, 'checkout'])->name('transaksi.checkout');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/transaksi/{transaksi}/struk', [TransactionController::class, 'receipt'])->name('transaksi.receipt');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/transaksi', [TransactionController::class, 'transactions'])->name('transaksi.index');
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
});

// Memanggil metode atau mengakses properti objek yang dibutuhkan.
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/rekap', [OwnerDashboardController::class, 'getRekapData'])->name('rekap');
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    Route::get('/export', [OwnerDashboardController::class, 'exportExcel'])->name('export');
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
});
