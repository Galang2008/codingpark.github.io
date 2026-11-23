{{-- Menjalankan direktif Blade @props untuk menyusun tampilan. --}}
@props(['label', 'value', 'icon', 'caption', 'tone' => 'blue'])
{{-- Membuka elemen <article> untuk menyusun bagian antarmuka. --}}
<article class="stat-card">
    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
    <div class="stat-top">
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="stat-icon stat-icon-{{ $tone }}"><i data-lucide="{{ $icon }}"></i></span>
        {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
        <span class="stat-period"><i data-lucide="calendar-days"></i> Hari ini</span>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </div>
    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
    <p>{{ $label }}</p>
    {{-- Membuka elemen <strong> untuk menyusun bagian antarmuka. --}}
    <strong>{{ $value }}</strong>
    {{-- Membuka elemen <small> untuk menyusun bagian antarmuka. --}}
    <small>{{ $caption }}</small>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</article>
