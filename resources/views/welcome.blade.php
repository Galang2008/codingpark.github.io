{{-- Mendefinisikan elemen atau instruksi markup halaman. --}}
<!DOCTYPE html>
{{-- Membuka elemen <html> untuk menyusun bagian antarmuka. --}}
<html lang="id">

{{-- Membuka elemen <head> untuk menyusun bagian antarmuka. --}}
<head>
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta charset="UTF-8">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="description"
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        content="CodingPARK adalah sistem manajemen parkir internal untuk Admin, Petugas, dan Owner.">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="theme-color" content="#0b1f4d">
    {{-- Membuka elemen <title> untuk menyusun bagian antarmuka. --}}
    <title>CodingPARK | Kelola Parkir Lebih Cerdas</title>
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link
        {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        rel="stylesheet">
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://unpkg.com/lucide@0.468.0"></script>
    {{-- Menjalankan direktif Blade @vite untuk menyusun tampilan. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</head>

{{-- Membuka elemen <body> untuk menyusun bagian antarmuka. --}}
<body>
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="skip-link" href="#main-content">Lewati ke konten utama</a>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="site-shell">
        <!-- Navbar -->
        {{-- Membuka elemen <header> untuk menyusun bagian antarmuka. --}}
        <header class="site-header">
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="container nav-wrap"><a class="brand" href="#beranda" aria-label="CodingPARK beranda"><span
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        class="brand-mark"><i
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            data-lucide="square-parking"></i></span><span>Coding<span>PARK</span></span></a><button
                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                    class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" data-menu-toggle><i
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        data-lucide="menu"></i><span class="sr-only">Buka menu</span></button>
                {{-- Membuka elemen <nav> untuk menyusun bagian antarmuka. --}}
                <nav class="main-nav" id="main-nav" data-nav aria-label="Navigasi utama"><a
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        href="#beranda">Beranda</a><a href="#fitur">Fitur</a><a href="#peran">Peran</a><a
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        href="#cara-kerja">Cara Kerja</a><a href="#faq">FAQ</a><a
                        {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
                        class="button button-small button-primary" href="{{ route('login') }}"><i data-lucide="log-in"></i>Masuk</a>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </nav>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </header>
        {{-- Membuka elemen <main> untuk menyusun bagian antarmuka. --}}
        <main id="main-content">
            <!-- Hero -->
            {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
            <section class="hero-section" id="beranda">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="hero-grid-pattern"></div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container hero-content">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="hero-copy reveal">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="eyebrow"><span class="pulse-dot"></span>Khusus Admin, Petugas &amp; Owner</div>
                        {{-- Membuka elemen <h1> untuk menyusun bagian antarmuka. --}}
                        <h1>Kelola parkir lebih <em>cerdas</em>, cepat, dan terkontrol.</h1>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p class="hero-lead">Satu sistem terintegrasi untuk pencatatan kendaraan, transaksi, dan insight
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            operasional parkir yang lebih tajam.</p>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="hero-actions"><a class="button button-primary" href="{{ route('login') }}">Masuk ke Sistem <i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="arrow-up-right"></i></a><a class="text-link" href="#fitur">Lihat fitur
                                {{-- Membuka elemen <i> untuk menyusun bagian antarmuka. --}}
                                <i data-lucide="arrow-down"></i></a></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="hero-proof"><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="proof-avatars"><b>AD</b><b>PT</b><b>OW</b></span><span>Dirancang untuk
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                operasional yang<br><strong>rapi, aman, dan terukur.</strong></span></div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="hero-visual reveal reveal-delay">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="visual-orbit orbit-one"></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="visual-orbit orbit-two"></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="dashboard-window floating">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="window-bar"><span class="window-dots"><i></i><i></i><i></i></span><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="window-title"><i data-lucide="shield-check"></i> codingpark.app</span><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="ellipsis"></i></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="dashboard-body">
                                {{-- Membuka elemen <aside> untuk menyusun bagian antarmuka. --}}
                                <aside class="dash-sidebar">
                                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                    <div class="mini-brand"><span class="brand-mark"><i
                                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                data-lucide="square-parking"></i></span></div><span
                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                        class="side-active"><i data-lucide="layout-dashboard"></i></span><span><i
                                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                            data-lucide="car-front"></i></span><span><i
                                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                            data-lucide="bar-chart-3"></i></span><span><i
                                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                            data-lucide="users"></i></span><span class="side-bottom"><i
                                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                            data-lucide="settings-2"></i></span>
                                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                </aside>
                                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                <div class="dash-main">
                                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                    <div class="dash-heading">
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div><small>Selamat pagi, Admin</small><strong>Ringkasan hari ini</strong></div>
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="dash-date"><i data-lucide="calendar-days"></i>24 Juni 2024</div>
                                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                    </div>
                                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                    <div class="metric-row">
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="metric-card"><span>Total
                                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                kendaraan</span><strong>1.284</strong><small class="up"><i
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    data-lucide="trending-up"></i>12,8% <b>vs kemarin</b></small></div>
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="metric-card"><span>Pendapatan hari ini</span><strong>Rp 8,6
                                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                jt</strong><small class="up"><i data-lucide="trending-up"></i>8,4% <b>vs
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    kemarin</b></small></div>
                                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                    </div>
                                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                    <div class="chart-card">
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="chart-title"><span>Aktivitas parkir</span><small>7 hari terakhir <i
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    data-lucide="chevron-down"></i></small></div>
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="chart">
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="chart-lines"><i></i><i></i><i></i><i></i></div><svg
                                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                viewBox="0 0 420 100" preserveAspectRatio="none"
                                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                aria-label="Grafik aktivitas parkir meningkat">
                                                {{-- Membuka elemen <defs> untuk menyusun bagian antarmuka. --}}
                                                <defs>
                                                    {{-- Membuka elemen <linearGradient> untuk menyusun bagian antarmuka. --}}
                                                    <linearGradient id="area" x1="0" x2="0" y1="0" y2="1">
                                                        {{-- Membuka elemen <stop> untuk menyusun bagian antarmuka. --}}
                                                        <stop offset="0" stop-color="#2563eb" stop-opacity=".28" />
                                                        {{-- Membuka elemen <stop> untuk menyusun bagian antarmuka. --}}
                                                        <stop offset="1" stop-color="#2563eb" stop-opacity="0" />
                                                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                                    </linearGradient>
                                                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                                </defs>
                                                {{-- Membuka elemen <path> untuk menyusun bagian antarmuka. --}}
                                                <path
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    d="M0,78 C30,76 40,60 65,65 S100,81 125,54 S160,49 185,58 S212,30 240,43 S270,66 295,41 S328,25 350,37 S385,17 420,22 V100 H0Z"
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    fill="url(#area)" />
                                                {{-- Membuka elemen <path> untuk menyusun bagian antarmuka. --}}
                                                <path
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    d="M0,78 C30,76 40,60 65,65 S100,81 125,54 S160,49 185,58 S212,30 240,43 S270,66 295,41 S328,25 350,37 S385,17 420,22"
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    fill="none" stroke="#2563eb" stroke-width="3"
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    stroke-linecap="round" />
                                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                            </svg>
                                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                        </div>
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="chart-labels">
                                            {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                                            <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                        </div>
                                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                    </div>
                                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                    <div class="dash-bottom">
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="activity-card">
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="chart-title"><span>Transaksi terbaru</span><i
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    data-lucide="more-horizontal"></i></div>
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="activity-line"><span class="activity-icon blue"><i
                                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                        data-lucide="car-front"></i></span><span><b>B 2145
                                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                        KTA</b><small>Keluar · 10:42</small></span><strong>Rp
                                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                    15.000</strong></div>
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="activity-line"><span class="activity-icon cyan"><i
                                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                        data-lucide="car-front"></i></span><span><b>D 8831
                                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                                        AA</b><small>Masuk · 10:39</small></span><strong>-</strong>
                                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                            </div>
                                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                        </div>
                                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                        <div class="occupancy-card">
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="chart-title"><span>Okupansi area</span></div>
                                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                            <div class="occupancy-content">
                                                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                                <div class="donut"><span>68%<small>terisi</small></span></div>
                                                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                                                <div><small><i class="legend blue-bg"></i>Terisi
                                                        {{-- Membuka elemen <b> untuk menyusun bagian antarmuka. --}}
                                                        <b>136</b></small><small><i class="legend gray-bg"></i>Tersedia
                                                        {{-- Membuka elemen <b> untuk menyusun bagian antarmuka. --}}
                                                        <b>64</b></small></div>
                                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                            </div>
                                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                        </div>
                                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                    </div>
                                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                                </div>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="float-note note-revenue"><span class="note-icon"><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="wallet-cards"></i></span><span><small>Pendapatan</small><b>+ Rp 2,4
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    jt</b></span><i data-lucide="trending-up"></i></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="float-note note-secure"><span class="secure-check"><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="check"></i></span><span><b>Akses terkendali</b><small>Role-based
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    security</small></span></div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container hero-stats reveal">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><strong>01</strong><span>Sistem terintegrasi<br>untuk tim Anda</span></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><strong>3</strong><span>Role dengan akses<br>sesuai tanggung jawab</span></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><strong>24/7</strong><span>Data operasional<br>tersimpan otomatis</span></div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- Fitur Unggulan -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="section features-section" id="fitur">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="section-heading reveal"><span class="section-kicker">FITUR UNGGULAN</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Semua yang Anda butuhkan<br><span>dalam satu kendali.</span></h2>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Kurangi proses manual, tingkatkan akurasi, dan buat setiap keputusan berdasarkan data yang
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            nyata.</p>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="feature-grid">
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon blue-icon"><i data-lucide="car-front"></i></div><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="feature-number">01</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Pencatatan kendaraan<br>masuk &amp; keluar</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Catat pergerakan kendaraan dengan cepat dan minim kesalahan.</p><a href="#cara-kerja"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                aria-label="Pelajari pencatatan kendaraan"><i data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal reveal-delay-1">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon cyan-icon"><i data-lucide="calculator"></i></div><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="feature-number">02</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Perhitungan tarif<br>otomatis</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Tarif parkir akurat berdasarkan durasi dan ketentuan yang berlaku.</p><a
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                href="#cara-kerja" aria-label="Pelajari perhitungan tarif"><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal reveal-delay-2">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon navy-icon"><i data-lucide="map-pin"></i></div><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="feature-number">03</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Monitoring slot parkir<br>real-time</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Pantau kapasitas setiap area parkir dari satu layar.</p><a href="#preview"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                aria-label="Pelajari monitoring slot parkir"><i data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon violet-icon"><i data-lucide="users-round"></i></div><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="feature-number">04</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Manajemen petugas<br>&amp; akun</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Kelola akun dan hak akses tim sesuai peran masing-masing.</p><a href="#peran"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                aria-label="Pelajari manajemen petugas"><i data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal reveal-delay-1">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon orange-icon"><i data-lucide="chart-no-axes-combined"></i></div>
                            {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                            <span class="feature-number">05</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Laporan pendapatan<br>harian &amp; bulanan</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Dapatkan ringkasan performa untuk keputusan yang lebih tepat.</p><a href="#preview"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                aria-label="Pelajari laporan pendapatan"><i data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="feature-card reveal reveal-delay-2">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="feature-icon green-icon"><i data-lucide="receipt-text"></i></div><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="feature-number">06</span>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Riwayat transaksi<br>&amp; cetak struk</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Temukan kembali transaksi dan berikan bukti pembayaran dengan mudah.</p><a
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                href="#cara-kerja" aria-label="Pelajari riwayat transaksi"><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="arrow-up-right"></i></a>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- Peran Pengguna -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="section roles-section" id="peran">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="section-heading split-heading reveal">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div><span class="section-kicker">DIBUAT UNTUK TIM ANDA</span>
                            {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                            <h2>Satu platform.<br><span>Tiga peran penting.</span></h2>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Setiap orang melihat hal yang relevan bagi pekerjaannya. Akses jelas, kolaborasi lancar,
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            operasional terkendali.</p>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="role-grid">
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="role-card role-admin reveal">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-top"><span class="role-icon"><i data-lucide="settings-2"></i></span><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="role-label">ROLE 01</span></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Admin</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Menjadi pusat kendali sistem dan konfigurasi operasional parkir.</p>
                            {{-- Membuka elemen <ul> untuk menyusun bagian antarmuka. --}}
                            <ul>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Kelola akun pengguna</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Atur tarif &amp; area parkir</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Pantau seluruh aktivitas</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Konfigurasi sistem</li>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </ul>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-footer">Akses penuh <i data-lucide="arrow-up-right"></i></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="role-card role-officer reveal reveal-delay-1">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-top"><span class="role-icon"><i data-lucide="scan-line"></i></span><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="role-label">ROLE 02</span></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Petugas</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Memastikan setiap kendaraan dan transaksi tercatat dengan akurat.</p>
                            {{-- Membuka elemen <ul> untuk menyusun bagian antarmuka. --}}
                            <ul>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Catat kendaraan masuk/keluar</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Hitung biaya parkir</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Cetak struk transaksi</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Lihat status slot</li>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </ul>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-footer">Akses operasional <i data-lucide="arrow-up-right"></i></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="role-card role-owner reveal reveal-delay-2">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-top"><span class="role-icon"><i data-lucide="presentation"></i></span><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="role-label">ROLE 03</span></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Owner</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Mendapatkan gambaran menyeluruh tentang performa bisnis parkir.</p>
                            {{-- Membuka elemen <ul> untuk menyusun bagian antarmuka. --}}
                            <ul>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Pantau pendapatan</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Akses laporan berkala</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Analisis performa parkir</li>
                                {{-- Membuka elemen <li> untuk menyusun bagian antarmuka. --}}
                                <li><i data-lucide="check"></i>Monitor tren operasional</li>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </ul>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="role-footer">Akses insight <i data-lucide="arrow-up-right"></i></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- Cara Kerja -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="section process-section" id="cara-kerja">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="section-heading center-heading reveal"><span class="section-kicker">ALUR YANG
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            SEDERHANA</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Mulai bekerja dalam<br><span>empat langkah.</span></h2>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="process-grid">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="process-line"></div>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="process-step reveal"><span class="step-number">01</span>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="step-icon"><i data-lucide="log-in"></i></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Login sesuai role</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Akses sistem dengan akun yang dibuat oleh Admin.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="process-step reveal reveal-delay-1"><span class="step-number">02</span>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="step-icon"><i data-lucide="scan-barcode"></i></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Catat kendaraan</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Input kendaraan masuk dan keluar secara real-time.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="process-step reveal reveal-delay-2"><span class="step-number">03</span>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="step-icon"><i data-lucide="calculator"></i></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Tarif terhitung</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Sistem menghitung biaya berdasarkan durasi parkir.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                        {{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
                        <article class="process-step reveal reveal-delay-3"><span class="step-number">04</span>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="step-icon"><i data-lucide="file-check-2"></i></div>
                            {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
                            <h3>Laporan tersimpan</h3>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Semua transaksi tersimpan dan siap dipantau.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </article>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- Preview Aplikasi -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="section preview-section" id="preview">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container preview-layout">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="preview-copy reveal"><span class="section-kicker">SATU SUMBER DATA</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Lihat apa yang<br><span>sedang terjadi.</span></h2>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Dashboard CodingPARK menyajikan informasi penting dalam tampilan yang ringkas, jelas, dan siap
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            ditindaklanjuti.</p>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-tabs" role="tablist" aria-label="Preview dashboard"><button
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="preview-tab active" type="button" role="tab" aria-selected="true"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                data-preview="admin">Admin</button><button class="preview-tab" type="button" role="tab"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                aria-selected="false" data-preview="petugas">Petugas</button><button class="preview-tab"
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                type="button" role="tab" aria-selected="false" data-preview="owner">Owner</button></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-caption"><span class="caption-icon"><i data-lucide="sparkles"></i></span>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p data-preview-copy>Kontrol penuh untuk konfigurasi dan aktivitas sistem.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="preview-screen reveal reveal-delay">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-header"><span class="preview-logo"><span class="brand-mark"><i
                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                        data-lucide="square-parking"></i></span><b>CodingPARK</b></span><span
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                class="preview-user"><i data-lucide="bell"></i><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-lucide="circle-user-round"></i><small>Admin</small></span></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-title"><span><small data-preview-greeting>Good morning, Admin</small><b
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    data-preview-title>Dashboard overview</b></span><span class="preview-filter">24 Jun
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                2026 <i data-lucide="chevron-down"></i></span></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-metrics">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><small>Total kendaraan</small><b data-preview-metric="vehicles">1.284</b><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="positive">+12,8%</span></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><small>Pendapatan</small><b data-preview-metric="revenue">Rp 8,6 jt</b><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="positive">+8,4%</span></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><small>Slot tersedia</small><b data-preview-metric="slots">64</b><span
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    class="neutral">dari 200</span></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-chart">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><b>Pendapatan mingguan</b><small>Rp 32,4 jt <span
                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                        class="positive">+14,2%</span></small></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="bar-chart"><i style="height:38%"></i><i style="height:55%"></i><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    style="height:45%"></i><i style="height:72%"></i><i style="height:62%"></i><i
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    style="height:88%"></i><i style="height:76%"></i><i style="height:100%"></i></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="bar-labels">
                                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span><span>Hari
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    ini</span></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="preview-bottom">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><b>Aktivitas terbaru</b><span><i class="table-dot green-dot"></i>Kendaraan keluar
                                    {{-- Membuka elemen <small> untuk menyusun bagian antarmuka. --}}
                                    <small>2 menit lalu</small></span><span><i class="table-dot blue-dot"></i>Pembayaran
                                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                    diterima <small>5 menit lalu</small></span></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div class="mini-progress"><b>Okupansi area</b><span><i></i></span><strong>68%</strong>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- Keamanan -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="security-section">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container security-wrap">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="security-illustration reveal">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="security-ring"><i data-lucide="shield-check"></i></div><span
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            class="security-orbit orbit-a"></span><span class="security-orbit orbit-b"></span><span
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            class="security-chip chip-a"><i data-lucide="lock-keyhole"></i></span><span
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            class="security-chip chip-b"><i data-lucide="fingerprint"></i></span>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="security-copy reveal reveal-delay"><span class="section-kicker">AMAN SECARA
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            DESAIN</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Setiap akses punya<br><span>tujuan dan batasnya.</span></h2>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Data operasional Anda terlindungi dengan login berbasis role. Informasi sensitif hanya dapat
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            diakses oleh orang yang tepat, sesuai jabatannya.</p>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="security-points">
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><i data-lucide="shield-check"></i><span><b>Akses berbasis role</b><small>Hak akses
                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                        mengikuti tanggung jawab setiap pengguna.</small></span></div>
                            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                            <div><i data-lucide="database-zap"></i><span><b>Data tersimpan aman</b><small>Riwayat
                                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                        transaksi tercatat rapi dan mudah ditelusuri.</small></span></div>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- FAQ -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="section faq-section" id="faq">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container faq-layout">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="faq-intro reveal"><span class="section-kicker">PUNYA PERTANYAAN?</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Yang sering<br><span>ditanyakan.</span></h2>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Belum menemukan jawaban yang Anda cari?</p><a class="text-link"
                            {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
                            href="mailto:support@codingpark.id">Hubungi Admin <i data-lucide="arrow-up-right"></i></a>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="faq-list reveal reveal-delay">
                        {{-- Membuka elemen <details> untuk menyusun bagian antarmuka. --}}
                        <details open>
                            {{-- Membuka elemen <summary> untuk menyusun bagian antarmuka. --}}
                            <summary>Bagaimana cara mendapatkan akun CodingPARK?<span class="faq-plus"></span></summary>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Akun CodingPARK dibuat dan dikelola oleh Admin. Hubungi Admin pengelola parkir Anda untuk
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                mendapatkan kredensial akses sesuai role.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </details>
                        {{-- Membuka elemen <details> untuk menyusun bagian antarmuka. --}}
                        <details>
                            {{-- Membuka elemen <summary> untuk menyusun bagian antarmuka. --}}
                            <summary>Saya lupa password, apa yang harus dilakukan?<span class="faq-plus"></span>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </summary>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Hubungi Admin untuk melakukan reset password. Demi keamanan, hanya Admin yang dapat
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                membantu mengelola akun pengguna.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </details>
                        {{-- Membuka elemen <details> untuk menyusun bagian antarmuka. --}}
                        <details>
                            {{-- Membuka elemen <summary> untuk menyusun bagian antarmuka. --}}
                            <summary>Apakah CodingPARK bisa diakses lewat HP?<span class="faq-plus"></span></summary>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Ya. CodingPARK dirancang responsif sehingga dapat digunakan melalui browser desktop,
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                tablet, maupun smartphone.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </details>
                        {{-- Membuka elemen <details> untuk menyusun bagian antarmuka. --}}
                        <details>
                            {{-- Membuka elemen <summary> untuk menyusun bagian antarmuka. --}}
                            <summary>Siapa saja yang bisa menggunakan sistem ini?<span class="faq-plus"></span>
                            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                            </summary>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>CodingPARK hanya untuk internal pengelola parkir: Admin, Petugas, dan Owner. Pengunjung
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                parkir tidak memiliki akses ke sistem.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </details>
                        {{-- Membuka elemen <details> untuk menyusun bagian antarmuka. --}}
                        <details>
                            {{-- Membuka elemen <summary> untuk menyusun bagian antarmuka. --}}
                            <summary>Apakah ada fitur pendaftaran mandiri?<span class="faq-plus"></span></summary>
                            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                            <p>Tidak ada. Untuk menjaga keamanan data, seluruh akun dibuat dan dikelola oleh Admin.</p>
                        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                        </details>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <!-- CTA Akhir -->
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            + <section class="cta-section">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="container">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="cta-panel reveal">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="cta-grid"></div><span class="cta-kicker">SIAP MENGENDALIKAN PARKIR?</span>
                        {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                        <h2>Parkir lebih rapi dimulai<br>dari satu <em>langkah.</em></h2>
                        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                        <p>Masuk ke CodingPARK dan lihat bagaimana operasional parkir bisa terasa lebih sederhana.</p><a
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            class="button button-light" href="/login">Masuk ke CodingPARK <i
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                data-lucide="arrow-up-right"></i></a><small>Belum punya akun? <a
                                {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
                                href="mailto:admin@codingpark.id">Hubungi Admin.</a></small>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </section>
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            +
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </main>
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        + <!-- Footer -->
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        + <footer class="site-footer">
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="container footer-grid">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="footer-brand"><a class="brand brand-light" href="#beranda"><span class="brand-mark"><i
                                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                                data-lucide="square-parking"></i></span><span>Coding<span>PARK</span></span></a>
                    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                    <p>Sistem manajemen parkir internal untuk operasional yang lebih cerdas dan terukur.</p><span
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        class="footer-status"><i></i>Sistem siap digunakan</span>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="footer-links">
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><b>Navigasi</b><a href="#beranda">Beranda</a><a href="#fitur">Fitur</a><a href="#peran">Peran
                            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                            pengguna</a><a href="#faq">FAQ</a></div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div><b>Dukungan</b><a href="mailto:admin@codingpark.id">Hubungi Admin</a><a
                            {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
                            href="mailto:support@codingpark.id">Pusat bantuan</a><a href="/login">Masuk ke sistem</a>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="container footer-bottom"><span>© 2026 CodingPARK. Untuk internal pengelola
                    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                    parkir.</span><span>Built for better parking operations <i data-lucide="heart"></i></span></div>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </footer>
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        +
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
    +
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</body>
{{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
+

{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</html>