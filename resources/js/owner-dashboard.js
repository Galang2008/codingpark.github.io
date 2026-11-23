// Mengimpor modul atau dependensi yang digunakan file ini.
import './bootstrap';

// Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
document.addEventListener('DOMContentLoaded', () => {
    // Menyimpan nilai pada variabel app untuk digunakan berikutnya.
    const app = document.querySelector('[data-owner-dashboard]');
    // Memeriksa kondisi untuk menentukan alur eksekusi.
    if (!app) return;

    // Menyimpan nilai pada variabel dateFrom untuk digunakan berikutnya.
    const dateFrom = app.querySelector('[data-date-from]');
    // Menyimpan nilai pada variabel dateTo untuk digunakan berikutnya.
    const dateTo = app.querySelector('[data-date-to]');
    // Menyimpan nilai pada variabel errorMessage untuk digunakan berikutnya.
    const errorMessage = app.querySelector('[data-filter-error]');
    // Menyimpan nilai pada variabel searchInputs untuk digunakan berikutnya.
    const searchInputs = [...app.querySelectorAll('[data-table-search], [data-table-search-secondary]')];
    // Menyimpan nilai pada variabel activePage untuk digunakan berikutnya.
    let activePage = 1;
    // Menyimpan nilai pada variabel requestController untuk digunakan berikutnya.
    let requestController;
    // Menyimpan nilai pada variabel searchTimer untuk digunakan berikutnya.
    let searchTimer;
    // Menyimpan nilai pada variabel revenueChart untuk digunakan berikutnya.
    let revenueChart;
    // Menyimpan nilai pada variabel vehicleChart untuk digunakan berikutnya.
    let vehicleChart;

    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    window.lucide?.createIcons();

    // Menyimpan nilai pada variabel formatNumber untuk digunakan berikutnya.
    const formatNumber = (value) => new Intl.NumberFormat('id-ID').format(value ?? 0);
    // Menyimpan nilai pada variabel formatCurrency untuk digunakan berikutnya.
    const formatCurrency = (value) => `Rp ${formatNumber(value)}`;
    // Menyimpan nilai pada variabel dateString untuk digunakan berikutnya.
    const dateString = (date) => {
        // Menyimpan nilai pada variabel year untuk digunakan berikutnya.
        const year = date.getFullYear();
        // Menyimpan nilai pada variabel month untuk digunakan berikutnya.
        const month = String(date.getMonth() + 1).padStart(2, '0');
        // Menyimpan nilai pada variabel day untuk digunakan berikutnya.
        const day = String(date.getDate()).padStart(2, '0');
        // Mengembalikan hasil dari fungsi atau callback ini.
        return `${year}-${month}-${day}`;
    // Membuka atau menutup blok logika terkait.
    };

    // Menyimpan nilai pada variabel createChart untuk digunakan berikutnya.
    const createChart = (canvas, type, color, fill) => {
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (!window.Chart || !canvas) return null;
        // Menyimpan nilai pada variabel context untuk digunakan berikutnya.
        const context = canvas.getContext('2d');
        // Menyimpan nilai pada variabel gradient untuk digunakan berikutnya.
        const gradient = context.createLinearGradient(0, 0, 0, canvas.clientHeight || 200);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        gradient.addColorStop(0, fill);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        gradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

        // Mengembalikan hasil dari fungsi atau callback ini.
        return new window.Chart(context, {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            type,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            data: {
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                labels: [],
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                datasets: [{
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    label: type === 'line' ? 'Pendapatan' : 'Kendaraan masuk',
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    data: [],
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    borderColor: color,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    backgroundColor: type === 'line' ? gradient : color,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    fill: type === 'line',
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    tension: 0.35,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    borderWidth: 2,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    pointRadius: type === 'line' ? 3 : 0,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    pointHoverRadius: 5,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    borderRadius: type === 'bar' ? 5 : 0,
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    maxBarThickness: 26,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                }],
            // Membuka atau menutup blok logika terkait.
            },
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            options: {
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                responsive: true,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                maintainAspectRatio: false,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                interaction: { intersect: false, mode: 'index' },
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                plugins: {
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    legend: { display: false },
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    tooltip: {
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        backgroundColor: '#17233d',
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        padding: 10,
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        callbacks: {
                            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                            label: (context) => type === 'line'
                                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                                ? ` ${formatCurrency(context.parsed.y)}`
                                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                                : ` ${formatNumber(context.parsed.y)} kendaraan`,
                        // Membuka atau menutup blok logika terkait.
                        },
                    // Membuka atau menutup blok logika terkait.
                    },
                // Membuka atau menutup blok logika terkait.
                },
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                scales: {
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    x: {
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        grid: { display: false },
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        ticks: { color: '#95a1b2', maxRotation: 0, autoSkip: true, maxTicksLimit: 8, font: { size: 9 } },
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        border: { display: false },
                    // Membuka atau menutup blok logika terkait.
                    },
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    y: {
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        beginAtZero: true,
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        grid: { color: '#edf1f6', borderDash: [4, 4] },
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        ticks: {
                            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                            color: '#95a1b2',
                            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                            maxTicksLimit: 5,
                            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                            font: { size: 9 },
                            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                            callback: (value) => type === 'line'
                                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                                ? `Rp ${formatNumber(value)}`
                                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                                : formatNumber(value),
                        // Membuka atau menutup blok logika terkait.
                        },
                        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                        border: { display: false },
                    // Membuka atau menutup blok logika terkait.
                    },
                // Membuka atau menutup blok logika terkait.
                },
            // Membuka atau menutup blok logika terkait.
            },
        // Membuka atau menutup blok logika terkait.
        });
    // Membuka atau menutup blok logika terkait.
    };

    // Mencari elemen halaman yang dibutuhkan oleh logika ini.
    revenueChart = createChart(app.querySelector('[data-revenue-chart]'), 'line', '#2563eb', 'rgba(37, 99, 235, .2)');
    // Mencari elemen halaman yang dibutuhkan oleh logika ini.
    vehicleChart = createChart(app.querySelector('[data-vehicle-chart]'), 'bar', '#06b6d4', 'rgba(6, 182, 212, .25)');

    // Menyimpan nilai pada variabel renderRows untuk digunakan berikutnya.
    const renderRows = (rows) => {
        // Menyimpan nilai pada variabel body untuk digunakan berikutnya.
        const body = app.querySelector('[data-transaction-rows]');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        body.replaceChildren();

        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (!rows.length) {
            // Menyimpan nilai pada variabel row untuk digunakan berikutnya.
            const row = document.createElement('tr');
            // Menyimpan nilai pada variabel cell untuk digunakan berikutnya.
            const cell = document.createElement('td');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            cell.colSpan = 9;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            cell.className = 'empty-row';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            cell.textContent = 'Belum ada transaksi pada rentang waktu ini.';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            row.append(cell);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            body.append(row);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            return;
        // Membuka atau menutup blok logika terkait.
        }

        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        rows.forEach((item) => {
            // Menyimpan nilai pada variabel row untuk digunakan berikutnya.
            const row = document.createElement('tr');
            // Menyimpan nilai pada variabel values untuk digunakan berikutnya.
            const values = [
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.plat,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.jenis ? item.jenis.charAt(0).toUpperCase() + item.jenis.slice(1) : '-',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.masuk,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.keluar,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.durasi === null ? '—' : `${Math.floor(item.durasi / 60)}j ${item.durasi % 60}m`,
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                formatCurrency(item.tarif),
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                item.pembayaran,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            ];

            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            values.forEach((value, index) => {
                // Menyimpan nilai pada variabel cell untuk digunakan berikutnya.
                const cell = document.createElement('td');
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                cell.textContent = value;
                // Memeriksa kondisi untuk menentukan alur eksekusi.
                if (index === 0) {
                    // Menyimpan nilai pada variabel strong untuk digunakan berikutnya.
                    const strong = document.createElement('strong');
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    strong.textContent = value;
                    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                    cell.replaceChildren(strong);
                // Membuka atau menutup blok logika terkait.
                }
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                row.append(cell);
            // Membuka atau menutup blok logika terkait.
            });

            // Menyimpan nilai pada variabel statusCell untuk digunakan berikutnya.
            const statusCell = document.createElement('td');
            // Menyimpan nilai pada variabel status untuk digunakan berikutnya.
            const status = document.createElement('span');
            // Menyimpan nilai pada variabel completed untuk digunakan berikutnya.
            const completed = item.status === 'selesai';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            status.className = `status-badge ${completed ? 'status-done' : 'status-active'}`;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            status.textContent = completed ? 'Selesai' : 'Masih parkir';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            statusCell.append(status);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            row.append(statusCell);

            // Menyimpan nilai pada variabel officerCell untuk digunakan berikutnya.
            const officerCell = document.createElement('td');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            officerCell.textContent = item.petugas;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            row.append(officerCell);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            body.append(row);
        // Membuka atau menutup blok logika terkait.
        });
    // Membuka atau menutup blok logika terkait.
    };

    // Menyimpan nilai pada variabel renderOfficers untuk digunakan berikutnya.
    const renderOfficers = (officers) => {
        // Menyimpan nilai pada variabel container untuk digunakan berikutnya.
        const container = app.querySelector('[data-officers]');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        container.replaceChildren();
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (!officers.length) {
            // Menyimpan nilai pada variabel empty untuk digunakan berikutnya.
            const empty = document.createElement('p');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            empty.className = 'empty-officers';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            empty.textContent = 'Belum ada transaksi pada periode ini.';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            container.append(empty);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            return;
        // Membuka atau menutup blok logika terkait.
        }

        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        officers.forEach((officer, index) => {
            // Menyimpan nilai pada variabel row untuk digunakan berikutnya.
            const row = document.createElement('div');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            row.className = 'officer-row';
            // Menyimpan nilai pada variabel rank untuk digunakan berikutnya.
            const rank = document.createElement('span');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            rank.className = 'officer-rank';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            rank.textContent = String(index + 1);
            // Menyimpan nilai pada variabel avatar untuk digunakan berikutnya.
            const avatar = document.createElement('span');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            avatar.className = 'owner-avatar small-avatar';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            avatar.textContent = officer.nama.charAt(0).toUpperCase();
            // Menyimpan nilai pada variabel name untuk digunakan berikutnya.
            const name = document.createElement('strong');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            name.textContent = officer.nama;
            // Menyimpan nilai pada variabel count untuk digunakan berikutnya.
            const count = document.createElement('span');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            count.textContent = `${formatNumber(officer.jumlah)} transaksi`;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            row.append(rank, avatar, name, count);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            container.append(row);
        // Membuka atau menutup blok logika terkait.
        });
    // Membuka atau menutup blok logika terkait.
    };

    // Menyimpan nilai pada variabel render untuk digunakan berikutnya.
    const render = (report) => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        ['pendapatan', 'transaksi', 'masuk_hari_ini', 'terisi'].forEach((key) => {
            // Menyimpan nilai pada variabel value untuk digunakan berikutnya.
            const value = report.cards[key].value;
            // Mencari elemen halaman yang dibutuhkan oleh logika ini.
            app.querySelector(`[data-card="${key}"]`).textContent = key === 'pendapatan' ? formatCurrency(value) : formatNumber(value);
            // Menyimpan nilai pada variabel change untuk digunakan berikutnya.
            const change = report.cards[key].change;
            // Menyimpan nilai pada variabel changeElement untuk digunakan berikutnya.
            const changeElement = app.querySelector(`[data-change="${key}"]`);
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            changeElement.textContent = `${change > 0 ? '+' : ''}${formatNumber(change)}%`;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            changeElement.classList.toggle('negative', change < 0);
        // Membuka atau menutup blok logika terkait.
        });

        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-summary="kendaraan_masuk"]').textContent = formatNumber(report.cards.kendaraan_masuk);
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-summary="kendaraan_keluar"]').textContent = formatNumber(report.cards.kendaraan_keluar);
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-summary="rata_rata_tarif"]').textContent = formatCurrency(report.cards.rata_rata_tarif);

        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (revenueChart) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            revenueChart.data.labels = report.chart.labels;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            revenueChart.data.datasets[0].data = report.chart.pendapatan;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            revenueChart.update();
        // Membuka atau menutup blok logika terkait.
        }
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (vehicleChart) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            vehicleChart.data.labels = report.chart.labels;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            vehicleChart.data.datasets[0].data = report.chart.kendaraan;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            vehicleChart.update();
        // Membuka atau menutup blok logika terkait.
        }

        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-vehicle-total]').textContent = `${formatNumber(report.cards.kendaraan_masuk)} kendaraan`;
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        renderRows(report.table.data);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        renderOfficers(report.petugas_teraktif);
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-table-count]').textContent = `${formatNumber(report.table.total)} transaksi`;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-pagination-label]').textContent = `Menampilkan ${formatNumber(report.table.from ?? 0)}–${formatNumber(report.table.to ?? 0)} dari ${formatNumber(report.table.total)} transaksi`;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-page-number]').textContent = `${report.table.current_page} / ${report.table.last_page}`;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-page-prev]').disabled = report.table.current_page <= 1;
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelector('[data-page-next]').disabled = report.table.current_page >= report.table.last_page;
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        window.lucide?.createIcons();
    // Membuka atau menutup blok logika terkait.
    };

    // Menyimpan nilai pada variabel loadReport untuk digunakan berikutnya.
    const loadReport = async (page = 1) => {
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (!dateFrom.value || !dateTo.value) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            errorMessage.textContent = 'Tanggal mulai dan tanggal akhir wajib diisi.';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            errorMessage.hidden = false;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            return;
        // Membuka atau menutup blok logika terkait.
        }
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (dateFrom.value > dateTo.value) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            errorMessage.textContent = 'Tanggal akhir harus sama dengan atau setelah tanggal mulai.';
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            errorMessage.hidden = false;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            return;
        // Membuka atau menutup blok logika terkait.
        }

        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        requestController?.abort();
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        requestController = new AbortController();
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        errorMessage.hidden = true;
        // Menyimpan nilai pada variabel params untuk digunakan berikutnya.
        const params = new URLSearchParams({
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            dari: dateFrom.value,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            sampai: dateTo.value,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            search: searchInputs[0]?.value.trim() ?? '',
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            page: String(page),
        // Membuka atau menutup blok logika terkait.
        });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        app.classList.add('is-loading');

        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        try {
            // Menyimpan nilai pada variabel response untuk digunakan berikutnya.
            const response = await fetch(`${app.dataset.endpoint}?${params.toString()}`, {
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                credentials: 'same-origin',
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                signal: requestController.signal,
            // Membuka atau menutup blok logika terkait.
            });
            // Menyimpan nilai pada variabel data untuk digunakan berikutnya.
            const data = await response.json();
            // Memeriksa kondisi untuk menentukan alur eksekusi.
            if (!response.ok) {
                // Menyimpan nilai pada variabel validationMessage untuk digunakan berikutnya.
                const validationMessage = Object.values(data.errors ?? {}).flat()[0];
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                throw new Error(validationMessage ?? data.message ?? 'Rekap transaksi gagal dimuat.');
            // Membuka atau menutup blok logika terkait.
            }
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            activePage = data.table.current_page;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            render(data);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        } catch (error) {
            // Memeriksa kondisi untuk menentukan alur eksekusi.
            if (error.name !== 'AbortError') {
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                errorMessage.textContent = error.message || 'Rekap transaksi gagal dimuat. Silakan coba kembali.';
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                errorMessage.hidden = false;
            // Membuka atau menutup blok logika terkait.
            }
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        } finally {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            app.classList.remove('is-loading');
        // Membuka atau menutup blok logika terkait.
        }
    // Membuka atau menutup blok logika terkait.
    };

    // Menyimpan nilai pada variabel choosePeriod untuk digunakan berikutnya.
    const choosePeriod = (period) => {
        // Menyimpan nilai pada variabel today untuk digunakan berikutnya.
        const today = new Date();
        // Menyimpan nilai pada variabel start untuk digunakan berikutnya.
        const start = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        // Menyimpan nilai pada variabel end untuk digunakan berikutnya.
        const end = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        switch (period) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'today':
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                break;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'week': {
                // Menyimpan nilai pada variabel day untuk digunakan berikutnya.
                const day = (start.getDay() + 6) % 7;
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                start.setDate(start.getDate() - day);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                break;
            // Membuka atau menutup blok logika terkait.
            }
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'month':
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                start.setDate(1);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                break;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'last-month':
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                start.setDate(1);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                start.setMonth(start.getMonth() - 1);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                end.setDate(0);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                break;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'year':
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                start.setMonth(0, 1);
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                break;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            case 'custom':
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                return;
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            default:
                // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
                return;
        // Membuka atau menutup blok logika terkait.
        }
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        dateFrom.value = dateString(start);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        dateTo.value = dateString(end);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        loadReport(1);
    // Membuka atau menutup blok logika terkait.
    };

    // Mencari elemen halaman yang dibutuhkan oleh logika ini.
    app.querySelectorAll('[data-period]').forEach((button) => {
        // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
        button.addEventListener('click', () => {
            // Mencari elemen halaman yang dibutuhkan oleh logika ini.
            app.querySelectorAll('[data-period]').forEach((item) => item.classList.toggle('selected', item === button));
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            choosePeriod(button.dataset.period);
        // Membuka atau menutup blok logika terkait.
        });
    // Membuka atau menutup blok logika terkait.
    });
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-apply-filter]').addEventListener('click', () => loadReport(1));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    [dateFrom, dateTo].forEach((input) => input.addEventListener('change', () => {
        // Mencari elemen halaman yang dibutuhkan oleh logika ini.
        app.querySelectorAll('[data-period]').forEach((button) => {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            button.classList.toggle('selected', button.dataset.period === 'custom');
        // Membuka atau menutup blok logika terkait.
        });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        loadReport(1);
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-page-prev]').addEventListener('click', () => loadReport(Math.max(1, activePage - 1)));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-page-next]').addEventListener('click', () => loadReport(activePage + 1));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    searchInputs.forEach((input) => input.addEventListener('input', () => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        searchInputs.forEach((otherInput) => {
            // Memeriksa kondisi untuk menentukan alur eksekusi.
            if (otherInput !== input) otherInput.value = input.value;
        // Membuka atau menutup blok logika terkait.
        });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        window.clearTimeout(searchTimer);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        searchTimer = window.setTimeout(() => loadReport(1), 300);
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    }));

    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-export-excel]').addEventListener('click', () => {
        // Menyimpan nilai pada variabel params untuk digunakan berikutnya.
        const params = new URLSearchParams({
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            dari: dateFrom.value,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            sampai: dateTo.value,
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            search: searchInputs[0]?.value.trim() ?? '',
        // Membuka atau menutup blok logika terkait.
        });
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        window.location.assign(`${app.dataset.export}?${params.toString()}`);
    // Membuka atau menutup blok logika terkait.
    });
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-export-pdf]').addEventListener('click', () => window.print());

    // Menyimpan nilai pada variabel sidebar untuk digunakan berikutnya.
    const sidebar = app.querySelector('[data-sidebar]');
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-menu-toggle]').addEventListener('click', () => sidebar.classList.toggle('open'));
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    app.querySelector('[data-collapse]').addEventListener('click', () => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        sidebar.classList.toggle('collapsed');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        localStorage.setItem('codingpark-owner-sidebar-collapsed', String(sidebar.classList.contains('collapsed')));
    // Membuka atau menutup blok logika terkait.
    });
    // Memeriksa kondisi untuk menentukan alur eksekusi.
    if (localStorage.getItem('codingpark-owner-sidebar-collapsed') === 'true' && window.innerWidth > 760) {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        sidebar.classList.add('collapsed');
    // Membuka atau menutup blok logika terkait.
    }

    // Menyimpan nilai pada variabel profileButton untuk digunakan berikutnya.
    const profileButton = app.querySelector('[data-profile-toggle]');
    // Menyimpan nilai pada variabel profileDropdown untuk digunakan berikutnya.
    const profileDropdown = app.querySelector('[data-profile-dropdown]');
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    profileButton.addEventListener('click', () => {
        // Menyimpan nilai pada variabel isOpen untuk digunakan berikutnya.
        const isOpen = profileDropdown.classList.toggle('open');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        profileButton.setAttribute('aria-expanded', String(isOpen));
    // Membuka atau menutup blok logika terkait.
    });
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    document.addEventListener('click', (event) => {
        // Memeriksa kondisi untuk menentukan alur eksekusi.
        if (!event.target.closest('.profile-menu-wrap')) {
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            profileDropdown.classList.remove('open');
            // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
            profileButton.setAttribute('aria-expanded', 'false');
        // Membuka atau menutup blok logika terkait.
        }
    // Membuka atau menutup blok logika terkait.
    });

    // Menyimpan nilai pada variabel themeButton untuk digunakan berikutnya.
    const themeButton = app.querySelector('[data-theme-toggle]');
    // Menyimpan nilai pada variabel setTheme untuk digunakan berikutnya.
    const setTheme = (isDark) => {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        app.classList.toggle('dark-mode', isDark);
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        themeButton.innerHTML = `<i data-lucide="${isDark ? 'sun' : 'moon'}"></i>`;
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        themeButton.setAttribute('aria-label', isDark ? 'Aktifkan tema terang' : 'Aktifkan tema gelap');
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        localStorage.setItem('codingpark-owner-dark-mode', String(isDark));
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        window.lucide?.createIcons();
    // Membuka atau menutup blok logika terkait.
    };
    // Mendaftarkan penanganan untuk interaksi atau peristiwa terkait.
    themeButton.addEventListener('click', () => setTheme(!app.classList.contains('dark-mode')));
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    setTheme(localStorage.getItem('codingpark-owner-dark-mode') === 'true');

    // Memeriksa kondisi untuk menentukan alur eksekusi.
    if (!window.Chart) {
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        errorMessage.textContent = 'Grafik tidak dapat dimuat. Periksa koneksi internet untuk memuat Chart.js.';
        // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
        errorMessage.hidden = false;
    // Membuka atau menutup blok logika terkait.
    }
    // Menjalankan instruksi JavaScript untuk perilaku antarmuka ini.
    render(window.ownerDashboardInitial);
// Membuka atau menutup blok logika terkait.
});
