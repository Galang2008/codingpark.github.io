<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Tests\Feature;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Kendaraan;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Tarif;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Testing\RefreshDatabase;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Carbon;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Tests\TestCase;

// Mendefinisikan kelas PetugasTransactionTest untuk mengelompokkan perilaku terkait.
class PetugasTransactionTest extends TestCase
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use RefreshDatabase;

    // Mendefinisikan fungsi test_only_petugas_can_open_the_petugas_dashboard untuk menjalankan tanggung jawab terkait.
    public function test_only_petugas_can_open_the_petugas_dashboard(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $admin = User::factory()->create(['role' => 'admin']);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($admin)->get(route('petugas.dashboard'))->assertForbidden();
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_petugas_can_record_entry_and_checkout_with_ticket_number untuk menjalankan tanggung jawab terkait.
    public function test_petugas_can_record_entry_and_checkout_with_ticket_number(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Carbon::setTestNow('2026-09-30 08:00:00');
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $petugas = User::factory()->create(['role' => 'petugas']);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Tarif::create([
            // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
            'vehicle_type' => 'Motor',
            // Menetapkan nilai untuk kunci hourly_rate pada array atau konfigurasi.
            'hourly_rate' => 1500,
            // Menetapkan nilai untuk kunci daily_max_rate pada array atau konfigurasi.
            'daily_max_rate' => 12000,
            // Menetapkan nilai untuk kunci is_active pada array atau konfigurasi.
            'is_active' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($petugas)->post(route('petugas.transaksi.store'), [
            // Menetapkan nilai untuk kunci plate_number pada array atau konfigurasi.
            'plate_number' => 'b 1234 abc',
            // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
            'vehicle_type' => 'motor',
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ])->assertRedirect(route('petugas.transaksi.entry-receipt', 1));

        // Menyimpan atau memperbarui nilai variabel $transaction untuk proses berikutnya.
        $transaction = Transaksi::with('kendaraan')->firstOrFail();
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame('B 1234 ABC', $transaction->kendaraan->plate_number);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame($petugas->id, $transaction->user_id);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame('berlangsung', $transaction->status);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame(1, Kendaraan::whereNull('exit_at')->count());
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->get(route('petugas.transaksi.entry-receipt', $transaction))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee($transaction->transaction_number)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Cetak Tiket');
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->get(route('petugas.dashboard'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Aktivitas Terbaru')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('B 1234 ABC');

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Carbon::setTestNow('2026-09-30 09:05:00');
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->post(route('petugas.transaksi.checkout'), [
            // Menetapkan nilai untuk kunci identifier pada array atau konfigurasi.
            'identifier' => $transaction->transaction_number,
            // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
            'payment_method' => 'tunai',
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ])->assertRedirect(route('petugas.transaksi.receipt', $transaction));

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $transaction->refresh();
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame('selesai', $transaction->status);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame('tunai', $transaction->payment_method);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame($petugas->id, $transaction->exit_user_id);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame(65, $transaction->duration_minutes);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame(3000, $transaction->total_fee);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertNotNull($transaction->kendaraan->fresh()->exit_at);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->get(route('petugas.transaksi.receipt', $transaction))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('B 1234 ABC')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee($transaction->transaction_number)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Cetak struk');

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Carbon::setTestNow();
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_petugas_can_open_all_operational_pages_without_crud_controls untuk menjalankan tanggung jawab terkait.
    public function test_petugas_can_open_all_operational_pages_without_crud_controls(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $petugas = User::factory()->create(['role' => 'petugas']);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($petugas)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->get(route('petugas.transaksi.entry'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Catat kendaraan masuk');

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->get(route('petugas.transaksi.exit'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Cari tiket aktif');

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->get(route('petugas.transaksi.index'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Mode baca saja')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Tidak tersedia aksi tambah, ubah, atau hapus');

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->put('/petugas/transaksi/1')->assertNotFound();
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->delete('/petugas/transaksi/1')->assertNotFound();
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}