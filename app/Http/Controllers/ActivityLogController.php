<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Controllers;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\ActivityLog;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\View\View;

// Mendefinisikan kelas ActivityLogController untuk mengelompokkan perilaku terkait.
class ActivityLogController extends Controller
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi index untuk menjalankan tanggung jawab terkait.
    public function index(Request $request): View
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Menetapkan pasangan nilai atau callback pada struktur data ini.
        $logs = ActivityLog::with('user')->when($request->search, fn ($q, $search) => $q->where('action', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%"))->when($request->role, fn ($q, $role) => $q->whereHas('user', fn ($user) => $user->where('role', $role)))->latest()->paginate(15)->withQueryString();
        // Mengembalikan nilai atau hasil dari fungsi ini.
        return view('admin.log-aktivitas', compact('logs'));
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
