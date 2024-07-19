<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karir</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="../src/tailwind.css">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="bg-biru-tua">
    <section class="">
        <nav class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <img src="/images/logo.svg" alt="">
            <a class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'beranda' ? 'bg-biru_hover text-white' : '' }}" href="{{route('beranda')}}" >Beranda</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.postingan')}}" >Postingan</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 @if(Str::startsWith(Request::path(), 'detail_karir')) bg-biru_hover text-white @endif" href="{{route('user.karir')}}" >Karir</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'dokumen' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.dokumen')}}" >Dokumen</a>
            <a class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'kontak' ? 'bg-biru_hover text-white' : '' }}" href="{{route('show.kontak')}}" >Kontak</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rotate-90 size-10 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
              </svg>
               
            <div class=" py-2 px-4 w-auto rounded-full">
                <div class="relative">
                    <button id="dropdown-btn" class="flex items-center text-sm">
                        <div class="w-10 h-10 relative overflow-hidden rounded-full ml-5 mr-2">
                            @if(Auth::user()->foto_profile)
                                <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . Auth::user()->foto_profile) }}" alt="">
                            @else
                                <img class="object-cover w-full h-full rounded-full" src="/images/user.svg" alt="Default Profile Photo">
                            @endif       
                        </div>
                        <div class="text-start">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-600">{{ Auth::user()->email }}</div>
                        </div>
                    </button>
                    
                    
                    <div id="dropdown-menu" class="absolute hidden right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Profil</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
        </nav>
    </section>
    <section class="h-auto mt-36 mb-20">
        <div class="flex flex-row justify-between px-24 py-0 mt-3 ">
            <div class="py-20" data-aos="fade-up" data-aos-duration="2000">
                <div>
                    <span class="font-bold text-5xl text-white leading-normal">Bergabunglah<br> Dengan iTern</span>
                </div>
                <div class="mt-3">
                    <span class="text-white">iTern konsisten menciptakan<br> pengalaman personal tidak hanya<br> untuk karyawan. Tapi juga untuk anda.</span>
                </div> 
            </div>
            
            <div class="ml-8" data-aos="fade-left" data-aos-duration="2000">
                <img class="" src="/images/karir.svg" alt="">
            </div>
        </div>     
</section>

<section class="bg-white h-auto flex justify-center items-center">
    
    <div class="bg-white drop-shadow-xl w-full mx-14 my-12 py-12 rounded-xl h-auto:" data-aos="fade-up" data-aos-duration="2000">
        <p class="text-center font-bold text-4xl text-biru-tua">{{$detail->nama_lowongan}}</p>
        <div>
            <p class="ml-32 mt-24 mb-6 text-biru-tua font-bold text-3xl">Deskripsi Pekerjaan</p>
            <div id="textContainer" class="prose mx-32 leading-9">
                <p id="text">
                    {!! nl2br(e($detail->deskripsi_pekerjaan)) !!}
                </p>
            </div>
        </div>

        <div>
            <p class="ml-32 mt-12 mb-6 text-biru-tua font-bold text-3xl">Syarat dan Ketentuan</p>
            <div id="textContainer2" class="prose mx-32 leading-9">
                <p id="text2">
                    {!! nl2br(e($detail->syarat_ketentuan)) !!}
                </p>
            </div>
        </div>

        <div>
            <p class="ml-32 mt-12 mb-6 text-biru-tua font-bold text-3xl">Tahap Rekrutmen</p>
            <div class="mx-32 leading-normal">
                <p>
                    {{$detail->tahap_rekrutmen}}
                </p>
            </div>
        </div>

        <div class="flex justify-center gap-5 mt-36 mb-10">
            <div class="justify-center">
                <a class="py-3 px-5 bg-merah text-white rounded-full font-semibold hover:bg-red-700" href="{{route('user.karir')}}">Kembali</a>
            </div>
            
            <div class="justify-center">
                <a class="py-3 px-5 text-white bg-biru-tua rounded-full font-semibold hover:bg-blue-950 " href="{{ Storage::url($detail->formulir) }}">Apply Now</a>
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