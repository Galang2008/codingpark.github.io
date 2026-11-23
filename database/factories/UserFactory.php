<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace Database\Factories;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Factories\Factory;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Hash;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
// Mendefinisikan kelas UserFactory untuk mengelompokkan perilaku terkait.
class UserFactory extends Factory
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    /**
     * The current password being used by the factory.
     */
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // Mendefinisikan fungsi definition untuk menjalankan tanggung jawab terkait.
    public function definition(): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
            'name' => fake()->name(),
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => fake()->unique()->safeEmail(),
            // Menetapkan nilai untuk kunci email_verified_at pada array atau konfigurasi.
            'email_verified_at' => now(),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => static::$password ??= Hash::make('password'),
            // Menetapkan nilai untuk kunci remember_token pada array atau konfigurasi.
            'remember_token' => Str::random(10),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // Mendefinisikan fungsi unverified untuk menjalankan tanggung jawab terkait.
    public function unverified(): static
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $this->state(fn (array $attributes) => [
            // Menetapkan nilai untuk kunci email_verified_at pada array atau konfigurasi.
            'email_verified_at' => null,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
