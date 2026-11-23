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
        Schema::create('users', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('name');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('email')->unique();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('role')->default('petugas');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamp('email_verified_at')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('password');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->rememberToken();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('email')->primary();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('token');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamp('created_at')->nullable();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

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
            $table->longText('payload');
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
        Schema::dropIfExists('users');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('password_reset_tokens');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('sessions');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
