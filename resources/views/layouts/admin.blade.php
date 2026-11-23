{{-- Mendefinisikan elemen atau instruksi markup halaman. --}}
<!DOCTYPE html>
{{-- Membuka elemen <html> untuk menyusun bagian antarmuka. --}}
<html lang="id">
{{-- Membuka elemen <head> untuk menyusun bagian antarmuka. --}}
<head>
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Membuka elemen <title> untuk menyusun bagian antarmuka. --}}
    <title>{{ $title ?? 'Dashboard Admin' }} | SmarPARK</title>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://unpkg.com/lucide@0.468.0"></script>
    {{-- Menjalankan direktif Blade @vite untuk menyusun tampilan. --}}
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</head>
{{-- Membuka elemen <body> untuk menyusun bagian antarmuka. --}}
<body class="admin-shell">
    {{-- Membuka elemen <aside> untuk menyusun bagian antarmuka. --}}
    <aside class="admin-sidebar" data-sidebar>
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="brand" href="{{ route('admin.dashboard') }}"><span class="brand-mark"><i data-lucide="square-parking"></i></span><span>Smar<span>PARK</span></span></a>
        {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
        <p class="sidebar-label">MENU UTAMA</p>
        {{-- Membuka elemen <nav> untuk menyusun bagian antarmuka. --}}
        <nav class="admin-nav">
            {{-- Mengulang tampilan untuk setiap data dalam koleksi. --}}
            @foreach ([['dashboard','layout-dashboard','Dashboard','admin.dashboard'],['tarif','receipt-text','Tarif Parkir','admin.tarif.index'],['area','map','Area Parkir','admin.area.index'],['kendaraan','car-front','Kendaraan','admin.kendaraan.index'],['log-aktivitas','history','Log Aktivitas','admin.log-aktivitas'],['profil','settings-2','Pengaturan Akun','admin.profil']] as [$key, $icon, $label, $route])
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="admin-nav-item {{ request()->routeIs($route) ? 'active' : '' }}" href="{{ route($route) }}"><i data-lucide="{{ $icon }}"></i><span>{{ $label }}</span></a>
            {{-- Mengakhiri pengulangan tampilan. --}}
            @endforeach
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </nav>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="sidebar-user"><div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div><div><strong>{{ auth()->user()->name }}</strong><small>Administrator</small></div></div>
        {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin keluar?')"><button class="logout-button" type="submit"><i data-lucide="log-out"></i>Keluar</button>@csrf</form>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </aside>
    {{-- Membuka elemen <main> untuk menyusun bagian antarmuka. --}}
    <main class="admin-main">
        {{-- Membuka elemen <header> untuk menyusun bagian antarmuka. --}}
        <header class="admin-topbar"><button class="icon-button mobile-menu" type="button" data-sidebar-toggle aria-label="Buka menu"><i data-lucide="menu"></i></button><div><span class="topbar-kicker">SISTEM MANAJEMEN PARKIR</span><h1>{{ $title ?? 'Dashboard Admin' }}</h1></div><div class="topbar-actions"><div class="admin-search"><i data-lucide="search"></i><input placeholder="Cari sesuatu..." aria-label="Cari"></div><button class="icon-button" data-theme-toggle aria-label="Ganti tema"><i data-lucide="sun-moon"></i></button><button class="icon-button notification-button" aria-label="Notifikasi"><i data-lucide="bell"></i><b></b></button><a class="topbar-profile" href="{{ route('admin.profil') }}"><span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>Admin</small></span><i data-lucide="chevron-down"></i></a></div></header>
        {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
        @if (session('success'))<div class="flash-success"><i data-lucide="circle-check"></i>{{ session('success') }}</div>@endif
        {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
        @if ($errors->any())<div class="flash-error"><i data-lucide="circle-alert"></i>{{ $errors->first() }}</div>@endif
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="admin-content">@yield('content')</div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </main>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script>document.addEventListener('DOMContentLoaded',()=>{window.lucide?.createIcons();const s=document.querySelector('[data-sidebar]');document.querySelector('[data-sidebar-toggle]')?.addEventListener('click',()=>s.classList.toggle('open'));document.querySelector('[data-theme-toggle]')?.addEventListener('click',()=>document.body.classList.toggle('dark-admin'));});</script>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</body>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</html>
