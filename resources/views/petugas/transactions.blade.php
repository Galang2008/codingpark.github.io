{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.petugas', ['title' => 'Transaksi Parkir'])

{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="page-heading">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div><p class="eyebrow">RIWAYAT OPERASIONAL</p><h2>Transaksi parkir</h2><p>Daftar transaksi kendaraan dengan akses lihat saja.</p></div>
    {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
    <span class="readonly-note"><i data-lucide="eye"></i>Mode baca saja</span>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>

{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="panel transaction-panel">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="panel-heading transaction-heading"><div><h3>Semua transaksi</h3><p>Data transaksi tidak dapat diubah dari halaman ini.</p></div><span class="result-count">{{ $transactions->total() }} transaksi</span></div>
    {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
    <form class="filters" method="GET" action="{{ route('petugas.transaksi.index') }}">
        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
        <label class="filter-search" for="transaction-search"><i data-lucide="search"></i><input id="transaction-search" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Cari plat nomor"></label>
        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
        <label class="filter-select" for="transaction-status"><span class="sr-only">Filter status</span><select id="transaction-status" name="status"><option value="">Semua status</option><option value="berlangsung" @selected(($filters['status'] ?? '') === 'berlangsung')>Sedang Parkir</option><option value="selesai" @selected(($filters['status'] ?? '') === 'selesai')>Selesai</option></select></label>
        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
        <label class="filter-date" for="transaction-date"><span class="sr-only">Filter tanggal masuk</span><input id="transaction-date" type="date" name="date" value="{{ $filters['date'] ?? '' }}"></label>
        {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
        <button class="button button-secondary filter-submit" type="submit"><i data-lucide="list-filter"></i>Filter</button>
        {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
        @if (array_filter($filters))<a class="clear-filter" href="{{ route('petugas.transaksi.index') }}">Reset</a>@endif
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </form>
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="transaction-table-wrap">
        {{-- Membuka elemen <table> untuk menyusun bagian antarmuka. --}}
        <table class="transaction-table">
            {{-- Membuka elemen <thead> untuk menyusun bagian antarmuka. --}}
            <thead><tr><th>No Tiket</th><th>Jenis Kendaraan</th><th>Plat Nomor</th><th>Jam Masuk</th><th>Jam Keluar</th><th>Durasi</th><th>Biaya</th><th>Status</th></tr></thead>
            {{-- Membuka elemen <tbody> untuk menyusun bagian antarmuka. --}}
            <tbody>
                {{-- Menjalankan direktif Blade @forelse untuk menyusun tampilan. --}}
                @forelse ($transactions as $transaksi)
                    {{-- Menjalankan direktif Blade @php untuk menyusun tampilan. --}}
                    @php
                        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
                        $minutes = $transaksi->duration_minutes ?? max(0, (int) $transaksi->entry_at->diffInMinutes(now()));
                    {{-- Menjalankan direktif Blade @endphp untuk menyusun tampilan. --}}
                    @endphp
                    {{-- Membuka elemen <tr> untuk menyusun bagian antarmuka. --}}
                    <tr>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td><strong class="ticket-number">{{ $transaksi->transaction_number }}</strong></td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td>{{ ucfirst($transaksi->kendaraan->vehicle_type) }}</td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td><strong>{{ $transaksi->kendaraan->plate_number }}</strong></td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td>{{ $transaksi->entry_at->format('d/m/Y H:i') }}</td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td>{{ $transaksi->exit_at?->format('d/m/Y H:i') ?? '—' }}</td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td>{{ intdiv($minutes, 60) }}j {{ $minutes % 60 }}m</td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td>{{ $transaksi->status === 'selesai' ? 'Rp '.number_format($transaksi->total_fee, 0, ',', '.') : '—' }}</td>
                        {{-- Membuka elemen <td> untuk menyusun bagian antarmuka. --}}
                        <td><span class="badge {{ $transaksi->status === 'selesai' ? 'badge-green' : 'badge-amber' }}">{{ $transaksi->status === 'selesai' ? 'Selesai' : 'Sedang Parkir' }}</span></td>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </tr>
                {{-- Menjalankan direktif Blade @empty untuk menyusun tampilan. --}}
                @empty
                    {{-- Membuka elemen <tr> untuk menyusun bagian antarmuka. --}}
                    <tr><td colspan="8"><div class="empty-state"><i data-lucide="inbox"></i><strong>Transaksi tidak ditemukan</strong><span>Coba ubah kata kunci atau filter yang digunakan.</span></div></td></tr>
                {{-- Menjalankan direktif Blade @endforelse untuk menyusun tampilan. --}}
                @endforelse
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </tbody>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </table>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
    @if ($transactions->hasPages())<div class="pagination-wrap">{{ $transactions->links() }}</div>@endif
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</section>
{{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
<p class="readonly-footnote"><i data-lucide="lock-keyhole"></i>Halaman ini hanya menampilkan data transaksi. Tidak tersedia aksi tambah, ubah, atau hapus.</p>
{{-- Mengakhiri bagian halaman. --}}
@endsection
