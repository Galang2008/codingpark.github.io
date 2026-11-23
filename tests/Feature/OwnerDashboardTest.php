<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Tests\Feature;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Database\Seeders\DatabaseSeeder;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Testing\RefreshDatabase;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Tests\TestCase;

// Mendefinisikan kelas OwnerDashboardTest untuk mengelompokkan perilaku terkait.
class OwnerDashboardTest extends TestCase
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use RefreshDatabase;

    // Mendefinisikan fungsi test_owner_can_view_dashboard_and_filter_rekap_data untuk menjalankan tanggung jawab terkait.
    public function test_owner_can_view_dashboard_and_filter_rekap_data(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $owner = User::factory()->create(['role' => 'owner']);
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $petugas = User::factory()->create(['role' => 'petugas']);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        Transaksi::factory()->create([
            // Menetapkan nilai untuk kunci user_id pada array atau konfigurasi.
            'user_id' => $petugas->id,
            // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
            'entry_at' => now()->subDay(),
            // Menetapkan nilai untuk kunci total_fee pada array atau konfigurasi.
            'total_fee' => 12000,
            // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
            'payment_method' => 'qris',
            // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
            'status' => 'selesai',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($owner)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->get(route('owner.dashboard'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Dashboard')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Rincian Transaksi');

        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->getJson(route('owner.rekap', [
            // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
            'dari' => now()->startOfMonth()->toDateString(),
            // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
            'sampai' => now()->toDateString(),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]));

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertJsonPath('cards.pendapatan.value', 12000)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertJsonPath('cards.transaksi.value', 1)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertJsonPath('table.data.0.pembayaran', 'QRIS')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertJsonPath('table.data.0.petugas', $petugas->name);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_only_owner_can_access_owner_dashboard_and_rekap untuk menjalankan tanggung jawab terkait.
    public function test_only_owner_can_access_owner_dashboard_and_rekap(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $petugas = User::factory()->create(['role' => 'petugas']);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($petugas)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->get(route('owner.dashboard'))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertForbidden();

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->getJson(route('owner.rekap', [
            // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
            'dari' => now()->startOfMonth()->toDateString(),
            // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
            'sampai' => now()->toDateString(),
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ]))->assertForbidden();
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_owner_login_redirects_to_owner_dashboard untuk menjalankan tanggung jawab terkait.
    public function test_owner_login_redirects_to_owner_dashboard(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        User::factory()->create([
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'owner@example.test',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => 'password',
            // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
            'role' => 'owner',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->post(route('login.store'), [
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'owner@example.test',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => 'password',
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ])->assertRedirect(route('owner.dashboard'));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_rekap_rejects_an_end_date_before_the_start_date untuk menjalankan tanggung jawab terkait.
    public function test_rekap_rejects_an_end_date_before_the_start_date(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $owner = User::factory()->create(['role' => 'owner']);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->actingAs($owner)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->getJson(route('owner.rekap', [
                // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
                'dari' => now()->toDateString(),
                // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
                'sampai' => now()->subDay()->toDateString(),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertUnprocessable()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertJsonValidationErrors('sampai');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_owner_can_export_transaction_details_as_excel_compatible_csv untuk menjalankan tanggung jawab terkait.
    public function test_owner_can_export_transaction_details_as_excel_compatible_csv(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $owner = User::factory()->create(['role' => 'owner']);
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $petugas = User::factory()->create(['role' => 'petugas']);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        Transaksi::factory()->create([
            // Menetapkan nilai untuk kunci user_id pada array atau konfigurasi.
            'user_id' => $petugas->id,
            // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
            'entry_at' => now()->subDay(),
            // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
            'payment_method' => 'qris',
            // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
            'status' => 'selesai',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->actingAs($owner)->get(route('owner.export', [
            // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
            'dari' => now()->startOfMonth()->toDateString(),
            // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
            'sampai' => now()->toDateString(),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]));

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertOk()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertHeader('content-type', 'text/csv; charset=UTF-8')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('Metode Pembayaran')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->assertSee('QRIS');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_database_seeder_ensures_thirty_demo_transactions_without_duplicating_them untuk menjalankan tanggung jawab terkait.
    public function test_database_seeder_ensures_thirty_demo_transactions_without_duplicating_them(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->seed(DatabaseSeeder::class);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame(30, Transaksi::count());

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->seed(DatabaseSeeder::class);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertSame(30, Transaksi::count());
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
