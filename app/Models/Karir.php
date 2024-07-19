<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;
    protected $table = 'karir';
    protected $fillable = ['id','nama_lowongan','deskripsi_pekerjaan','syarat_ketentuan','tahap_rekrutmen',
    'formulir','tanggal_upload'];
    public $timestamps = true;
}
