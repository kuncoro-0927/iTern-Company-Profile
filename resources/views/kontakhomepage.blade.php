<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="../src/tailwind.css">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="">
    <section class="bg-beige pt-40 pb-20">
        <nav class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <img src="/images/logo.svg" alt="">
            <a class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'home' ? 'bg-biru_hover text-white' : '' }}" href="{{ url('/home') }}">About Us</a>
            <a class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'homekontak' ? 'bg-biru_hover text-white' : '' }}" href="{{ url('/homekontak') }}">Contact</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rotate-90 size-10 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
              </svg>
            @if (Route::has('login'))
            @auth
            <a class="text-white font-semibold rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" href="{{ url('/beranda') }}">Beranda</a>
            @else
            <a class="font-semibold text-lg hover:text-biru-tua" href="{{ route('login') }}" >Login</a>
            @if (Route::has('register'))
            <a class="text-white font-medium rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" href="{{ route('register') }}">Get Started</a>
            @endif
            @endauth
            @endif 
        </nav>
        <div class="flex flex-row justify-between px-32 py-0 mt-3 ">
            <div class="py-20"  data-aos="fade-up" data-aos-duration="2000">
                <div>
                    <span class="font-bold text-7xl text-biru-tua leading-normal">Ada Yang Bisa<br>Dibantu?</span>
                </div>
                <div class="mt-3">
                    <span class="text-biru-tua">Kami tersedia untuk mendengar<br> pertanyaan dan umpan balik Anda.</span>
                </div> 
            </div>
            
            <div class="ml-8"  data-aos="fade-left" data-aos-duration="2000">
                <img class="shadow-2xl" src="/images/kontak.svg" alt="">
            </div>
        </div>     
</section>
<section class="bg-white flex justify-center items-center" style="height: 100vh;">
    <div class="flex"  data-aos="fade-up" data-aos-duration="2000">
        <div class="mx-20"> 
            <p class="font-bold text-5xl">iTern</p>
            <p class="mt-5">Terima kasih sudah menjelajahi website<br> kami, jika ada pertanyaan, saran dan<br> kritik anda bisa hubungi kami di laman ini.</p>
        </div>

        <div class="mx-20">
            <p class="font-bold text-5xl">Kontak</p>
            <p class="mt-5">Kantor perusahaan kami di Lowokwaru<br> Kota Malang, Jawa Timur, Indonesia.</p>
            <div class="mx-auto mt-20">
                <div class="flex items-center">
                    <img src="/images/telepon.svg" alt="">
                    <div class="ml-4">
                        <span class="text-sm">Telepon</span>
                        <br>
                        <span class="text-sm font-semibold">081234567890</span>
                    </div>
                </div>
            
                <div class="flex items-center mt-7">
                    <img src="/images/email.svg" alt="">
                    <div class="ml-4">
                        <span class="text-sm">Email</span>
                        <br>
                        <span class="text-sm font-semibold">iTern@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<section class="bg-biru-tua h-80 flex">
    <div class="py-16 px-14">
        <img class="shadow-2xl" src="/images/logo_footer.svg" alt="logo">
    <div class="py-3">
        <span class="text-white text-sm">Terima kasih telah mengunjungi situs<br> kami. Senang dapat berbagi informasi<br> dengan Anda dan jangan ragu untuk<br> kembali!</span>
    </div>
    </div>
    <div class="mx-auto py-16">
        <div class="mt-6 flex items-center">
            <img src="/images/alamat.svg" alt="">
            <div class="ml-4">
                <span class="text-sm text-white">Indonesia</span>
                <br>
                <span class="text-sm font-semibold text-white">Jawa Timur, Malang</span>
            </div>
        </div>
    
        <div class="flex items-center mt-4">
            <img src="/images/telepon.svg" alt="">
            <div class="ml-4">
                <span class="text-sm font-semibold text-white">081234567890</span>
            </div>
        </div>

        <div class="flex items-center mt-4">
            <img src="/images/email.svg" alt="">
            <div class="ml-4">
                <span class="text-sm font-semibold text-white">itern@gmail.com</span>
            </div>
        </div>
    </div>
    
    <div class="py-14 px-14">
        <span class="text-white text-3xl font-bold">About</span>
    <div class="py-3">
        <span class="text-white text-sm">Temukan kami di platform sosial<br> untuk tetap terhubung dan<br> mendapatkan pembaruan terbaru.</span>
    </div>
    <div class="py-3 flex gap-5">
        <a href="#"><img src="/images/ig_footer.svg" alt="ig"></a>
        <a href="#"><img src="/images/x_footer.svg" alt="x"></a>
        <a href="#"><img src="/images/linkeidn_footer.svg" alt="link"></a>
        <a href="#"><img src="/images/tiktok_footer.svg" alt="tiktok"></a>
        <a href="#"><img src="/images/yt_footer.svg" alt="yt"></a>
    </div>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("dropdown-btn").addEventListener("click", function() {
            document.getElementById("dropdown-menu").classList.toggle("hidden");
        });
    });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
</body>
</html>




