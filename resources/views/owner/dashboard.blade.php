{{-- Mendefinisikan elemen atau instruksi markup halaman. --}}
<!DOCTYPE html>
{{-- Membuka elemen <html> untuk menyusun bagian antarmuka. --}}
<html lang="id">
{{-- Membuka elemen <head> untuk menyusun bagian antarmuka. --}}
<head>
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta charset="UTF-8">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Membuka elemen <title> untuk menyusun bagian antarmuka. --}}
    <title>Dashboard Owner | CodingPARK</title>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://unpkg.com/lucide@0.468.0"></script>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    {{-- Menjalankan direktif Blade @vite untuk menyusun tampilan. --}}
    @vite(['resources/css/owner.css', 'resources/js/owner-dashboard.js'])
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</head>
{{-- Membuka elemen <body> untuk menyusun bagian antarmuka. --}}
<body class="owner-shell">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="owner-app" data-owner-dashboard data-endpoint="{{ route('owner.rekap') }}" data-export="{{ route('owner.export') }}">
        {{-- Membuka elemen <aside> untuk menyusun bagian antarmuka. --}}
        <aside class="owner-sidebar" data-sidebar>
            {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
            <a class="owner-brand" href="{{ route('owner.dashboard') }}"><span class="owner-brand-mark"><i data-lucide="square-parking"></i></span><span>Coding<span>PARK</span></span></a>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="sidebar-caption">MENU UTAMA</div>
            {{-- Membuka elemen <nav> untuk menyusun bagian antarmuka. --}}
            <nav class="owner-nav" aria-label="Navigasi utama">
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="owner-nav-link active" href="{{ route('owner.dashboard') }}"><i data-lucide="layout-dashboard"></i><span>Dashboard</span></a>
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="owner-nav-link" href="#rekap"><i data-lucide="receipt-text"></i><span>Rekap Transaksi</span></a>
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="owner-nav-link is-placeholder" href="#rekap" aria-label="Laporan, lihat rekap transaksi"><i data-lucide="chart-no-axes-column-increasing"></i><span>Laporan</span><small>Segera</small></a>
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="owner-nav-link is-placeholder" href="#pengaturan" aria-label="Pengaturan, segera hadir"><i data-lucide="settings-2"></i><span>Pengaturan</span><small>Segera</small></a>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </nav>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="sidebar-bottom">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="sidebar-account"><span class="owner-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>Owner</small></span></div>
                {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                <button class="collapse-button" type="button" data-collapse aria-label="Ciutkan sidebar"><i data-lucide="panel-left-close"></i></button>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </aside>

        {{-- Membuka elemen <main> untuk menyusun bagian antarmuka. --}}
        <main class="owner-main">
            {{-- Membuka elemen <header> untuk menyusun bagian antarmuka. --}}
            <header class="owner-topbar">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="topbar-title">
                    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                    <button class="topbar-icon mobile-menu" type="button" data-menu-toggle aria-label="Buka navigasi"><i data-lucide="menu"></i></button>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><span class="topbar-kicker">SISTEM MANAJEMEN PARKIR</span><h1>Dashboard</h1></div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="topbar-actions">
                    {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                    <label class="top-search"><i data-lucide="search"></i><input type="search" data-table-search placeholder="Cari plat, petugas..." aria-label="Cari transaksi"></label>
                    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                    <button class="topbar-icon notification-icon" type="button" aria-label="Notifikasi"><i data-lucide="bell"></i><span></span></button>
                    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                    <button class="topbar-icon" type="button" data-theme-toggle aria-label="Ganti tema"><i data-lucide="moon"></i></button>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="profile-menu-wrap">
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button class="profile-trigger" type="button" data-profile-toggle aria-expanded="false">
                            {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                            <span class="owner-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                            <span class="profile-copy"><strong>{{ auth()->user()->name }}</strong><small>Owner</small></span>
                            {{-- Membuka elemen <i> untuk menyusun bagian antarmuka. --}}
                            <i data-lucide="chevron-down"></i>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </button>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="profile-dropdown" data-profile-dropdown>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->email }}</small></div>
                            {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
                            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin keluar dari CodingPARK?')">
                                {{-- Menyertakan token perlindungan formulir. --}}
                                @csrf
                                {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                                <button type="submit"><i data-lucide="log-out"></i>Keluar</button>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </form>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </header>

            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="owner-content">
                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="welcome-row">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><span class="section-kicker">RINGKASAN OPERASIONAL</span><h2>Selamat datang, {{ Str::before(auth()->user()->name, ' ') }}.</h2><p>Pantau performa dan aktivitas parkir Anda dalam satu pandangan.</p></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="today-label"><i data-lucide="calendar-days"></i><span>{{ now()->locale('id')->translatedFormat('l, d F Y') }}</span></div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="stat-grid" aria-label="Ringkasan statistik">
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="owner-stat-card"><div class="stat-heading"><span class="stat-icon blue"><i data-lucide="wallet"></i></span><span class="stat-change" data-change="pendapatan">0%</span></div><p>Total Pendapatan</p><strong data-card="pendapatan">Rp 0</strong><small>pada rentang terpilih</small></article>
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="owner-stat-card"><div class="stat-heading"><span class="stat-icon cyan"><i data-lucide="receipt"></i></span><span class="stat-change" data-change="transaksi">0%</span></div><p>Total Transaksi</p><strong data-card="transaksi">0</strong><small>pada rentang terpilih</small></article>
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="owner-stat-card"><div class="stat-heading"><span class="stat-icon violet"><i data-lucide="car-front"></i></span><span class="stat-change" data-change="masuk_hari_ini">0%</span></div><p>Kendaraan Masuk Hari Ini</p><strong data-card="masuk_hari_ini">0</strong><small>dibandingkan kemarin</small></article>
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="owner-stat-card"><div class="stat-heading"><span class="stat-icon green"><i data-lucide="square-parking"></i></span><span class="stat-change" data-change="terisi">0%</span></div><p>Slot Parkir Terisi</p><strong data-card="terisi">0</strong><small>slot terpantau saat ini</small></article>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="panel filter-panel" aria-labelledby="filter-title">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="panel-heading filter-heading"><div><h3 id="filter-title">Filter Rentang Waktu</h3><p>Perbarui seluruh ringkasan berdasarkan periode pilihan.</p></div><span class="live-status"><i></i>Data diperbarui langsung</span></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="filter-controls">
                        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                        <label class="date-field"><span>Dari tanggal</span><input type="date" data-date-from value="{{ $from }}"></label>
                        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                        <span class="date-separator">—</span>
                        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                        <label class="date-field"><span>Sampai tanggal</span><input type="date" data-date-to value="{{ $to }}"></label>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button class="button button-primary" type="button" data-apply-filter><i data-lucide="filter"></i>Terapkan</button>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="quick-filters" role="group" aria-label="Filter cepat">
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="today">Hari Ini</button>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="week">Minggu Ini</button>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="month" class="selected">Bulan Ini</button>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="last-month">Bulan Lalu</button>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="year">Tahun Ini</button>
                        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                        <button type="button" data-period="custom">Kustom</button>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                    <p class="filter-error" data-filter-error role="alert" hidden></p>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="summary-strip" aria-label="Rincian kendaraan"><span><i data-lucide="log-in"></i>Masuk pada periode <strong data-summary="kendaraan_masuk">0</strong></span><span><i data-lucide="log-out"></i>Keluar pada periode <strong data-summary="kendaraan_keluar">0</strong></span><span><i data-lucide="badge-percent"></i>Rata-rata tarif <strong data-summary="rata_rata_tarif">Rp 0</strong></span></section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="charts-grid" aria-label="Grafik transaksi">
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="panel chart-panel"><div class="panel-heading"><div><h3>Tren Pendapatan</h3><p>Pergerakan pendapatan harian sesuai rentang waktu</p></div><span class="chart-badge"><i data-lucide="trending-up"></i>Per hari</span></div><div class="chart-canvas revenue-chart"><canvas data-revenue-chart aria-label="Grafik tren pendapatan"></canvas></div></article>
                    {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                    <article class="panel chart-panel vehicle-chart-panel"><div class="panel-heading"><div><h3>Jumlah Kendaraan</h3><p>Kendaraan masuk per hari</p></div><span class="chart-badge cyan-badge"><i data-lucide="car-front"></i>Per hari</span></div><div class="chart-canvas vehicle-chart"><canvas data-vehicle-chart aria-label="Grafik jumlah kendaraan"></canvas></div><div class="chart-footnote"><span><i></i>Kendaraan masuk</span><strong data-vehicle-total>0 kendaraan</strong></div></article>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="panel table-panel" id="rekap">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="panel-heading table-heading"><div><h3>Rincian Transaksi</h3><p>Daftar transaksi parkir pada periode yang dipilih.</p></div><div class="export-actions"><button class="button button-outline" type="button" data-export-excel><i data-lucide="file-spreadsheet"></i>Export Excel</button><button class="button button-outline" type="button" data-export-pdf><i data-lucide="file-text"></i>Simpan PDF</button></div></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="table-toolbar"><span data-table-count>Menampilkan 0 transaksi</span><label class="table-search"><i data-lucide="search"></i><input type="search" data-table-search-secondary placeholder="Cari transaksi..." aria-label="Cari transaksi pada tabel"></label></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="table-scroll"><table><thead><tr><th>PLAT NOMOR</th><th>JENIS</th><th>WAKTU MASUK</th><th>WAKTU KELUAR</th><th>DURASI</th><th>TARIF</th><th>METODE BAYAR</th><th>STATUS</th><th>PETUGAS</th></tr></thead><tbody data-transaction-rows>
                        {{-- Menjalankan direktif Blade @forelse untuk menyusun tampilan. --}}
                        @forelse ($report['table']['data'] as $transaction)
                            {{-- Membuka elemen <tr> untuk menyusun bagian antarmuka. --}}
                            <tr><td><strong>{{ $transaction['plat'] }}</strong></td><td>{{ ucfirst($transaction['jenis']) }}</td><td>{{ $transaction['masuk'] }}</td><td>{{ $transaction['keluar'] }}</td><td>{{ $transaction['durasi'] ? floor($transaction['durasi'] / 60).'j '.($transaction['durasi'] % 60).'m' : '—' }}</td><td>Rp {{ number_format($transaction['tarif'], 0, ',', '.') }}</td><td>{{ $transaction['pembayaran'] }}</td><td><span class="status-badge {{ $transaction['status'] === 'selesai' ? 'status-done' : 'status-active' }}">{{ $transaction['status'] === 'selesai' ? 'Selesai' : 'Masih parkir' }}</span></td><td>{{ $transaction['petugas'] }}</td></tr>
                        {{-- Menjalankan direktif Blade @empty untuk menyusun tampilan. --}}
                        @empty
                            {{-- Membuka elemen <tr> untuk menyusun bagian antarmuka. --}}
                            <tr><td class="empty-row" colspan="9">Belum ada transaksi pada rentang waktu ini.</td></tr>
                        {{-- Menjalankan direktif Blade @endforelse untuk menyusun tampilan. --}}
                        @endforelse
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </tbody></table></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="table-pagination"><span data-pagination-label>Menampilkan {{ $report['table']['from'] ?? 0 }}–{{ $report['table']['to'] ?? 0 }} dari {{ $report['table']['total'] }} transaksi</span><div><button type="button" data-page-prev aria-label="Halaman sebelumnya" disabled><i data-lucide="chevron-left"></i></button><span data-page-number>1 / {{ $report['table']['last_page'] }}</span><button type="button" data-page-next aria-label="Halaman berikutnya" {{ $report['table']['last_page'] <= 1 ? 'disabled' : '' }}><i data-lucide="chevron-right"></i></button></div></div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </section>

                {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
                <section class="panel officers-panel"><div class="panel-heading"><div><h3>Petugas Teraktif</h3><p>Petugas dengan transaksi masuk terbanyak pada periode ini.</p></div><span class="chart-badge"><i data-lucide="users-round"></i>Top 3</span></div><div class="officers-list" data-officers>
                    {{-- Menjalankan direktif Blade @forelse untuk menyusun tampilan. --}}
                    @forelse ($report['petugas_teraktif'] as $index => $officer)
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="officer-row"><span class="officer-rank">{{ $index + 1 }}</span><span class="owner-avatar small-avatar">{{ strtoupper(substr($officer['nama'], 0, 1)) }}</span><strong>{{ $officer['nama'] }}</strong><span>{{ number_format($officer['jumlah'], 0, ',', '.') }} transaksi</span></div>
                    {{-- Menjalankan direktif Blade @empty untuk menyusun tampilan. --}}
                    @empty
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p class="empty-officers">Belum ada transaksi pada periode ini.</p>
                    {{-- Menjalankan direktif Blade @endforelse untuk menyusun tampilan. --}}
                    @endforelse
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div></section>
                {{-- Membuka elemen <footer> untuk menyusun bagian antarmuka. --}}
                <footer class="owner-footer">© {{ now()->year }} CodingPARK <span>•</span> Dashboard pemantauan owner</footer>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </main>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script>
        {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
        window.ownerDashboardInitial = @json($report, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </script>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</body>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</html>
