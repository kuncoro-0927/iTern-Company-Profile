<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dokumen</title>
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
<section class="bg-white">
    <nav class="py-10 mx-16 flex items-center justify-between active">
        <img class="shadow-2xl" src="/images/logo_sign.svg" alt="">
        <a class="text-black font-medium ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/dashboard' ? 'bg-biru_hover text-white' : '' }}" href="{{route('dashboard')}}" >Dashboard</a>
        <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_postingan')}}" >Postingan</a>
        <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/karir' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_karir')}}" >Karir</a>
        <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/dokumen' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_dokumen')}}" >Dokumen</a>
        <a class="text-black font-medium ml-3 hover:bg-biru_hover  hover:text-white py-3 px-4 rounded-full duration-300 {{ Request::path() == 'admin/profile' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin.profile.edit')}}" >Profile</a>
    </nav>
    <div class="flex items-center">
        <div class="ml-20">
            <p class="text-4xl font-bold">Dokumen</p>
            <p class="mt-3">Tabel data seluruh dokumen ada di halaman ini.</p>
            
        </div>
        <div class="ml-auto mr-20">
            <a href="{{route('dokumen.tambah')}}" class=" ml-20 py-3 px-4 bg-biru-tua hover:bg-biru_hover text-white rounded-full">Tambah</a>
        </div>
    </div>

  <!-- component -->
  <div class="antialiased font-poppins mx-auto" style="height: auto;">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight"></h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Dokumen
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tanggal Upload
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                            </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $doc)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $doc->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $doc->nama }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $doc->tanggal_upload }}
                                    </p>
                                </td>
                                <td class="py-5 border-b border-gray-200 bg-white text-sm">
                                    <div
                                        class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                        <div class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></div>
                                        <a href="{{ route('dokumen.edit', $doc->id) }}" class="relative">Edit</a>
                                    </div>
                                    
                                    <div
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <div class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></div>
                                        <button id="deleteButton{{ $doc->id }}" data-modal-target="deleteModal{{ $doc->id }}" data-modal-toggle="deleteModal{{ $doc->id }}" class="relative">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <span class="text-xs xs:text-sm text-gray-900">
                            
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

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
 <!-- Main modal -->
 @foreach($items as $doc)
 <div id="deleteModal{{ $doc->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
     <div class="relative p-4 w-full max-w-md h-full md:h-auto">
         <!-- Modal content -->
         <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
             <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal{{ $doc->id }}">
                 <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                 <span class="sr-only">Close modal</span>
             </button>
             <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
             <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah anda yakin ingin menghapus dokumen ini?</p>
             <div class="flex justify-center items-center space-x-4">
                 <button data-modal-toggle="deleteModal{{ $doc->id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                     Tidak
                 </button>
                 <form action="{{ route('dokumen.destroy', $doc->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                         Hapus
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 @endforeach
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>