<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>

<body 
    class="bg-white" 
    style="height: 110vh;"> <!-- Style untuk tinggi body agar mencapai 110vh -->
    <nav 
        class="py-10 px-14 flex items-center justify-between"> <!-- Navbar -->
            <img 
            class="shadow-2xl" 
            src="/images/logo_sign.svg" 
            alt=""> <!-- Menampilkan logo -->
    <form 
        method="POST" 
        action="{{ route('logout') }}">
            @csrf <!-- Token CSRF untuk keamanan form -->
        <div 
        class="ml-auto"> <!-- Mengatur margin kiri agar tombol logout berada di ujung kanan -->
        <button 
        type="submit" 
        class=" underline text-biru-tua hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Log Out') }}
        </button>
        </div> 
    </form>
    </nav>

    <div 
    class="text-center mt-10">
        <span 
        class="text-4xl text-biru-tua font-bold">
        Verify Email
        </span> <!-- Judul halaman -->
    </div>

    @if (session('status') == 'verification-link-sent')
        <div 
        class="mx-auto mt-10 border rounded-xl py-4 px-7 border-gray-400 max-w-96">
            <p 
            class="text-green-600" >A new verification link has been sent to the email address you provided during registration.
            </p>
        </div>
    @endif

    <form 
    method="POST" 
    action="{{ route('verification.send') }}">
    @csrf <!-- Token CSRF untuk keamanan form -->
    <div 
    class="mx-auto mt-10 border rounded-xl py-4 px-7 border-gray-400 max-w-96">
        <p>
        Terima kasih telah mendaftar! Kami telah mengirimkan email verifikasi ke alamat email Anda, silahkan Klik tautan verifikasi yang terdapat dalam email.
        </p>
        <button 
        class="bg-biru-tua mt-10 rounded-xl py-4 px-4 border-gray-400 w-full text-white font-medium" 
        type="submit" >Resend Verification Email
        </button> <!-- Tombol untuk mengirim ulang email verifikasi -->
    </div>
    </form>
</body>
</html>
