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
        Schema::create('transaksis', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('transaction_number')->unique();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('kendaraan_id')->constrained('kendaraans')->restrictOnDelete();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->dateTime('entry_at');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->dateTime('exit_at')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('duration_minutes')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('total_fee')->default(0);
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('status')->default('berlangsung')->index();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->index(['user_id', 'entry_at']);
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi down untuk menjalankan tanggung jawab terkait.
    public function down(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('transaksis');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};