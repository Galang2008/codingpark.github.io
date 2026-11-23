<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Model;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Mendefinisikan kelas Transaksi untuk mengelompokkan perilaku terkait.
class Transaksi extends Model
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use HasFactory;

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = [
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'transaction_number',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'kendaraan_id',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'user_id',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'exit_user_id',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'entry_at',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'exit_at',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'duration_minutes',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'total_fee',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'payment_method',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'status',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ];

    // Mendefinisikan fungsi casts untuk menjalankan tanggung jawab terkait.
    protected function casts(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
            'entry_at' => 'datetime',
            // Menetapkan nilai untuk kunci exit_at pada array atau konfigurasi.
            'exit_at' => 'datetime',
            // Menetapkan nilai untuk kunci duration_minutes pada array atau konfigurasi.
            'duration_minutes' => 'integer',
            // Menetapkan nilai untuk kunci total_fee pada array atau konfigurasi.
            'total_fee' => 'integer',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi kendaraan untuk menjalankan tanggung jawab terkait.
    public function kendaraan(): BelongsTo
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->belongsTo(Kendaraan::class);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi petugas untuk menjalankan tanggung jawab terkait.
    public function petugas(): BelongsTo
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->belongsTo(User::class, 'user_id');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi petugasKeluar untuk menjalankan tanggung jawab terkait.
    public function petugasKeluar(): BelongsTo
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->belongsTo(User::class, 'exit_user_id');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}