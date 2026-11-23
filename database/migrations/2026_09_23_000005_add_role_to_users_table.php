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
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! Schema::hasColumn('users', 'role')) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            Schema::table('users', function (Blueprint $table) {
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $table->string('role')->default('petugas')->after('email');
            // Mengakhiri blok kelas, fungsi, atau kontrol alur.
            });
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi down untuk menjalankan tanggung jawab terkait.
    public function down(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (Schema::hasColumn('users', 'role')) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            Schema::table('users', function (Blueprint $table) {
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $table->dropColumn('role');
            // Mengakhiri blok kelas, fungsi, atau kontrol alur.
            });
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
