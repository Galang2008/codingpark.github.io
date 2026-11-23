<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\AreaParkir;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\Transaksi;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Database\Eloquent\Builder;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\JsonResponse;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Response;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Carbon;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Facades\DB;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas OwnerDashboardController untuk mengelompokkan perilaku terkait.
class OwnerDashboardController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $from untuk proses berikutnya.
        $from = now()->startOfMonth();
        // Menyimpan atau memperbarui nilai variabel $to untuk proses berikutnya.
        $to = now()->endOfDay();

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('owner.dashboard', [
            // Menetapkan nilai untuk kunci from pada array atau konfigurasi.
            'from' => $from->toDateString(),
            // Menetapkan nilai untuk kunci to pada array atau konfigurasi.
            'to' => $to->toDateString(),
            // Menetapkan nilai untuk kunci report pada array atau konfigurasi.
            'report' => $this->makeReport($from, $to),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi getRekapData untuk menjalankan tanggung jawab terkait.
    public function getRekapData(Request $request): JsonResponse
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $filters untuk proses berikutnya.
        $filters = $request->validate([
            // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
            'dari' => ['required', 'date_format:Y-m-d'],
            // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
            'sampai' => ['required', 'date_format:Y-m-d', 'after_or_equal:dari'],
            // Menetapkan nilai untuk kunci search pada array atau konfigurasi.
            'search' => ['nullable', 'string', 'max:80'],
            // Menetapkan nilai untuk kunci page pada array atau konfigurasi.
            'page' => ['nullable', 'integer', 'min:1'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ], [
            // Menetapkan nilai untuk kunci dari.required pada array atau konfigurasi.
            'dari.required' => 'Tanggal mulai wajib diisi.',
            // Menetapkan nilai untuk kunci dari.date_format pada array atau konfigurasi.
            'dari.date_format' => 'Format tanggal mulai tidak valid.',
            // Menetapkan nilai untuk kunci sampai.required pada array atau konfigurasi.
            'sampai.required' => 'Tanggal akhir wajib diisi.',
            // Menetapkan nilai untuk kunci sampai.date_format pada array atau konfigurasi.
            'sampai.date_format' => 'Format tanggal akhir tidak valid.',
            // Menetapkan nilai untuk kunci sampai.after_or_equal pada array atau konfigurasi.
            'sampai.after_or_equal' => 'Tanggal akhir harus sama dengan atau setelah tanggal mulai.',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return response()->json($this->makeReport(
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            Carbon::createFromFormat('Y-m-d', $filters['dari'])->startOfDay(),
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            Carbon::createFromFormat('Y-m-d', $filters['sampai'])->endOfDay(),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            trim($filters['search'] ?? ''),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            (int) ($filters['page'] ?? 1),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi exportExcel untuk menjalankan tanggung jawab terkait.
    public function exportExcel(Request $request): Response
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $filters untuk proses berikutnya.
        $filters = $request->validate([
            // Menetapkan nilai untuk kunci dari pada array atau konfigurasi.
            'dari' => ['required', 'date_format:Y-m-d'],
            // Menetapkan nilai untuk kunci sampai pada array atau konfigurasi.
            'sampai' => ['required', 'date_format:Y-m-d', 'after_or_equal:dari'],
            // Menetapkan nilai untuk kunci search pada array atau konfigurasi.
            'search' => ['nullable', 'string', 'max:80'],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);

        // Menyimpan atau memperbarui nilai variabel $from untuk proses berikutnya.
        $from = Carbon::createFromFormat('Y-m-d', $filters['dari'])->startOfDay();
        // Menyimpan atau memperbarui nilai variabel $to untuk proses berikutnya.
        $to = Carbon::createFromFormat('Y-m-d', $filters['sampai'])->endOfDay();
        // Menyimpan atau memperbarui nilai variabel $transactions untuk proses berikutnya.
        $transactions = $this->transactionQuery($from, $to, trim($filters['search'] ?? ''))
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->with(['kendaraan', 'petugas'])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->latest('entry_at')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->get();

        // Menyimpan atau memperbarui nilai variabel $csv untuk proses berikutnya.
        $csv = fopen('php://temp', 'r+');
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($csv === false) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            abort(500, 'File ekspor tidak dapat dibuat.');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        fwrite($csv, "\xEF\xBB\xBF");
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        fputcsv($csv, ['Plat Nomor', 'Jenis Kendaraan', 'Waktu Masuk', 'Waktu Keluar', 'Durasi (menit)', 'Tarif (Rp)', 'Metode Pembayaran', 'Status', 'Nama Petugas'], ';');
        // Mengulang proses untuk setiap data atau selama kondisi terpenuhi.
        foreach ($transactions as $transaction) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            fputcsv($csv, [
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->kendaraan?->plate_number ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->kendaraan?->vehicle_type ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->entry_at?->format('d-m-Y H:i') ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->exit_at?->format('d-m-Y H:i') ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->duration_minutes ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->total_fee,
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $this->paymentMethodLabel($transaction->payment_method),
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->status,
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $transaction->petugas?->name ?? '-',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ], ';');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        rewind($csv);
        // Menyimpan atau memperbarui nilai variabel $contents untuk proses berikutnya.
        $contents = stream_get_contents($csv);
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        fclose($csv);

        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($contents === false) {
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            abort(500, 'File ekspor tidak dapat dibaca.');
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return response($contents, 200, [
            // Menetapkan nilai untuk kunci Content-Type pada array atau konfigurasi.
            'Content-Type' => 'text/csv; charset=UTF-8',
            // Menetapkan nilai untuk kunci Content-Disposition pada array atau konfigurasi.
            'Content-Disposition' => 'attachment; filename="rekap-transaksi-codingpark.csv"',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ]);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi makeReport untuk menjalankan tanggung jawab terkait.
    private function makeReport(Carbon $from, Carbon $to, string $search = '', int $page = 1): array
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menyimpan atau memperbarui nilai variabel $rangeDays untuk proses berikutnya.
        $rangeDays = $from->copy()->startOfDay()->diffInDays($to->copy()->startOfDay()) + 1;
        // Menyimpan atau memperbarui nilai variabel $previousFrom untuk proses berikutnya.
        $previousFrom = $from->copy()->subDays($rangeDays);
        // Menyimpan atau memperbarui nilai variabel $previousTo untuk proses berikutnya.
        $previousTo = $from->copy()->subSecond();
        // Menyimpan atau memperbarui nilai variabel $currentStats untuk proses berikutnya.
        $currentStats = $this->aggregateTransactions($from, $to);
        // Menyimpan atau memperbarui nilai variabel $previousStats untuk proses berikutnya.
        $previousStats = $this->aggregateTransactions($previousFrom, $previousTo);
        // Menyimpan atau memperbarui nilai variabel $today untuk proses berikutnya.
        $today = now()->startOfDay();
        // Menyimpan atau memperbarui nilai variabel $todayEntered untuk proses berikutnya.
        $todayEntered = Transaksi::whereBetween('entry_at', [$today, $today->copy()->endOfDay()])->count();
        // Menyimpan atau memperbarui nilai variabel $yesterdayEntered untuk proses berikutnya.
        $yesterdayEntered = Transaksi::whereBetween('entry_at', [$today->copy()->subDay(), $today->copy()->subSecond()])->count();
        // Menyimpan atau memperbarui nilai variabel $occupied untuk proses berikutnya.
        $occupied = AreaParkir::exists()
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ? AreaParkir::sum('occupied')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            : Transaksi::where('status', 'berlangsung')->count();
        // Menyimpan atau memperbarui nilai variabel $periodOccupied untuk proses berikutnya.
        $periodOccupied = Transaksi::where('status', 'berlangsung')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->whereBetween('entry_at', [$from, $to])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->count();

        // Menyimpan atau memperbarui nilai variabel $daily untuk proses berikutnya.
        $daily = DB::table('transaksis')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->selectRaw('DATE(entry_at) as tanggal, SUM(total_fee) as pendapatan, COUNT(*) as jumlah')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->whereBetween('entry_at', [$from, $to])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->groupBy('tanggal')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->orderBy('tanggal')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->get();

        // Menyimpan atau memperbarui nilai variabel $transactions untuk proses berikutnya.
        $transactions = $this->transactionQuery($from, $to, $search)
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->with(['kendaraan', 'petugas'])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->latest('entry_at')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->paginate(8, ['*'], 'page', $page);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return [
            // Menetapkan nilai untuk kunci cards pada array atau konfigurasi.
            'cards' => [
                // Menetapkan nilai untuk kunci pendapatan pada array atau konfigurasi.
                'pendapatan' => [
                    // Menetapkan nilai untuk kunci value pada array atau konfigurasi.
                    'value' => (int) $currentStats->pendapatan,
                    // Menetapkan nilai untuk kunci change pada array atau konfigurasi.
                    'change' => $this->percentageChange((int) $currentStats->pendapatan, (int) $previousStats->pendapatan),
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ],
                // Menetapkan nilai untuk kunci transaksi pada array atau konfigurasi.
                'transaksi' => [
                    // Menetapkan nilai untuk kunci value pada array atau konfigurasi.
                    'value' => (int) $currentStats->jumlah,
                    // Menetapkan nilai untuk kunci change pada array atau konfigurasi.
                    'change' => $this->percentageChange((int) $currentStats->jumlah, (int) $previousStats->jumlah),
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ],
                // Menetapkan nilai untuk kunci masuk_hari_ini pada array atau konfigurasi.
                'masuk_hari_ini' => [
                    // Menetapkan nilai untuk kunci value pada array atau konfigurasi.
                    'value' => $todayEntered,
                    // Menetapkan nilai untuk kunci change pada array atau konfigurasi.
                    'change' => $this->percentageChange($todayEntered, $yesterdayEntered),
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ],
                // Menetapkan nilai untuk kunci terisi pada array atau konfigurasi.
                'terisi' => [
                    // Menetapkan nilai untuk kunci value pada array atau konfigurasi.
                    'value' => (int) $occupied,
                    // Menetapkan nilai untuk kunci change pada array atau konfigurasi.
                    'change' => $this->percentageChange($periodOccupied, (int) $previousStats->berlangsung),
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ],
                // Menetapkan nilai untuk kunci rata_rata_tarif pada array atau konfigurasi.
                'rata_rata_tarif' => (int) $currentStats->rata_rata,
                // Menetapkan nilai untuk kunci kendaraan_masuk pada array atau konfigurasi.
                'kendaraan_masuk' => (int) $currentStats->jumlah,
                // Menetapkan nilai untuk kunci kendaraan_keluar pada array atau konfigurasi.
                'kendaraan_keluar' => (int) Transaksi::whereBetween('exit_at', [$from, $to])->count(),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci chart pada array atau konfigurasi.
            'chart' => [
                // Menetapkan nilai untuk kunci labels pada array atau konfigurasi.
                'labels' => $daily->map(fn ($row) => Carbon::parse($row->tanggal)->locale('id')->translatedFormat('d M'))->all(),
                // Menetapkan nilai untuk kunci pendapatan pada array atau konfigurasi.
                'pendapatan' => $daily->map(fn ($row) => (int) $row->pendapatan)->all(),
                // Menetapkan nilai untuk kunci kendaraan pada array atau konfigurasi.
                'kendaraan' => $daily->map(fn ($row) => (int) $row->jumlah)->all(),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci petugas_teraktif pada array atau konfigurasi.
            'petugas_teraktif' => Transaksi::query()
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->select('user_id', DB::raw('COUNT(*) as total_transaksi'))
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->with('petugas:id,name')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->whereBetween('entry_at', [$from, $to])
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->groupBy('user_id')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->orderByDesc('total_transaksi')
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->limit(3)
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->get()
                // Menetapkan pasangan nilai atau callback pada struktur data ini.
                ->map(fn (Transaksi $transaction) => [
                    // Menetapkan nilai untuk kunci nama pada array atau konfigurasi.
                    'nama' => $transaction->petugas?->name ?? 'Petugas tidak tersedia',
                    // Menetapkan nilai untuk kunci jumlah pada array atau konfigurasi.
                    'jumlah' => (int) $transaction->total_transaksi,
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ])
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ->all(),
            // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
            'table' => [
                // Menetapkan nilai untuk kunci data pada array atau konfigurasi.
                'data' => $transactions->getCollection()->map(fn (Transaksi $transaction) => [
                    // Menetapkan nilai untuk kunci plat pada array atau konfigurasi.
                    'plat' => $transaction->kendaraan?->plate_number ?? '-',
                    // Menetapkan nilai untuk kunci jenis pada array atau konfigurasi.
                    'jenis' => $transaction->kendaraan?->vehicle_type ?? '-',
                    // Menetapkan nilai untuk kunci masuk pada array atau konfigurasi.
                    'masuk' => $transaction->entry_at?->locale('id')->translatedFormat('d M Y, H:i') ?? '-',
                    // Menetapkan nilai untuk kunci keluar pada array atau konfigurasi.
                    'keluar' => $transaction->exit_at?->locale('id')->translatedFormat('d M Y, H:i') ?? '-',
                    // Menetapkan nilai untuk kunci durasi pada array atau konfigurasi.
                    'durasi' => $transaction->duration_minutes,
                    // Menetapkan nilai untuk kunci tarif pada array atau konfigurasi.
                    'tarif' => (int) $transaction->total_fee,
                    // Menetapkan nilai untuk kunci pembayaran pada array atau konfigurasi.
                    'pembayaran' => $this->paymentMethodLabel($transaction->payment_method),
                    // Menetapkan nilai untuk kunci status pada array atau konfigurasi.
                    'status' => $transaction->status,
                    // Menetapkan nilai untuk kunci petugas pada array atau konfigurasi.
                    'petugas' => $transaction->petugas?->name ?? '-',
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                ])->all(),
                // Menetapkan nilai untuk kunci current_page pada array atau konfigurasi.
                'current_page' => $transactions->currentPage(),
                // Menetapkan nilai untuk kunci last_page pada array atau konfigurasi.
                'last_page' => $transactions->lastPage(),
                // Menetapkan nilai untuk kunci total pada array atau konfigurasi.
                'total' => $transactions->total(),
                // Menetapkan nilai untuk kunci from pada array atau konfigurasi.
                'from' => $transactions->firstItem(),
                // Menetapkan nilai untuk kunci to pada array atau konfigurasi.
                'to' => $transactions->lastItem(),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ];
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi aggregateTransactions untuk menjalankan tanggung jawab terkait.
    private function aggregateTransactions(Carbon $from, Carbon $to): object
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return Transaksi::query()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->whereBetween('entry_at', [$from, $to])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->selectRaw('COUNT(*) as jumlah, COALESCE(SUM(total_fee), 0) as pendapatan, COALESCE(AVG(CASE WHEN status = \'selesai\' THEN total_fee END), 0) as rata_rata')
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->selectRaw("SUM(CASE WHEN status = 'berlangsung' THEN 1 ELSE 0 END) as berlangsung")
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->first();
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi transactionQuery untuk menjalankan tanggung jawab terkait.
    private function transactionQuery(Carbon $from, Carbon $to, string $search = ''): Builder
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return Transaksi::query()
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->whereBetween('entry_at', [$from, $to])
            // Memanggil metode atau mengakses properti objek yang dibutuhkan.
            ->when($search !== '', function (Builder $query) use ($search): void {
                // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                $query->where(function (Builder $query) use ($search): void {
                    // Memanggil metode atau mengakses properti objek yang dibutuhkan.
                    $query->where('transaction_number', 'like', '%'.$search.'%')
                        // Menetapkan pasangan nilai atau callback pada struktur data ini.
                        ->orWhereHas('kendaraan', fn (Builder $vehicleQuery) => $vehicleQuery->where('plate_number', 'like', '%'.$search.'%')->orWhere('vehicle_type', 'like', '%'.$search.'%'))
                        // Menetapkan pasangan nilai atau callback pada struktur data ini.
                        ->orWhereHas('petugas', fn (Builder $userQuery) => $userQuery->where('name', 'like', '%'.$search.'%'));
                // Mengakhiri blok kelas, fungsi, atau kontrol alur.
                });
            // Mengakhiri blok kelas, fungsi, atau kontrol alur.
            });
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi percentageChange untuk menjalankan tanggung jawab terkait.
    private function percentageChange(int $current, int $previous): int
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menentukan cabang logika berdasarkan kondisi atau nilai.
        if ($previous === 0) {
            // Mengembalikan nilai atau hasil dari fungsi ini.
            return $current === 0 ? 0 : 100;
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        }

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return (int) round((($current - $previous) / $previous) * 100);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }

    // Mendefinisikan fungsi paymentMethodLabel untuk menjalankan tanggung jawab terkait.
    private function paymentMethodLabel(?string $method): string
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return match ($method) {
            // Menetapkan nilai untuk kunci tunai pada array atau konfigurasi.
            'tunai' => 'Tunai',
            // Menetapkan nilai untuk kunci qris pada array atau konfigurasi.
            'qris' => 'QRIS',
            // Menetapkan nilai untuk kunci kartu_debit pada array atau konfigurasi.
            'kartu_debit' => 'Kartu debit',
            // Menentukan cabang logika berdasarkan kondisi atau nilai.
            default => 'Belum dicatat',
        // Mengakhiri blok kelas, fungsi, atau kontrol alur.
        };
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
