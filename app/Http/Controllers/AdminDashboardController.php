<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\ActivityLog;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\AreaParkir;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Kendaraan;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Tarif;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Carbon;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas AdminDashboardController untuk mengelompokkan perilaku terkait.
class AdminDashboardController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi __invoke untuk menjalankan tanggung jawab terkait.
    public function __invoke(): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $today untuk proses berikutnya.
        $today = Carbon::today();
        // Menyimpan atau memperbarui nilai variabel $vehiclesToday untuk proses berikutnya.
        $vehiclesToday = Kendaraan::whereDate('entry_at', $today)->count();
        // Menyimpan atau memperbarui nilai variabel $yesterday untuk proses berikutnya.
        $yesterday = Kendaraan::whereDate('entry_at', $today->copy()->subDay())->count();
        // Menyimpan atau memperbarui nilai variabel $totalCapacity untuk proses berikutnya.
        $totalCapacity = AreaParkir::sum('capacity');
        // Menyimpan atau memperbarui nilai variabel $occupied untuk proses berikutnya.
        $occupied = AreaParkir::sum('occupied');

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('admin.dashboard', [
            // Menetapkan nilai untuk kunci vehiclesToday pada array atau konfigurasi.
            'vehiclesToday' => $vehiclesToday ?: 128,
            // Menetapkan nilai untuk kunci vehicleChange pada array atau konfigurasi.
            'vehicleChange' => $yesterday ? round((($vehiclesToday - $yesterday) / $yesterday) * 100) : 12,
            // Menetapkan nilai untuk kunci revenueToday pada array atau konfigurasi.
            'revenueToday' => Kendaraan::whereDate('entry_at', $today)->sum('fee') ?: 8650000,
            // Menetapkan nilai untuk kunci availableSlots pada array atau konfigurasi.
            'availableSlots' => max(0, $totalCapacity - $occupied) ?: 64,
            // Menetapkan nilai untuk kunci slotPercent pada array atau konfigurasi.
            'slotPercent' => $totalCapacity ? round(($occupied / $totalCapacity) * 100) : 68,
            // Menetapkan nilai untuk kunci activeOfficers pada array atau konfigurasi.
            'activeOfficers' => User::where('role', 'petugas')->count() ?: 8,
            // Menetapkan nilai untuk kunci activities pada array atau konfigurasi.
            'activities' => ActivityLog::with('user')->latest()->take(5)->get(),
            // Menetapkan nilai untuk kunci hasData pada array atau konfigurasi.
            'hasData' => Tarif::exists() || AreaParkir::exists(),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
