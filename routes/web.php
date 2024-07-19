<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Route;

//HOMEPAGE
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('about_us');
});

Route::get('/homekontak', function () {
    return view('kontakhomepage');
});

//ROUTE SETELAH LOGIN KE HALAMAN BERANDA
Route::get('/beranda', function () {
    return view('beranda');
})->middleware(['auth', 'verified'])->name('beranda');

//ROUTE MELINDUNGI AKSES TANPA LOGIN
Route::middleware('auth')->group(function () {

// ROUTE USER PROFILE
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// ROUTE HALAMAN POSTINGAN
Route::get('/postingan', [PostinganController::class, 'index'])->name('user.postingan');
Route::get('/detail_postingan/{id}', [PostinganController::class, 'show'])->name('postingan.show');
// ROUTE HALAMAN KARIR
Route::get('/detail_karir/{id}', [KarirController::class, 'show'])->name('karir.show');
Route::get('/karir', [KarirController::class, 'index'])->name('user.karir');

// ROUTE HALAMAN DOKUMEN
Route::get('/dokumen', [DokumenController::class, 'index'])->name('user.dokumen');

// ROUTE HALAMAN KONTAK
Route::get('/kontak', [UserController::class, 'showkontak'])->name('show.kontak');
});

require __DIR__.'/auth.php';



//ROUTE SETELAH ADMIN LOGIN KE HALAMAN DASHBOARD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

// ROUTE MELINDUNGI AKSES TANPA LOGIN
Route::middleware('auth:admin')->group(function () {
// ROUTE ADMIN PROFILE
Route::get('admin/profile', [AdminProfileController::class, 'adminedit'])->name('admin.profile.edit');
Route::patch('admin/profile', [AdminProfileController::class, 'adminupdate'])->name('admin.profile.update');
Route::delete('admin/profile', [AdminProfileController::class, 'admindestroy'])->name('admin.profile.destroy');    

// ROUTE HALAMAN ADMIN POSTINGAN
Route::get('/admin/tambah/postingan', [PostinganController::class, 'tambah_postingan'])->name('postingan.tambah');
Route::post('/admin/tambahpostingan', [PostinganController::class, 'store'])->name('postingan.store');
//sRoute::get('/postingan/{id}', [PostinganController::class, 'show'])->name('admin.postingan.show');
Route::get('/admin/edit/postingan/{id}', [PostinganController::class, 'edit'])->name('postingan.edit');
Route::put('/admin_edit_postingan/{id}', [PostinganController::class, 'update'])->name('postingan.update');
Route::delete('/admin/postingan/delete/{id}', [PostinganController::class, 'destroy'])->name('postingan.destroy');
Route::get('/admin/postingan', [PostinganController::class, 'admin_postingan'])->name('admin_postingan');
    
// ROUTE HALAMAN ADMIN KARIR
    Route::get('/admin/karir', [AdminController::class, 'showkarir'])->name('show.adminkarir'); 
    Route::get('/admin/tambah/karir', [KarirController::class, 'tambah_karir'])->name('karir.tambah');   
    Route::post('/admin_karir', [KarirController::class, 'store'])->name('karir.store');
    Route::get('/admin/edit/karir/{id}', [KarirController::class, 'edit'])->name('karir.edit');
    Route::put('/admin_edit_karir/{id}', [KarirController::class, 'update'])->name('karir.update');
    Route::delete('/karir/{id}', [KarirController::class, 'destroy'])->name('karir.destroy');
    Route::get('/admin/karir', [KarirController::class, 'admin_karir'])->name('admin_karir');

// ROUTE HALAMAN ADMIN DOKUMEN
Route::get('/admin/dokumen', [AdminController::class, 'showdokumen'])->name('show.admindokumen'); 
Route::get('/admin/tambah/dokumen', [DokumenController::class, 'tambah_dokumen'])->name('dokumen.tambah'); 
Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
Route::post('/admin_dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
Route::get('/admin/edit/dokumen/{id}', [DokumenController::class, 'edit'])->name('dokumen.edit');
Route::put('/admin_edit_dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
Route::get('/admin/dokumen', [DokumenController::class, 'admin_dokumen'])->name('admin_dokumen');


});
require __DIR__.'/adminauth.php';




