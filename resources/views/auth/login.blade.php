<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>
<body class="bg-white h-auto mb-20">
    <nav class="py-10 px-14">
        <img 
        class="shadow-2xl" 
        src="/images/logo_sign.svg" 
        alt="Logo"> <!-- Menampilkan logo -->
    </nav>

    <div class="text-center">
        <span 
        class="text-4xl text-biru-tua font-bold">
        Sign In <!-- Judul halaman -->
        </span>
    </div>

    <form 
        method="POST" 
        action="{{ route('login') }}">
        @csrf <!-- Token CSRF untuk keamanan form -->

    <div class="max-w-80 mx-auto">
    <div class="mx-auto mt-10 w-80">
        <input 
        class="border rounded-lg py-4 px-7 border-gray-400 w-full focus:ring-biru-tua focus:border-biru-tua {{ $errors->has('email') ? 'border-2 border-red-500' : 'border-gray-400' }}" 
        type="email" 
        name="email" 
        id="email" 
        placeholder="Email"> <!-- Input email -->
        @error('email') <!-- Menampilkan pesan error jika ada kesalahan pada email -->
        <div class="border text-sm mt-6 py-4 px-7 border-gray-400 w-full">
            <span class="text-sm">{{ $message }}</span>
        </div>
        @enderror
    </div>

    <div class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-lg py-4 px-7 border-gray-400 w-full  focus:ring-biru-tua focus:border-biru-tua {{ $errors->has('password') ? 'border-2 border-red-500' : 'border-gray-400' }}" 
        type="password" 
        name="password" 
        id="password" 
        placeholder="Password"> <!-- Input password -->
        @error('password') <!-- Menampilkan pesan error jika ada kesalahan pada password -->
        <div class="border text-sm mt-6 py-4 px-7 border-gray-400 w-full">
            <span class="text-sm">{{ $message }}</span>
        </div>
        @enderror
    </div>

    <div class="flex justify-between items-center">
    <div class="mt-6 text-center">
        <input 
        id="remember_me" 
        type="checkbox" 
        class="rounded border-gray-300 text-biru-tua shadow-sm focus:ring-biru-tua" 
        name="remember"> <!-- Checkbox untuk mengingat login -->
    <span 
        class="ms-1 text-sm text-gray-600">
        Remember me
    </span>
    </div>

    <div class="flex items-center mt-6">
        @if (Route::has('password.request'))
            <a 
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-biru-tua" 
            href="{{ route('password.request') }}">
                Forgot your password? <!-- Link untuk reset password -->
            </a>
        @endif
    </div>
   
    </div>
    <div class="mx-auto mt-14 w-80 bg-biru-tua hover:bg-biru_hover duration-300 rounded-lg">
        <button 
        class=" py-4 px-4 border-gray-400 w-full text-white font-medium" 
        type="submit">
        Sign In <!-- Tombol untuk login -->
    </button>
    </div>
    </form>

    <div class="text-center mt-6">
        <span>Don't have an account? 
        <a class="font-medium text-biru-tua" 
        href="{{ route('register') }}">Sign Up <!-- Link untuk Register -->
        </a>
        </span>
    </div>
    </div>
</body>
</html>
