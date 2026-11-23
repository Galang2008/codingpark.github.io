{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Struk Transaksi'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="receipt-actions"><a class="button button-secondary" href="{{ route('petugas.dashboard') }}"><i data-lucide="arrow-left"></i>Kembali ke dashboard</a><button class="button button-primary" type="button" onclick="window.print()"><i data-lucide="printer"></i>Cetak struk</button></div>
{{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
<article class="receipt-sheet">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="receipt-brand"><span class="receipt-mark"><i data-lucide="square-parking"></i></span><div><strong>CodingPARK</strong><small>BUKTI TRANSAKSI PARKIR</small></div></div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="receipt-title"><span>Transaksi selesai</span><h2>Struk Parkir</h2><p>{{ $transaksi->transaction_number }}</p></div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="receipt-amount"><small>Total pembayaran</small><strong>Rp {{ number_format($transaksi->total_fee, 0, ',', '.') }}</strong></div>
    {{-- Membuka elemen <dl> untuk menyusun bagian antarmuka. --}}
    <dl class="receipt-details">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Nomor plat</dt><dd>{{ $transaksi->kendaraan->plate_number }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Jenis kendaraan</dt><dd>{{ ucfirst($transaksi->kendaraan->vehicle_type) }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Waktu masuk</dt><dd>{{ $transaksi->entry_at->format('d/m/Y H:i:s') }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Waktu keluar</dt><dd>{{ $transaksi->exit_at->format('d/m/Y H:i:s') }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Durasi parkir</dt><dd>{{ intdiv($transaksi->duration_minutes, 60) }} jam {{ $transaksi->duration_minutes % 60 }} menit</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Petugas pemroses</dt><dd>{{ $transaksi->petugasKeluar?->name ?? $transaksi->petugas->name }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Nomor transaksi</dt><dd>{{ $transaksi->transaction_number }}</dd></div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </dl>
    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
    <p class="receipt-thanks">Terima kasih telah menggunakan layanan parkir kami.</p>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</article>
{{-- Mengakhiri bagian halaman. --}}
@endsection