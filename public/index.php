<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Application;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// Menentukan cabang logika berdasarkan kondisi atau nilai.
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    // Memuat komponen yang dibutuhkan oleh file ini.
    require $maintenance;
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}

// Register the Composer autoloader...
// Memuat komponen yang dibutuhkan oleh file ini.
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
// Menyimpan atau memperbarui nilai variabel $app untuk proses berikutnya.
$app = require_once __DIR__.'/../bootstrap/app.php';

// Memanggil metode atau mengakses properti objek yang dibutuhkan.
$app->handleRequest(Request::capture());
