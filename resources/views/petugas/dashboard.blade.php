{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Dashboard'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="page-heading">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div><p class="eyebrow">{{ now()->translatedFormat('l, d F Y') }}</p><h2>Selamat bertugas, {{ Str::before(auth()->user()->name, ' ') }}</h2><p>Berikut ringkasan aktivitas operasional parkir hari ini.</p></div>
    {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
    <span class="operator-live"><i></i>Shift sedang aktif</span>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>

{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="stat-grid petugas-stat-grid">
    {{-- Membuka elemen <x-petugas-stat> untuk menyusun bagian antarmuka. --}}
    <x-petugas-stat label="Kendaraan Masuk Hari Ini" :value="number_format($enteredToday, 0, ',', '.')" icon="log-in" caption="Total kendaraan tercatat masuk" />
    {{-- Membuka elemen <x-petugas-stat> untuk menyusun bagian antarmuka. --}}
    <x-petugas-stat label="Kendaraan Keluar Hari Ini" :value="number_format($exitedToday, 0, ',', '.')" icon="log-out" caption="Transaksi selesai hari ini" tone="cyan" />
    {{-- Membuka elemen <x-petugas-stat> untuk menyusun bagian antarmuka. --}}
    <x-petugas-stat label="Kendaraan Sedang Parkir" :value="number_format($parkedNow, 0, ',', '.')" icon="car-front" caption="Belum melakukan proses keluar" tone="amber" />
    {{-- Membuka elemen <x-petugas-stat> untuk menyusun bagian antarmuka. --}}
    <x-petugas-stat label="Total Pendapatan Shift Ini" :value="'Rp '.number_format($shiftRevenue, 0, ',', '.')" icon="wallet" caption="Dari transaksi keluar Anda hari ini" tone="green" />
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</div>

{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="shortcut-grid" aria-label="Aksi cepat">
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="shortcut-card shortcut-entry" href="{{ route('petugas.transaksi.entry') }}">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="shortcut-icon"><i data-lucide="plus"></i></span>
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span><strong>Cetak Struk Masuk</strong><small>Buat tiket parkir kendaraan baru</small></span>
        {{-- Membuka elemen <i> untuk menyusun bagian antarmuka. --}}
        <i class="shortcut-arrow" data-lucide="arrow-up-right"></i>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </a>
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="shortcut-card shortcut-exit" href="{{ route('petugas.transaksi.exit') }}">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="shortcut-icon"><i data-lucide="plus"></i></span>
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span><strong>Cetak Struk Keluar</strong><small>Hitung biaya dan selesaikan parkir</small></span>
        {{-- Membuka elemen <i> untuk menyusun bagian antarmuka. --}}
        <i class="shortcut-arrow" data-lucide="arrow-up-right"></i>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </a>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>

{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="panel activity-panel">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="panel-heading">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><h3>Aktivitas Terbaru</h3><p>Transaksi parkir terbaru di area.</p></div>
        {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
        <a class="text-button" href="{{ route('petugas.transaksi.index') }}">Lihat transaksi <i data-lucide="arrow-right"></i></a>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="activity-list">
        {{-- Menjalankan direktif Blade @forelse untuk menyusun tampilan. --}}
        @forelse ($recentTransactions as $transaksi)
            {{-- Menjalankan direktif Blade @php untuk menyusun tampilan. --}}
            @php($checkedOut = $transaksi->status === 'selesai')
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="activity-item">
                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                <span class="activity-icon {{ $checkedOut ? 'activity-exit' : '' }}"><i data-lucide="{{ $checkedOut ? 'log-out' : 'log-in' }}"></i></span>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="activity-copy">
                    {{-- Membuka elemen <strong> untuk menyusun bagian antarmuka. --}}
                    <strong>{{ $transaksi->kendaraan->plate_number }}</strong>
                    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                    <p>{{ ucfirst($transaksi->kendaraan->vehicle_type) }} · {{ $checkedOut ? 'Kendaraan keluar' : 'Kendaraan masuk' }} · {{ $transaksi->transaction_number }}</p>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Membuka elemen <time> untuk menyusun bagian antarmuka. --}}
                <time>{{ ($checkedOut ? $transaksi->exit_at : $transaksi->entry_at)?->format('H:i') }}</time>
                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                <span class="badge {{ $checkedOut ? 'badge-green' : 'badge-blue' }}">{{ $checkedOut ? 'Keluar' : 'Masuk' }}</span>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
        {{-- Menjalankan direktif Blade @empty untuk menyusun tampilan. --}}
        @empty
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="empty-state"><i data-lucide="inbox"></i><strong>Belum ada aktivitas</strong><span>Transaksi hari ini akan muncul di sini.</span></div>
        {{-- Menjalankan direktif Blade @endforelse untuk menyusun tampilan. --}}
        @endforelse
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>
{{-- Mengakhiri bagian halaman. --}}
@endsection
