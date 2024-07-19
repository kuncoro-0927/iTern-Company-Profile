<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta dan judul halaman -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    
    <!-- Favicon dan stylesheet -->
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    
    <!-- Preconnect dan font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Animasi -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Script Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="overflow-x-hidden bg-biru-tua">
    <!-- Navigasi -->
    <section class="bg-biru-tua pt-40 pb-20">
        <nav class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <!-- Logo -->
            <img src="/images/logo.svg" alt="">
            
            <!-- Tautan Navigasi -->
            <a class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'beranda' ? 'bg-biru_hover text-white' : '' }}" href="{{route('beranda')}}">Beranda</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.postingan')}}">Postingan</a>
            <!-- Tambahkan komentar untuk setiap tautan navigasi -->
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'karir' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.karir')}}">Karir</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'dokumen' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.dokumen')}}">Dokumen</a>
            <a class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'kontak' ? 'bg-biru_hover text-white' : '' }}" href="{{route('show.kontak')}}">Kontak</a>
            
            <!-- Simbol dropdown dan menu dropdown -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rotate-90 size-10 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>
            
            <!-- Profil pengguna -->
            <div class="py-2 px-4 w-auto rounded-full">
                <!-- Tombol dropdown -->
                <div class="relative">
                    <button id="dropdown-btn" class="flex items-center text-sm">
                        <!-- Foto profil -->
                        <div class="w-10 h-10 relative overflow-hidden rounded-full ml-5 mr-2">
                            <!-- Periksa apakah ada foto profil, jika tidak, gunakan foto default -->
                            @if(Auth::user()->foto_profile)
                                <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . Auth::user()->foto_profile) }}" alt="">
                            @else
                                <img class="object-cover w-full h-full rounded-full" src="/images/user.svg" alt="Default Profile Photo">
                            @endif       
                        </div>
                        <!-- Nama pengguna -->
                        <div class="text-start">
                            <div>{{ Auth::user()->name }}</div>
                            <!-- Email pengguna -->
                            <div class="text-xs text-gray-600">{{ Auth::user()->email }}</div>
                        </div>
                    </button>
                    
                    <!-- Menu dropdown -->
                    <div id="dropdown-menu" class="absolute hidden right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                        <!-- Tautan menu untuk mengedit profil -->
                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Profil</a>
                        <!-- Form logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tombol hamburger untuk tampilan seluler -->
            <div class="hidden sm:flex sm:items-center sm:ms-6"></div>
        </nav>

        <!-- Konten utama -->
        <div class="flex flex-row justify-between px-32 py-0 mt-3 ">
            <!-- Judul dan deskripsi -->
            <div class="py-20">
                <div data-aos="fade-up" data-aos-duration="2000">
                    <span class="font-bold text-7xl text-white leading-normal">Tentang<br>iTern</span>
                </div>
                <div data-aos="fade-up" data-aos-duration="2000" class="mt-3">
                    <span class="text-white">Kami adalah sumber kepercayaan dalam<br>menghadirkan berbagai informasi bagi<br>kemajuan perusahaan kami ke arah yang<br>lebih baik.</span>
                </div> 
            </div>
            
            <!-- Gambar -->
            <div data-aos="fade-left" data-aos-duration="2000" class="ml-8">
                <img class="" src="/images/beranda.svg" alt="">
            </div>
        </div>     
    </section>
    
    <!-- Seksi Tentang Kami -->
    <section class="bg-white items-center justify-center h-auto overflow-y-hidden">
        <!-- Deskripsi tentang perusahaan -->
        <div data-aos="fade-up" data-aos-duration="2000" class="py-20 px-24 text-justify">
            <p class="text-2xl leading-normal">Kami adalah tim yang berdedikasi sepenuhnya untuk membawa visi perusahaan kami menjadi kenyataan. Dengan fokus yang tajam pada inovasi, keunggulan, dan pelayanan pelanggan yang luar biasa. Setiap individu di dalam tim membawa keahlian yang unik dan semangat yang tak tergoyahkan, menyatukan upaya kami untuk memberikan yang terbaik kepada pelanggan kami.</p>
            <p class="text-2xl mt-8 leading-normal">Keberagaman adalah kekuatan kami. Kami bangga memiliki tim yang terdiri dari berbagai latar belakang dan pengalaman, menciptakan lingkungan kerja yang inklusif dan dinamis. Bersama-sama, kami saling mendukung dan mendorong satu sama lain untuk tumbuh dan berkembang.</p>
            <p class="text-2xl mt-8 leading-normal">Kami menganggap setiap pelanggan sebagai mitra dan menyadari bahwa keberhasilan mereka juga merupakan keberhasilan kami. Dari awal hingga akhir, kami hadir untuk mendukung dan memandu pelanggan kami menuju kesuksesan yang berkelanjutan.</p>
        </div>
    </section>

    <!-- Seksi Visi dan Misi -->
    <section class="bg-white py-10 h-auto">
        <!-- Visi dan Misi perusahaan -->
        <div class="bg-biru-tua py-28 rounded-3xl px-4 mx-20 flex" data-aos="fade-up" data-aos-duration="2000">
            <!-- Gambar dan teks Visi -->
            <img class="mx-auto" data-aos="fade-right" data-aos-duration="2000" src="/images/img_visi_misi.svg" alt="">
            <div class="flex flex-col justify-center ml-20 mx-auto">
                <!-- Visi -->
                <div class="mb-20" data-aos="fade-up" data-aos-duration="2000">
                    <span class="text-white font-bold text-3xl">Visi</span>
                    <br><br>
                    <span class="text-white">Menjadi pionir dalam menciptakan solusi yang<br>memperbaiki dunia, mendorong kemajuan<br>yang berkelanjutan bagi semua.</span>
                </div>

                <!-- Misi -->
                <div data-aos="fade-up" data-aos-duration="2000">
                    <span class="text-white font-bold text-3xl">Misi</span>
                    <br><br>
                    <span class="text-white">Memberikan solusi yang inovatif dan<br>berkelanjutan untuk memenuhi kebutuhan<br>pelanggan, dengan menjaga integritas,<br>kejujuran, dan komitmen pada kualitas<br>yang tinggi.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Seksi Tim Kami -->
    <section class="bg-beige" style="height: 140vh;">
        <!-- Judul dan deskripsi tentang tim -->
        <div class="text-center py-28" data-aos="fade-up" data-aos-duration="2000">
            <span class="text-5xl font-bold">Tim Kami</span>
            <br><br>
            <span>Menyatukan berbagai keahlian dan semangat, kami bergerak bersama<br>untuk mencapai tujuan yang luar biasa.</span>
        </div>

        <!-- Slider tim -->
        <div>
            <!-- Loop untuk setiap slide -->
            <div data-aos="fade-up" data-aos-duration="2000" class=" mx-auto relative" x-data="{
                activeSlide: 1,
                slides: [
                    {id: 1, content: [
                        {img: '/images/timsatu.svg', name: 'Khitan Hesthi Kuncoro', position: 'Direktur Utama'},
                        {img: '/images/timdua.svg', name: 'Nalini Karina Andhini', position: 'Direktur IT & Operasi'},
                        {img: '/images/timtiga.svg', name: 'Putri Aulia', position: 'Direktur Kepatuhan'}
                    ]},
                    {id: 2, content: [
                        {img: '/images/timempat.svg', name: 'Rifqi Primanda', position: 'Komisaris Utama'},
                        {img: '/images/timlima.svg', name: 'Nabila Disty', position: 'Komisaris Independen'},
                        {img: '/images/timenam.svg', name: 'Vannela Salsabilla', position: 'Komisaris Independen'}
                    ]}
                ]
            }">
                <!-- Loop untuk setiap slide -->
                <div class="mx-auto">
                    <template x-for="slide in slides" :key="slide.id">
                        <div x-show="activeSlide === slide.id" class=" h-80 bg text-white rounded-lg px-6 -mx-48 justify-center">
                            <div class="flex justify-center items-center mx-auto gap-5">
                                <!-- Loop untuk setiap anggota tim -->
                                <template x-for="(item, index) in slide.content" :key="index" class="mb-4 mr-4">
                                    <div class="flex flex-col items-center">
                                        <!-- Foto anggota tim -->
                                        <img :src="item.img" alt="Gambar Slide" class="mb-10 mr-2 shadow-xl rounded-xl">
                                        <!-- Nama dan posisi anggota tim -->
                                        <p x-text="item.name" class="text-base text-black font-semibold"></p>
                                        <p x-text="item.position" class="text-base text-black"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
                
                <!-- Tombol untuk navigasi slide -->
                <div class="absolute top-1/2 transform -translate-y-1/2 flex justify-between items-center w-full">
                    <!-- Tombol untuk slide sebelumnya -->
                    <div class="ml-4 ">
                        <button x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide -  1" class=" text-black font-bold rounded-full ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                    </div>
            
                    <!-- Tombol untuk slide selanjutnya -->
                    <div class="mr-4">
                        <button x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide +  1" class=" text-black font-bold rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
