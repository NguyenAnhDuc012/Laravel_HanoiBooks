<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'nguoi_dung';
    protected $primaryKey = 'MaNguoiDung';

    protected $fillable = [
        'Ten',
        'Email',
        'MatKhau',
        'SoDienThoai',
        'DiaChi',
        'VaiTro',
    ];


    protected $hidden = [
        'MatKhau',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'MatKhau' => 'hashed',
        ];
    }
}
