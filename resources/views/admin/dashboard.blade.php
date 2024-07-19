<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="../src/tailwind.css">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <section class="flex ">
        <div class="bg-abuabu m-10 rounded-2xl p-8 drop-shadow-xl w-96" style="height: auto; width: 100vh" >
            <div class="flex items-center justify-between">
            <img src="/images/logo_sign.svg" alt="">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
    
             <button class="" type="submit">Log Out
             </button>
            </form>
        </div>
            <div class="bg-white rounded-lg mt-16 px-5 py-3 drop-shadow-lg">
                <p class="text-sm">{{ Auth::user()->email }}</p>
            </div>
                <div class="bg-biru-tua mt-10 px-4 py-7 rounded-2xl drop-shadow-lg">
                    <p class="text-white font-bold text-2xl">Selamat Datang,<br>{{ Auth::user()->name }}</p>
                    <p class="mt-2 text-white text-sm">Mari mulai mengelola<br> dengan penuh semangat!</p>
                </div>

                    <p class="ml-4 mt-10">Buat Postingan Terbaru</p>

                <button class="bg-white w-full py-10 mt-5 px-14 drop-shadow-xl rounded-3xl">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 mx-auto mb-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
               </svg>  
                Posting Sesuatu
                </button>

        </div>

    <div>
        <nav class="mt-10 flex justify-between ml-auto mx-16 active ">
            <a class="text-black font-medium ml-auto hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300  {{ Request::path() == 'admin/dashboard' ? 'bg-biru_hover text-white' : '' }}" href="{{route('dashboard')}}" >Dashboard</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300  {{ Request::path() == 'admin/postingan' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_postingan')}}" >Postingan</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300  {{ Request::path() == 'admin/karir' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_karir')}}" >Karir</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover hover:text-white py-3 px-4 rounded-full duration-300  {{ Request::path() == 'admin/dokumen' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin_dokumen')}}" >Dokumen</a>
            <a class="text-black font-medium ml-3 hover:bg-biru_hover  hover:text-white py-3 px-4 rounded-full duration-300  {{ Request::path() == 'admin/profile' ? 'bg-biru_hover text-white' : '' }}" href="{{route('admin.profile.edit')}}" >Profile</a>
        </nav>
       
    <div class="flex justify-between gap-5 mt-14 my-14 mr-10">
        <div class="bg-kuning px-7 w-64 py-7 rounded-xl drop-shadow-lg">
        <p class="font-semibold">Postingan</p>
        <p class="font-semibold text-3xl mt-1">13</p>
        <p class="text-sm mt-1">Jumlah Seluruh Postingan</p>
        </div>

        <div class="bg-biru px-7 w-64 py-7 rounded-xl drop-shadow-lg">
            <p class="font-semibold text-white">Karir</p>
            <p class="font-semibold text-3xl mt-1 text-white">13</p>
            <p class="text-sm mt-1 text-white">Jumlah Seluruh Postingan</p>
            </div>

            <div class="bg-red-500 px-7 w-64 py-7 rounded-xl drop-shadow-lg">
                <p class="font-semibold ">Dokumen</p>
                <p class="font-semibold text-3xl mt-1">13</p>
                <p class="text-sm mt-1 ">Jumlah Seluruh Postingan</p>
                </div>
    </div>

    <div x-data="chartData()" x-init="initChart()" class="mb-10 w-auto h-auto ml-auto mr-20">
        <canvas id="myChart" class="bg-gray-50 rounded shadow-lg"></canvas>
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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
    <script>
        function chartData() {
            return {
                initChart() {
                    const data = {
                        labels: ['Postingan', 'Karir', 'Dokumen'],
                        datasets: [{
                            label: 'Jumlah',
                            data: [10, 13, 20],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                }
            };
        }
    </script>

</body>
</html>