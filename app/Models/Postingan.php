<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    // Menentukan tabel yang digunakan model ini
    protected $table = 'postingan';
    // Atribut yang dapat diisi secara massal
    protected $fillable = ['id','nama','gambar','tanggal_upload','deskripsi'];
    // Mengaktifkan pengaturan timestamps untuk model ini
    public $timestamps = true;
}
