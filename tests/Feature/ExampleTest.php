<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Tests\TestCase;

// Mendefinisikan kelas ExampleTest untuk mengelompokkan perilaku terkait.
class ExampleTest extends TestCase
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    /**
     * A basic test example.
     */
    // Mendefinisikan fungsi test_the_application_returns_a_successful_response untuk menjalankan tanggung jawab terkait.
    public function test_the_application_returns_a_successful_response(): void
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $response untuk proses berikutnya.
        $response = $this->get('/');

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $response->assertStatus(200);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
