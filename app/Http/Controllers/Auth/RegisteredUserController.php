<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function create(): View
    {
        return view('auth.register');
    }

    // Menangani pendaftaran pengguna baru
    public function store(Request $request): RedirectResponse
    {
         // Validasi data yang masuk
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
         // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       // Memicu event Registered
       event(new Registered($user));

       // Login pengguna yang baru terdaftar
       Auth::login($user);

       // Mengarahkan ke halaman beranda
       return redirect(route('beranda', absolute: false));
    }
}
