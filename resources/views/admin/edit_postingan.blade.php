<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Postingan</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="../src/tailwind.css">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
<!--Halaman 1-->
<section class="bg-white h-auto">
    <nav class="py-10 mx-16 flex items-center justify-between active">
        <img class="shadow-2xl" src="/images/logo_sign.svg" alt="">
        <a class="font-medium ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('dashboard')}}" >Dashboard</a>
        <a class="font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 @if(Str::startsWith(Request::path(), 'admin/edit/postingan')) bg-biru_hover text-white @endif" href="{{route('admin_postingan')}}" >Postingan</a>
        <a class="font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('admin_karir')}}" >Karir</a>
        <a class="font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('admin_dokumen')}}" >Dokumen</a>
        <a class="font-medium ml-3 hover:bg-biru_hover  hover:text-white py-3 px-4 rounded-full duration-300" href="{{route('admin.profile.edit')}}" >Profile</a>
    </nav>
    <div class="flex items-center">
        <div class="ml-20">
            <p class="text-4xl font-bold">Edit Postingan</p>
            <p class="mt-3">Edit data postingan dengan mengisi form</p>
        </div>
    </div>
    <form action="{{ route('postingan.update', $postingan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="ml-20 mt-10 ">
    <label for="judul" class="block mb-2 font-medium text-gray-900">Judul</label>
    <input type="text" name="nama" id="judul" value="{{ $postingan->nama }}" class="block text-gray-900 rounded-xl w-96 border-2 mt-2  bg-gray-50 text-base ">
</div>

<div class="ml-20 mt-5 ">
    <label for="gambar" class="block font-medium text-gray-900">Gambar</label>
    <p class="font-normal text-gray-400">Unggah gambar dengan ukuran maksimal 2 MB</p>
    <input type="file" name="gambar" id="gambar" value="{{ $postingan->gambar }}" class="block text-gray-900 rounded-xl w-96 border-2 mt-2  bg-gray-50 text-base ">
</div>

<div class="ml-20 mt-5 ">
    <label for="tanggal" class="block mb-2  font-medium text-gray-900">Tanggal</label>
    <input type="date" name="tanggal_upload" id="tanggal" value="{{ $postingan->tanggal_upload }}" class="block text-gray-900 rounded-xl w-96 border-2 mt-2  bg-gray-50 text-base ">
</div>

<div class="mx-20 mt-5 mb-20">
    <label for="Deskripsi" class="block mb-2 font-medium text-gray-900">Deskripsi</label>
    <textarea type="text" name="deskripsi" id="Deskripsi" class="block w-full h-40 text-gray-900 rounded-xl border-2 mt-2bg-gray-50">{{ $postingan->deskripsi }}</textarea>
</div>

<div class="flex justify-center gap-5 mb-20 items-center">
    <div class="justify-center">
        <a class="py-3 px-5 bg-merah text-white rounded-full font-semibold" href="{{route('admin_postingan')}}">Kembali</a>
    </div>
    
    <div class="justify-center">
        <button type="submit" class="bg-blue-600 py-3 px-5 rounded-full text-white font-semibold">Simpan</button>
    </div>
</div>
    </form>

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