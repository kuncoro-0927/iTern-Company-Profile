<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title> <!-- Judul halaman -->
    <link rel="shortcut icon" href="/images/icon.svg"> <!-- Icon situs -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> <!-- Menggunakan stylesheet Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- Memuat stylesheet AOS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Memuat font Poppins dari Google Fonts -->
</head>
<body class="bg-biru-tua"> <!-- Memberikan background warna biru tua -->

<section 
class="bg-biru-tua pt-40 pb-20"> <!-- Bagian header -->
    <nav 
    class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full"> <!-- Navigasi -->
        <img 
        src="/images/logo.svg" 
        alt=""> <!-- Logo situs -->
        <a 
        class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" 
        href="{{ url('/home') }}">
        About Us
        </a> <!-- Link menuju halaman "About Us" -->
        <a 
        class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 " 
        href="{{ url('/homekontak') }}">
        Contact
        </a> <!-- Link menuju halaman "Contact" -->

        <svg 
        xmlns="http://www.w3.org/2000/svg" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke-width="1.5" 
        stroke="currentColor" 
        class="rotate-90 size-10 text-gray-400"> <!-- Icon panah -->
            <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M5 12h14" /> <!-- Path icon panah -->
          </svg>

        @if (Route::has('login')) <!-- Jika route login tersedia -->
        @auth
        <a 
        class="text-white font-semibold rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" 
        href="{{ url('/beranda') }}">
        Beranda
        </a> <!-- Tombol menuju halaman "Beranda" jika pengguna sudah login -->
        @else
        <a 
        class="font-semibold text-lg" 
        href="{{ route('login') }}" >
        Login
        </a> <!-- Tombol menuju halaman login jika pengguna belum login -->
        @if (Route::has('register')) <!-- Jika route register tersedia -->
        <a 
        class="text-white font-medium rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" 
        href="{{ route('register') }}">
        Get Started
        </a> <!-- Tombol menuju halaman registrasi -->
        @endif
        @endauth
        @endif 
    </nav>
    <div 
    class="flex flex-row justify-between px-36 py-0"> <!-- Konten utama -->
        <div 
        class="py-20" 
        data-aos="fade-up" 
        data-aos-duration="2000">
            <div>
                <span 
                class="font-bold text-6xl text-white leading-normal">
                Buat Langkah
                <br> 
                Cerdas Hari Ini!
                </span> <!-- Teks utama -->
            </div>

            <div 
            class="mt-3">
                <span 
                class="text-white">Mulailah perjalanan menuju impian 
                <br> Anda bersama kami.
                </span> <!-- Teks deskripsi -->
            </div>
            @auth <!-- Jika pengguna sudah login -->
            <div 
            class="mt-16">
                <a 
                class="text-white font-medium rounded-lg bg-merah py-3 px-3  hover:bg-red-700 duration-300" 
                href="{{ url('/beranda') }}">
                Beranda
                </a> <!-- Tombol menuju halaman "Beranda" -->
            </div>
            @else <!-- Jika pengguna belum login -->
             @if (Route::has('register')) <!-- Jika route register tersedia -->
            <div 
            class="mt-16">
                <a 
                class="text-white font-medium rounded-lg bg-merah py-3 px-3  hover:bg-red-700 duration-300" 
                href="{{ route('register') }}">
                Get Started
                </a> <!-- Tombol menuju halaman registrasi -->
            </div>
            @endif
            @endauth
        
        </div>
        <div 
        class="ml-8" 
        data-aos="fade-left" 
        data-aos-duration="2000">
            <img 
            src="/images/company.svg" 
            alt=""> <!-- Gambar perusahaan -->
        </div>
    </div>
</section> 

<section 
class="h-96 bg-beige"> <!-- Bagian follow us -->
    <div 
    class="text-center py-14 mb-8" 
    data-aos="fade-up" 
    data-aos-duration="2000">
        <span 
        class="text-5xl font-bold">
        Follow Us
        </span>
    </div>
    
    <div 
    class="flex justify-between px-28" 
    data-aos="fade-up" 
    data-aos-duration="2000"> <!-- Ikuti kami di media sosial -->
        <a href="#"><img src="/images/instagram.svg" alt="ig"></a> <!-- Ikuti di Instagram -->
        <a href="#"><img src="/images/x.svg" alt="x"></a> <!-- Ikuti di X -->
        <a href="#"><img src="/images/linkeidn.svg" alt="link"></a> <!-- Ikuti di LinkedIn -->
        <a href="#"><img src="/images/tiktok.svg" alt="tiktok"></a> <!-- Ikuti di TikTok -->
        <a href="#"><img src="/images/yt.svg" alt="yt"></a> <!-- Ikuti di YouTube -->
    </div>
</section>

<section 
class="bg-white" 
style="height: 150vh;"> <!-- Bagian tentang perusahaan -->
    <div 
    class="py-11 text-center" 
    data-aos="fade-up" 
    data-aos-duration="2000"> 
        <span 
        class="text-5xl font-bold leading-normal">
        Terpercaya Oleh 
        <br> 
        Perusahaan Terbaik
        </span>
    </div>

    <div 
    class="flex px-20 py-6 justify-center gap-32"> <!-- Konten -->
        <div 
        class="mt-10" 
        data-aos="fade-up" 
        data-aos-duration="2000"> 
            <img 
            class="rounded-3xl shadow-2xl" 
            src="/images/img_beranda.svg" 
            alt="">
        </div>
        <div 
        class="py-36" 
        data-aos="fade-up" 
        data-aos-duration="2000"> 
            <span 
            class="text-4xl font-bold leading-normal">
            Perkembangan luar
            <br> 
            biasa
            </span>
            <br>
            <br>
            <span 
            class="italic">"Kepercayaan dari perusahaan-
            <br>
            perusahaan papan atas
            <br> 
            membuktikan kualitas dan reputasi
            <br> 
            yang Anda bangun. Langkah yang
            <br> 
            luar biasa!"
            </span> <!-- Kutipan -->
                <br>
                <br>
                <span>
                - Michael T, Perusahaan Lain
            </span>
        </div>
    </div>
</section>

<section 
class="bg-biru-tua h-80 flex"> <!-- Footer -->
    <div 
    class="py-16 px-14"> <!-- Logo dan deskripsi -->
        <img 
        class="shadow-2xl" 
        src="/images/logo_footer.svg" 
        alt="logo">
    <div 
    class="py-3">
        <span 
        class="text-white text-sm">
        Terima kasih telah mengunjungi situs
        <br> 
        kami. Senang dapat berbagi informasi
        <br> 
        dengan Anda dan jangan ragu untuk
        <br> 
        kembali!
        </span>
    </div>
    </div>
    <div 
    class="mx-auto py-16"> <!-- Informasi kontak -->
        <div 
        class="mt-6 flex items-center">
            <img 
            src="/images/alamat.svg" 
            alt="">
            <div 
            class="ml-4">
                <span 
                class="text-sm text-white">
                Indonesia
                </span>
                <br>
                <span 
                class="text-sm font-semibold text-white">
                Jawa Timur, Malang
                </span>
            </div>
        </div>
    
        <div 
        class="flex items-center mt-4">
            <img 
            src="/images/telepon.svg" 
            alt="">
            <div 
            class="ml-4">
                <span 
                class="text-sm font-semibold text-white">
                081234567890
                </span>
            </div>
        </div>

        <div 
        class="flex items-center mt-4">
            <img 
            src="/images/email.svg" 
            alt="">
            <div 
            class="ml-4">
                <span 
                class="text-sm font-semibold text-white">
                itern@gmail.com
                </span>
            </div>
        </div>
    </div>
    
    <div 
    class="py-14 px-14"> <!-- Tentang -->
        <span 
        class="text-white text-3xl font-bold">
        About
        </span>
    <div 
    class="py-3">
        <span 
        class="text-white text-sm">
        Temukan kami di platform sosial
        <br> 
        untuk tetap terhubung dan
        <br> 
        mendapatkan pembaruan terbaru.
        </span>
    </div>
    <div class="py-3 flex gap-5">
        <a href="#"><img src="/images/ig_footer.svg" alt="ig"></a> <!-- Ikuti di Instagram -->
        <a href="#"><img src="/images/x_footer.svg" alt="x"></a> <!-- Ikuti di X -->
        <a href="#"><img src="/images/linkeidn_footer.svg" alt="link"></a> <!-- Ikuti di LinkedIn -->
        <a href="#"><img src="/images/tiktok_footer.svg" alt="tiktok"></a> <!-- Ikuti di TikTok -->
        <a href="#"><img src="/images/yt_footer.svg" alt="yt"></a> <!-- Ikuti di YouTube -->
    </div>
    </div>

  </section>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- Script AOS -->
  <script>
      AOS.init(); <!-- Inisialisasi AOS -->
    </script>
</body>
</html>
