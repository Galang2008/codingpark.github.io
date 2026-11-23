<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Tests\Feature;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Foundation\Testing\RefreshDatabase;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Hash;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Tests\TestCase;

// Mendefinisikan kelas LoginTest untuk mengelompokkan perilaku terkait.
class LoginTest extends TestCase
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mengimpor kelas atau fungsi yang digunakan pada file ini.
    use RefreshDatabase;

    // Mendefinisikan fungsi test_user_can_login_with_valid_credentials untuk menjalankan tanggung jawab terkait.
    public function test_user_can_login_with_valid_credentials(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $user untuk proses berikutnya.
        $user = User::factory()->create([
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'admin@smarpark.id',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => Hash::make('admin123'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->post('/login', [
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'admin@smarpark.id',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => 'admin123',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertRedirect(route('petugas.dashboard'));
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertAuthenticatedAs($user);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_login_page_can_be_opened_when_a_user_session_exists untuk menjalankan tanggung jawab terkait.
    public function test_login_page_can_be_opened_when_a_user_session_exists(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $user untuk proses berikutnya.
        $user = User::factory()->create();

        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->actingAs($user)->get('/login');

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertOk();
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertSee('Masuk ke CodingPARK');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi test_user_can_switch_to_admin_account_from_an_existing_session untuk menjalankan tanggung jawab terkait.
    public function test_user_can_switch_to_admin_account_from_an_existing_session(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
        $existingUser = User::factory()->create(['role' => 'petugas']);
        // Menyimpan atau memperbarui nilai variabel $admin untuk proses berikutnya.
        $admin = User::factory()->create([
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'admin@smarpark.id',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => Hash::make('admin123'),
            // Menetapkan nilai untuk kunci role pada array atau konfigurasi.
            'role' => 'admin',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->actingAs($existingUser)->post('/login', [
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => 'admin@smarpark.id',
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => 'admin123',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertRedirect('/admin/dashboard');
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $this->assertAuthenticatedAs($admin);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
