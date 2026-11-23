<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Tarif;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Support\ActivityLogger;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas TarifController untuk mengelompokkan perilaku terkait.
class TarifController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan pasangan nilai atau callback pada struktur data ini.
        $tarifs = Tarif::query()->when($request->search, fn ($q, $search) => $q->where('vehicle_type', 'like', "%{$search}%"))->latest()->get();
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('admin.tarif', compact('tarifs'));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi store untuk menjalankan tanggung jawab terkait.
    public function store(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
        $data = $request->validate(['vehicle_type' => ['required', 'string', 'max:50'], 'hourly_rate' => ['required', 'integer', 'min:0'], 'daily_max_rate' => ['required', 'integer', 'min:0']]);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $data['is_active'] = $request->boolean('is_active');
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Tarif::create($data);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLogger::record('Tarif baru', "Menambahkan tarif {$data['vehicle_type']}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Tarif berhasil ditambahkan.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi update untuk menjalankan tanggung jawab terkait.
    public function update(Request $request, Tarif $tarif): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
        $data = $request->validate(['vehicle_type' => ['required', 'string', 'max:50'], 'hourly_rate' => ['required', 'integer', 'min:0'], 'daily_max_rate' => ['required', 'integer', 'min:0']]);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $data['is_active'] = $request->boolean('is_active');
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $tarif->update($data);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ActivityLogger::record('Tarif diperbarui', "Mengubah tarif {$tarif->vehicle_type}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Tarif berhasil diperbarui.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi destroy untuk menjalankan tanggung jawab terkait.
    public function destroy(Tarif $tarif): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $name untuk proses berikutnya.
        $name = $tarif->vehicle_type;
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $tarif->delete();
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLogger::record('Tarif dihapus', "Menghapus tarif {$name}.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Tarif berhasil dihapus.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
