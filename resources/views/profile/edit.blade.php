<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="overflow-x-hidden">
    <section class="bg-biru-tua pt-40 pb-20">
        <nav class="py-3 px-14 flex items-center justify-between bg-beige fixed top-0 z-10 w-full">
            <img src="/images/logo.svg" alt="">
           
            <a class="font-medium text-lg ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('beranda')}}" >Beranda</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('user.postingan')}}" >Postingan</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('user.karir')}}" >Karir</a>
            <a class="font-medium text-lg ml-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('user.dokumen')}}" >Dokumen</a>
            <a class="font-medium text-lg ml-2 mr-2 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('show.kontak')}}" >Kontak</a>
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
                    <span class="font-bold text-7xl text-white leading-normal">Profile<br>Pengguna</span>
                </div>
                <div class="mt-3">
                    <span class="text-white">Di halaman ini anda bisa melihat<br>dan mengedit data anda.</span>
                </div> 
            </div>
            
            <div class="ml-8" data-aos="fade-left" data-aos-duration="2000">
                <img class="shadow-2xl" src="/images/profile.svg" alt="">
            </div>
        </div>     
    </section>


<section class="bg-beige py-20">
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    <div class="mx-20">
        <div class="bg-white drop-shadow-xl py-20 px-7 mx-auto rounded-3xl">
            <div class="flex items-center justify-center gap-20" data-aos="fade-up" data-aos-duration="2000">
                <div class="text-center">
                    <div class="w-64 h-64 relative overflow-hidden rounded-full">
                        @if(Auth::user()->foto_profile)
                <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . Auth::user()->foto_profile) }}" alt="">
            @else
                <img class="object-cover w-full h-full rounded-full" src="/images/user.svg" alt="Default Profile Photo">
            @endif
                    
                    </div>
                    <div class="mt-3 " ></div>
                </div>
                <div class="">
                    <P class="font-bold text-7xl">Profile</P>
                    <P class="font-medium text-2xl mt-8">{{ Auth::user()->name }}</P>
                </div>
            </div>
            
        <div class="ml-20 mt-20 py-10" data-aos="fade-up" data-aos-duration="2000">
            <p class="text-2xl font-semibold">Edit Profile</p>
            <div class="mt-5">
                <p>Nama</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="text" name="name" value="{{ Auth::user()->name }}" autocomplete="name"> 
                </input> 
            </div>
            <div class="mt-5">
                <p>Email</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="email" name="email" value="{{ Auth::user()->email }}" autocomplete="username">
                </input> 
            </div>
            <div class="mt-5">
                <p>Upload Foto Profile</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="file" name="foto_profile"  autocomplete="username">
                </input>
                <p class="text-sm mt-2">*pastikan ukuran foto 1:1</p> 
            </div>
   
            
        
        
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div>
            <p class=" mt-5 text-gray-800 ">
                {{ __('Your email address is unverified.') }}

                <button form="send-verification" class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p class="mt-2  font-medium text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        </div>
    @endif
</div>
    <div class="ml-20 ">
        <div class="">
            <button class="py-4 px-7 bg-biru-tua text-white rounded-full font-semibold" type="submit">Simpan</button>
        </div>  
    </div>
        </form>


        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
<div class="ml-20 py-10">
    <p class="text-2xl font-semibold">Edit Password</p>
            <div class="mt-5">
                <p>Current Password</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="password" name="current_password" placeholder="Current Password" autocomplete="current-password" required > 
                </input> 
            </div>
            <div class="mt-5 ">
                <p>New Password</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="password" name="password" placeholder="New Password" autocomplete="new-password" required>
                </input> 
            </div>
            <div class="mt-5 ">
                <p>Confirm Password</p>
                <input class="mt-2 w-96 rounded-xl border-2 border-black py-3 px-4" type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" required>
                </input> 
            </div>
</div>
            <div class="ml-20 mt-20">
                <div class="">
                    <button class="py-4 px-7 bg-biru-tua text-white rounded-full font-semibold" type="submit">Simpan</button>
                </div>  
            </div>
           
            </form>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <div class="text-center mt-20">
            <button type="submit" class="bg-merah py-3 px-5 rounded-full text-white font-semibold">Logout</button>
        </div>
    </form>
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
  @if(Session::has('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          Swal.fire({
              title: 'Success!',
              text: '{{ Session::get('success') }}',
              icon: 'success',
              confirmButtonText: 'OK'
          });
      });
  </script>
@endif

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



