<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postingan</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="../src/tailwind.css">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="overflow-x-hidden">
    <section class="bg-beige py-32">
        <nav class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <img src="/images/logo.svg" alt="">
            <a class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'beranda' ? 'bg-biru_hover text-white' : '' }}" href="{{route('beranda')}}" >Beranda</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.postingan')}}" >Postingan</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'karir' ? 'bg-biru_hover text-white' : '' }}" href="{{route('user.karir')}}" >Karir</a>
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
        <div class="flex flex-row justify-between px-32 py-0 mt-3 ">
            <div class="py-20" data-aos="fade-up" data-aos-duration="2000">
                <div>
                    <span class="font-bold text-7xl text-biru_hover leading-normal">Postingan<br> iTern</span>
                </div>
                <div class="mt-3">
                    <span class="text-biru_hover">Temukan berbagai informasi tentang<br> iTern juga pencapaian dan komitmen<br> yang luar biasa.</span>
                </div> 
            </div>
            
            <div class="ml-8" data-aos="fade-left" data-aos-duration="2000">
                <img class="" src="/images/postingan.svg" alt="">
            </div>
        </div>     
</section>
    <section class="bg-white h-auto" x-data="{ isOpen: false }">
        <div class="flex">
            <div class="p-20" data-aos="fade-up" data-aos-duration="2000">
                <span class="text-5xl font-bold">Postingan Terbaru</span>
                <br><br>
                <span>Di laman ini anda bisa melihat berbagai postingan tentang<br> informasi dan pencapaian iTern!</span>
            </div>
        </div>

        <!-- Postingan awal -->
        <div class="flex flex-wrap space-x-14 justify-center mt-16" data-aos="fade-up" data-aos-duration="2000">
            @foreach ($postinganAwal as $doc)
                <div class="relative ">
                    <div class="" style="width: 350px">
                        <img class="shadow-xl rounded-2xl" src="{{ Storage::url($doc->gambar) }}" style="width: 350px; height: 350px" alt="">
                    </div>
                    <a href="{{ route('postingan.show', $doc->id) }}" class="text-center font-medium shadow-xl bg-white rounded-2xl py-14 px-12 w-64 h-32 mx-auto absolute top-1/2 left-1/2 transform -translate-x-1/2 translate-y-20 flex items-center justify-center">
                       {{$doc->nama}}
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Tombol "See More" -->
        <div x-data="{ isOpen: false }" data-aos="fade-up" data-aos-duration="2000">
            <button @click="isOpen = true" x-show="!isOpen" class="font-medium underline text-lg rounded py-28 mx-24 mt-5">See More</button>

            <!-- Postingan lanjutan -->
            <div x-show="isOpen" style="overflow: hidden" class="mt-28">
                <div class="flex mx-20 mt-16 mb-20">
                    @foreach ($postinganLanjutan as $doc)
                        <div class="relative mx-auto">
                            <div class="" style="width: 350px">
                                <img class="shadow-xl rounded-2xl" src="{{ Storage::url($doc->gambar) }}" style="width: 350px; height: 350px" alt="">
                            </div>
                            <div class="shadow-xl bg-white rounded-2xl py-14 px-12 w-64 h-32 mx-auto absolute top-1/2 left-1/2 transform -translate-x-1/2 translate-y-20 flex items-center justify-center">
                                <a href="{{ route('postingan.show', $doc->id) }}" class="font-medium text-center">{{$doc->nama}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol "See Less" -->
                <div class="">
                    <button @click="isOpen = false" x-show="isOpen" class="font-medium underline text-lg rounded mx-20 my-14">See Less</button>
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
