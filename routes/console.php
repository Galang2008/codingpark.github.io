<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Inspiring;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Artisan;

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
Artisan::command('inspire', function () {
    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
    $this->comment(Inspiring::quote());
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
})->purpose('Display an inspiring quote');
