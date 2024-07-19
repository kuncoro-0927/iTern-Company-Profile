<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>

<body class=" bg-white h-auto mb-20">
    <nav class="py-10 px-14">
        <img 
        class="shadow-2xl" 
        src="/images/logo_sign.svg" 
        alt=""> <!-- Menampilkan logo -->
    </nav>

    <div class="text-center">
        <span 
        class="text-4xl text-biru-tua font-bold">
        Sign Up</span> <!-- Judul halaman -->
    </div>

    <form 
        action="{{ route('register') }}" 
        method="POST">
        @csrf <!-- Token CSRF untuk keamanan form -->

    <div 
        class="mx-auto mt-10 w-80">
        <input 
        class="border rounded-lg py-4 px-7 border-gray-400 w-full  focus:ring-biru-tua focus:border-biru-tua" 
        name="name" 
        type="text" 
        id="name" 
        value="{{ old('name') }}" 
        required autocomplete="name" 
        placeholder="Name"> <!-- Input nama -->

        @error('name') <!-- Menampilkan pesan error jika ada kesalahan pada nama -->
        <div 
        class="text-red-500 mt-2 text-sm">
        {{ $message }}
        </div>
        @enderror
    </div>

    <div 
        class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-lg py-4 px-7 w-full focus:ring-biru-tua focus:border-biru-tua {{ $errors->has('email') ? 'border-2 border-red-500' : 'border-gray-400' }}" 
        name="email" 
        type="email" 
        id="email" 
        required autocomplete="email" 
        placeholder="Email" 
        value="{{ old('email') }}"> <!-- Input email -->
        @error('email') <!-- Menampilkan pesan error jika ada kesalahan pada email -->
        <div class="border text-sm mt-6 py-4 px-7 border-gray-400 w-full">
            <span class="text-sm">{{ $message }}</span>
        </div>
        @enderror
    </div>

    <div 
        class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-lg py-4 px-7 border-gray-400 w-full  focus:ring-biru-tua focus:border-biru-tua {{ $errors->has('password') ? 'border-2 border-red-500' : 'border-gray-400' }}" 
        name="password" 
        type="password" 
        id="password" 
        value="{{ old('password') }}" 
        required autocomplete="new-password" 
        placeholder="Password" > <!-- Input password -->
        @error('password') <!-- Menampilkan pesan error jika ada kesalahan pada password -->
        <div class="border text-sm mt-6 py-4 px-7 border-gray-400 w-full">
            <span class="text-sm">{{ $message }}</span>
        </div>
        @enderror
    </div>

    <div 
        class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-lg py-4 px-7 border-gray-400 w-full  focus:ring-biru-tua focus:border-biru-tua" 
        name="password_confirmation" 
        type="password" 
        id="password" 
        value="{{ old('password_confirmation') }}" 
        required autocomplete="new-password" 
        placeholder="Confirm Password"> <!-- Input konfirmasi password -->
    </div>

    <div 
        class="mx-auto mt-14 w-80 bg-biru-tua rounded-xl  hover:bg-biru_hover hover:rounded-xl hover:duration-200">
        <button 
        class=" py-4 px-4 border-gray-400 w-full text-white font-medium" 
        type="submit">
        Sign Up</button> <!-- Tombol untuk pendaftaran -->
    </div>
    </form>

    <div 
        class="text-center mt-6">
        <span>Already have an account?
        <a class="font-medium text-biru-tua" 
        href="{{ route('login') }}">Sign In</a></span> <!-- Link untuk masuk -->
    </div>
</body>
</html>
