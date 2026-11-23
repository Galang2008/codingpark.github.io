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
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (Schema::hasTable('sessions')) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            return;
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('sessions', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('id')->primary();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('user_id')->nullable()->index();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('ip_address', 45)->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->text('user_agent')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->text('payload');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('last_activity')->index();
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
        Schema::dropIfExists('sessions');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};