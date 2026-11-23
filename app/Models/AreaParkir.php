<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan kelas AreaParkir untuk mengelompokkan perilaku terkait.
class AreaParkir extends Model
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = ['name', 'capacity', 'occupied', 'location'];

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $appends = ['available'];

    // Mendefinisikan fungsi getAvailableAttribute untuk menjalankan tanggung jawab terkait.
    public function getAvailableAttribute(): int
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return max(0, $this->capacity - $this->occupied);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
