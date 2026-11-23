<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\Hash;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas ProfileController untuk mengelompokkan perilaku terkait.
class ProfileController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi edit untuk menjalankan tanggung jawab terkait.
    public function edit(Request $request): View { return view('admin.profile', ['user' => $request->user()]); }

    // Mendefinisikan fungsi update untuk menjalankan tanggung jawab terkait.
    public function update(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        $data = $request->validate(['name' => ['required', 'string', 'max:100'], 'current_password' => ['nullable', 'current_password'], 'password' => ['nullable', 'confirmed', 'min:8']]);
        // Menyimpan atau memperbarui nilai variabel $user untuk proses berikutnya.
        $user = $request->user(); $user->name = $data['name'];
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! empty($data['password'])) $user->password = Hash::make($data['password']);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $user->save();
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Pengaturan akun berhasil diperbarui.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
