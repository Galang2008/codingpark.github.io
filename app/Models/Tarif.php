<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan kelas Tarif untuk mengelompokkan perilaku terkait.
class Tarif extends Model
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = ['vehicle_type', 'hourly_rate', 'daily_max_rate', 'is_active'];

    // Mendefinisikan fungsi casts untuk menjalankan tanggung jawab terkait.
    protected function casts(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return ['is_active' => 'boolean'];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
