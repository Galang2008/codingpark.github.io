<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Model;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Mendefinisikan kelas ActivityLog untuk mengelompokkan perilaku terkait.
class ActivityLog extends Model
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = ['user_id', 'action', 'description'];

    // Mendefinisikan fungsi user untuk menjalankan tanggung jawab terkait.
    public function user(): BelongsTo
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->belongsTo(User::class);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
