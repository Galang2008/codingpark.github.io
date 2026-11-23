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
    /**
     * Run the migrations.
     */
    // Mendefinisikan fungsi up untuk menjalankan tanggung jawab terkait.
    public function up(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('cache', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('key')->primary();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->mediumText('value');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('expiration')->index();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('cache_locks', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('key')->primary();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('owner');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('expiration')->index();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    /**
     * Reverse the migrations.
     */
    // Mendefinisikan fungsi down untuk menjalankan tanggung jawab terkait.
    public function down(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('cache');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('cache_locks');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
