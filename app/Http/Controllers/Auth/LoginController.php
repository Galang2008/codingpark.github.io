<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers\Auth;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Http\Controllers\Controller;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Auth;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas LoginController untuk mengelompokkan perilaku terkait.
class LoginController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi create untuk menjalankan tanggung jawab terkait.
    public function create(): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('auth.login');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi store untuk menjalankan tanggung jawab terkait.
    public function store(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $credentials untuk proses berikutnya.
        $credentials = $request->validate([
            // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
            'email' => ['required', 'email'],
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => ['required', 'string'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ], [
            // Menetapkan nilai untuk kunci email.required pada array atau konfigurasi.
            'email.required' => 'Email wajib diisi.',
            // Menetapkan nilai untuk kunci email.email pada array atau konfigurasi.
            'email.email' => 'Masukkan alamat email yang valid.',
            // Menetapkan nilai untuk kunci password.required pada array atau konfigurasi.
            'password.required' => 'Password wajib diisi.',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return back()
                // Menetapkan nilai untuk kunci email pada array atau konfigurasi.
                ->withErrors(['email' => 'Email atau password yang Anda masukkan salah.'])
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->onlyInput('email');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $request->session()->regenerate();

        // Menyimpan atau memperbarui nilai variabel $user untuk proses berikutnya.
        $user = Auth::user();

        // Menyimpan atau memperbarui nilai variabel $dashboardRoute untuk proses berikutnya.
        $dashboardRoute = match ($user->role) {
            // Menetapkan nilai untuk kunci admin pada array atau konfigurasi.
            'admin' => 'admin.dashboard',
            // Menetapkan nilai untuk kunci owner pada array atau konfigurasi.
            'owner' => 'owner.dashboard',
            // Menentukan cabang logika berdasarkan kondisi atau nilai.
            default => 'petugas.dashboard',
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        };

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return redirect()->route($dashboardRoute);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi destroy untuk menjalankan tanggung jawab terkait.
    public function destroy(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Auth::logout();

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $request->session()->invalidate();
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $request->session()->regenerateToken();

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return redirect()->route('login');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}