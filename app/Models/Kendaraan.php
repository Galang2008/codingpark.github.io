<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Model;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Relations\HasMany;

// Mendefinisikan kelas Kendaraan untuk mengelompokkan perilaku terkait.
class Kendaraan extends Model
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = ['plate_number', 'vehicle_type', 'entry_at', 'exit_at', 'fee', 'recorded_by'];

    // Mendefinisikan fungsi casts untuk menjalankan tanggung jawab terkait.
    protected function casts(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return ['entry_at' => 'datetime', 'exit_at' => 'datetime', 'fee' => 'integer'];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi recorder untuk menjalankan tanggung jawab terkait.
    public function recorder(): BelongsTo
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->belongsTo(User::class, 'recorded_by');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi transaksis untuk menjalankan tanggung jawab terkait.
    public function transaksis(): HasMany
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->hasMany(Transaksi::class);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
