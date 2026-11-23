<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Kendaraan;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Support\ActivityLogger;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas KendaraanController untuk mengelompokkan perilaku terkait.
class KendaraanController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan pasangan nilai atau callback pada struktur data ini.
        $vehicles = Kendaraan::with('recorder')->when($request->search, fn ($q, $search) => $q->where('plate_number', 'like', "%{$search}%"))->when($request->status === 'parked', fn ($q) => $q->whereNull('exit_at'))->when($request->status === 'exited', fn ($q) => $q->whereNotNull('exit_at'))->latest('entry_at')->paginate(10)->withQueryString();
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('admin.kendaraan', compact('vehicles'));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi store untuk menjalankan tanggung jawab terkait.
    public function store(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan nilai untuk kunci plate_number pada array atau konfigurasi.
        $data = $request->validate(['plate_number' => ['required', 'string', 'max:20'], 'vehicle_type' => ['required', 'string', 'max:40'], 'entry_at' => ['required', 'date']]);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        $data['recorded_by'] = $request->user()->id;
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Kendaraan::create($data);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLogger::record('Kendaraan masuk', "Mencatat kendaraan {$data['plate_number']} masuk.");
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return back()->with('success', 'Kendaraan berhasil dicatat.');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
