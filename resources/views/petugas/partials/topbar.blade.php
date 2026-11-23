{{-- Membuka elemen <header> untuk menyusun bagian antarmuka. --}}
<header class="petugas-topbar">
    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
    <button class="icon-button mobile-menu" type="button" data-sidebar-toggle aria-label="Buka menu" aria-expanded="false"><i data-lucide="menu"></i></button>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="topbar-title">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="topbar-kicker">CODINGPARK <b>/</b> PETUGAS</span>
        {{-- Membuka elemen <h1> untuk menyusun bagian antarmuka. --}}
        <h1>{{ $title ?? 'Dashboard' }}</h1>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="topbar-actions">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="clock-chip" aria-label="Waktu saat ini"><i data-lucide="clock-3"></i><time data-live-clock>{{ now()->format('H:i:s') }}</time></div>
        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
        <button class="icon-button notification-button" type="button" aria-label="Notifikasi"><i data-lucide="bell"></i><span class="notification-dot"></span></button>
        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
        <button class="icon-button" type="button" data-theme-toggle aria-label="Gunakan tema gelap" aria-pressed="false"><i data-lucide="moon"></i></button>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="topbar-profile">
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div><strong>{{ auth()->user()->name }}</strong><small>Petugas</small></div>
            {{-- Membuka elemen <i> untuk menyusun bagian antarmuka. --}}
            <i class="profile-chevron" data-lucide="chevron-down"></i>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</header>
