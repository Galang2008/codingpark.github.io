<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\AreaParkir;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Support\ActivityLogger;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas AreaParkirController untuk mengelompokkan perilaku terkait.
class AreaParkirController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(): View { return view('admin.area', ['areas' => AreaParkir::latest()->get()]); }

    // Mendefinisikan fungsi store untuk menjalankan tanggung jawab terkait.
    public function store(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        $data = $request->validate(['name' => ['required', 'string', 'max:100'], 'capacity' => ['required', 'integer', 'min:1'], 'location' => ['nullable', 'string', 'max:200']]);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        AreaParkir::create($data);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLogger::record('Area ditambahkan', "Menambahkan area {$data['name']}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Area parkir berhasil ditambahkan.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi update untuk menjalankan tanggung jawab terkait.
    public function update(Request $request, AreaParkir $area): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        $data = $request->validate(['name' => ['required', 'string', 'max:100'], 'capacity' => ['required', 'integer', 'min:1'], 'occupied' => ['required', 'integer', 'min:0'], 'location' => ['nullable', 'string', 'max:200']]);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $area->update($data);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ActivityLogger::record('Area diperbarui', "Mengubah area {$area->name}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Area parkir berhasil diperbarui.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi destroy untuk menjalankan tanggung jawab terkait.
    public function destroy(AreaParkir $area): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $name untuk proses berikutnya.
        $name = $area->name; $area->delete(); ActivityLogger::record('Area dihapus', "Menghapus area {$name}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Area parkir berhasil dihapus.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
