{{-- Membuka elemen <aside> untuk menyusun bagian antarmuka. --}}
<aside class="petugas-sidebar" data-sidebar aria-label="Navigasi Petugas">
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="brand" href="{{ route('petugas.dashboard') }}" aria-label="CodingPARK, Dashboard Petugas">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="brand-mark"><i data-lucide="square-parking"></i></span>
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span>Coding<span>PARK</span></span>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </a>
    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
    <p class="sidebar-label">MENU PETUGAS</p>
    {{-- Membuka elemen <nav> untuk menyusun bagian antarmuka. --}}
    <nav class="petugas-nav">
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="nav-item {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}" href="{{ route('petugas.dashboard') }}"><i data-lucide="layout-dashboard"></i><span>Dashboard</span></a>
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="nav-item {{ request()->routeIs('petugas.transaksi.entry*') ? 'active' : '' }}" href="{{ route('petugas.transaksi.entry') }}"><i data-lucide="car-front"></i><span>Cetak Struk Masuk</span></a>
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="nav-item {{ request()->routeIs('petugas.transaksi.exit', 'petugas.transaksi.checkout', 'petugas.transaksi.receipt') ? 'active' : '' }}" href="{{ route('petugas.transaksi.exit') }}"><i data-lucide="log-out"></i><span>Cetak Struk Keluar</span></a>
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="nav-item {{ request()->routeIs('petugas.transaksi.index') ? 'active' : '' }}" href="{{ route('petugas.transaksi.index') }}"><i data-lucide="list"></i><span>Transaksi Parkir</span></a>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </nav>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="sidebar-note"><i data-lucide="shield-check"></i><span>Akses Petugas<br><small>Operasional transaksi</small></span></div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="sidebar-profile">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="profile-copy"><strong>{{ auth()->user()->name }}</strong><small>Petugas</small></div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
    <form method="POST" action="{{ route('logout') }}">
        {{-- Menyertakan token perlindungan formulir. --}}
        @csrf
        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
        <button class="logout-button" type="submit"><i data-lucide="log-out"></i><span>Keluar</span></button>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </form>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</aside>
