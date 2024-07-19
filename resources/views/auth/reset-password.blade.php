<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>
<body 
class=" bg-white" 
style="height: 120vh;"> <!-- Style untuk tinggi body agar mencapai 120vh -->
    <nav 
    class="py-10 px-14">
        <img 
        class="shadow-2xl" 
        src="/images/logo_sign.svg" 
        alt="">
    </nav>

    <div 
    class="text-center">
        <span 
        class="text-4xl text-biru-tua font-bold">
        Reset Password
    </span> <!-- Judul halaman -->
    </div>
    <form 
    method="POST" 
    action="{{ route('password.store') }}">
        @csrf <!-- Token CSRF untuk keamanan form -->
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}"> <!-- Input hidden untuk menyimpan token reset password -->

    <div 
    class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-xl py-4 px-7 border-gray-400 w-full" 
        type="email" 
        name="email" 
        value="{{ old('email', $request->email) }}"
        required autofocus autocomplete="username"> <!-- Input email -->
    </div>

    <div 
    class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-xl py-4 px-7 border-gray-400 w-full" 
        type="password" 
        name="password" 
        required autocomplete="new-password" 
        placeholder="Password"> <!-- Input password -->
    </div>

    <div 
    class="mx-auto mt-6 w-80">
        <input 
        class="border rounded-xl py-4 px-7 border-gray-400 w-full" 
        type="password" 
        name="password_confirmation" 
        required autocomplete="new-password" 
        placeholder="Confirm Password"> <!-- Konfirmasi password -->
    </div>

    <div 
    class="mx-auto mt-14 w-80 bg-biru-tua rounded-xl">
        <button 
        class=" py-4 px-4 border-gray-400 w-full text-white font-medium" 
        type="submit">
        Reset Password
    </button> <!-- Tombol untuk mereset password -->
    </div>
    </form>
</body>
</html>
