<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Interface untuk verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail // Mengimplementasikan interface MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Nama pengguna
        'email', // Alamat email pengguna
        'password', // Kata sandi pengguna
        'foto_profile', // Nama file foto profil pengguna
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Sembunyikan kolom password saat diserialisasi
        'remember_token', // Sembunyikan token yang diingat saat diserialisasi
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Kolom email_verified_at di-cast menjadi tipe data datetime
            'password' => 'hashed', // Kolom password di-cast sebagai hashed value
        ];
    }
}
