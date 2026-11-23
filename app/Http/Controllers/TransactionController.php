<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Kendaraan;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Tarif;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Support\ActivityLogger;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\RedirectResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Carbon;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\DB;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Str;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas TransactionController untuk mengelompokkan perilaku terkait.
class TransactionController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $today untuk proses berikutnya.
        $today = Carbon::today();
        // Menyimpan atau memperbarui nilai variabel $todayTransactions untuk proses berikutnya.
        $todayTransactions = Transaksi::whereDate('entry_at', $today);
        // Menyimpan atau memperbarui nilai variabel $shiftTransactions untuk proses berikutnya.
        $shiftTransactions = Transaksi::where('exit_user_id', $request->user()->id)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->whereDate('exit_at', $today);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.dashboard', [
            // Menetapkan nilai untuk kunci enteredToday pada array atau konfigurasi.
            'enteredToday' => (clone $todayTransactions)->count(),
            // Menetapkan nilai untuk kunci exitedToday pada array atau konfigurasi.
            'exitedToday' => Transaksi::whereDate('exit_at', $today)->count(),
            // Menetapkan nilai untuk kunci parkedNow pada array atau konfigurasi.
            'parkedNow' => Transaksi::where('status', 'berlangsung')->count(),
            // Menetapkan nilai untuk kunci shiftRevenue pada array atau konfigurasi.
            'shiftRevenue' => (clone $shiftTransactions)->where('status', 'selesai')->sum('total_fee'),
            // Menetapkan nilai untuk kunci recentTransactions pada array atau konfigurasi.
            'recentTransactions' => Transaksi::with('kendaraan')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->latest('updated_at')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->limit(6)
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->get(),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi entry untuk menjalankan tanggung jawab terkait.
    public function entry(): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.entry');
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi transactions untuk menjalankan tanggung jawab terkait.
    public function transactions(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $filters untuk proses berikutnya.
        $filters = $request->validate([
            // Menetapkan nilai untuk kunci search pada array atau konfigurasi.
            'search' => ['nullable', 'string', 'max:60'],
            // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
            'status' => ['nullable', 'in:berlangsung,selesai'],
            // Menetapkan nilai untuk kunci date pada array atau konfigurasi.
            'date' => ['nullable', 'date'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $transactions untuk proses berikutnya.
        $transactions = Transaksi::with(['kendaraan', 'petugas'])
            // Menetapkan pasangan nilai atau callback pada struktur data ini.
            ->when(! empty($filters['search']), fn ($query) => $query->whereHas(
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'kendaraan',
                // Menetapkan pasangan nilai atau callback pada struktur data ini.
                fn ($vehicleQuery) => $vehicleQuery->where('plate_number', 'like', '%'.trim($filters['search']).'%')
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ))
            // Menetapkan pasangan nilai atau callback pada struktur data ini.
            ->when(! empty($filters['status']), fn ($query) => $query->where('status', $filters['status']))
            // Menetapkan pasangan nilai atau callback pada struktur data ini.
            ->when(! empty($filters['date']), fn ($query) => $query->whereDate('entry_at', $filters['date']))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->latest('entry_at')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->paginate(10)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->withQueryString();

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.transactions', [
            // Menetapkan nilai untuk kunci transactions pada array atau konfigurasi.
            'transactions' => $transactions,
            // Menetapkan nilai untuk kunci filters pada array atau konfigurasi.
            'filters' => $filters,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi store untuk menjalankan tanggung jawab terkait.
    public function store(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $data untuk proses berikutnya.
        $data = $request->validate([
            // Menetapkan nilai untuk kunci plate_number pada array atau konfigurasi.
            'plate_number' => ['required', 'string', 'max:20'],
            // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
            'vehicle_type' => ['required', 'in:motor,mobil,lainnya'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $plateNumber untuk proses berikutnya.
        $plateNumber = Str::upper(trim($data['plate_number']));
        // Menyimpan atau memperbarui nilai variabel $alreadyParked untuk proses berikutnya.
        $alreadyParked = Kendaraan::where('plate_number', $plateNumber)->whereNull('exit_at')->exists();
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($alreadyParked) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return back()->withErrors(['plate_number' => 'Kendaraan dengan nomor plat tersebut masih tercatat di dalam area parkir.'])->withInput();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! Tarif::whereRaw('LOWER(vehicle_type) = ?', [strtolower($data['vehicle_type'])])->where('is_active', true)->exists()) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return back()->withErrors(['vehicle_type' => 'Tarif aktif untuk jenis kendaraan ini belum tersedia.'])->withInput();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menyimpan atau memperbarui nilai variabel $now untuk proses berikutnya.
        $now = now();
        // Menyimpan atau memperbarui nilai variabel $transaction untuk proses berikutnya.
        $transaction = DB::transaction(function () use ($data, $now, $plateNumber, $request) {
            // Menyimpan atau memperbarui nilai variabel $vehicle untuk proses berikutnya.
            $vehicle = Kendaraan::create([
                // Menetapkan nilai untuk kunci plate_number pada array atau konfigurasi.
                'plate_number' => $plateNumber,
                // Menetapkan nilai untuk kunci vehicle_type pada array atau konfigurasi.
                'vehicle_type' => $data['vehicle_type'],
                // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
                'entry_at' => $now,
                // Menetapkan nilai untuk kunci recorded_by pada array atau konfigurasi.
                'recorded_by' => $request->user()->id,
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]);

            // Mengembalikan nilai atau hasil dari fungsi ini.
            return Transaksi::create([
                // Menetapkan nilai untuk kunci transaction_number pada array atau konfigurasi.
                'transaction_number' => 'CP-'.$now->format('ymd').'-'.Str::upper(Str::random(8)),
                // Menetapkan nilai untuk kunci kendaraan_id pada array atau konfigurasi.
                'kendaraan_id' => $vehicle->id,
                // Menetapkan nilai untuk kunci user_id pada array atau konfigurasi.
                'user_id' => $request->user()->id,
                // Menetapkan nilai untuk kunci entry_at pada array atau konfigurasi.
                'entry_at' => $now,
                // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
                'status' => 'berlangsung',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]);
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ActivityLogger::record('Kendaraan masuk', "Mencatat kendaraan {$plateNumber} masuk.");

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return redirect()->route('petugas.transaksi.entry-receipt', $transaction)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->with('success', "Kendaraan {$plateNumber} berhasil dicatat masuk.");
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi entryReceipt untuk menjalankan tanggung jawab terkait.
    public function entryReceipt(Request $request, Transaksi $transaksi): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        abort_unless($transaksi->user_id === $request->user()->id, 403);
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        abort_unless($transaksi->status === 'berlangsung', 404);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.receipt-entry', ['transaksi' => $transaksi->load('kendaraan')]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi exit untuk menjalankan tanggung jawab terkait.
    public function exit(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $transaction untuk proses berikutnya.
        $transaction = null;
        // Menyimpan atau memperbarui nilai variabel $estimate untuk proses berikutnya.
        $estimate = null;
        // Menyimpan atau memperbarui nilai variabel $durationMinutes untuk proses berikutnya.
        $durationMinutes = null;

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($request->filled('identifier')) {
            // Menyimpan atau memperbarui nilai variabel $identifier untuk proses berikutnya.
            $identifier = trim($request->string('identifier')->toString());
            // Menyimpan atau memperbarui nilai variabel $transaction untuk proses berikutnya.
            $transaction = Transaksi::with('kendaraan')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->where('status', 'berlangsung')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->where(function ($query) use ($identifier) {
                    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                    $query->where('transaction_number', $identifier)
                        // Menetapkan pasangan nilai atau callback pada struktur data ini.
                        ->orWhereHas('kendaraan', fn ($vehicleQuery) => $vehicleQuery->where('plate_number', Str::upper($identifier)));
                // Mengakhiri blok kelas, fungsi, atau kontrol alur.
                })
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->first();

            // Menentukan cabang logika berdasarkan kondisi atau nilai.
            if ($transaction) {
                // Menyimpan atau memperbarui nilai variabel $tarif untuk proses berikutnya.
                $tarif = Tarif::whereRaw('LOWER(vehicle_type) = ?', [strtolower($transaction->kendaraan->vehicle_type)])
                    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                    ->where('is_active', true)
                    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                    ->first();

                // Menentukan cabang logika berdasarkan kondisi atau nilai.
                if ($tarif) {
                    // Menyimpan atau memperbarui nilai variabel $durationMinutes untuk proses berikutnya.
                    $durationMinutes = max(1, (int) ceil($transaction->entry_at->diffInSeconds(now()) / 60));
                    // Menyimpan atau memperbarui nilai variabel $hours untuk proses berikutnya.
                    $hours = max(1, (int) ceil($durationMinutes / 60));
                    // Menyimpan atau memperbarui nilai variabel $dayBlocks untuk proses berikutnya.
                    $dayBlocks = max(1, (int) ceil($durationMinutes / 1440));
                    // Menyimpan atau memperbarui nilai variabel $estimate untuk proses berikutnya.
                    $estimate = min($hours * $tarif->hourly_rate, $dayBlocks * $tarif->daily_max_rate);
                // Mengakhiri blok kelas, fungsi, atau kontrol alur.
                }
            // Mengakhiri blok kelas, fungsi, atau kontrol alur.
            }
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.exit', compact('transaction', 'estimate', 'durationMinutes'));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi checkout untuk menjalankan tanggung jawab terkait.
    public function checkout(Request $request): RedirectResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $data untuk proses berikutnya.
        $data = $request->validate([
            // Menetapkan nilai untuk kunci identifier pada array atau konfigurasi.
            'identifier' => ['required', 'string', 'max:60'],
            // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
            'payment_method' => ['required', 'in:tunai,qris,kartu_debit'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ], [
            // Menetapkan nilai untuk kunci payment_method.required pada array atau konfigurasi.
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            // Menetapkan nilai untuk kunci payment_method.in pada array atau konfigurasi.
            'payment_method.in' => 'Metode pembayaran yang dipilih tidak valid.',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
        // Menyimpan atau memperbarui nilai variabel $identifier untuk proses berikutnya.
        $identifier = trim($data['identifier']);
        // Menyimpan atau memperbarui nilai variabel $transaction untuk proses berikutnya.
        $transaction = Transaksi::with('kendaraan')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->where('status', 'berlangsung')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->where(function ($query) use ($identifier) {
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $query->where('transaction_number', $identifier)
                    // Menetapkan pasangan nilai atau callback pada struktur data ini.
                    ->orWhereHas('kendaraan', fn ($vehicleQuery) => $vehicleQuery->where('plate_number', Str::upper($identifier)));
            // Mengakhiri blok kelas, fungsi, atau kontrol alur.
            })
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->first();

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! $transaction) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return back()->withErrors(['identifier' => 'Kendaraan aktif tidak ditemukan. Periksa nomor plat atau kode tiket.'])->withInput();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menyimpan atau memperbarui nilai variabel $tarif untuk proses berikutnya.
        $tarif = Tarif::whereRaw('LOWER(vehicle_type) = ?', [strtolower($transaction->kendaraan->vehicle_type)])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->where('is_active', true)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->first();

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if (! $tarif) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return back()->withErrors(['identifier' => 'Tarif aktif untuk jenis kendaraan ini tidak tersedia.'])->withInput();
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menyimpan atau memperbarui nilai variabel $exitAt untuk proses berikutnya.
        $exitAt = now();
        // Menyimpan atau memperbarui nilai variabel $durationMinutes untuk proses berikutnya.
        $durationMinutes = max(1, (int) ceil($transaction->entry_at->diffInSeconds($exitAt) / 60));
        // Menyimpan atau memperbarui nilai variabel $hours untuk proses berikutnya.
        $hours = max(1, (int) ceil($durationMinutes / 60));
        // Menyimpan atau memperbarui nilai variabel $dayBlocks untuk proses berikutnya.
        $dayBlocks = max(1, (int) ceil($durationMinutes / 1440));
        // Menyimpan atau memperbarui nilai variabel $fee untuk proses berikutnya.
        $fee = min($hours * $tarif->hourly_rate, $dayBlocks * $tarif->daily_max_rate);

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        DB::transaction(function () use ($transaction, $exitAt, $durationMinutes, $fee, $request, $data) {
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            $transaction->update([
                // Menetapkan nilai untuk kunci exit_at pada array atau konfigurasi.
                'exit_at' => $exitAt,
                // Menetapkan nilai untuk kunci exit_user_id pada array atau konfigurasi.
                'exit_user_id' => $request->user()->id,
                // Menetapkan nilai untuk kunci duration_minutes pada array atau konfigurasi.
                'duration_minutes' => $durationMinutes,
                // Menetapkan nilai untuk kunci total_fee pada array atau konfigurasi.
                'total_fee' => $fee,
                // Menetapkan nilai untuk kunci payment_method pada array atau konfigurasi.
                'payment_method' => $data['payment_method'],
                // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
                'status' => 'selesai',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]);
            // Menetapkan nilai untuk kunci exit_at pada array atau konfigurasi.
            $transaction->kendaraan->update(['exit_at' => $exitAt, 'fee' => $fee]);
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        });

        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        ActivityLogger::record('Kendaraan keluar', "Menyelesaikan transaksi {$transaction->transaction_number} untuk {$transaction->kendaraan->plate_number}.");

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return redirect()->route('petugas.transaksi.receipt', $transaction);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi receipt untuk menjalankan tanggung jawab terkait.
    public function receipt(Request $request, Transaksi $transaksi): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        abort_unless($transaksi->status === 'selesai', 404);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('petugas.receipt', ['transaksi' => $transaksi->load(['kendaraan', 'petugas', 'petugasKeluar'])]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}