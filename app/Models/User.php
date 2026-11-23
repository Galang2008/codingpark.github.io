<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Database\Factories\UserFactory;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Auth\User as Authenticatable;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Notifications\Notifiable;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Relations\HasMany;

// Mendefinisikan kelas User untuk mengelompokkan perilaku terkait.
class User extends Authenticatable
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    /** @use HasFactory<UserFactory> */
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $fillable = [
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'name',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'email',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'password',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'role',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ];

    // Mendefinisikan fungsi isAdmin untuk menjalankan tanggung jawab terkait.
    public function isAdmin(): bool
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->role === 'admin';
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected $hidden = [
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'password',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'remember_token',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // Mendefinisikan fungsi casts untuk menjalankan tanggung jawab terkait.
    protected function casts(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci email_verified_at pada array atau konfigurasi.
            'email_verified_at' => 'datetime',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => 'hashed',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
