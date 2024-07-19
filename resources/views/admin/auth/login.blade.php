

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="/images/icon.svg">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class=" bg-white" style="height: 110vh;">
    <nav class="py-10 px-14">
        <img class="shadow-2xl" src="/images/logo_sign.svg" alt="">
    </nav>

    <div class="text-center">
        <span class="text-4xl text-biru-tua font-bold">Login Admin</span>
    </div>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
    <div class="mx-auto mt-10 w-80">
        <input class="border rounded-xl py-4 px-7 border-gray-400 w-full" type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="mx-auto mt-6 w-80">
        <input class="border rounded-xl py-4 px-7 border-gray-400 w-full" type="password" name="password" id="password" placeholder="Password">
    </div>

    <div class="mx-auto mt-14 w-80 bg-biru-tua rounded-xl">
        <button class=" py-4 px-4 border-gray-400 w-full text-white font-medium" type="submit" >Sign In</button>
    </div>
    </form>
    <div class="text-center mt-6">
        <span>Don't have an account? 
        <a class="font-medium text-biru-tua" 
        href="{{ route('admin.register') }}">Sign Up
        </a>
        </span>
    </div>
</body>
</html>