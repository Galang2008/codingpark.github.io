<?php

// Menetapkan namespace untuk mengelompokkan kelas pada file ini.
namespace App\Http\Middleware;

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Closure;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Http\Request;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Symfony\Component\HttpFoundation\Response;

// Mendefinisikan kelas EnsureUserHasRole untuk mengelompokkan perilaku terkait.
class EnsureUserHasRole
// Membuka blok kelas, fungsi, atau kontrol alur.
{
    // Mendefinisikan fungsi handle untuk menjalankan tanggung jawab terkait.
    public function handle(Request $request, Closure $next, string ...$roles): Response
    // Membuka blok kelas, fungsi, atau kontrol alur.
    {
        // Memanggil metode atau mengakses properti objek yang dibutuhkan.
        abort_unless($request->user() && in_array($request->user()->role, $roles, true), 403);

        // Mengembalikan nilai atau hasil dari fungsi ini.
        return $next($request);
    // Mengakhiri blok kelas, fungsi, atau kontrol alur.
    }
// Mengakhiri blok kelas, fungsi, atau kontrol alur.
}
