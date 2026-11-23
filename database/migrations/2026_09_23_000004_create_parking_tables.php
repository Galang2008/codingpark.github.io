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
        Schema::create('tarifs', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('vehicle_type');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('hourly_rate');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('daily_max_rate');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->boolean('is_active')->default(true);
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('area_parkirs', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('name');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('capacity');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('occupied')->default(0);
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('location')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('kendaraans', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('plate_number')->index();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('vehicle_type');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->dateTime('entry_at');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->dateTime('exit_at')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('fee')->default(0);
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('activity_logs', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('action');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->text('description');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamps();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->index(['action', 'created_at']);
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi down untuk menjalankan tanggung jawab terkait.
    public function down(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('activity_logs');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('kendaraans');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('area_parkirs');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('tarifs');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
