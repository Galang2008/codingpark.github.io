<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Migrations\Migration;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Schema\Blueprint;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Schema;

// Mengembalikan nilai atau hasil dari fungsi ini.
return new class extends Migration
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi up untuk menjalankan tanggung jawab terkait.
    public function up(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::table('transaksis', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('exit_user_id')->nullable()->after('user_id')->constrained('users')->nullOnDelete();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi down untuk menjalankan tanggung jawab terkait.
    public function down(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::table('transaksis', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->dropConstrainedForeignId('exit_user_id');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
