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
    <meta name="theme-color" content="#f8fafc">
    {{-- Membuka elemen <title> untuk menyusun bagian antarmuka. --}}
    <title>{{ $title ?? 'Dashboard' }} | CodingPARK</title>
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Membuka elemen <link> untuk menyusun bagian antarmuka. --}}
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://unpkg.com/lucide@0.468.0"></script>
    {{-- Menjalankan direktif Blade @vite untuk menyusun tampilan. --}}
    @vite(['resources/css/petugas.css', 'resources/js/app.js'])
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</head>
{{-- Membuka elemen <body> untuk menyusun bagian antarmuka. --}}
<body class="petugas-shell">
    {{-- Menjalankan direktif Blade @include untuk menyusun tampilan. --}}
    @include('petugas.partials.sidebar')
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="sidebar-scrim" data-sidebar-scrim></div>
    {{-- Membuka elemen <main> untuk menyusun bagian antarmuka. --}}
    <main class="petugas-main">
        {{-- Menjalankan direktif Blade @include untuk menyusun tampilan. --}}
        @include('petugas.partials.topbar')
        {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
        @if (session('success'))
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="flash-success" role="status"><i data-lucide="circle-check"></i>{{ session('success') }}</div>
        {{-- Mengakhiri pemeriksaan kondisi tampilan. --}}
        @endif
        {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
        @if ($errors->any())
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="flash-error" role="alert"><i data-lucide="circle-alert"></i>{{ $errors->first() }}</div>
        {{-- Mengakhiri pemeriksaan kondisi tampilan. --}}
        @endif
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="petugas-content">@yield('content')</div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </main>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script>
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        document.addEventListener('DOMContentLoaded', () => {
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            window.lucide?.createIcons();
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const sidebar = document.querySelector('[data-sidebar]');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const scrim = document.querySelector('[data-sidebar-scrim]');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const toggle = document.querySelector('[data-sidebar-toggle]');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const closeMenu = () => {
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                sidebar.classList.remove('open');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                scrim.classList.remove('visible');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                toggle?.setAttribute('aria-expanded', 'false');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            };
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            toggle?.addEventListener('click', () => {
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                const open = sidebar.classList.toggle('open');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                scrim.classList.toggle('visible', open);
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                toggle.setAttribute('aria-expanded', String(open));
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            });
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            scrim?.addEventListener('click', closeMenu);
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            sidebar?.querySelectorAll('nav a').forEach((link) => link.addEventListener('click', closeMenu));

            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const clock = document.querySelector('[data-live-clock]');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const updateClock = () => {
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                if (clock) clock.textContent = new Intl.DateTimeFormat('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }).format(new Date());
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            };
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            updateClock();
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            window.setInterval(updateClock, 1000);

            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const themeToggle = document.querySelector('[data-theme-toggle]');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            const applyTheme = (dark) => {
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                document.body.classList.toggle('dark-mode', dark);
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                themeToggle?.setAttribute('aria-pressed', String(dark));
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                themeToggle?.setAttribute('aria-label', dark ? 'Gunakan tema terang' : 'Gunakan tema gelap');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                if (themeToggle) themeToggle.innerHTML = `<i data-lucide="${dark ? 'sun' : 'moon'}"></i>`;
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                window.lucide?.createIcons();
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            };
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            applyTheme(localStorage.getItem('codingpark-theme') === 'dark');
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            themeToggle?.addEventListener('click', () => {
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                const dark = !document.body.classList.contains('dark-mode');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                localStorage.setItem('codingpark-theme', dark ? 'dark' : 'light');
                {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                applyTheme(dark);
            {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
            });
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        });
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </script>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</body>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</html>
