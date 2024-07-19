<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showpostingan()
{
   
    return view('postingan');
}

public function showkarir()
{
   
    return view('karir');
}

public function showdokumen()
{
   
    return view('dokumen');
}

public function showkontak()
{
   
    return view('kontak');
}

public function showprofile()
{
   
    return view('profile');
}
}
