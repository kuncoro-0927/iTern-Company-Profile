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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="">
    <section class="bg-beige h-auto">
        <nav class="py-10 mx-16 flex items-center justify-between">
            <img class="shadow-2xl" src="/images/logo_sign.svg" alt="">
            <a class="text-black font-medium ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/dashboard' ? 'bg-biru_hover text-white' : '' }}" href="{{route('dashboard')}}" >Dashboard</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_postingan')}}" >Postingan</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/karir' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_karir')}}" >Karir</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/dokumen' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_dokumen')}}" >Dokumen</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover  hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/profile' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin.profile.edit')}}" >Profile</a>
        </nav>
    </section>    
<section class="bg-beige py-20">
    <form id="send-verification" method="post" action="{{ route('admin.verification.send') }}">
        @csrf
    </form>
    
    <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    <div class="mx-20">
        <div class="bg-white drop-shadow-xl py-20 px-7 mx-auto rounded-3xl">
            <div class="flex items-center justify-center gap-20 ">
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
            
        <div class="ml-20 mt-20 py-10">
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


        <form method="post" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">
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


<!--Footer-->
<section class="bg-biru-tua h-auto">     
    <div class="flex gap-10 justify-center pt-20">
        <a href="#"><img src="/images/ig_footer.svg" alt="ig"></a>
        <a href="#"><img src="/images/x_footer.svg" alt="x"></a>
        <a href="#"><img src="/images/linkeidn_footer.svg" alt="link"></a>
        <a href="#"><img src="/images/tiktok_footer.svg" alt="tiktok"></a>
        <a href="#"><img src="/images/yt_footer.svg" alt="yt"></a>
    </div>
    <div class="py-12 text-center">
        <p class=" text-white"> © 2024 iTern - All rights reserved || Designed By: Khitan</p>
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
</body>
</html>




