<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Database\Seeders;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\ActivityLog;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\AreaParkir;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Tarif;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Seeder;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Hash;

// Mendefinisikan kelas DatabaseSeeder untuk mengelompokkan perilaku terkait.
class DatabaseSeeder extends Seeder
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    // Mendefinisikan fungsi run untuk menjalankan tanggung jawab terkait.
    public function run(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $admin untuk proses berikutnya.
        $admin = User::updateOrCreate(
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            ['email' => 'admin@codingpark.id'],
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            [
                // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
                'name' => 'Admin CodingPARK',
                // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
                'password' => Hash::make('admin123'),
                // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
                'role' => 'admin',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        );

        // Menyimpan atau memperbarui nilai variabel $owner untuk proses berikutnya.
        $owner = User::updateOrCreate(
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            ['email' => 'owner@codingpark.id'],
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            [
                // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
                'name' => 'Owner CodingPARK',
                // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
                'password' => Hash::make('owner123'),
                // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
                'role' => 'owner',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        );

        // Menyimpan atau memperbarui nilai variabel $petugas untuk proses berikutnya.
        $petugas = User::updateOrCreate(
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            ['email' => 'petugas@codingpark.id'],
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            [
                // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
                'name' => 'Petugas CodingPARK',
                // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
                'password' => Hash::make('petugas123'),
                // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
                'role' => 'petugas',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        );

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        User::firstOrCreate(
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            ['email' => 'test@example.com'],
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            [
                // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
                'name' => 'Test User',
                // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
                'password' => Hash::make('password'),
                // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
                'role' => 'petugas',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        );

        // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
        Tarif::firstOrCreate(['vehicle_type' => 'Motor'], ['hourly_rate' => 3000, 'daily_max_rate' => 20000, 'is_active' => true]);
        // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
        Tarif::firstOrCreate(['vehicle_type' => 'Mobil'], ['hourly_rate' => 6000, 'daily_max_rate' => 40000, 'is_active' => true]);
        // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
        Tarif::firstOrCreate(['vehicle_type' => 'Truk'], ['hourly_rate' => 10000, 'daily_max_rate' => 60000, 'is_active' => true]);
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        AreaParkir::firstOrCreate(['name' => 'Area Utama'], ['capacity' => 100, 'occupied' => 68, 'location' => 'Lantai dasar, dekat pintu masuk']);
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        AreaParkir::firstOrCreate(['name' => 'Area Basement'], ['capacity' => 50, 'occupied' => 22, 'location' => 'Basement lantai 1']);
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        AreaParkir::firstOrCreate(['name' => 'Area VIP'], ['capacity' => 25, 'occupied' => 9, 'location' => 'Sisi timur gedung']);
        // Menetapkan nilai untuk kunci action pada array atau konfigurasi.
        ActivityLog::firstOrCreate(['action' => 'Sistem siap digunakan', 'description' => 'Data demo SmarPARK berhasil disiapkan.'], ['user_id' => $admin->id]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->call(TransaksiDemoSeeder::class);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
