{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Cetak Struk Masuk'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="page-heading">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div><p class="eyebrow">TRANSAKSI BARU</p><h2>Catat kendaraan masuk</h2><p>Informasi tiket dibuat otomatis setelah kendaraan disimpan.</p></div>
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="button button-secondary" href="{{ route('petugas.dashboard') }}"><i data-lucide="arrow-left"></i>Kembali</a>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>

{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="form-layout">
    {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
    <section class="panel form-panel">
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="panel-heading"><div><h3>Informasi kendaraan</h3><p>Lengkapi detail kendaraan yang akan parkir.</p></div><span class="panel-step">01 / MASUK</span></div>
        {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
        <form class="operator-form" method="POST" action="{{ route('petugas.transaksi.store') }}">
            {{-- Menyertakan token perlindungan formulir. --}}
            @csrf
            {{-- Membuka elemen <fieldset> untuk menyusun bagian antarmuka. --}}
            <fieldset class="vehicle-choice">
                {{-- Membuka elemen <legend> untuk menyusun bagian antarmuka. --}}
                <legend>Jenis kendaraan</legend>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="vehicle-options">
                    {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                    <label class="vehicle-option">
                        {{-- Membuka elemen <input> untuk menyusun bagian antarmuka. --}}
                        <input type="radio" name="vehicle_type" value="motor" @checked(old('vehicle_type', 'motor') === 'motor') required>
                        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                        <span><i data-lucide="bike"></i><strong>Motor</strong></span>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </label>
                    {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                    <label class="vehicle-option">
                        {{-- Membuka elemen <input> untuk menyusun bagian antarmuka. --}}
                        <input type="radio" name="vehicle_type" value="mobil" @checked(old('vehicle_type') === 'mobil') required>
                        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                        <span><i data-lucide="car-front"></i><strong>Mobil</strong></span>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </label>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Menampilkan pesan validasi untuk field terkait. --}}
                @error('vehicle_type')<small class="field-error">{{ $message }}</small>@enderror
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </fieldset>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="field-group">
                {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                <label for="plate_number">Nomor plat kendaraan</label>
                {{-- Membuka elemen <input> untuk menyusun bagian antarmuka. --}}
                <input id="plate_number" name="plate_number" value="{{ old('plate_number') }}" placeholder="Contoh: B 1234 ABC" maxlength="20" autocomplete="off" required>
                {{-- Membuka elemen <small> untuk menyusun bagian antarmuka. --}}
                <small>Pastikan plat nomor sesuai kendaraan.</small>
                {{-- Menampilkan pesan validasi untuk field terkait. --}}
                @error('plate_number')<small class="field-error">{{ $message }}</small>@enderror
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="entry-notice"><i data-lucide="info"></i><span>Nomor tiket dan waktu masuk akan dibuat otomatis saat Anda menyimpan data.</span></div>
            {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
            <button class="button button-primary operator-submit" type="submit"><i data-lucide="printer"></i>Simpan &amp; Cetak Tiket Masuk</button>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </form>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </section>
    {{-- Membuka elemen <aside> untuk menyusun bagian antarmuka. --}}
    <aside class="guide-card">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="guide-icon"><i data-lucide="clipboard-check"></i></span>
        {{-- Membuka elemen <h3> untuk menyusun bagian antarmuka. --}}
        <h3>Alur kendaraan masuk</h3>
        {{-- Membuka elemen <ol> untuk menyusun bagian antarmuka. --}}
        <ol><li><span>1</span>Periksa jenis kendaraan dan plat nomor.</li><li><span>2</span>Simpan untuk membuat tiket parkir unik.</li><li><span>3</span>Cetak dan berikan tiket kepada pengendara.</li></ol>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="guide-footer"><i data-lucide="shield-check"></i>Transaksi masuk tersimpan otomatis.</div>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </aside>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</div>
{{-- Mengakhiri bagian halaman. --}}
@endsection
