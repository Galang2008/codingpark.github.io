{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Cetak Struk Keluar'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="page-heading">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div><p class="eyebrow">PENYELESAIAN TRANSAKSI</p><h2>Proses kendaraan keluar</h2><p>Masukkan kode tiket untuk menghitung biaya parkir otomatis.</p></div>
    {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
    <a class="button button-secondary" href="{{ route('petugas.dashboard') }}"><i data-lucide="arrow-left"></i>Kembali</a>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>

{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="panel exit-panel">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="panel-heading"><div><h3>Cari tiket aktif</h3><p>Gunakan kode tiket atau plat nomor kendaraan.</p></div><span class="panel-step">01 / KELUAR</span></div>
    {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
    <form class="ticket-search" method="GET" action="{{ route('petugas.transaksi.exit') }}">
        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
        <label for="identifier">Nomor tiket atau plat nomor</label>
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="search-control"><i data-lucide="scan-line"></i><input id="identifier" name="identifier" value="{{ request('identifier') }}" placeholder="Contoh: CP-261119-AB12CD34" autocomplete="off" required><button class="button button-secondary" type="submit">Cari tiket</button></div>
        {{-- Membuka elemen <small> untuk menyusun bagian antarmuka. --}}
        <small>Integrasi pemindai QR dapat disambungkan pada kolom ini.</small>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </form>

    {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
    @if (request()->filled('identifier') && ! $transaction)
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="lookup-message lookup-error" role="status"><i data-lucide="circle-alert"></i>Tiket aktif tidak ditemukan. Periksa kembali nomor tiket atau plat kendaraan.</div>
    {{-- Memeriksa kondisi alternatif untuk tampilan. --}}
    @elseif ($transaction && ! $estimate)
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="lookup-message lookup-error" role="alert"><i data-lucide="circle-alert"></i>Tarif aktif untuk kendaraan ini belum tersedia. Hubungi Admin.</div>
    {{-- Memeriksa kondisi alternatif untuk tampilan. --}}
    @elseif ($transaction)
        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
        <div class="vehicle-summary">
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="vehicle-summary-head"><div class="vehicle-avatar"><i data-lucide="{{ $transaction->kendaraan->vehicle_type === 'motor' ? 'bike' : 'car-front' }}"></i></div><div><small>KENDARAAN DITEMUKAN</small><h3>{{ $transaction->kendaraan->plate_number }}</h3></div><span class="badge badge-amber">Sedang Parkir</span></div>
            {{-- Membuka elemen <dl> untuk menyusun bagian antarmuka. --}}
            <dl class="summary-grid">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div><dt>Jenis kendaraan</dt><dd>{{ ucfirst($transaction->kendaraan->vehicle_type) }}</dd></div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div><dt>Nomor tiket</dt><dd>{{ $transaction->transaction_number }}</dd></div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div><dt>Waktu masuk</dt><dd>{{ $transaction->entry_at->format('d/m/Y H:i') }}</dd></div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div><dt>Perkiraan waktu keluar</dt><dd>{{ now()->format('d/m/Y H:i') }} <small>(saat ini)</small></dd></div>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div><dt>Durasi berjalan</dt><dd>{{ intdiv($durationMinutes, 60) }} jam {{ $durationMinutes % 60 }} menit</dd></div>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </dl>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="estimated-total"><span>Total biaya parkir</span><strong>Rp {{ number_format($estimate, 0, ',', '.') }}</strong><small>Biaya final dihitung kembali saat konfirmasi.</small></div>
            {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
            <form method="POST" action="{{ route('petugas.transaksi.checkout') }}" onsubmit="return confirm('Konfirmasi kendaraan keluar dan cetak struk?')">
                {{-- Menyertakan token perlindungan formulir. --}}
                @csrf
                {{-- Membuka elemen <input> untuk menyusun bagian antarmuka. --}}
                <input type="hidden" name="identifier" value="{{ $transaction->transaction_number }}">
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="payment-method-field">
                    {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                    <label for="payment_method">Metode pembayaran</label>
                    {{-- Membuka elemen <select> untuk menyusun bagian antarmuka. --}}
                    <select id="payment_method" name="payment_method" required>
                        {{-- Membuka elemen <option> untuk menyusun bagian antarmuka. --}}
                        <option value="">Pilih metode pembayaran</option>
                        {{-- Membuka elemen <option> untuk menyusun bagian antarmuka. --}}
                        <option value="tunai" @selected(old('payment_method') === 'tunai')>Tunai</option>
                        {{-- Membuka elemen <option> untuk menyusun bagian antarmuka. --}}
                        <option value="qris" @selected(old('payment_method') === 'qris')>QRIS</option>
                        {{-- Membuka elemen <option> untuk menyusun bagian antarmuka. --}}
                        <option value="kartu_debit" @selected(old('payment_method') === 'kartu_debit')>Kartu debit</option>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </select>
                    {{-- Menampilkan pesan validasi untuk field terkait. --}}
                    @error('payment_method')<small class="field-error">{{ $message }}</small>@enderror
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>
                {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                <button class="button button-primary operator-submit" type="submit"><i data-lucide="printer"></i>Konfirmasi &amp; Cetak Struk Keluar</button>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </form>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </div>
    {{-- Mengakhiri pemeriksaan kondisi tampilan. --}}
    @endif
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>
{{-- Mengakhiri bagian halaman. --}}
@endsection
