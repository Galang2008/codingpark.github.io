{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Tiket Parkir Masuk'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="receipt-actions">
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="button button-secondary" href="{{ route('petugas.transaksi.entry') }}"><i data-lucide="plus"></i>Tiket Baru</a>
    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
    <button class="button button-primary" type="button" onclick="window.print()"><i data-lucide="printer"></i>Cetak Tiket</button>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</div>
{{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
<article class="receipt-sheet entry-ticket">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="receipt-brand"><span class="receipt-mark"><i data-lucide="square-parking"></i></span><div><strong>CodingPARK</strong><small>TIKET PARKIR KENDARAAN</small></div></div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="receipt-title"><span class="ticket-status"><i></i>Kendaraan masuk</span><h2>Tiket Parkir</h2><p>Simpan tiket ini untuk proses keluar.</p></div>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="ticket-code"><small>NOMOR TIKET</small><strong>{{ $transaksi->transaction_number }}</strong><div class="barcode" aria-label="Representasi visual barcode tiket"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div></div>
    {{-- Membuka elemen <dl> untuk menyusun bagian antarmuka. --}}
    <dl class="receipt-details">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Jenis kendaraan</dt><dd>{{ ucfirst($transaksi->kendaraan->vehicle_type) }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Plat nomor</dt><dd>{{ $transaksi->kendaraan->plate_number }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Tanggal &amp; jam masuk</dt><dd>{{ $transaksi->entry_at->format('d/m/Y H:i:s') }}</dd></div>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div><dt>Petugas</dt><dd>{{ auth()->user()->name }}</dd></div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </dl>
    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
    <p class="receipt-thanks">Mohon tunjukkan tiket ini saat melakukan pembayaran.</p>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</article>
{{-- Mengakhiri bagian halaman. --}}
@endsection
