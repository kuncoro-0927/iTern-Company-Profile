<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
   // Menampilkan halaman login
    public function create(): View
    {
        return view('auth.login');
    }

    // Menangani permintaan otentikasi yang masuk
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Mengotentikasi kredensial pengguna

        $request->session()->regenerate(); // Meregenerasi ID sesi untuk mencegah sesi peretasan

        return redirect()->intended(route('beranda', absolute: false)); // Mengarahkan ke halaman yang dimaksud atau fallback ke 'beranda'
    }

   
    // Mengeluarkan pengguna dan menginvalkan sesi
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // Mengeluarkan pengguna menggunakan guard 'web'

        $request->session()->invalidate(); // Menginvalkan sesi saat ini

        $request->session()->regenerateToken(); // Meregenerasi token CSRF

        return redirect('/'); // Mengarahkan ke halaman utama
    }
}
