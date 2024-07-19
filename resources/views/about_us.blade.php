<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="overflow-x-hidden bg-biru-tua">

<section 
    class="bg-biru-tua pt-40 pb-20">
        <nav 
        class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <img 
            class="shadow-2xl" 
            src="/images/logo.svg" 
            alt="">
            <a 
            class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'home' ? 'bg-biru_hover text-white' : '' }} " 
            href="{{ url('/home') }}">About Us
            </a>
            <a 
            class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'homekontak' ? 'bg-biru_hover text-white' : '' }} " 
            href="{{ url('/homekontak') }}">Contact</a>

            <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke-width="1.5" 
            stroke="currentColor" 
            class="rotate-90 size-10 text-gray-400">
                <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M5 12h14" />
            </svg>

            @if (Route::has('login'))
            @auth
            <a 
            class="text-white font-semibold rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" 
            href="{{ url('/beranda') }}">Beranda</a>
            @else
            <a 
            class="font-semibold text-lg" 
            href="{{ route('login') }}" >Login</a>
            @if (Route::has('register'))
            <a 
            class="text-white font-medium rounded-lg bg-merah py-3 px-3 ml-8 hover:bg-red-700 duration-300" 
            href="{{ route('register') }}">Get Started</a>
            @endif
            @endauth
            @endif 
        </nav>

        <div 
        class="flex flex-row justify-between px-32 py-0 mt-3 ">
            <div 
            class="py-20">
                <div 
                data-aos="fade-up" 
                data-aos-duration="2000">
                    <span 
                    class="font-bold text-7xl text-white leading-normal">
                    Tentang
                    <br>
                    iTern</span>
                </div>

                <div 
                data-aos="fade-up" 
                data-aos-duration="2000" 
                class="mt-3">
                    <span 
                    class="text-white">Kami adalah sumber kepercayaan dalam
                    <br> menghadirkan berbagai informasi bagi
                    <br> kemajuan perusahaan kami ke arah yang
                    <br> lebih baik.
                    </span>
                </div> 
            </div>
            
            <div 
            data-aos="fade-left" 
            data-aos-duration="2000" 
            class="ml-8">
                <img 
                class="" 
                src="/images/beranda.svg" 
                alt="">
            </div>
        </div>     
</section>

<section 
    class="bg-white items-center justify-center h-auto overflow-y-hidden">
        <div  
        data-aos="fade-up" 
        data-aos-duration="2000" 
        class="py-20 px-24 text-justify">
            <p 
            class="text-2xl leading-normal">
            Kami adalah tim yang berdedikasi sepenuhnya untuk membawa visi perusahaan kami menjadi kenyataan. Dengan fokus yang tajam pada inovasi, keunggulan, dan pelayanan pelanggan yang luar biasa. Setiap individu di dalam tim membawa keahlian yang unik dan semangat yang tak tergoyahkan, menyatukan upaya kami untuk memberikan yang terbaik kepada pelanggan kami.
            </p>
            <p 
            class="text-2xl mt-8 leading-normal">
            Keberagaman adalah kekuatan kami. Kami bangga memiliki tim yang terdiri dari berbagai latar belakang dan pengalaman, menciptakan lingkungan kerja yang inklusif dan dinamis. Bersama-sama, kami saling mendukung dan mendorong satu sama lain untuk tumbuh dan berkembang.
            </p>
            <p class="text-2xl mt-8 leading-normal">
            Kami menganggap setiap pelanggan sebagai mitra dan menyadari bahwa keberhasilan mereka juga merupakan keberhasilan kami. Dari awal hingga akhir, kami hadir untuk mendukung dan memandu pelanggan kami menuju kesuksesan yang berkelanjutan.
            </p>
        </div>
</section>

<section 
    class="bg-white py-10 h-auto">
        <div 
        class="bg-biru-tua py-28 rounded-3xl px-4 mx-20 flex" 
        data-aos="fade-up" 
        data-aos-duration="2000">
            <img 
            class="mx-auto" 
            data-aos="fade-right" 
            data-aos-duration="2000" 
            src="/images/img_visi_misi.svg" 
            alt="">
            <div 
            class="flex flex-col justify-center ml-20 mx-auto">
                <div 
                class="mb-20" 
                data-aos="fade-up" 
                data-aos-duration="2000">
                    <span 
                    class="text-white font-bold text-3xl">
                    Visi
                    </span>
                    <br>
                    <br>
                    <span 
                    class="text-white">
                    Menjadi pionir dalam menciptakan solusi yang
                    <br> memperbaiki dunia, mendorong kemajuan
                    <br> yang berkelanjutan bagi semua.
                    </span>
                </div>
                <div 
                data-aos="fade-up" 
                data-aos-duration="2000">
                    <span 
                    class="text-white font-bold text-3xl">
                    Misi</span>
                    <br>
                    <br>
                    <span class="text-white">
                    Memberikan solusi yang inovatif dan
                    <br> berkelanjutan untuk memenuhi kebutuhan
                    <br> pelanggan, dengan menjaga integritas,
                    <br> kejujuran, dan komitmen pada kualitas
                    <br> yang tinggi.
                    </span>
                </div>
            </div>
        </div>
</section>

<section 
    class="bg-beige" 
    style="height: 140vh;">
        <div 
        class="text-center py-28" 
        data-aos="fade-up" 
        data-aos-duration="2000">
            <span 
            class="text-5xl font-bold">
            Tim Kami
            </span>
            <br><br>
            <span>Menyatukan berbagai keahlian dan semangat, kami bergerak bersama
            <br> untuk mencapai tujuan yang luar biasa.
            </span>
        </div>

        <div>
    <div 
        data-aos="fade-up" 
        data-aos-duration="2000" 
        class=" mx-auto relative" 
        x-data="{
        activeSlide: 1,
        slides: [
            {id: 1, content: [
                {img: '/images/timsatu.svg', name: 'Khitan Hesthi Kuncoro', position: 'Direktu Utama'},
                {img: '/images/timdua.svg', name: 'Nalini Karina Andhini', position: 'Direktur IT & Operasi'},
                {img: '/images/timtiga.svg', name: 'Putri Aulia', position: 'Direktur Kepatuhan'}
            ]},
            {id: 2, content: [
                {img: '/images/timempat.svg', name: 'Rifqi Primanda', position: 'Komisaris Utama'},
                {img: '/images/timlima.svg', name: 'Nabila Disty', position: 'Komisaris Independen'},
                {img: '/images/timenam.svg', name: 'Vannela Salsabilla', position: 'Komisaris Independen'}
            ]},    
                ]
                }">
    
        <!--data loop-->
        <div 
        class="mx-auto">
            <template x-for="slide in slides" :key="slide.id">
                <div 
                x-show="activeSlide === slide.id" 
                class=" h-80 bg text-white rounded-lg px-6 -mx-48 justify-center">
                    <div 
                    class="flex justify-center items-center mx-auto gap-5">
                        <template x-for="(item, index) in slide.content" :key="index" 
                        class="mb-4 mr-4">
                            <div 
                            class="flex flex-col items-center">
                                <img 
                                :src="item.img" 
                                alt="Gambar Slide" 
                                class="mb-10 mr-2 shadow-xl rounded-xl">
                                <p x-text="item.name" 
                                class="text-base text-black font-semibold">
                                </p>
                                <p x-text="item.position"
                                class="text-base text-black">
                            </p>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>
          
 <!--Back/Next-->
        <div 
        class="absolute top-1/2 transform -translate-y-1/2 flex justify-between items-center w-full">
            <div 
            class="ml-4 ">
                <button 
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide -  1"
                class=" text-black font-bold rounded-full ">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    class="h-10 w-10" fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor" 
                    stroke-width="2">
                        <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
    
            <div 
            class="mr-4">
                <button 
                x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide +  1"
                class=" text-black font-bold rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    class="h-10 w-10" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor" 
                    stroke-width="2">
                        <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<section
    class="bg-white relative" 
    style="height: auto;">
    <div 
        class="text-center py-20" 
        data-aos="fade-up" 
        data-aos-duration="2000" >
        <span 
        class="text-5xl font-bold">
        Sejarah
        </span>
    </div>
    <!--TEXT 1-->
    
    <div 
        class="flex" 
        data-aos="fade-up" 
        data-aos-duration="2000">
    <div 
        class="px-14">
        <div 
        class="bg-biru-tua py-5 px-7 w-80 rounded-2xl">
            <span 
            class="text-white font-medium">
            2024
            </span>
            <br>
            <span 
            class="text-white text-sm">
            iTern menyapa dunia untuk pertama kalinya.
        </span>
        </div>
    </div>
<!--TEXT 2-->
    <div 
    class="ml-64">
        <div 
        class="bg-biru-tua py-5 px-7 w-72 rounded-2xl">
            <span 
            class="text-white font-semibold">
            Bersambung
            </span>
            <br>
            <span 
            class="text-white text-sm">
            Tunggu tanggal mainnya ya.
        </span>
        </div>
    </div>
</div>
<!--TEXT 3-->
    <div 
        class="flex justify-between" 
        data-aos="fade-up" 
        data-aos-duration="2000">
    <div 
    class="py-36 ml-auto">
        <div 
        class="bg-biru-tua py-5 px-7 w-72 rounded-2xl">
            <span 
            class="text-white font-medium">
            Bersambung
            </span>
            <br>
            <span 
            class="text-white text-sm">
            Tunggu tanggal mainnya ya.
            </span>
        </div>
    </div>
<!--TEXT4-->
    <div 
    class="py-36 ml-auto mr-10">
        <div 
        class="bg-biru-tua py-5 px-7 w-72 rounded-2xl">
            <span 
            class="text-white font-medium">
            Bersambung
            </span>
            <br>
            <span 
            class="text-white text-sm">
            Tunggu tanggal mainnya ya.
            </span>
        </div>
    </div>

</div>
    <div 
    class="absolute top-0 w-full my-96 flex justify-center items-center" 
    data-aos="fade-up" 
    data-aos-duration="000">
        <div 
        class="">
            <img 
            src="/images/sejarah.svg" 
            alt="" 
            class="w-full object-cover">
        </div>
    </div>
</section>

<section 
    class="bg-biru-tua h-80 flex">
    <div 
    class="py-16 px-14">
    <img 
    class="shadow-2xl" 
    src="/images/logo_footer.svg" 
    alt="logo">
        <div 
        class="py-3">
        <span 
        class="text-white text-sm">
        Terima kasih telah mengunjungi situs
        <br> kami. Senang dapat berbagi informasi
        <br> dengan Anda dan jangan ragu untuk
        <br> kembali!
        </span>
        </div>
    </div>
    <div 
    class="mx-auto py-16">
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
    class="py-14 px-14">
        <span 
        class="text-white text-3xl font-bold">
        About
        </span>
    <div 
    class="py-3">
        <span 
        class="text-white text-sm">
        Temukan kami di platform sosial
        <br> untuk tetap terhubung dan
        <br> mendapatkan pembaruan terbaru.
        </span>
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