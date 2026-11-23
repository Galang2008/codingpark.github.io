<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Application;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Configuration\Exceptions;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Configuration\Middleware;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Middleware\EnsureUserHasRole;

// Mengembalikan nilai atau hasil dari fungsi ini.
return Application::configure(basePath: dirname(__DIR__))
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    ->withRouting(
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        web: __DIR__.'/../routes/web.php',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        commands: __DIR__.'/../routes/console.php',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        health: '/up',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    )
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    ->withMiddleware(function (Middleware $middleware): void {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $middleware->alias([
            // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
            'role' => EnsureUserHasRole::class,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    })
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    })->create();
