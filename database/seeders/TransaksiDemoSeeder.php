<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Database\Seeders;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Seeder;

// Mendefinisikan kelas TransaksiDemoSeeder untuk mengelompokkan perilaku terkait.
class TransaksiDemoSeeder extends Seeder
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi run untuk menjalankan tanggung jawab terkait.
    public function run(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $missingTransactions untuk proses berikutnya.
        $missingTransactions = max(0, 30 - Transaksi::count());

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($missingTransactions > 0) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            Transaksi::factory()->count($missingTransactions)->create();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
