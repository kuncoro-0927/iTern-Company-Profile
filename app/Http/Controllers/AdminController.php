<?php

namespace App\Http\Controllers;
use App\Models\Postingan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showdashboard()
{
   
    return view('admin.dashboard');
}

public function showpostingan()
{
   
    return view('admin.postingan');
}

public function showkarir()
{
   
    return view('admin.karir');
}

public function showdokumen()
{
   
    return view('admin.dokumen');
}


public function admin_postingan()
{
   $items = Postingan::all();
    return view('admin.postingan', compact('items'));
}
}
