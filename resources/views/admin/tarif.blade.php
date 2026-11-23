{{-- Menggunakan layout dasar untuk halaman ini. --}}
@extends('layouts.admin', ['title' => 'Tarif Parkir'])
{{-- Mendefinisikan bagian halaman pada layout. --}}
@section('content')
{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="page-heading"><div><p class="eyebrow">KONFIGURASI</p><h2>Tarif parkir</h2><p>Atur tarif kendaraan dan batas maksimal harian.</p></div><button class="button button-primary" data-modal-open="tarif-modal"><i data-lucide="plus"></i>Tambah tarif</button></div>
{{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
<section class="panel table-panel"><form class="toolbar" method="GET"><div class="admin-search"><i data-lucide="search"></i><input name="search" value="{{ request('search') }}" placeholder="Cari jenis kendaraan..."></div></form><div class="table-wrap"><table><thead><tr><th>Jenis kendaraan</th><th>Tarif per jam</th><th>Maksimal harian</th><th>Status</th><th></th></tr></thead><tbody>@forelse($tarifs as $tarif)<tr><td><strong>{{ $tarif->vehicle_type }}</strong></td><td>Rp {{ number_format($tarif->hourly_rate, 0, ',', '.') }}</td><td>Rp {{ number_format($tarif->daily_max_rate, 0, ',', '.') }}</td><td><span class="status {{ $tarif->is_active ? 'status-green' : 'status-gray' }}">{{ $tarif->is_active ? 'Aktif' : 'Nonaktif' }}</span></td><td class="row-actions"><button class="icon-button" title="Edit" data-modal-open="edit-{{ $tarif->id }}"><i data-lucide="pencil"></i></button><form method="POST" action="{{ route('admin.tarif.destroy', $tarif) }}" onsubmit="return confirm('Hapus tarif ini?')">@csrf @method('DELETE')<button class="icon-button danger" title="Hapus"><i data-lucide="trash-2"></i></button></form></td></tr>@empty<tr><td colspan="5"><div class="empty-state">Belum ada tarif. Tambahkan tarif pertama Anda.</div></td></tr>@endforelse</tbody></table></div></section>
{{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
<div class="modal" id="tarif-modal"><div class="modal-box"><div class="modal-heading"><h3>Tambah tarif</h3><button data-modal-close><i data-lucide="x"></i></button></div><form method="POST" action="{{ route('admin.tarif.store') }}" class="stack-form">@csrf @include('admin.partials.tarif-form')<button class="button button-primary">Simpan tarif</button></form></div></div>
{{-- Mengakhiri bagian halaman. --}}
@endsection
