// Mengimpor modul atau dependensi yang digunakan file ini.
import { defineConfig } from 'vite';
// Mengimpor modul atau dependensi yang digunakan file ini.
import laravel from 'laravel-vite-plugin';
// Mengimpor modul atau dependensi yang digunakan file ini.
import tailwindcss from '@tailwindcss/vite';

// Mengekspor nilai agar dapat digunakan oleh modul lain.
export default defineConfig({
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    plugins: [
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        laravel({
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            input: [
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                'resources/css/app.css',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                'resources/css/petugas.css',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                'resources/css/owner.css',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                'resources/js/app.js',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                'resources/js/owner-dashboard.js',
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            ],
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            refresh: true,
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        }),
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        tailwindcss(),
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    ],
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    server: {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        watch: {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            ignored: ['**/storage/framework/views/**'],
        // Membuka atau menutup blok logika terkait.
        },
    // Membuka atau menutup blok logika terkait.
    },
// Membuka atau menutup blok logika terkait.
});
