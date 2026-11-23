<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Database\Factories;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Kendaraan;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kendaraan>
 */
// Mendefinisikan kelas KendaraanFactory untuk mengelompokkan perilaku terkait.
class KendaraanFactory extends Factory
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi definition untuk menjalankan tanggung jawab terkait.
    public function definition(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci plate_number pada array atau konfigurasi.
            'plate_number' => strtoupper(fake()->unique()->bothify('B #### ???')),
            // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
            'vehicle_type' => fake()->randomElement(['motor', 'mobil', 'lainnya']),
            // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
            'entry_at' => fake()->dateTimeBetween('-5 months', 'now'),
            // Menetapkan nilai untuk kunci fee pada array atau konfigurasi.
            'fee' => 0,
            // Menetapkan nilai untuk kunci recorded_by pada array atau konfigurasi.
            'recorded_by' => User::query()->where('role', 'petugas')->inRandomOrder()->value('id'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
