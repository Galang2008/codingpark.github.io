<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Database\Factories;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaksi>
 */
// Mendefinisikan kelas TransaksiFactory untuk mengelompokkan perilaku terkait.
class TransaksiFactory extends Factory
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi definition untuk menjalankan tanggung jawab terkait.
    public function definition(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $officerId untuk proses berikutnya.
        $officerId = User::query()->where('role', 'petugas')->inRandomOrder()->value('id')
            // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
            ?? User::factory()->create(['role' => 'petugas'])->id;
        // Menyimpan atau memperbarui nilai variabel $entryAt untuk proses berikutnya.
        $entryAt = fake()->dateTimeBetween('-5 months', 'now');
        // Menyimpan atau memperbarui nilai variabel $status untuk proses berikutnya.
        $status = fake()->randomElement(['selesai', 'selesai', 'selesai', 'berlangsung']);
        // Menyimpan atau memperbarui nilai variabel $duration untuk proses berikutnya.
        $duration = fake()->numberBetween(15, 600);
        // Menyimpan atau memperbarui nilai variabel $exitAt untuk proses berikutnya.
        $exitAt = $status === 'selesai'
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ? (clone $entryAt)->modify("+{$duration} minutes")
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            : null;
        // Menyimpan atau memperbarui nilai variabel $vehicleType untuk proses berikutnya.
        $vehicleType = fake()->randomElement(['motor', 'mobil', 'lainnya']);
        // Menyimpan atau memperbarui nilai variabel $fee untuk proses berikutnya.
        $fee = match ($vehicleType) {
            // Menetapkan nilai untuk kunci motor pada array atau konfigurasi.
            'motor' => fake()->randomElement([3000, 6000, 9000, 12000]),
            // Menetapkan nilai untuk kunci mobil pada array atau konfigurasi.
            'mobil' => fake()->randomElement([6000, 12000, 18000, 24000]),
            // Menentukan cabang logika berdasarkan kondisi atau nilai.
            default => fake()->randomElement([10000, 20000, 30000]),
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        };

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci transaction_number pada array atau konfigurasi.
            'transaction_number' => 'CP-'.fake()->unique()->numerify('######').'-'.fake()->bothify('????'),
            // Menetapkan nilai untuk kunci kendaraan_id pada array atau konfigurasi.
            'kendaraan_id' => KendaraanFactory::new()->state([
                // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
                'vehicle_type' => $vehicleType,
                // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
                'entry_at' => $entryAt,
                // Menetapkan nilai untuk kunci exit_at pada array atau konfigurasi.
                'exit_at' => $exitAt,
                // Menetapkan nilai untuk kunci fee pada array atau konfigurasi.
                'fee' => $status === 'selesai' ? $fee : 0,
                // Menetapkan nilai untuk kunci recorded_by pada array atau konfigurasi.
                'recorded_by' => $officerId,
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]),
            // Menetapkan nilai untuk kunci user_id pada array atau konfigurasi.
            'user_id' => $officerId,
            // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
            'entry_at' => $entryAt,
            // Menetapkan nilai untuk kunci exit_at pada array atau konfigurasi.
            'exit_at' => $exitAt,
            // Menetapkan nilai untuk kunci duration_minutes pada array atau konfigurasi.
            'duration_minutes' => $status === 'selesai' ? $duration : null,
            // Menetapkan nilai untuk kunci total_fee pada array atau konfigurasi.
            'total_fee' => $status === 'selesai' ? $fee : 0,
            // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
            'payment_method' => $status === 'selesai' ? fake()->randomElement(['tunai', 'qris', 'kartu_debit']) : null,
            // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
            'status' => $status,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
