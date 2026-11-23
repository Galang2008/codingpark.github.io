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
        Schema::create('jobs', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('queue')->index();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->longText('payload');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedTinyInteger('attempts');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('reserved_at')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('available_at');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->unsignedInteger('created_at');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('job_batches', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('id')->primary();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('name');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('total_jobs');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('pending_jobs');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('failed_jobs');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->longText('failed_job_ids');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->mediumText('options')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('cancelled_at')->nullable();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('created_at');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->integer('finished_at')->nullable();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::create('failed_jobs', function (Blueprint $table) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->id();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->string('uuid')->unique();
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->text('connection');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->text('queue');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->longText('payload');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->longText('exception');
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $table->timestamp('failed_at')->useCurrent();
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
        Schema::dropIfExists('jobs');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('job_batches');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Schema::dropIfExists('failed_jobs');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
};
