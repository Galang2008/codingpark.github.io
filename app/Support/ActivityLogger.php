<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Support;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\ActivityLog;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Auth;

// Mendefinisikan kelas ActivityLogger untuk mengelompokkan perilaku terkait.
class ActivityLogger
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi record untuk menjalankan tanggung jawab terkait.
    public static function record(string $action, string $description): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLog::create([
            // Menetapkan nilai untuk kunci user_id pada array atau konfigurasi.
            'user_id' => Auth::id(),
            // Menetapkan nilai untuk kunci action pada array atau konfigurasi.
            'action' => $action,
            // Menetapkan nilai untuk kunci description pada array atau konfigurasi.
            'description' => $description,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
