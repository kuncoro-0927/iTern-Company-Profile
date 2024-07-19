<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>

<body 
class=" bg-white" 
style="height: 110vh;"> <!-- Style untuk tinggi body agar mencapai 110vh -->
    <nav 
    class="py-10 px-14 flex items-center justify-between">
        <img 
        class="shadow-2xl" 
        src="/images/logo_sign.svg" 
        alt="">
    </nav>

    <div class="text-center mt-10">
        <span 
        class="text-4xl text-biru-tua font-bold">
        Forgot Password
        </span> <!-- Judul halaman -->
    </div>
 
    <form method="POST" 
        action="{{ route('password.email') }}">
        @csrf <!-- Token CSRF untuk keamanan form -->

    <div class="mx-auto mt-10 border rounded-xl py-4 px-7 border-gray-400 max-w-96">
        <p class="" >Lupa Kata Sandi Anda? Tidak ada masalah. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda email tautan baru.</p> <!-- Deskripsi untuk lupa kata sandi -->
        <div class="mt-5">
            <input 
            class="border rounded-xl py-3 px-5 border-gray-400 w-full" 
            type="email" 
            name="email" 
            id="email" 
            placeholder="Email"> <!-- Input untuk alamat email -->
        </div>
    <div>
            <!-- Session Status -->
        <x-auth-session-status 
        class="mb-4" 
        :status="session('status')" /> <!-- Menampilkan status sesi -->
    </div>

    <div>
        <button 
        class="bg-biru-tua mt-10 rounded-xl py-4 px-4 border-gray-400 w-full text-white font-medium" 
        type="submit">
        Email Password Reset Link
        </button> <!-- Tombol untuk mengirim email tautan reset kata sandi -->
    </div>
    </div>
    </form>
       
</body>
</html>
