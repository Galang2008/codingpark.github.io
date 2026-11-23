// Mengimpor modul atau dependensi yang digunakan file ini.
import './bootstrap';

// Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
document.addEventListener('DOMContentLoaded', () => {
    // Memeriksa kondisi untuk menentukan alur eksekusi.
    if (window.lucide) window.lucide.createIcons();
    // Menyimpan nilai pada variabel menuToggle untuk digunakan berikutnya.
    const menuToggle = document.querySelector('[data-menu-toggle]');
    // Menyimpan nilai pada variabel nav untuk digunakan berikutnya.
    const nav = document.querySelector('[data-nav]');
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    menuToggle?.addEventListener('click', () => {
        // Menyimpan nilai pada variabel isOpen untuk digunakan berikutnya.
        const isOpen = nav.classList.toggle('open');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        menuToggle.setAttribute('aria-expanded', String(isOpen));
    // Membuka atau menutup blok logika terkait.
    });
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    nav?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        nav.classList.remove('open');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        menuToggle?.setAttribute('aria-expanded', 'false');
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    document.querySelectorAll('[data-modal-open]').forEach((trigger) => trigger.addEventListener('click', () => {
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.getElementById(trigger.dataset.modalOpen)?.classList.add('open');
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    document.querySelectorAll('[data-modal-close]').forEach((trigger) => trigger.addEventListener('click', () => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        trigger.closest('.modal')?.classList.remove('open');
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    document.querySelectorAll('.modal').forEach((modal) => modal.addEventListener('click', (event) => {
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (event.target === modal) modal.classList.remove('open');
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
    // Menyimpan nilai pada variabel passwordToggle untuk digunakan berikutnya.
    const passwordToggle = document.querySelector('[data-password-toggle]');
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    passwordToggle?.addEventListener('click', () => {
        // Menyimpan nilai pada variabel passwordInput untuk digunakan berikutnya.
        const passwordInput = document.querySelector('#password');
        // Menyimpan nilai pada variabel isPassword untuk digunakan berikutnya.
        const isPassword = passwordInput.type === 'password';
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        passwordInput.type = isPassword ? 'text' : 'password';
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        passwordToggle.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan password');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        passwordToggle.innerHTML = `<i data-lucide="${isPassword ? 'eye-off' : 'eye'}"></i>`;
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        window.lucide?.createIcons();
    // Membuka atau menutup blok logika terkait.
    });
    // Menyimpan nilai pada variabel revealItems untuk digunakan berikutnya.
    const revealItems = document.querySelectorAll('.reveal');
    // Memeriksa kondisi untuk menentukan alur eksekusi.
    if ('IntersectionObserver' in window) {
        // Menyimpan nilai pada variabel observer untuk digunakan berikutnya.
        const observer = new IntersectionObserver((entries, revealObserver) => {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            entries.forEach((entry) => {
                // Memeriksa kondisi untuk menentukan alur eksekusi.
                if (entry.isIntersecting) {
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    entry.target.classList.add('is-visible');
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    revealObserver.unobserve(entry.target);
                // Membuka atau menutup blok logika terkait.
                }
            // Membuka atau menutup blok logika terkait.
            });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        }, { threshold: 0.12 });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        revealItems.forEach((item) => observer.observe(item));
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    } else revealItems.forEach((item) => item.classList.add('is-visible'));
    // Menyimpan nilai pada variabel previewCopy untuk digunakan berikutnya.
    const previewCopy = { admin: 'Kontrol penuh untuk konfigurasi dan aktivitas sistem.', petugas: 'Alur kerja cepat untuk transaksi kendaraan di lapangan.', owner: 'Insight ringkas untuk memantau performa bisnis parkir.' };
    // Menyimpan nilai pada variabel previewData untuk digunakan berikutnya.
    const previewData = {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        admin: { greeting: 'Good morning, Admin', title: 'Dashboard overview', vehicles: '1.284', revenue: 'Rp 8,6 jt', slots: '64' },
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        petugas: { greeting: 'Good morning, Petugas', title: 'Operasional hari ini', vehicles: '248', revenue: 'Rp 2,1 jt', slots: '64' },
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        owner: { greeting: 'Good morning, Owner', title: 'Performa parkir', vehicles: '8.492', revenue: 'Rp 32,4 jt', slots: '64' },
    // Membuka atau menutup blok logika terkait.
    };
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    document.querySelectorAll('[data-preview]').forEach((tab) => tab.addEventListener('click', () => {
        // Menyimpan nilai pada variabel role untuk digunakan berikutnya.
        const role = tab.dataset.preview;
        // Menyimpan nilai pada variabel data untuk digunakan berikutnya.
        const data = previewData[role];
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelectorAll('[data-preview]').forEach((item) => {
            // Menyimpan nilai pada variabel active untuk digunakan berikutnya.
            const active = item === tab;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            item.classList.toggle('active', active);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            item.setAttribute('aria-selected', String(active));
        // Membuka atau menutup blok logika terkait.
        });
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-copy]').textContent = previewCopy[role];
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-greeting]').textContent = data.greeting;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-title]').textContent = data.title;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-metric="vehicles"]').textContent = data.vehicles;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-metric="revenue"]').textContent = data.revenue;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        document.querySelector('[data-preview-metric="slots"]').textContent = data.slots;
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
// Membuka atau menutup blok logika terkait.
});
