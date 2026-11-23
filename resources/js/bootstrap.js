// Mengimpor modul atau dependensi yang digunakan file ini.
import axios from 'axios';
// Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
window.axios = axios;

// Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
